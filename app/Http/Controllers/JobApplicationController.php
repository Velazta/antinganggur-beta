<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function create()
    {
        return view('job-application.lamar');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position_id' => 'required|string',
            'position_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'education_level' => 'required|string|max:100',
            'major' => 'required|string|max:255',
            'experience_level' => 'required|string|max:100',
            'cv_file' => 'required|file|mimes:pdf|max:5120', // 5MB max
            'portfolio_file' => 'nullable|file|mimes:pdf|max:5120', // 5MB max
        ], [
            'position_id.required' => 'Posisi yang dilamar harus dipilih.',
            'full_name.required' => 'Nama lengkap harus diisi.',
            'phone_number.required' => 'Nomor telepon harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'province.required' => 'Provinsi harus dipilih.',
            'city.required' => 'Kabupaten/Kota harus dipilih.',
            'education_level.required' => 'Pendidikan terakhir harus dipilih.',
            'major.required' => 'Jurusan harus diisi.',
            'experience_level.required' => 'Tingkat pengalaman harus dipilih.',
            'cv_file.required' => 'CV harus diunggah.',
            'cv_file.mimes' => 'CV harus berformat PDF.',
            'cv_file.max' => 'Ukuran CV maksimal 5MB.',
            'portfolio_file.mimes' => 'Portfolio harus berformat PDF.',
            'portfolio_file.max' => 'Ukuran portfolio maksimal 5MB.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Check if storage directories exist, create if not
            if (!Storage::disk('public')->exists('job-applications/cv')) {
                Storage::disk('public')->makeDirectory('job-applications/cv');
            }

            if (!Storage::disk('public')->exists('job-applications/portfolio')) {
                Storage::disk('public')->makeDirectory('job-applications/portfolio');
            }

            // Handle CV file upload
            $cvPath = null;
            if ($request->hasFile('cv_file')) {
                $cvFile = $request->file('cv_file');

                // Check if file is valid
                if (!$cvFile->isValid()) {
                    throw new \Exception('CV file is not valid');
                }

                $cvFileName = time() . '_cv_' . $cvFile->getClientOriginalName();
                $cvPath = $cvFile->storeAs('job-applications/cv', $cvFileName, 'public');

                // Log successful upload
                Log::info('CV uploaded successfully', ['path' => $cvPath]);
            }

            // Handle Portfolio file upload (optional)
            $portfolioPath = null;
            if ($request->hasFile('portfolio_file')) {
                $portfolioFile = $request->file('portfolio_file');

                // Check if file is valid
                if (!$portfolioFile->isValid()) {
                    throw new \Exception('Portfolio file is not valid');
                }

                $portfolioFileName = time() . '_portfolio_' . $portfolioFile->getClientOriginalName();
                $portfolioPath = $portfolioFile->storeAs('job-applications/portfolio', $portfolioFileName, 'public');

                // Log successful upload
                Log::info('Portfolio uploaded successfully', ['path' => $portfolioPath]);
            }

            // Create job application record
            $jobApplication = JobApplication::create([
                'position_id' => $request->position_id,
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

            // Log successful creation
            Log::info('Job application created successfully', ['id' => $jobApplication->id]);

            return redirect()->route('lamar.create')
                ->with('application_success', 'Lamaran Anda berhasil dikirim! Kami akan menghubungi Anda segera.');

        } catch (\Exception $e) {
            // Log the actual error for debugging
            Log::error('Job application submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['cv_file', 'portfolio_file']) // Don't log file data
            ]);

            return back()
                ->with('error', 'Terjadi kesalahan saat mengirim lamaran: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Using dummy data
     */
    public function getPositions()
    {
        // Dummy data for positions
        $positions = [
            ['id' => '1', 'name' => 'Web Developer'],
            ['id' => '2', 'name' => 'UI/UX Designer'],
            ['id' => '3', 'name' => 'Digital Marketing'],
            ['id' => '4', 'name' => 'Content Writer'],
            ['id' => '5', 'name' => 'Project Manager'],
            ['id' => '6', 'name' => 'Customer Service'],
            ['id' => '7', 'name' => 'Data Analyst'],
            ['id' => '8', 'name' => 'Mobile Developer'],
            ['id' => '9', 'name' => 'DevOps Engineer'],
            ['id' => '10', 'name' => 'Quality Assurance'],
        ];

        return response()->json($positions);
    }
}
