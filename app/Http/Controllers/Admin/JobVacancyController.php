<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JobVacancyController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::orderby('id', 'asc')->paginate(10);
        return view('admin.manajemen_lowongan.manajemenlowongan', compact('jobVacancies'));
    }


    public function create()
    {
        return view('admin.manajemen_lowongan.createlowongan');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'location' => 'required|string|max:255',
            'type_job' => 'required|string|max:100',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0|gte:min_salary',
            'description' => 'required|string',
        ],
        [
            'job_logo.required' => 'Logo perusahaan wajib diunggah.',
            'job_logo.image' => 'File harus berupa gambar.',
            'job_logo.mimes' => 'Format gambar yang diizinkan adalah JPEG, PNG, JPG, GIF, SVG.',
            'job_logo.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $jobLogoPath = null;
        if ($request->hasFile('job_logo')) {
            $jobLogoPath = $request->file('job_logo')->store('job_logos', 'public');
        }

        JobVacancy::create([
            'title' => $validatedData['title'],
            'company_name' => $validatedData['company_name'],
            'job_logo' => $jobLogoPath,
            'location' => $validatedData['location'],
            'type_job' => $validatedData['type_job'],
            'min_salary' => $validatedData['min_salary'] ?? null,
            'max_salary' => $validatedData['max_salary'] ?? null,
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('admin.manajemen.lowongan')->with('success', 'Lowongan berhasil ditambahkan!');
    }

     public function show(JobVacancy $jobVacancy)
    {

        return view('admin.manajemen_lowongan.showlowongan', compact('jobVacancy'));
    }

    public function edit(JobVacancy $jobVacancy)
    {
        return view('admin.manajemen_lowongan.editlowongan', compact('jobVacancy'));
    }

    public function update(Request $request, JobVacancy $jobVacancy)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'location' => 'required|string|max:255',
            'type_job' => 'required|string|max:100',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0|gte:min_salary',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('job_logo')) {
            // Hapus logo lama jika ada
            if ($jobVacancy->job_logo) {
                Storage::disk('public')->delete($jobVacancy->job_logo);
            }
            $validatedData['job_logo'] = $request->file('job_logo')->store('job_logos', 'public');
        }

        $jobVacancy->update($validatedData);

        return redirect()->route('admin.manajemen.lowongan')->with('success', 'Lowongan berhasil diperbarui!');
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        // Hapus logo terkait jika ada
        if ($jobVacancy->job_logo) {
            Storage::disk('public')->delete($jobVacancy->job_logo);
        }
        $jobVacancy->delete();

        return redirect()->route('admin.manajemen.lowongan')->with('success', 'Lowongan berhasil dihapus!');
    }
}
