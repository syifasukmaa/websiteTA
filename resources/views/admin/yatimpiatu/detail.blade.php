@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Yatim Piatu';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('yatimPiatu.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Santunan Yatim
            </a>
            <a href="{{ route('yatimPiatu.edit', $yatim->id_yatim_piatu) }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
                Edit Data Anak
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
                            Santunan Sosial Anak {{ ucfirst($yatim->status) }}
                        </div>
                        <h2 class="text-2xl font-bold text-white">{{ $yatim->nama }}</h2>
                        <p class="text-emerald-100/80 text-sm mt-1">
                            Pendidikan: {{ strtoupper($yatim->pendidikan) }} &bull; Wilayah RT {{ $yatim->RTWarga->nomor_RT ?? '-' }}
                        </p>
                    </div>

                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-white/10 backdrop-blur-md text-emerald-100 border border-white/20 uppercase self-start sm:self-auto">
                        Anak {{ $yatim->status }}
                    </span>
                </div>
            </div>

            <!-- Detail Grid -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Nama Lengkap Anak</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1">{{ $yatim->nama }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Status Anak</span>
                        <p class="text-lg font-semibold text-emerald-700 mt-1 capitalize">{{ $yatim->status }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Nama Ayah (Alm/Wali)</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">{{ $yatim->nama_ayah }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Nama Ibu (Almh/Wali)</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">{{ $yatim->nama_ibu }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Jenjang Pendidikan</span>
                        <p class="text-base font-semibold text-slate-800 mt-1 uppercase">{{ $yatim->pendidikan }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-emerald-50/50 border border-emerald-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-800">Biaya Santunan Rutin</span>
                        <p class="text-xl font-bold text-emerald-700 mt-1">Rp {{ number_format($yatim->biaya, 0, ',', '.') }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Wilayah Lingkungan</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">RT {{ $yatim->RTWarga->nomor_RT ?? '-' }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Tanggal Input</span>
                        <p class="text-sm font-semibold text-slate-800 mt-1">{{ date('d F Y, H:i', strtotime($yatim->created_at)) }} WIB</p>
                    </div>

                    <div class="md:col-span-2 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Alamat Tempat Tinggal</span>
                        <p class="text-base font-medium text-slate-800 mt-1">{{ $yatim->alamat }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Petugas Input Data</span>
                        <p class="text-sm font-semibold text-slate-800 mt-1">{{ $yatim->pembuatData->name ?? 'Admin' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
