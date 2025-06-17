<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobVacancy;

class LowonganController extends Controller
{
    public function index() {
        $jobVacancies = JobVacancy::latest()->get();
        return view('lowongan.lowongan', compact('jobVacancies'));
    }
}
