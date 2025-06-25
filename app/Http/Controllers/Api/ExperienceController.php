<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
     public function index(Request $request)
    {
        $experiences = $request->user()->experiences()->orderBy('start_year', 'desc')->get();
        return ExperienceResource::collection($experiences);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|digits:4',
            'end_month' => 'required_unless:is_current_job,true|nullable|integer|between:1,12',
            'end_year' => 'required_unless:is_current_job,true|nullable|integer|digits:4|gte:start_year',
            'is_current_job' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        // Menyesuaikan nama kunci sebelum disimpan ke database
        $validated['current_job'] = $validated['is_current_job'];
        unset($validated['is_current_job']);

        $experience = $request->user()->experiences()->create($validated);

        return response()->json([
            'message' => 'Pengalaman kerja berhasil ditambahkan!',
            'data' => new ExperienceResource($experience)
        ], 201);
    }

    public function show(Request $request, Experience $experience)
    {

        if ($request->user()->id !== $experience->user_id) {
        {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }
        return new ExperienceResource($experience);
        }
    }

    public function update(Request $request, Experience $experience)
    {
        if ($request->user()->id !== $experience->user_id) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|digits:4',
            'is_current_job' => 'required|boolean',
            'end_month' => 'required_unless:is_current_job,true|nullable|integer|between:1,12',
            'end_year' => 'required_unless:is_current_job,true|nullable|integer|digits:4|gte:start_year',
            'description' => 'nullable|string',
        ]);

        // Menyesuaikan nama kunci sebelum di-update
        $validated['current_job'] = $validated['is_current_job'];
        unset($validated['is_current_job']);

        $experience->update($validated);

        return response()->json([
            'message' => 'Pengalaman kerja berhasil diperbarui!',
            'data' => new ExperienceResource($experience)
        ]);
    }

    public function destroy(Request $request, Experience $experience)
    {
       if ($request->user()->id !== $experience->user_id) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        $experience->delete();

        return response()->json(['message' => 'Pengalaman kerja berhasil dihapus.'], 200);
    }
}
