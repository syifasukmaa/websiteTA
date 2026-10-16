@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Muzakki';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('admin.muzakki.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Muzakki
            </a>
            <a href="{{ route('admin.muzakki.edit', $zakat->id_muzakki) }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
                Edit Muzakki
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
                            Zakat Fitrah & Infaq
                        </div>
                        <h2 class="text-2xl font-bold text-white">{{ $zakat->nama_muzakki }}</h2>
                        <p class="text-emerald-100/80 text-sm mt-1">
                            Wilayah RT {{ $zakat->RTWarga->nomor_RT ?? '-' }} &bull; Ditunaikan {{ date('d M Y, H:i', strtotime($zakat->created_at)) }} WIB
                        </p>
                    </div>

                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-white/10 backdrop-blur-md text-emerald-100 border border-white/20 self-start sm:self-auto">
                        {{ $zakat->jumlah_jiwa }} Jiwa
                    </span>
                </div>
            </div>

            <!-- Detail Grid -->
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Nama Muzakki</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1">{{ $zakat->nama_muzakki }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Jumlah Tanggungan Jiwa</span>
                        <p class="text-lg font-semibold text-slate-800 mt-1">{{ $zakat->jumlah_jiwa }} Orang</p>
                    </div>

                    <!-- Payment Cards -->
                    <div class="p-4 rounded-2xl bg-emerald-50/50 border border-emerald-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-800">Nominal Uang Tunai</span>
                        <p class="text-xl font-bold text-emerald-700 mt-1">
                            {{ $zakat->uang ? 'Rp ' . number_format($zakat->uang, 0, ',', '.') : '-' }}
                        </p>
                    </div>

                    <div class="p-4 rounded-2xl bg-amber-50/50 border border-amber-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-amber-800">Beras Zakat Fitrah</span>
                        <p class="text-xl font-bold text-amber-700 mt-1">
                            {{ $zakat->beras && floatval($zakat->beras) > 0 ? floatval($zakat->beras) . ' Liter' : '-' }}
                        </p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Infaq Shadaqah</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">
                            {{ $zakat->infaq ? 'Rp ' . number_format($zakat->infaq, 0, ',', '.') : 'Rp 0' }}
                        </p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Wilayah RT</span>
                        <p class="text-base font-semibold text-slate-800 mt-1">RT {{ $zakat->RTWarga->nomor_RT ?? '-' }}</p>
                    </div>

                    <div class="md:col-span-2 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Alamat Tempat Tinggal</span>
                        <p class="text-base font-medium text-slate-800 mt-1">{{ $zakat->alamat }}</p>
                    </div>

                    <div class="md:col-span-2 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Keterangan / Catatan Amil</span>
                        <p class="text-base font-medium text-slate-700 mt-1">{{ $zakat->keterangan ?: 'Tidak ada catatan khusus' }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Waktu Pembayaran</span>
                        <p class="text-sm font-semibold text-slate-800 mt-1">{{ date('d F Y, H:i', strtotime($zakat->created_at)) }} WIB</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Amilin Penerima</span>
                        <p class="text-sm font-semibold text-slate-800 mt-1">{{ $zakat->penerimaZakat->name ?? 'Admin' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
