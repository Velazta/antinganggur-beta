<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobVacancy;
use Illuminate\Support\Facades\DB;

class LowonganController extends Controller
{
    public function index(request $request) {
        $query = JobVacancy::query();

        if($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('location', 'like', '%' . $search . '%')
                  ->orWhere('type_job', 'like', '%' . $search . '%');
        }

        if($request->filled('location') && $request->input('location') !== 'semua lokasi') {
            $location = $request->input('location');
            $query->where('location', $location);

        }

        // --- Query baru untuk lowongan trending (Section 2) ---
        $trendingIds = [1, 2, 3]; // Tentukan ID lowongan favorit Anda di sini
        $trendingVacancies = JobVacancy::whereIn('id', $trendingIds)
                                      ->orderBy(DB::raw('FIELD(id, ' . implode(',', $trendingIds) . ')'))
                                      ->get();

        $lowongan = $query->latest()->paginate(9);

        $locations = [
           'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang',
            'Makassar', 'Palembang', 'Tangerang', 'Depok', 'Bekasi', 'Surakarta'
        ];

        // $jobVacancies = JobVacancy::latest()->get();
        return view('lowongan.lowongan', [
            'lowongan' => $lowongan,
            'locations' => $locations,
            'trendingVacancies' => $trendingVacancies,
            // 'jobVacancies' => $jobVacancies,
        ]);
    }
}
