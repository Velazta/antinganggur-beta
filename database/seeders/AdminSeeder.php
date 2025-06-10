<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin Perusahaan',
            'email' => 'admin@antinganggur.com',
            'password' => Hash::make('antinganggurjaya'), // Ganti dengan password yang aman
        ]);
    }
}
