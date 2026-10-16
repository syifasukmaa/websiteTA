@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Data Santunan Anak Yatim & Piatu';
    @endphp

    <div class="w-full px-6 py-6 mx-auto">
        <!-- Top Toolbar -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-xl font-bold text-slate-800">Santunan Anak Yatim & Piatu</h1>
                <p class="text-xs text-slate-500 mt-0.5">Pendataan dan penyaluran santunan pendidikan & kebutuhan anak asuh masjid</p>
            </div>

            <!-- Search & Actions -->
            <div class="flex flex-wrap items-center gap-3">
                <form method="GET" action="{{ route('yatimPiatu.index') }}" class="relative">
                    <input type="search" name="search" value="{{ request('search') }}"
                        class="w-64 pl-10 pr-4 py-2 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm"
                        placeholder="Cari nama / RT..." autocomplete="off" />
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </form>

                <a href="{{ route('yatimPiatu.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Data Anak</span>
                </a>
            </div>
        </div>

        @include('admin.layouts.partials.alert')

        <!-- Metric Highlight Bar -->
        <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="p-4 rounded-2xl bg-white border border-slate-100 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Dana Santunan</span>
                    <p class="text-xl font-bold text-emerald-700 mt-1">Rp {{ number_format($totalAssistanceAmount, 0, ',', '.') }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-white border border-slate-100 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Jumlah Anak Binaan</span>
                    <p class="text-xl font-bold text-slate-800 mt-1">{{ $yatims->total() }} Anak</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-white border border-slate-100 shadow-sm flex items-center justify-between sm:col-span-2 lg:col-span-1">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Halaman Data</span>
                    <p class="text-xl font-bold text-slate-800 mt-1">{{ $yatims->currentPage() }} <span class="text-sm font-normal text-slate-400">dari {{ $yatims->lastPage() }}</span></p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-emerald-50/40 via-white to-transparent">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Daftar Anak Yatim & Piatu</h2>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Menampilkan {{ $yatims->firstItem() ?? 0 }} - {{ $yatims->lastItem() ?? 0 }} dari {{ $yatims->total() }} anak
                    </p>
                </div>

                <!-- Pagination Quick Links -->
                <div class="flex items-center gap-1.5">
                    @if ($yatims->onFirstPage())
                        <span class="px-3 py-1.5 text-xs font-semibold text-slate-300 bg-slate-50 rounded-lg cursor-not-allowed">Sebelumnya</span>
                    @else
                        <a href="{{ $yatims->previousPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Sebelumnya</a>
                    @endif

                    <span class="px-3 py-1.5 text-xs font-bold text-emerald-800 bg-emerald-50 rounded-lg">
                        {{ $yatims->currentPage() }} / {{ $yatims->lastPage() }}
                    </span>

                    @if ($yatims->hasMorePages())
                        <a href="{{ $yatims->nextPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Berikutnya</a>
                    @else
                        <span class="px-3 py-1.5 text-xs font-semibold text-slate-300 bg-slate-50 rounded-lg cursor-not-allowed">Berikutnya</span>
                    @endif
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50/80 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4 text-center w-12">No</th>
                            <th class="px-6 py-4">Nama Anak</th>
                            <th class="px-6 py-4">Orang Tua (Ayah / Ibu)</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-center">Pendidikan</th>
                            <th class="px-6 py-4">Santunan Bulanan</th>
                            <th class="px-6 py-4 text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($yatims as $yatim)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="px-6 py-4 text-center font-medium text-slate-400">
                                    {{ ($yatims->currentPage() - 1) * $yatims->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-800">{{ $yatim->nama }}</div>
                                    <div class="text-xs text-slate-400 truncate max-w-xs">RT {{ $yatim->RTWarga->nomor_RT ?? '-' }} &bull; {{ $yatim->alamat }}</div>
                                </td>
                                <td class="px-6 py-4 text-xs text-slate-600">
                                    <div>Ayah: <span class="font-semibold text-slate-700">{{ $yatim->nama_ayah ?: '-' }}</span></div>
                                    <div>Ibu: <span class="font-semibold text-slate-700">{{ $yatim->nama_ibu ?: '-' }}</span></div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold capitalize
                                        {{ $yatim->status == 'yatim' ? 'bg-amber-50 text-amber-700 border border-amber-200/60' : 'bg-blue-50 text-blue-700 border border-blue-200/60' }}">
                                        {{ $yatim->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-slate-700 uppercase">
                                    {{ $yatim->pendidikan }}
                                </td>
                                <td class="px-6 py-4 font-bold text-emerald-700">
                                    Rp {{ number_format($yatim->biaya, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <!-- Detail Button -->
                                        <a href="{{ route('yatimPiatu.detail', $yatim->id_yatim_piatu) }}"
                                            title="Lihat Detail"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-600 bg-slate-100 hover:bg-slate-200 hover:text-slate-900 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('yatimPiatu.edit', $yatim->id_yatim_piatu) }}"
                                            title="Edit Data"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('yatimPiatu.delete', $yatim->id_yatim_piatu) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data anak {{ $yatim->nama }}?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Data"
                                                class="w-8 h-8 rounded-lg flex items-center justify-center text-rose-600 bg-rose-50 hover:bg-rose-100 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                    </svg>
                                    <p class="font-semibold text-slate-600">Belum ada data anak yatim / piatu</p>
                                    <p class="text-xs text-slate-400 mt-1">Gunakan tombol "Tambah Data Anak" untuk menambahkan penerima santunan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer Pagination -->
            @if ($yatims->hasPages())
                <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-xs text-slate-500">
                        Halaman <span class="font-bold text-slate-700">{{ $yatims->currentPage() }}</span> dari <span class="font-bold text-slate-700">{{ $yatims->lastPage() }}</span>
                    </p>
                    <div class="flex items-center gap-1">
                        {{ $yatims->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
