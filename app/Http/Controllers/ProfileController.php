<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Cv;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();

        return view('profile.show', [
            'user' => $user,
            'profile' => $profile
        ]);
    }

    public function experience()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();
        $experiences = $user->experiences;

        return view('profile.experience', [
            'user' => $user,
            'profile' => $profile,
            'experiences' => $experiences,
        ]);
    }

    public function storeExperience(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
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

    public function deleteExperience(Experience $experience)
    {
        if (Auth::id() !== $experience->user_id) {
            abort(403, 'Akses Ditolak');
        }

        $experience->delete();

        return redirect()->route('profile.experience')
                         ->with('success_experience', 'Pengalaman kerja berhasil dihapus!');
    }

    public function editExperience(Experience $experience)
    {
        if (Auth::id() !== $experience->user_id) {
            abort(403, 'Akses Ditolak');
        }

        return view('profile.experience.edit', [
            'user' => Auth::user(),
            'profile' => Auth::user()->profile ?? new Profile(),
            'experience' => $experience,
        ]);
    }

    public function updateExperience(Request $request, Experience $experience)
    {
        if (Auth::id() !== $experience->user_id) {
            abort(403, 'Akses Ditolak');
        }

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
            'description' => 'nullable|string',
        ]);

        $validated['current_job'] = $request->has('current_job');

        $experience->update($validated);

        return redirect()->route('profile.experience')->with('success_experience', 'Pengalaman kerja berhasil diperbarui!');
    }

    public function education()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();
        $educations = $user->educations;

        return view('profile.education', [
            'user' => $user,
            'profile' => $profile,
            'educations' => $educations
        ]);
    }

    public function storeEducation(Request $request)
    {
        $validated = $request->validate([
            'university_name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|digits:4',
            'currently_studying' => 'nullable|boolean',
            'end_month' => 'required_unless:currently_studying,1|nullable|integer|between:1,12',
            'end_year' => 'required_unless:currently_studying,1|nullable|integer|digits:4|gte:start_year',
            'ipk' => 'nullable|numeric|between:0,4.00',
            'description' => 'nullable|string',
        ]);

        $validated['currently_studying'] = $request->has('currently_studying');

        $request->user()->educations()->create($validated);

        return redirect()->route('profile.education')->with('success_education', 'Riwayat pendidikan berhasil ditambahkan!');
    }

     public function deleteEducation(Education $education)
    {
        if (Auth::id() !== $education->user_id) {
            abort(403, 'Akses Ditolak');
        }

        $education->delete();

        return redirect()->route('profile.education')
                         ->with('success_education', 'Riwayat pendidikan berhasil dihapus!');
    }

    public function editEducation(Education $education)
    {
        if (Auth::id() !== $education->user_id) {
            abort(403, 'Akses Ditolak');
        }

        return view('profile.education.edit', [
            'user' => Auth::user(),
            'profile' => Auth::user()->profile ?? new Profile(),
            'education' => $education,
        ]);
    }

    public function updateEducation(Request $request, Education $education)
    {
        if (Auth::id() !== $education->user_id) {
            abort(403, 'Akses Ditolak');
        }

        $validated = $request->validate([
            'university_name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|digits:4',
            'currently_studying' => 'nullable|boolean',
            'end_month' => 'required_unless:currently_studying,1|nullable|integer|between:1,12',
            'end_year' => 'required_unless:currently_studying,1|nullable|integer|digits:4|gte:start_year',
            'ipk' => 'nullable|numeric|between:0,4.00',
            'description' => 'nullable|string',
        ]);

        $validated['currently_studying'] = $request->has('currently_studying');

        $education->update($validated);

        return redirect()->route('profile.education')->with('success_education', 'Riwayat pendidikan berhasil diperbarui!');
    }


    public function cv()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();
        $cvs = $user->cvs()->latest()->get();

        return view('profile.cv', [
            'user' => $user,
            'profile' => $profile,
            'cvs' => $cvs
        ]);
    }

    public function storeCv(Request $request) {
        $request->validate([
            'cv_file' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $file = $request->file('cv_file');

        $path = $file->store('cvs', 'public');

        $request->user()->cvs()->create([
            'file_path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
        ]);

        return redirect()->route('profile.cv')->with('success_cv', 'CV berhasil diunggah');
    }

    public function deleteCv(Cv $cv) {
        if (Auth::id() !== $cv->user_id) {
            abort(403, 'Akses Ditolak');
        }

        Storage::disk('public')->delete($cv->file_path);
        $cv->delete();

        return redirect()->route('profile.cv')->with('success_cv', 'CV berhasil dihapus!');
    }

    public function downloadCv(Cv $cv) {
        if(Auth::id() !== $cv->user_id) {
            abort(403, 'Akses Ditolak');
        }

        return Storage::disk('public')->download($cv->file_path, $cv->original_name);
    }

    // public function deleteEducation(Education $education)
    // {
    //     if (Auth::id() !== $education->user_id) {
    //         abort(403, 'Akses Ditolak');
    //     }

    //     $education->delete();

    //     return redirect()->route('profile.education')
    //                      ->with('success_education', 'Riwayat pendidikan berhasil dihapus!');
    // }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedUserData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validatedProfileData = $request->validate([
            'phone_number' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => ['nullable', Rule::in(['male', 'female', 'other'])],
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $validatedUserData['name'];
        $user->save();

        $profilePhotoPath = $user->profile->profile_photo_path ?? null;

        if ($request->hasFile('profile_photo')) {
            if ($profilePhotoPath && Storage::disk('public')->exists($profilePhotoPath)) {
                Storage::disk('public')->delete($profilePhotoPath);
            }
            $profilePhotoPath = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'phone_number' => $validatedProfileData['phone_number'] ?? null,
                'country' => $validatedProfileData['country'] ?? null,
                'province' => $validatedProfileData['province'] ?? null,
                'city' => $validatedProfileData['city'] ?? null,
                'date_of_birth' => $validatedProfileData['date_of_birth'] ?? null,
                'gender' => $validatedProfileData['gender'] ?? null,
                'address' => $validatedProfileData['address'] ?? null,
                'bio' => $validatedProfileData['bio'] ?? null,
                'profile_photo_path' => $profilePhotoPath,
            ]
        );

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
