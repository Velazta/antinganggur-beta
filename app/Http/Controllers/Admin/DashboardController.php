<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPendaftar = User::count();

        // Data prototype untuk jumlah lowongan aktif
        $jumlahLowonganAktif = 20;

        // Data prototype untuk aktifitas terbaru
        $aktifitasTerbaru = collect([
            ['id' => 1, 'nama' => 'Ravelin Lutfhan', 'posisi' => 'IT Support', 'tanggal' => '2025-06-11'],
            ['id' => 2, 'nama' => 'Tito Rizqy', 'posisi' => 'Mobile Developer', 'tanggal' => '2025-06-22'],
            ['id' => 3, 'nama' => 'Rayhan Bagus Sadewa', 'posisi' => 'IT Support', 'tanggal' => '2025-05-10'],
        ]);

        return view('admin.dashboard.dashboard', compact (
            'jumlahPendaftar',
            'jumlahLowonganAktif',
            'aktifitasTerbaru'
        ));
    }
}
