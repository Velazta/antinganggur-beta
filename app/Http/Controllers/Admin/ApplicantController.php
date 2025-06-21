<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class ApplicantController extends Controller
{
    public function index()
    {

        $stats = [
            'total' => JobApplication::count(),
            'accepted' => JobApplication::where('status', 'accepted')->count(),
            'rejected' => JobApplication::where('status', 'rejected')->count(),
            'pending' => JobApplication::where('status', 'pending')->count(),
        ];
        // Mengambil semua data lamaran kerja
        $applications = JobApplication::with('user', 'jobVacancy')->latest()->paginate(10);

        return view('admin.pelamar.manajemenpelamar', compact('applications', 'stats'));
    }

    public function updateStatus(Request $request, JobApplication $application)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        // Update status lamaran kerja
        $application->update(['status' => $request->status]);

        $application->status = $request->status;
        $application->save();
        return redirect()->back()->with('success', 'Status lamaran berhasil diperbarui.');

    }
}

