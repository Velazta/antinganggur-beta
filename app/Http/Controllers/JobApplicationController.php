<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\JobVacancy; // Pastikan ini di-import
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage; // Pastikan ini di-import

class JobApplicationController extends Controller
{
    /**
     * Menampilkan form lamaran pekerjaan.
     * Menerima job_vacancy_id dan job_title opsional dari URL.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        // Mengambil semua lowongan pekerjaan dan mengurutkannya berdasarkan ID
        $jobVacancies = JobVacancy::all()->sortBy('id');

        // Mengambil job_vacancy_id dan job_title dari query parameter jika ada
        $selectedJobId = $request->query('job_vacancy_id');
        $selectedJobTitle = $request->query('job_title');

        // Mengirim jobVacancies, selectedJobId, dan selectedJobTitle ke view
        return view('job-application.lamar', compact('jobVacancies', 'selectedJobId', 'selectedJobTitle'));
    }

    /**
     * Menyimpan data lamaran pekerjaan yang baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Mengubah 'position_id' menjadi 'job_vacancy_id' dan menambahkan validasi exists
            'job_vacancy_id' => 'required|exists:job_vacancies,id',
            'position_name' => 'required|string|max:255', // Ini akan diisi dari hidden input JS
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'education_level' => 'required|string|max:100',
            'major' => 'required|string|max:255',
            'experience_level' => 'required|string|max:100',
            'cv_file' => 'required|file|mimes:pdf|max:2048', // Max 2MB
            'portfolio_file' => 'nullable|file|mimes:pdf|max:2048', // Opsional, Max 2MB
        ]);

        if ($validator->fails()) {
            Log::error('Job application validation failed', ['errors' => $validator->errors()->toArray()]);
            return back()->withErrors($validator)->withInput();
        }

        try {
            $cvPath = null;
            if ($request->hasFile('cv_file')) {
                $cvPath = $request->file('cv_file')->store('cv_files', 'public');
            }

            $portfolioPath = null;
            if ($request->hasFile('portfolio_file')) {
                $portfolioPath = $request->file('portfolio_file')->store('portfolio_files', 'public');
            }

            // Simpan data lamaran ke database
            $jobApplication = JobApplication::create([
                'position_id' => $request->job_vacancy_id, // Menggunakan job_vacancy_id
                'position_name' => $request->position_name,
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'province' => $request->province,
                'city' => $request->city,
                'education_level' => $request->education_level,
                'major' => $request->major,
                'experience_level' => $request->experience_level,
                'cv_path' => $cvPath,
                'portfolio_path' => $portfolioPath,
            ]);

            Log::info('Job application created successfully', ['id' => $jobApplication->id]);

            return redirect()->route('lamar.create')
                ->with('application_success', 'Lamaran Anda berhasil dikirim! Kami akan menghubungi Anda segera.');

        } catch (\Exception $e) {
            Log::error('Job application submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['cv_file', 'portfolio_file'])
            ]);

            return back()
                ->with('error', 'Terjadi kesalahan saat mengirim lamaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Fungsi ini sekarang tidak relevan jika data lowongan diambil langsung di create()
     * dan tidak ada AJAX request untuk posisi lagi.
     * Anda bisa menghapusnya jika memang tidak ada rute yang memanggilnya.
     */
    public function getPositions()
    {
        // Contoh jika Anda ingin getPositions() mengembalikan data lowongan dari database:
        $positions = JobVacancy::select('id', 'job_title as name')->get();
        return response()->json($positions);

        // Atau jika Anda ingin tetap mengembalikan data dummy:
        // $positions = [
        //     ['id' => '1', 'name' => 'Web Developer'],
        //     ['id' => '2', 'name' => 'UI/UX Designer'],
        //     // ... dst
        // ];
        // return response()->json($positions);
    }
}
