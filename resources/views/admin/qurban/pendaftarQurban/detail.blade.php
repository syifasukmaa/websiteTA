@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Pendaftar Qurban';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('pendaftarQurban.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Qurban
            </a>
            <div class="flex items-center gap-2">
                <a href="{{ route('pendaftarQurban.edit', $qurban->id_pendaftar_qurban) }}"
                    class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                    Edit Data Ini
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Header Accent -->
            <div class="relative bg-gradient-to-r from-emerald-800 to-teal-800 px-8 py-6 text-white overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/5 blur-xl pointer-events-none"></div>
                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            Ringkasan Pendaftar
                        </div>
                        <h2 class="text-2xl font-bold text-white">{{ $qurban->nama }}</h2>
                        <p class="text-emerald-100/80 text-sm mt-1">
                            Shohibul Qurban {{ ucfirst($qurban->jenis_hewan) }} (Antrian #{{ $qurban->nomor_antrian ?? '-' }})
                        </p>
                    </div>

                    <div class="flex items-center gap-2">
                        @if (strtolower($qurban->status_pembayaran) === 'lunas')
                            <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-100 border border-emerald-400/30 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> LUNAS
                            </span>
                        @else
                            <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-amber-500/20 text-amber-200 border border-amber-400/30 flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-amber-400"></span> BELUM BAYAR
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Detail Grid -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Nama Shohibul Qurban</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1">{{ $qurban->nama }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Tujuan Pahala</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1">{{ $qurban->tujuan_pahala ?? '-' }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Jenis Hewan</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1 capitalize">{{ $qurban->jenis_hewan }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Hak Daging Pengqurban</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1">{{ $qurban->hak_pengqurban ?? '-' }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Biaya Pembayaran</span>
                        <p class="text-xl font-bold text-emerald-700 mt-1">Rp {{ number_format($qurban->biaya, 0, ',', '.') }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Wilayah Asal</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1">
                            RT {{ $qurban->RTWarga->nomor_RT ?? '-' }} / RW {{ $qurban->RW ?? '-' }}
                        </p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Tanggal Didaftarkan</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">{{ date('d F Y, H:i', strtotime($qurban->created_at)) }} WIB</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Petugas Pencatat</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">{{ $qurban->pembuatData->name ?? 'Admin' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
