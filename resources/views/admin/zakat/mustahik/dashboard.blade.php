@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Data Mustahik Zakat';
    @endphp

    <div class="w-full px-6 py-6 mx-auto">
        <!-- Top Toolbar -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
            <!-- Navigation Tabs (Muzakki / Mustahik) -->
            <div class="inline-flex p-1 bg-slate-100 rounded-2xl border border-slate-200">
                @cannot('ketua_rt')
                    <a href="{{ route('admin.muzakki.index') }}"
                        class="px-4 py-2 text-sm font-semibold rounded-xl transition text-slate-600 hover:text-emerald-800">
                        Data Muzakki
                    </a>
                @endcannot
                <a href="{{ route('zakatMustahik.index') }}"
                    class="px-4 py-2 text-sm font-semibold rounded-xl bg-white text-emerald-800 shadow-sm transition">
                    Data Mustahik
                </a>
            </div>

            <!-- Search & Actions -->
            <div class="flex flex-wrap items-center gap-3">
                <form method="GET" action="{{ route('zakatMustahik.index') }}" class="relative">
                    <input type="search" name="search" value="{{ request('search') }}"
                        class="w-64 pl-10 pr-4 py-2 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm"
                        placeholder="Cari mustahik / RT..." autocomplete="off" />
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </form>

                <a href="{{ route('zakatMustahik.pdf') }}" target="_blank"
                    class="inline-flex items-center gap-2 px-3.5 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition shadow-sm">
                    <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>Cetak PDF</span>
                </a>

                <a href="{{ route('zakatMustahik.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Mustahik</span>
                </a>
            </div>
        </div>

        @include('admin.layouts.partials.alert')

        <!-- Table Card -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-emerald-50/40 via-white to-transparent">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Daftar Penerima Zakat (Mustahik)</h2>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Menampilkan {{ $mustahiks->firstItem() ?? 0 }} - {{ $mustahiks->lastItem() ?? 0 }} dari {{ $mustahiks->total() }} keluarga
                    </p>
                </div>

                <!-- Pagination Quick Links -->
                <div class="flex items-center gap-1.5">
                    @if ($mustahiks->onFirstPage())
                        <span class="px-3 py-1.5 text-xs font-semibold text-slate-300 bg-slate-50 rounded-lg cursor-not-allowed">Sebelumnya</span>
                    @else
                        <a href="{{ $mustahiks->previousPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Sebelumnya</a>
                    @endif

                    <span class="px-3 py-1.5 text-xs font-bold text-emerald-800 bg-emerald-50 rounded-lg">
                        {{ $mustahiks->currentPage() }} / {{ $mustahiks->lastPage() }}
                    </span>

                    @if ($mustahiks->hasMorePages())
                        <a href="{{ $mustahiks->nextPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Berikutnya</a>
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
                            <th class="px-6 py-4">Nama Keluarga</th>
                            <th class="px-6 py-4 text-center">Kelompok Asnaf</th>
                            <th class="px-6 py-4">Kepala / Suami</th>
                            <th class="px-6 py-4">Istri</th>
                            <th class="px-6 py-4 text-center">RT</th>
                            <th class="px-6 py-4 text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($mustahiks as $mustahik)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="px-6 py-4 text-center font-medium text-slate-400">
                                    {{ ($mustahiks->currentPage() - 1) * $mustahiks->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-800">{{ $mustahik->nama_keluarga }}</div>
                                    <div class="text-xs text-slate-400 truncate max-w-xs">{{ $mustahik->alamat }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold capitalize
                                        {{ $mustahik->kelompok == 'fakir miskin' ? 'bg-amber-50 text-amber-700 border border-amber-200/60' : '' }}
                                        {{ $mustahik->kelompok == 'duafa' ? 'bg-blue-50 text-blue-700 border border-blue-200/60' : '' }}
                                        {{ $mustahik->kelompok == 'fisabilillah' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' : '' }}
                                        {{ $mustahik->kelompok == 'mualaf' ? 'bg-purple-50 text-purple-700 border border-purple-200/60' : '' }}
                                        {{ $mustahik->kelompok == 'amilin' ? 'bg-slate-100 text-slate-700 border border-slate-200/60' : '' }}">
                                        {{ $mustahik->kelompok }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-medium text-slate-700">
                                    {{ $mustahik->nama_suami ?: '-' }}
                                </td>
                                <td class="px-6 py-4 font-medium text-slate-700">
                                    {{ $mustahik->nama_istri ?: '-' }}
                                </td>
                                <td class="px-6 py-4 text-center font-semibold text-slate-800">
                                    RT {{ $mustahik->RTWarga->nomor_RT ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <!-- Detail Button -->
                                        <a href="{{ route('zakatMustahik.detail', $mustahik->id_mustahik) }}"
                                            title="Lihat Detail"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-600 bg-slate-100 hover:bg-slate-200 hover:text-slate-900 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('zakatMustahik.edit', $mustahik->id_mustahik) }}"
                                            title="Edit Data"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete Button with Confirm Form -->
                                        <form action="{{ route('zakatMustahik.delete', $mustahik->id_mustahik) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data keluarga {{ $mustahik->nama_keluarga }}?');"
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
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                    </svg>
                                    <p class="font-semibold text-slate-600">Belum ada data mustahik</p>
                                    <p class="text-xs text-slate-400 mt-1">Gunakan tombol "Tambah Mustahik" untuk menambahkan penerima baru.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer Pagination -->
            @if ($mustahiks->hasPages())
                <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-xs text-slate-500">
                        Halaman <span class="font-bold text-slate-700">{{ $mustahiks->currentPage() }}</span> dari <span class="font-bold text-slate-700">{{ $mustahiks->lastPage() }}</span>
                    </p>
                    <div class="flex items-center gap-1">
                        {{ $mustahiks->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
