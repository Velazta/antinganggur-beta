<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Models\JobVacancy;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{

    public function create(Request $request)
    {
        // Mengambil semua lowongan pekerjaan dan mengurutkannya berdasarkan ID
        $jobVacancies = JobVacancy::all()->sortBy('id');

        // Mengambil job_vacancy_id dan job_title dari query parameter
        $selectedJobId = $request->query('job_vacancy_id');
        $selectedJobTitle = $request->query('job_title');

        // Mengirim jobVacancies, selectedJobId, dan selectedJobTitle ke view
        return view('job-application.lamar', compact('jobVacancies', 'selectedJobId', 'selectedJobTitle'));
    }

     public function store(Request $request)
{
    $validatedData = $request->validate([
        'job_vacancy_id'   => 'required|exists:job_vacancies,id',
        'full_name'        => 'required|string|max:255',
        'phone_number'     => 'required|string|max:20',
        'email'            => 'required|email|max:255',
        'province'         => 'required|string|max:255',
        'city'             => 'required|string|max:255',
        'education_level'  => 'required|string|max:100',
        'major'            => 'required|string|max:255',
        'experience_level' => 'required|string|max:100',
        'cv_file'          => 'required|file|mimes:pdf|max:2048',
        'portfolio_file'   => 'nullable|file|mimes:pdf|max:2048',
    ]);

    // Cek apakah pengguna sudah pernah melamar untuk posisi ini.
    $existingApplication = JobApplication::where('user_id', Auth::id())
                                         ->where('job_vacancy_id', $request->job_vacancy_id)
                                         ->first();

    if ($existingApplication) {
        return redirect()->back()
            ->with('error', 'Anda sudah pernah melamar untuk posisi ini.')
            ->withInput();
    }

    try {
        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('cv_file')) {
            $validatedData['cv_file'] = $request->file('cv_file')->store('cv_files', 'public');
        }

        if ($request->hasFile('portfolio_file')) {
            $validatedData['portfolio_file'] = $request->file('portfolio_file')->store('portfolio_files', 'public');
        }

        $jobApplication = JobApplication::create($validatedData);

        Log::info('Job application created successfully', ['application_id' => $jobApplication->id, 'user_id' => Auth::id()]);

        return redirect()->route('lamar.create')
            ->with('success', 'Lamaran Anda berhasil dikirim! Terima kasih telah melamar.');

    } catch (\Exception $e) {
        Log::error('Job application submission failed', [
            'user_id' => Auth::id(),
            'error' => $e->getMessage()
        ]);

        return redirect()->back()
            ->with('error', 'Terjadi kesalahan sistem saat mengirim lamaran. Silakan coba lagi nanti.')
            ->withInput();
    }
}

    public function getPositions()
    {
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
