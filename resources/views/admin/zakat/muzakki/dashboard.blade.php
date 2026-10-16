@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Data Muzakki Zakat';
    @endphp

    @can('admin')
        <div class="w-full px-6 py-6 mx-auto">
            <!-- Top Toolbar -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
                <!-- Navigation Tabs (Muzakki / Mustahik) -->
                <div class="inline-flex p-1 bg-slate-100 rounded-2xl border border-slate-200">
                    <a href="{{ route('admin.muzakki.index') }}"
                        class="px-4 py-2 text-sm font-semibold rounded-xl bg-white text-emerald-800 shadow-sm transition">
                        Data Muzakki
                    </a>
                    <a href="{{ route('zakatMustahik.index') }}"
                        class="px-4 py-2 text-sm font-semibold rounded-xl transition text-slate-600 hover:text-emerald-800">
                        Data Mustahik
                    </a>
                </div>

                <!-- Search & Actions -->
                <div class="flex flex-wrap items-center gap-3">
                    <form method="GET" action="{{ route('admin.muzakki.index') }}" class="relative">
                        <input type="search" name="search" value="{{ request('search') }}"
                            class="w-64 pl-10 pr-4 py-2 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm"
                            placeholder="Cari muzakki / RT..." autocomplete="off" />
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </form>

                    <a href="{{ route('admin.muzakki.create') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Daftar Zakat Baru</span>
                    </a>
                </div>
            </div>

            @include('admin.layouts.partials.alert')

            <!-- Table Card -->
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-emerald-50/40 via-white to-transparent">
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">Daftar Pembayar Zakat (Muzakki)</h2>
                        <p class="text-xs text-slate-500 mt-0.5">
                            Menampilkan {{ $muzakkis->firstItem() ?? 0 }} - {{ $muzakkis->lastItem() ?? 0 }} dari {{ $muzakkis->total() }} penyerahan zakat
                        </p>
                    </div>

                    <!-- Pagination Quick Links -->
                    <div class="flex items-center gap-1.5">
                        @if ($muzakkis->onFirstPage())
                            <span class="px-3 py-1.5 text-xs font-semibold text-slate-300 bg-slate-50 rounded-lg cursor-not-allowed">Sebelumnya</span>
                        @else
                            <a href="{{ $muzakkis->previousPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Sebelumnya</a>
                        @endif

                        <span class="px-3 py-1.5 text-xs font-bold text-emerald-800 bg-emerald-50 rounded-lg">
                            {{ $muzakkis->currentPage() }} / {{ $muzakkis->lastPage() }}
                        </span>

                        @if ($muzakkis->hasMorePages())
                            <a href="{{ $muzakkis->nextPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Berikutnya</a>
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
                                <th class="px-6 py-4">Nama Muzakki</th>
                                <th class="px-6 py-4 text-center">Jiwa</th>
                                <th class="px-6 py-4">Zakat Uang</th>
                                <th class="px-6 py-4">Zakat Beras</th>
                                <th class="px-6 py-4">Infaq</th>
                                <th class="px-6 py-4 text-center">RT</th>
                                <th class="px-6 py-4 text-center w-36">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($muzakkis as $muzakki)
                                <tr class="hover:bg-slate-50/70 transition">
                                    <td class="px-6 py-4 text-center font-medium text-slate-400">
                                        {{ ($muzakkis->currentPage() - 1) * $muzakkis->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-slate-800">{{ $muzakki->nama_muzakki }}</div>
                                        <div class="text-xs text-slate-400 truncate max-w-xs">{{ $muzakki->alamat }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200/60">
                                            {{ $muzakki->jumlah_jiwa }} Jiwa
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-slate-800">
                                        {{ $muzakki->uang ? 'Rp ' . number_format($muzakki->uang, 0, ',', '.') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-amber-700">
                                        {{ $muzakki->beras && floatval($muzakki->beras) > 0 ? floatval($muzakki->beras) . ' L' : '-' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-slate-700">
                                        {{ $muzakki->infaq ? 'Rp ' . number_format($muzakki->infaq, 0, ',', '.') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center font-semibold text-slate-800">
                                        RT {{ $muzakki->RTWarga->nomor_RT ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-1.5">
                                            <!-- Detail Button -->
                                            <a href="{{ route('admin.muzakki.detail', $muzakki->id_muzakki) }}"
                                                title="Lihat Detail"
                                                class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-600 bg-slate-100 hover:bg-slate-200 hover:text-slate-900 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.muzakki.edit', $muzakki->id_muzakki) }}"
                                                title="Edit Data"
                                                class="w-8 h-8 rounded-lg flex items-center justify-center text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.muzakki.delete', $muzakki->id_muzakki) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data muzakki {{ $muzakki->nama_muzakki }}?');"
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
                                    <td colspan="8" class="px-6 py-12 text-center text-slate-400">
                                        <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <p class="font-semibold text-slate-600">Belum ada data muzakki</p>
                                        <p class="text-xs text-slate-400 mt-1">Gunakan tombol "Daftar Zakat Baru" untuk mencatat pembayaran zakat.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer Pagination -->
                @if ($muzakkis->hasPages())
                    <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between">
                        <p class="text-xs text-slate-500">
                            Halaman <span class="font-bold text-slate-700">{{ $muzakkis->currentPage() }}</span> dari <span class="font-bold text-slate-700">{{ $muzakkis->lastPage() }}</span>
                        </p>
                        <div class="flex items-center gap-1">
                            {{ $muzakkis->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endcan
@endsection
