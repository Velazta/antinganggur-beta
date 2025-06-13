<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'message.required' => 'Pesan harus diisi.',
            'message.max' => 'Pesan maksimal 1000 karakter.',
        ]);

        try {
            // Log the contact attempt
            Log::info('Contact form submitted', [
                'email' => $request->email,
                'message' => substr($request->message, 0, 100) . '...'
            ]);

            // For now, we'll just log the message since there's no Contact model
            // You can create a Contact model and database table later if needed

            return back()->with('contact_success', 'Pesan Anda berhasil dikirim! Terima kasih telah menghubungi kami.');

        } catch (\Exception $e) {
            Log::error('Contact form submission failed', [
                'error' => $e->getMessage(),
                'email' => $request->email
            ]);

            return back()->with('contact_error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }
}
