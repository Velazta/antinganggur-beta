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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'message.required' => 'Pesan harus diisi.',
            'message.max' => 'Pesan maksimal 1000 karakter.',
        ]);


        try {
            // Log the contact attempt
            Log::info('Contact form submitted', [
                'nama' =>  $validated['nama'],
                'email' => $validated['email'],
                'message' => substr($validated['message'], 0, 100) . '...'
            ]);

            // Simpan ke database jika model Contact tersedia
             Contact::create([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'message' => $validated['message'],
            ]);
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
