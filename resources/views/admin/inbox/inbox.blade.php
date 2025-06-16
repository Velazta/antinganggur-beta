@extends('admin.layouts.app')

@section('title', 'Kotak Masuk')
@section('page-title', 'Kotak Masuk')

@section('content')
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200">
        <div class="overflow-x-auto">
            <table class="w-full table-fixed border-separate border-spacing-y-3 text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase">
                    <tr>
                        <th class="py-3 px-6 w-16 font-semibold">
                            <a href="{{ route('admin.inbox', array_merge(request()->except('sort', 'direction'), ['sort' => 'id', 'direction' => $sortBy == 'id' && $direction == 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center gap-2">
                                <span>Id</span>
                                @if ($sortBy == 'id')
                                    @if ($direction == 'asc')
                                        <img src="{{ asset('asset/admin/ArrowUp.png') }}" alt="Ascending" class="w-2 h-2">
                                    @else
                                        <img src="{{ asset('asset/admin/ArrowDown.png') }}" alt="Descending"
                                            class="w-2 h-2">
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="py-3 px-6 w-48 font-semibold">Nama</th>
                        <th class="py-3 px-6 w-64 font-semibold">Email</th>
                        <th class="py-3 px-6 font-semibold">Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr
                            class="bg-white shadow-sm cursor-pointer transition-all duration-300 group hover:shadow-lg hover:bg-blue-500 hover:border-cyan-400 hover:border-2 border border-gray-200">
                            <td
                                class="py-4 px-6 font-medium rounded-l-xl transition-colors duration-300 group-hover:text-white align-middle">
                                {{ $message->id }}
                            </td>
                            <td class="py-4 px-6 transition-colors duration-300 group-hover:text-white align-middle">
                                {{ $message->nama }}
                            </td>
                            <td class="py-4 px-6 transition-colors duration-300 group-hover:text-white align-middle">
                                {{ $message->email }}
                            </td>

                            <td
                                class="py-4 px-6 rounded-r-xl transition-colors duration-300 group-hover:text-white align-top
                                       break-words whitespace-normal text-justify">
                                {!! nl2br(e($message->message)) !!}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-10 text-gray-500">
                                Tidak ada pesan yang masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $messages->appends(request()->query())->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
@endsection
