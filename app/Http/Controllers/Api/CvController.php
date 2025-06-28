<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CvResource;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index(Request $request)
    {
        $cvs = $request->user()->cvs()->latest()->get();
        return CvResource::collection($cvs);
    }

    public function store(Request $request)
    {
        $request->validate([
            // Validasi untuk file upload
            'cv_file' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        $file = $request->file('cv_file');
        // Simpan file di dalam folder 'cvs' di storage publik
        $path = $file->store('cvs', 'public');

        // Simpan informasi file ke database
        $cv = $request->user()->cvs()->create([
            'file_path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
        ]);

        return response()->json([
            'message' => 'CV berhasil diunggah!',
            'data' => new CvResource($cv)
        ], 201);
    }

    public function destroy(Request $request, Cv $cv)
    {
        if ($request->user()->id !== $cv->user_id) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        // Hapus file dari storage
        Storage::disk('public')->delete($cv->file_path);
        // Hapus data dari database
        $cv->delete();

        return response()->json(['message' => 'CV berhasil dihapus.'], 200);
    }

    public function download(Request $request, Cv $cv)
    {
       if ($request->user()->id !== $cv->user_id) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        // PERBAIKAN: Cek apakah file benar-benar ada sebelum mencoba download
        if (Storage::disk('public')->exists($cv->file_path)) {
            // Jika file ada, kirimkan sebagai download
            return Storage::disk('public')->download($cv->file_path, $cv->original_name);
        } else {
            // Jika file tidak ditemukan, kirim respons JSON yang jelas, bukan crash
            return response()->json(['message' => 'File tidak ditemukan di server.'], 404);
        }
    }
}
