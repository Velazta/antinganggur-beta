@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@push('styles')
    <style>
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), 0 6px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

@section('content')
    {{-- Grid untuk konten utama --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-6 py-10 mx-auto"> <!-- Center content with px-6 and mx-auto -->

        {{-- Kolom Kiri dan Tengah (Statistik Cards) --}}
        <div class="lg:col-span-2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Card 1 --}}
                <div class="stat-card bg-[#1A73E8] p-6 rounded-2xl text-white shadow-lg flex items-center gap-10 transition-all duration-300 ease-in-out">
                    <div class="bg-white/20 p-4 rounded-xl">
                        <img src="{{ asset('asset/admin/People.png') }}" alt="Icon" class="w-16 h-16 object-contain">
                    </div>
                    <div>
                        <p class="text-lg font-light text-white/90">Jumlah User</p>
                        <p class="text-[80px] font-extrabold tracking-tight mt-0.1">
                            {{ number_format($jumlahPendaftar, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="stat-card bg-[#1A73E8] p-6 rounded-2xl text-white shadow-lg flex items-center gap-10 transition-all duration-300 ease-in-out">
                    <div class="bg-white/20 p-4 rounded-xl">
                        <img src="{{ asset('asset/admin/Briefcasehuge.png') }}" alt="Icon" class="w-16 h-16 object-contain">
                    </div>
                    <div>
                        <p class="text-lg font-light text-white">Jumlah Lowongan Aktif</p>
                        <p class="text-[80px] font-extrabold tracking-tight text-white mt-1">{{ $jumlahLowonganAktif }}</p>
                    </div>
                </div>

            </div>

            {{-- Aktifitas Terbaru Table --}}
            <div class="mt-8 bg-[#1A73E8] p-6 rounded-2xl shadow-lg border border-gray-200">
                <div class="flex items-center gap-4 mb-5">
                    <div class="p-2 rounded-lg">
                        <img src="{{ asset('asset/admin/People.png') }}" alt="Icon" class="w-8 h-8 object-contain">
                    </div>
                    <h3 class="text-xl font-light text-white">Aktifitas Terbaru</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-white">
                        <thead class="text-xs text-white uppercase bg-transparent border-b border-white">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-white">ID</th>
                                <th scope="col" class="py-3 px-6 text-white">Nama Pelamar</th>
                                <th scope="col" class="py-3 px-6 text-white">Posisi Lamaran</th>
                                <th scope="col" class="py-3 px-6 text-white">Tanggal</th>
                                <th scope="col" class="py-3 px-6 text-white text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($aktifitasTerbaru as $aktifitas)
                                <tr class="bg-transparent border-b border-white hover:bg-blue-700 hover:text-white">
                                    <td class="py-4 px-6 font-medium text-white border-b border-white">
                                        {{ $aktifitas['id'] }}</td>
                                    <td class="py-4 px-6 border-b border-white">{{ $aktifitas['nama'] }}</td>
                                    <td class="py-4 px-6 border-b border-white">{{ $aktifitas['posisi'] }}</td>
                                    <td class="py-4 px-6 border-b border-white">
                                        {{ \Carbon\Carbon::parse($aktifitas['tanggal'])->format('d M Y') }}</td>
                                    <td class="py-4 px-6 text-center border-b border-white">
                                        <a href="#" class="btn-lihat font-medium text-[#1A73E8] bg-white py-2 px-4 rounded-full hover:bg-gray-200 transition duration-300 ease-in-out">Lihat</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-6 text-white">
                                        Belum ada aktifitas terbaru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


