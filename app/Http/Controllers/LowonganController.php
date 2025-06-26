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

        //set trending Section 2
        $trendingIds = [1, 2, 3]; // ID Job Vacancy yang mau diinput
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

    public function show(JobVacancy $vacancy)
    {
        $vacancy->load('jobBenefits');

        return view('lowongan.detaillowongan', compact('vacancy'));
    }

    public function showHomePage() {
        $trendingJobs = JobVacancy::latest()->take(3)->get();

        // Kirim data 'trendingJobs' ke view 'home'
        return view('home', [
            'trendingJobs' => $trendingJobs
        ]);
    }


}
