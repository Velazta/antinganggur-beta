<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Experience;
use Illuminate\Support\Facades\Storage; //untuk mengelola file
use Illuminate\Validation\Rule; // untuk validasi gender
class ProfileController extends Controller
{

    public function show()
    {

        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        return view('profile.show', compact('user', 'profile'));
    }

    public function experience() {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();
        $experiences = $user->experiences;

        return view('profile.experience', compact('user', 'profile', 'experiences'));
    }

    public function storeExperience(Request $request) {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'country'=> 'nullable|string|max:255',
            'city'=> 'nullable|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|digits:4',
            'end_month' => 'required_unless:current_job,1|nullable|integer|between:1,12',
            'end_year' => 'required_unless:current_job,1|nullable|integer|digits:4|gte:start_year',
            'current_job' => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        $request->user()->experiences()->create($validated);

        return redirect()->route('profile.experience')->with('success_experience', 'Pengalaman kerja berhasil ditambahkan!');
    }

    // METHOD UNTUK MENGHAPUS DATA
    public function deleteExperience(Experience $experience)
    {

        // Pemeriksaan kepemilikan
        if (auth()->id() !== $experience->user_id) {
            abort(403, 'Akses Ditolak');
        }

        $experience->delete();

        return redirect()->route('profile.experience')
                         ->with('success_experience', 'Pengalaman kerja berhasil dihapus!');
    }

     public function editExperience(Experience $experience)
    {
        // Pemeriksaan kepemilikan
        if (auth()->id() !== $experience->user_id) {
            abort(403, 'Akses Ditolak');
        }

        return view('profile.experience.edit', [
            'user' => auth()->user(), // Cara benar mengambil user
            'profile' => auth()->user()->profile ?? new Profile(),
            'experience' => $experience,
        ]);
    }

    // METHOD UNTUK MENYIMPAN PERUBAHAN
    public function updateExperience(Request $request, Experience $experience)
    {
        // Pemeriksaan kepemilikan
        if (auth()->id() !== $experience->user_id) {
            abort(403, 'Akses Ditolak');
        }

        // Validasi sama seperti saat membuat data baru
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|digits:4',
            'current_job' => 'nullable|boolean',
            'end_month' => 'required_unless:current_job,1|nullable|integer|between:1,12',
            'end_year' => 'required_unless:current_job,1|nullable|integer|digits:4|gte:start_year',
            'job_description' => 'nullable|string',
        ]);

        // Tangani checkbox 'current_job'
        $validated['current_job'] = $request->has('current_job');

        $experience->update($validated);

        return redirect()->route('profile.experience')->with('success_experience', 'Pengalaman kerja berhasil diperbarui!');
    }


    public function education() {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        return view('profile.education', compact('user', 'profile'));
    }

    public function cv() {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        return view('profile.cv', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedUserData = $request->validate([
            'name' => 'required|string|max:255',
            // Email biasanya tidak diubah atau divalidasi unik jika diubah
            // 'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // email untuk sekarang tidak bisa diubah terlebih dahulu. Jika pada stuju bisa edit gunakan yang diatas
        ]);

        $validatedProfileData = $request->validate([
            'phone_number' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => ['nullable', Rule::in(['male', 'female', 'other'])], // Sesuaikan dengan enum di migrasi
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto profil
        ]);

        // Update data di tabel users
        $user->name = $validatedUserData['name'];
        // if ($request->filled('email')) { // Jika email boleh diubah
        //     $user->email = $validatedUserData['email'];
        // }
        $user->save();

        // Menangani upload foto profil
        $profilePhotoPath = $user->profile->profile_photo_path ?? null; // Ambil path foto lama jika ada

        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada dan bukan foto default
            if ($profilePhotoPath && Storage::disk('public')->exists($profilePhotoPath)) {
                Storage::disk('public')->delete($profilePhotoPath);
            }
            // Simpan foto baru
            $profilePhotoPath = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        // Update atau buat data di tabel profiles
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id], // Kondisi pencarian
            [ // Data untuk diupdate atau dibuat
                'phone_number' => $validatedProfileData['phone_number'] ?? null,
                'country' => $validatedProfileData['country'] ?? null,
                'province' => $validatedProfileData['province'] ?? null,
                'city' => $validatedProfileData['city'] ?? null,
                'date_of_birth' => $validatedProfileData['date_of_birth'] ?? null,
                'gender' => $validatedProfileData['gender'] ?? null,
                'address' => $validatedProfileData['address'] ?? null,
                'bio' => $validatedProfileData['bio'] ?? null,
                'profile_photo_path' => $profilePhotoPath, // Simpan path foto baru atau lama
            ]
        );

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}

