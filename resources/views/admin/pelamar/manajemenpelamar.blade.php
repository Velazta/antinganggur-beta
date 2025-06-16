@extends('admin.layouts.app')

@section('title', 'Manajemen Lamaran')
@section('page-title', 'Pelamar')

@push('style')
<style>
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), 0 6px 6px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

{{-- Konten Utama Halaman --}}
@section('content')
    <div class="bg-white p-6 rounded-xl shadow">
        <p>Konten khusus halaman Pelamar ada di sini.</p>
    </div>
@endsection


