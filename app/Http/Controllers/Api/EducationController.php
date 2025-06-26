<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Http\Resources\EducationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index(Request $request){
        $educations = $request->user()->educations()->orderBy('start_year', 'desc')->get();
        return EducationResource::collection($educations);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'university_name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'start_month' => 'nullable|string|max:255',
            'start_year' => 'nullable|string|max:4',
            'end_month' => 'required_unless:is_currently_studying,true|nullable|string|max:255',
            'end_year' => 'required_unless:is_currently_studying,true|nullable|string|max:4',
            'is_currently_studying' => 'required|boolean',
            'ipk' => 'nullable|numeric|between:0,4.00',
            'description' => 'nullable|string',
        ]);

        $validated['currently_studying'] = $validated['is_currently_studying'];
        unset($validated['is_currently_studying']);

        $education = $request->user()->educations()->create($validated);

        return response()->json([
            'message' => 'Riwayat pendidikan berhasil ditambahkan!',
            'data' => new EducationResource($education)
        ], 201);
    }

    public function update(Request $request, Education $education) {
        if(Auth::id() !== $education->user_id) {
            return response()->json()(['message', 'Akses ditolak'], 403);
        }

        $validated = $request->validate([
        'university_name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'start_month' => 'nullable|string|max:255',
            'start_year' => 'nullable|string|max:4',
            'end_month' => 'required_unless:is_currently_studying,true|nullable|string|max:255',
            'end_year' => 'required_unless:is_currently_studying,true|nullable|string|max:4',
            'is_currently_studying' => 'required|boolean',
            'ipk' => 'nullable|numeric|between:0,4.00',
            'description' => 'nullable|string',
        ]);

        $validated['currently_studying'] = $validated['is_currently_studying'];
        unset($validated['is_currently_studying']);

        $education->update($validated);

        return response()->json([
            'message' => 'Riwayat pendidikan berhasil diperbarui!',
            'data' => new EducationResource($education)
        ]);

    }

    public function destroy(Education $education) {
        if (Auth::id() !== $education->user_id) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        $education->delete();

        return response()->json(['message' => 'Riwayat pendidikan berhasil dihapus.'], 200);
    }


}
