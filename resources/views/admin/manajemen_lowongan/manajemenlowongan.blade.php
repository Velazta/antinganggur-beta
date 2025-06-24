@extends('admin.layouts.app')

@section('title', 'Manajemen Lowongan')
@section('page-title', 'Lowongan')

@push('styles')
    <style>
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), 0 6px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush

{{-- Konten Utama Halaman --}}
@section('content')
    <div class="container mx-auto px-6 py-8">
        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="bg-[#4394FF] text-white p-4 mb-6 rounded-md" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="flex justify-end items-center mb-8">
            <a href="{{ route('admin.manajemen.lowongan.create') }}"
                class="inline-flex items-center px-4 py-2 bg-[#1A73E8] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Lowongan Baru
            </a>
        </div>

        {{-- Grid untuk menampilkan card lowongan --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($jobVacancies as $vacancy)
                <div class="bg-[#1A73E8] rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 flex flex-col transform hover:translate-y-(-2px) stat-card">
                    {{-- Logo Perusahaan --}}
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mr-4">
                            @if ($vacancy->job_logo)
                                <img src="{{ asset('storage/' . $vacancy->job_logo) }}" alt="Logo Perusahaan"
                                    class="w-[30px] h-[30px] object-contain rounded-lg">

                            @endif
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-center w-full">
                                <h3 class="text-lg font-semibold text-white">{{ $vacancy->title }}</h3>
                                <div
                                    class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#1A73E8] text-sm font-bold ml-2">
                                    {{ $vacancy->id }}
                                </div>
                            </div>
                            <p class="text-sm text-white">{{ $vacancy->company_name }}</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-white text-blue-700">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $vacancy->location }}
                        </span>
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-white text-blue-700">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $vacancy->type_job }}
                        </span>
                        @if ($vacancy->min_salary && $vacancy->max_salary)
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-white text-blue-700">
                                Rp {{ number_format($vacancy->min_salary, 0, ',', '.') }} -
                                {{ number_format($vacancy->max_salary, 0, ',', '.') }} jt/bulan
                            </span>
                        @endif
                    </div>


                    <div class="flex gap-2 mt-auto">
                        {{-- Tombol Edit --}}
                        <a href="{{ route('admin.manajemen.lowongan.edit', $vacancy) }}"
                            class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-yellow-500 hover:bg-yellow-600 transition-colors duration-150 text-center">
                            Edit
                        </a>

                        <a href="{{ route('admin.manajemen.lowongan.show', $vacancy) }}"
                            class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-green-500 hover:bg-green-600 transition-colors duration-150 text-center">
                        Lihat
                    </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.manajemen.lowongan.destroy', $vacancy) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex-1 px-4 py-2 text-sm font-semibold rounded-lg text-white bg-red-500 hover:bg-red-600 transition-colors duration-150 text-center">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="lg:col-span-4 text-center py-10 border-2 border-dashed rounded-xl text-gray-500">
                    Belum ada lowongan pekerjaan yang ditambahkan.
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $jobVacancies->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>

    <div id="jobDetailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg p-8 max-w-lg w-full relative">
            <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-900" onclick="closeModal()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <h3 class="text-2xl font-bold mb-4" id="modalJobTitle"></h3>
            <p class="text-gray-600 mb-2" id="modalCompanyName"></p>
            <p class="text-gray-600 mb-2" id="modalJobLocation"></p>
            <p class="text-gray-600 mb-2" id="modalJobType"></p>
            <p class="text-gray-600 mb-4" id="modalJobSalary"></p>
            <p class="text-gray-800" id="modalJobDescription"></p>
            <div class="mt-4" id="modalJobLogoContainer">
                <img id="modalJobLogo" src="" alt="Logo Perusahaan" class="max-w-[100px] h-auto hidden">
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        // Fungsi untuk menampilkan modal detail lowongan
        async function showJobDetail(jobId) {
            try {
                const response = await fetch(`/admin/manajemen-lowongan/${jobId}`);
                if (!response.ok) {
                    throw new Error('Gagal mengambil data lowongan.');
                }
                const jobData = await response.json();

                document.getElementById('modalJobTitle').textContent = jobData.title;
                document.getElementById('modalCompanyName').textContent = jobData.company_name;
                document.getElementById('modalJobLocation').textContent = 'Lokasi: ' + jobData.location;
                document.getElementById('modalJobType').textContent = 'Tipe: ' + jobData.type_job;
                if (jobData.min_salary && jobData.max_salary) {
                    document.getElementById('modalJobSalary').textContent = 'Gaji: Rp ' + new Intl.NumberFormat('id-ID')
                        .format(jobData.min_salary) + ' - Rp ' + new Intl.NumberFormat('id-ID').format(jobData
                            .max_salary) + '/bulan';
                } else {
                    document.getElementById('modalJobSalary').textContent = 'Gaji: Negosiasi';
                }
                document.getElementById('modalJobDescription').textContent = jobData.description;

                const modalJobLogo = document.getElementById('modalJobLogo');
                const modalJobLogoContainer = document.getElementById('modalJobLogoContainer');
                if (jobData.job_logo) {
                    modalJobLogo.src = '{{ asset('storage') }}/' + jobData.job_logo;
                    modalJobLogo.classList.remove('hidden');
                } else {
                    modalJobLogo.classList.add('hidden');
                    modalJobLogo.src = ''; // Clear previous src
                }


                document.getElementById('jobDetailModal').classList.remove('hidden');
                document.getElementById('jobDetailModal').classList.add('flex');
            } catch (error) {
                console.error("Error fetching job detail:", error);
                alert("Gagal memuat detail lowongan.");
            }
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('jobDetailModal').classList.add('hidden');
            document.getElementById('jobDetailModal').classList.remove('flex');
        }

        // Optional: Close modal when clicking outside of it
        document.getElementById('jobDetailModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });
    </script>
@endpush
