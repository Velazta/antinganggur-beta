<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

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
        $applications = JobApplication::with('user.profile', 'jobVacancy')->latest()->paginate(10);

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

    public function showApplication(JobApplication $application)
    {
        return view('admin.pelamar.showlamaran', compact('application'));
    }

    public function showContactForm(JobApplication $application)
    {
        $application->load('user', 'jobVacancy');
        return view('admin.pelamar.menghubungi', compact('application'));
    }

    public function sendMessage(Request $request, JobApplication $application)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Message::create([
            'admin_id' => Auth::guard('admin')->id(), // Mengambil ID admin yang sedang login
            'user_id' => $application->user_id,
            'job_application_id' => $application->id,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return redirect()->route('admin.manajemen.pelamar')
            ->with('success', 'Pesan berhasil dikirim kepada ' . $application->user->name);
    }
}
