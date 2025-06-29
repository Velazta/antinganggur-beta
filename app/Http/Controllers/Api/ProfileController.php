<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request) {
        $user = $request->user()->loadMissing('profile');

        return new ProfileResource($user->profile);
    }

    public function store(Request $request) {
        $user = $request->user();

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);


        if (isset($validatedData['name'])) {
            $user->update(['name' => $validatedData['name']]);
        }

        $profile = $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            collect($validatedData)->except('name')->all()
        );

        return new ProfileResource($profile->fresh());
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Maks 2MB
        ]);

        $user = $request->user();
        $profile = $user->profile()->firstOrCreate(['user_id' => $user->id]);

        // Hapus foto lama jika ada
        if ($profile->profile_photo_path && Storage::disk('public')->exists($profile->profile_photo_path)) {
            Storage::disk('public')->delete($profile->profile_photo_path);
        }

        // Simpan foto baru dan dapatkan path-nya
        $path = $request->file('profile_photo')->store('profile-photos', 'public');

        // Update path di database
        $profile->update(['profile_photo_path' => $path]);

        return response()->json([
            'message' => 'Foto profil berhasil diperbarui!',
            // Kirim kembali URL foto yang baru untuk ditampilkan di aplikasi
            'profile_photo_url' => asset('storage/' . $path)
        ], 200);
    }
}
