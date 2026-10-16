@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Qurban Sapi / Kerbau';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-6xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('pendaftarQurban.kerbau') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Qurban Sapi
            </a>
            <a href="{{ route('pendaftarQurban.kerbau.edit', $qurban->id_pengqurban_sapi) }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
                Edit Kelompok Ini
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
                            Ringkasan Kelompok Patungan
                        </div>
                        <h2 class="text-2xl font-bold text-white">Kelompok Qurban {{ ucfirst($qurban->jenis_hewan) }} (Antrian #{{ $qurban->nomor_antrian ?? '-' }})</h2>
                        <p class="text-emerald-100/80 text-sm mt-1">
                            1 Ekor {{ ucfirst($qurban->jenis_hewan) }} &bull; Didaftarkan {{ date('d M Y', strtotime($qurban->created_at)) }}
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

            <div class="p-8">
                <!-- 7 Shohibul Qurban Members -->
                <div class="mb-8">
                    <h3 class="text-base font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Daftar 7 Jiwa Shohibul Qurban
                    </h3>

                    @php
                        $slots = [
                            ['num' => 1, 'nama' => $qurban->nama_satu, 'pahala' => $qurban->pahala_satu],
                            ['num' => 2, 'nama' => $qurban->nama_dua, 'pahala' => $qurban->pahala_dua],
                            ['num' => 3, 'nama' => $qurban->nama_tiga, 'pahala' => $qurban->pahala_tiga],
                            ['num' => 4, 'nama' => $qurban->nama_empat, 'pahala' => $qurban->pahala_empat],
                            ['num' => 5, 'nama' => $qurban->nama_lima, 'pahala' => $qurban->pahala_lima],
                            ['num' => 6, 'nama' => $qurban->nama_enam, 'pahala' => $qurban->pahala_enam],
                            ['num' => 7, 'nama' => $qurban->nama_tujuh, 'pahala' => $qurban->pahala_tujuh],
                        ];
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        @foreach ($slots as $slot)
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-emerald-700 text-white text-xs font-bold flex items-center justify-center shrink-0 mt-0.5">
                                    {{ $slot['num'] }}
                                </span>
                                <div class="min-w-0">
                                    <p class="text-sm font-bold text-slate-800 truncate">{{ $slot['nama'] ?? '-' }}</p>
                                    <p class="text-xs text-slate-500 mt-0.5">Tujuan: <span class="text-slate-700 font-medium">{{ $slot['pahala'] ?? '-' }}</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Admin Details -->
                <div class="border-t border-slate-100 pt-6">
                    <h3 class="text-base font-bold text-slate-800 mb-4">Rincian Finansial & Administrasi</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="p-4 rounded-2xl bg-emerald-50/50 border border-emerald-100">
                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-800">Total Biaya Kelompok</span>
                            <p class="text-xl font-bold text-emerald-700 mt-1">Rp {{ number_format($qurban->biaya, 0, ',', '.') }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Hak Pengqurban</span>
                            <p class="text-sm font-semibold text-slate-800 mt-1">{{ $qurban->hak_pengqurban ?? '-' }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Wilayah RT</span>
                            <p class="text-sm font-semibold text-slate-800 mt-1">RT {{ $qurban->RTWarga->nomor_RT ?? '-' }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Petugas Input</span>
                            <p class="text-sm font-semibold text-slate-800 mt-1">{{ $qurban->pembuatData->name ?? 'Admin' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
