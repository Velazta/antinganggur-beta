<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'message' => 'required|string|min:5',
        ]);

        // Simpan ke database
        Contact::create([
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Pesan Anda telah terkirim!');
    }
}
