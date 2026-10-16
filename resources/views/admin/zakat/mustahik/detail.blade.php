@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Mustahik';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('zakatMustahik.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Mustahik
            </a>
            <a href="{{ route('zakatMustahik.edit', $mustahik->id_mustahik) }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
                Edit Mustahik
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Header Accent -->
            <div class="relative bg-gradient-to-r from-emerald-800 to-teal-800 px-8 py-6 text-white overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/5 blur-xl pointer-events-none"></div>
                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            Asnaf {{ ucfirst($mustahik->kelompok) }}
                        </div>
                        <h2 class="text-2xl font-bold text-white">{{ $mustahik->nama_keluarga }}</h2>
                        <p class="text-emerald-100/80 text-sm mt-1">
                            Wilayah RT {{ $mustahik->RTWarga->nomor_RT ?? '-' }} &bull; Didaftarkan {{ date('d M Y', strtotime($mustahik->created_at)) }}
                        </p>
                    </div>

                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-white/10 backdrop-blur-md text-emerald-100 border border-white/20 capitalize self-start sm:self-auto">
                        {{ $mustahik->kelompok }}
                    </span>
                </div>
            </div>

            <!-- Detail Grid -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Kepala Keluarga / Nama Keluarga</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1">{{ $mustahik->nama_keluarga }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Kelompok Asnaf</span>
                        <p class="text-lg font-semibold text-emerald-700 mt-1 capitalize">{{ $mustahik->kelompok }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Nama Suami</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">{{ $mustahik->nama_suami ?: '-' }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Nama Istri</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">{{ $mustahik->nama_istri ?: '-' }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Wilayah RT</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">RT {{ $mustahik->RTWarga->nomor_RT ?? '-' }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Kontak / No. HP</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">{{ $mustahik->nomor_hp ?: '-' }}</p>
                    </div>

                    <div class="md:col-span-2 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Alamat Domisili Lengkap</span>
                        <p class="text-base font-medium text-slate-800 mt-1">{{ $mustahik->alamat }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Tanggal Input</span>
                        <p class="text-sm font-semibold text-slate-800 mt-1">{{ date('d F Y, H:i', strtotime($mustahik->created_at)) }} WIB</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Petugas Input Data</span>
                        <p class="text-sm font-semibold text-slate-800 mt-1">{{ $mustahik->pembuatData->name ?? 'Admin' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
