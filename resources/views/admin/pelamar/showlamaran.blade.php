@extends('admin.layouts.app')

@section('title', 'Detail Form Lamaran')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Detail Form Lamaran</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('manajemen.pelamar.index') }}">Manajemen Pelamar</a>
                        </li>
                        <li class="breadcrumb-item active">Detail Form Lamaran</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Informasi Pelamar dan Lamaran</h4>
                        <p class="text-muted m-b-30">Berikut adalah detail data yang dikirimkan oleh pelamar.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="applicant_name" class="form-label">Nama Pelamar</label>
                                    <input type="text" class="form-control" id="applicant_name"
                                        value="{{ $application->user->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="applicant_email" class="form-label">Email Pelamar</label>
                                    <input type="text" class="form-control" id="applicant_email"
                                        value="{{ $application->user->email }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="job_title" class="form-label">Posisi yang Dilamar</label>
                                    <input type="text" class="form-control" id="job_title"
                                        value="{{ $application->jobVacancy->title }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Perusahaan</label>
                                    <input type="text" class="form-control" id="company_name"
                                        value="{{ $application->jobVacancy->company_name }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="application_date" class="form-label">Tanggal Melamar</label>
                                    <input type="text" class="form-control" id="application_date"
                                        value="{{ $application->created_at->format('d F Y, H:i') }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="application_status" class="form-label">Status Lamaran</label>
                                    <input type="text" class="form-control" id="application_status"
                                        value="{{ ucfirst($application->status) }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="resume" class="form-label">Resume/CV Pelamar</label>
                            <br>
                            @if ($application->resume_path)
                                <a href="{{ asset('storage/' . $application->resume_path) }}" class="btn btn-primary"
                                    target="_blank"><i class="bi bi-download me-2"></i> Unduh CV</a>
                            @else
                                <span class="badge bg-warning">CV tidak dilampirkan</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="cover_letter" class="form-label">Surat Lamaran (Cover Letter)</label>
                            <textarea class="form-control" id="cover_letter" rows="8" readonly>{{ $application->cover_letter }}</textarea>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('manajemen.pelamar.index') }}" class="btn btn-secondary"><i
                                    class="bi bi-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
