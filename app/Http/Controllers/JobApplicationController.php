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
    public function create()
    {
        // Hanya fokus mengambil lowongan aktif
        $jobVacancies = JobVacancy::all()->sortBy('id'); // Mengambil semua lowongan pekerjaan dan mengurutkannya berdasarkan ID

        // Mengirim jobVacancies ke view
        return view('job-application.lamar', compact('jobVacancies'));
    }

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
            'cv_file' => 'required|file|mimes:pdf|max:5120', // 5MB max
            'portfolio_file' => 'nullable|file|mimes:pdf|max:5120', // 5MB max
        ], [
            'job_vacancy_id.required' => 'Lowongan pekerjaan harus dipilih.',
            'job_vacancy_id.exists' => 'Lowongan pekerjaan yang dipilih tidak valid.',
            'position_name.required' => 'Nama posisi tidak boleh kosong.',
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

                if (!$cvFile->isValid()) {
                    throw new \Exception('CV file is not valid');
                }

                $cvFileName = time() . '_cv_' . $cvFile->getClientOriginalName();
                $cvPath = $cvFile->storeAs('job-applications/cv', $cvFileName, 'public');
                Log::info('CV uploaded successfully', ['path' => $cvPath]);
            }

            // Handle Portfolio file upload (optional)
            $portfolioPath = null;
            if ($request->hasFile('portfolio_file')) {
                $portfolioFile = $request->file('portfolio_file');

                if (!$portfolioFile->isValid()) {
                    throw new \Exception('Portfolio file is not valid');
                }

                $portfolioFileName = time() . '_portfolio_' . $portfolioFile->getClientOriginalName();
                $portfolioPath = $portfolioFile->storeAs('job-applications/portfolio', $portfolioFileName, 'public');
                Log::info('Portfolio uploaded successfully', ['path' => $portfolioPath]);
            }

            // Create job application record
            $jobApplication = JobApplication::create([
                // Karena tidak ada Auth::user(), user_id tidak bisa diisi otomatis dari user yang login
                // Jika user_id di tabel job_applications adalah nullable atau ada cara lain untuk mengisinya,
                // maka Anda bisa mengosongkannya atau mengisinya sesuai kebutuhan.
                // Untuk contoh ini, saya akan menghilangkannya. Jika diperlukan,
                // pastikan Anda memiliki kolom 'user_id' yang nullable di migrasi
                // atau Anda mengelola autentikasi pengguna secara terpisah.
                // 'user_id' => $user->id, // Jika Anda tidak menggunakan Auth, baris ini harus dihapus atau diganti
                'job_vacancy_id' => $request->job_vacancy_id, // Menggunakan job_vacancy_id
                'position_name' => $request->position_name, // Diambil dari hidden input JS
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
