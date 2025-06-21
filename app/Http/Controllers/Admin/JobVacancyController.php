<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobVacancyController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::orderby('id', 'asc')->paginate(10);
        return view('admin.manajemen_lowongan.manajemenlowongan', compact('jobVacancies'));
    }


    public function create()
    {
        $locations = [
           'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang',
            'Makassar', 'Palembang', 'Tangerang', 'Depok', 'Bekasi', 'Surakarta'
        ];

        return view('admin.manajemen_lowongan.createlowongan', compact('locations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            // 'company_name' => 'required|string|max:255',
            'job_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
            'location' => 'required|string|max:255',
            'location_details' => 'required|string|max:255',
            'type_job' => 'required|string|max:100',
            'work_schedule' => 'nullable|string|max:100',
            'career_level' => 'nullable|string|max:100',
            'mobility' => 'nullable|string|max:100',
            'benefits' => 'nullable|array',
            'benefits.*' => 'string|max:255', // Validasi untuk setiap item dalam array benefits
            'open_positions' => 'nullable|integer|min:1',
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

        DB::beginTransaction();
        try {
            // Pisahkan data benefits dari data utama
            $benefitNames = $validatedData['benefits'] ?? [];
            // unset($validatedData['benefits']);

            // buat lowongan pekerjaan
            $jobVacancy = JobVacancy::create([
                'title' => $validatedData['title'],
                'company_name' => 'Anti Nganggur', // Static company name
                'job_logo' => $jobLogoPath,
                'location' => $validatedData['location'],
                'location_details' => $validatedData['location_details'] ?? null,
                'type_job' => $validatedData['type_job'],
                'work_schedule' => $validatedData['work_schedule'] ?? null,
                'career_level' => $validatedData['career_level'] ?? null,
                'mobility' => $validatedData['mobility'] ?? null,
                'benefits' => json_encode($benefitNames), // Simpan sebagai JSON
                'open_positions' => $validatedData['open_positions'] ?? 1,
                'min_salary' => $validatedData['min_salary'] ?? null,
                'max_salary' => $validatedData['max_salary'] ?? null,
                'description' => $validatedData['description'],
            ]);

            // Simpan setiap benefit ke tabel job_benefits
            if (!empty($benefitNames)) {
                foreach ($benefitNames as $name) {
                    if ($name) { // Pastikan nama benefit tidak kosong
                        $jobVacancy->jobBenefits()->create(['benefits_name' => $name]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.manajemen.lowongan')->with('success', 'Lowongan berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menambahkan lowongan: ' . $e->getMessage()]);
        }
    }

     public function show(JobVacancy $jobVacancy)
    {

        $jobVacancy->load('jobBenefits'); // Memuat relasi benefits jika ada
        return view('admin.manajemen_lowongan.showlowongan', compact('jobVacancy'));
    }

    public function edit(JobVacancy $jobVacancy)
    {
        $locations = [
           'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang',
            'Makassar', 'Palembang', 'Tangerang', 'Depok', 'Bekasi', 'Surakarta'
        ];

        $jobVacancy->load('jobBenefits'); // Memuat relasi benefits jika ada
        return view('admin.manajemen_lowongan.editlowongan', compact('jobVacancy', 'locations'));
    }

    public function update(Request $request, JobVacancy $jobVacancy)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            // 'company_name' => 'required|string|max:255',
            'job_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required|string|max:255',
            'location_details' => 'nullable|string|max:255',
            'type_job' => 'required|string|max:100',
            'work_schedule' => 'nullable|string|max:100',
            'career_level' => 'nullable|string|max:100',
            'mobility' => 'nullable|string|max:100',
            'benefits' => 'nullable|array',
            'benefits.*' => 'string|max:255', // Validasi untuk setiap item dalam array benefits
            'open_positions' => 'nullable|integer|min:1',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0|gte:min_salary',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('job_logo')) {
            // Hapus logo lama jika ada
            if ($jobVacancy->job_logo && file_exists(storage_path('app/public/job_logos/' . $jobVacancy->job_logo))) {
                unlink(storage_path('app/public/job_logos/' . $jobVacancy->job_logo));
            }
            $logoName = time().'.'.$request->job_logo->extension();
            $request->job_logo->storeAs('public/job_logos', $logoName);
            $validatedData['job_logo'] = $logoName;
        }

        DB::beginTransaction();
        try {
            // Pisahkan data benefits dari data utama
            $benefitNames = $validatedData['benefits'] ?? [];

            // Pastikan $benefitNames adalah array
            if (!is_array($benefitNames)) {
                $benefitNames = [$benefitNames];
            }

            $validatedData['company_name'] = 'Anti Nganggur'; // static company name
            // Update data utama di tabel job_vacancies
            $jobVacancy->update($validatedData);

            // 4. Hapus semua benefit lama dan buat ulang dari data form (Cara paling aman)
            $jobVacancy->jobBenefits()->delete();

            // Simpan kembali benefits yang baru
            if (!empty($benefitNames)) {
                foreach ($benefitNames as $name) {
                     if ($name) {
                        $jobVacancy->jobBenefits()->create(['benefits_name' => $name]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.manajemen.lowongan')->with('success', 'Lowongan berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data. ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        // Hapus logo jika ada
        if ($jobVacancy->job_logo) {
            $logoPath = storage_path('app/public/' . $jobVacancy->job_logo);
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
        }

        // Hapus data jobVacancy (relasi benefits akan terhapus otomatis jika onDelete cascade)
        $jobVacancy->delete();

        return redirect()->route('admin.manajemen.lowongan')->with('success', 'Lowongan berhasil dihapus.');
    }
}
