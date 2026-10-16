@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Data Santunan Kaum Duafa';
    @endphp

    <div class="w-full px-6 py-6 mx-auto">
        <!-- Top Toolbar -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-xl font-bold text-slate-800">Santunan Sosial Kaum Duafa</h1>
                <p class="text-xs text-slate-500 mt-0.5">Pengelolaan alokasi dan status penyaluran santunan bagi janda / duda dhuafa</p>
            </div>

            <!-- Search & Actions -->
            <div class="flex flex-wrap items-center gap-3">
                <form method="GET" action="{{ route('duafa.index') }}" class="relative">
                    <input type="search" name="search" value="{{ request('search') }}"
                        class="w-64 pl-10 pr-4 py-2 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm"
                        placeholder="Cari nama / RT..." autocomplete="off" />
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </form>

                <a href="{{ route('duafa.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Data Duafa</span>
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
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Jumlah Penerima</span>
                    <p class="text-xl font-bold text-slate-800 mt-1">{{ $duafas->total() }} Orang</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-white border border-slate-100 shadow-sm flex items-center justify-between sm:col-span-2 lg:col-span-1">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Halaman Saat Ini</span>
                    <p class="text-xl font-bold text-slate-800 mt-1">{{ $duafas->currentPage() }} <span class="text-sm font-normal text-slate-400">dari {{ $duafas->lastPage() }}</span></p>
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
                    <h2 class="text-lg font-bold text-slate-800">Daftar Penerima Santunan</h2>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Menampilkan {{ $duafas->firstItem() ?? 0 }} - {{ $duafas->lastItem() ?? 0 }} dari {{ $duafas->total() }} warga
                    </p>
                </div>

                <!-- Pagination Quick Links -->
                <div class="flex items-center gap-1.5">
                    @if ($duafas->onFirstPage())
                        <span class="px-3 py-1.5 text-xs font-semibold text-slate-300 bg-slate-50 rounded-lg cursor-not-allowed">Sebelumnya</span>
                    @else
                        <a href="{{ $duafas->previousPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Sebelumnya</a>
                    @endif

                    <span class="px-3 py-1.5 text-xs font-bold text-emerald-800 bg-emerald-50 rounded-lg">
                        {{ $duafas->currentPage() }} / {{ $duafas->lastPage() }}
                    </span>

                    @if ($duafas->hasMorePages())
                        <a href="{{ $duafas->nextPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Berikutnya</a>
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
                            <th class="px-6 py-4">Nama Penerima</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4">Nominal Santunan</th>
                            <th class="px-6 py-4 text-center">Status Penyaluran</th>
                            <th class="px-6 py-4 text-center">RT / RW</th>
                            <th class="px-6 py-4 text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($duafas as $duafa)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="px-6 py-4 text-center font-medium text-slate-400">
                                    {{ ($duafas->currentPage() - 1) * $duafas->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-800">{{ $duafa->nama }}</div>
                                    <div class="text-xs text-slate-400 truncate max-w-xs">{{ $duafa->keterangan }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                        {{ $duafa->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-bold text-emerald-700">
                                    Rp {{ number_format($duafa->jumlah_uang, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if ($duafa->penerimaan === 'selesai')
                                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/60 inline-flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Selesai
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200/60 inline-flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Belum
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center font-medium text-slate-800">
                                    RT {{ $duafa->RTWarga->nomor_RT ?? '-' }} / RW {{ $duafa->RW ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <!-- Detail Button -->
                                        <a href="{{ route('duafa.detail', $duafa->id_duafa) }}"
                                            title="Lihat Detail"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-600 bg-slate-100 hover:bg-slate-200 hover:text-slate-900 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('duafa.edit', $duafa->id_duafa) }}"
                                            title="Edit Data"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('duafa.delete', $duafa->id_duafa) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data penerima {{ $duafa->nama }}?');"
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
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                    </svg>
                                    <p class="font-semibold text-slate-600">Belum ada data kaum duafa</p>
                                    <p class="text-xs text-slate-400 mt-1">Gunakan tombol "Tambah Data Duafa" untuk mendata penerima santunan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer Pagination -->
            @if ($duafas->hasPages())
                <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-xs text-slate-500">
                        Halaman <span class="font-bold text-slate-700">{{ $duafas->currentPage() }}</span> dari <span class="font-bold text-slate-700">{{ $duafas->lastPage() }}</span>
                    </p>
                    <div class="flex items-center gap-1">
                        {{ $duafas->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
