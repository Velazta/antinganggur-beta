<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GuestAuthController extends Controller
{
     public function register(Request $request)
    {
        // Membuat user baru dengan data acak
        $guestUser = User::create([
            'name' => 'Guest ' . Str::random(5),
            'email' => Str::uuid()->toString() . '@guest.antinganggur.com',
            'password' => Hash::make(Str::random(16)),
        ]);

        // Membuat token Sanctum untuk user tersebut
        $token = $guestUser->createToken('guest-token')->plainTextToken;

        // Mengembalikan respons berisi token dalam format JSON
        return response()->json([
            'message' => 'Guest user registered successfully.',
            'token' => $token,
        ], 201);
    }
}
