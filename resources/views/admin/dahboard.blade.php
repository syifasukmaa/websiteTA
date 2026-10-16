@extends('admin.layouts.main')
@section('contents')
<div class="w-full px-6 py-6 mx-auto">
    <!-- Top Welcome Banner with Islamic Pattern Theme -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-emerald-800 via-emerald-700 to-teal-800 p-8 text-white shadow-xl mb-8">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 rounded-full bg-white/5 blur-2xl pointer-events-none"></div>
        <div class="absolute right-10 top-1/2 -translate-y-1/2 opacity-15 hidden lg:block">
            <svg class="w-48 h-48 text-white" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L9.5 7.5L4 8L8 12L7 17.5L12 15L17 17.5L16 12L20 8L14.5 7.5L12 2Z"/>
            </svg>
        </div>
        <div class="relative z-10 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/30 text-emerald-100 border border-emerald-400/30 mb-3">
                <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>
                Portal Manajemen Masjid At-Taubah
            </span>
            <h1 class="text-3xl font-extrabold tracking-tight text-white mb-2">
                Assalamu’alaikum, {{ Auth::user()->name ?? 'Administrator' }}!
            </h1>
            <p class="text-emerald-100/90 text-sm leading-relaxed mb-4">
                Selamat datang di panel kontrol operasional Masjid Jami At-Taubah Juanda. Pantau pengelolaan Zakat, Infaq, Qurban, serta penyaluran bantuan sosial secara transparan dan terintegrasi.
            </p>
            <div class="flex flex-wrap items-center gap-3 text-xs">
                <span class="inline-flex items-center gap-1.5 bg-black/20 px-3 py-1.5 rounded-xl border border-white/10 backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ now()->translatedFormat('l, d F Y') }}
                </span>
                <span class="inline-flex items-center gap-1.5 bg-black/20 px-3 py-1.5 rounded-xl border border-white/10 backdrop-blur-sm">
                    <span class="w-2 h-2 rounded-full bg-green-400"></span>
                    Sistem Database: Aktif & Terhubung
                </span>
            </div>
        </div>
    </div>

    <!-- KPI Metric Cards Grid (Clean 2x3 Grid Layout) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
        <x-card-dashboard judul="Total Dana Qurban" type="number" background="bg-emerald-500"
            text="Rp {{ number_format($totalQurbanFunds, 0, ',', '.') }}">
            <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-card-dashboard>

        <x-card-dashboard judul="Muzakki Terdaftar" text="{{ $muzakkiCount }}" background="bg-sky-500">
            <svg class="w-6 h-6 text-sky-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </x-card-dashboard>

        <x-card-dashboard judul="Mustahik Zakat" text="{{ $mustahikCount }}" background="bg-amber-500">
            <svg class="w-6 h-6 text-amber-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
        </x-card-dashboard>

        <x-card-dashboard judul="Anak Yatim" text="{{ $orphanCount }}" background="bg-rose-500">
            <svg class="w-6 h-6 text-rose-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </x-card-dashboard>

        <x-card-dashboard judul="Keluarga Duafa" text="{{ $duafaCount }}" background="bg-indigo-500">
            <svg class="w-6 h-6 text-indigo-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
        </x-card-dashboard>

        <x-card-dashboard judul="Qurban Kambing" type="kambing" text="{{ $goatCount }}" background="bg-teal-500">
            <svg class="w-6 h-6 text-teal-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
        </x-card-dashboard>
    </div>

    <!-- Secondary Insights Section: Quick Summary & Distributions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Zakat & Infaq Summary Card -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                        <span class="p-2 rounded-xl bg-emerald-50 text-emerald-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                        Realisasi Zakat & Infaq
                    </h3>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700">Terkumpul</span>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-sm font-medium text-slate-600">Total Uang Zakat</span>
                        <span class="text-base font-bold text-emerald-700">Rp {{ number_format($totalZakatMoney, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-sm font-medium text-slate-600">Total Beras Zakat</span>
                        <span class="text-base font-bold text-emerald-700">{{ floatval($totalRiceZakat) }} Liter</span>
                    </div>
                    <div class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-sm font-medium text-slate-600">Total Infaq & Shodaqoh</span>
                        <span class="text-base font-bold text-emerald-700">Rp {{ number_format($totalInfaq, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Sumber: Transaksi Zakat Fitrah</span>
                <a href="{{ route('admin.muzakki.index') }}" class="font-semibold text-emerald-600 hover:text-emerald-700">Lihat Muzakki &rarr;</a>
            </div>
        </div>

        <!-- Sebaran Mustahik per RT -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                        <span class="p-2 rounded-xl bg-sky-50 text-sky-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                        Sebaran Mustahik per RT
                    </h3>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-sky-50 text-sky-700">Distribusi</span>
                </div>
                <div class="space-y-2.5 max-h-56 overflow-y-auto pr-1">
                    @forelse ($mustahikPerRt as $rtItem)
                        <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-100 text-sm">
                            <span class="font-medium text-slate-700">RT {{ $rtItem->RTWarga->nomor_RT ?? 'Lainnya' }}</span>
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-white text-slate-700 border border-slate-200">
                                {{ $rtItem->jumlah }} Penerima
                            </span>
                        </div>
                    @empty
                        <p class="text-center py-6 text-sm text-slate-400">Belum ada sebaran mustahik.</p>
                    @endforelse
                </div>
            </div>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Total RT Terdaftar: {{ $mustahikPerRt->count() }}</span>
                <a href="{{ route('zakatMustahik.index') }}" class="font-semibold text-sky-600 hover:text-sky-700">Kelola Mustahik &rarr;</a>
            </div>
        </div>

        <!-- Quick Action Links -->
        <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-3xl p-6 shadow-sm flex flex-col justify-between">
            <div>
                <h3 class="text-base font-bold text-white mb-2 flex items-center gap-2">
                    <span class="p-2 rounded-xl bg-white/10 text-emerald-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </span>
                    Akses Cepat Penginputan
                </h3>
                <p class="text-xs text-slate-300 mb-5 leading-relaxed">
                    Akses langsung formulir tambah data baru untuk mempercepat input operasional panitia masjid.
                </p>
                <div class="grid grid-cols-2 gap-2.5">
                    <a href="{{ route('zakatMustahik.create') }}" class="flex items-center justify-center gap-1.5 p-3 rounded-xl bg-white/10 hover:bg-emerald-600 text-xs font-semibold text-white transition-all duration-200 border border-white/5">
                        + Mustahik
                    </a>
                    <a href="{{ route('admin.muzakki.create') }}" class="flex items-center justify-center gap-1.5 p-3 rounded-xl bg-white/10 hover:bg-emerald-600 text-xs font-semibold text-white transition-all duration-200 border border-white/5">
                        + Muzakki
                    </a>
                    <a href="{{ route('duafa.create') }}" class="flex items-center justify-center gap-1.5 p-3 rounded-xl bg-white/10 hover:bg-emerald-600 text-xs font-semibold text-white transition-all duration-200 border border-white/5">
                        + Duafa
                    </a>
                    <a href="{{ route('yatimPiatu.create') }}" class="flex items-center justify-center gap-1.5 p-3 rounded-xl bg-white/10 hover:bg-emerald-600 text-xs font-semibold text-white transition-all duration-200 border border-white/5">
                        + Yatim Piatu
                    </a>
                    <a href="{{ route('pendaftarQurban.create') }}" class="flex items-center justify-center gap-1.5 p-3 rounded-xl bg-white/10 hover:bg-emerald-600 text-xs font-semibold text-white transition-all duration-200 border border-white/5 col-span-2">
                        + Pendaftar Qurban
                    </a>
                </div>
            </div>
            <div class="mt-5 pt-4 border-t border-white/10 text-xs text-slate-400 text-center">
                Portal Admin v2.0 - Masjid At-Taubah
            </div>
        </div>
    </div>

    <!-- Recent Records Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Muzakki Table -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    Muzakki Terbaru
                </h3>
                <a href="{{ route('admin.muzakki.index') }}" class="text-xs font-semibold text-emerald-600 hover:text-emerald-700">
                    Lihat Semua &rarr;
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="text-xs uppercase bg-slate-50 text-slate-400 font-semibold border-y border-slate-100">
                        <tr>
                            <th class="py-3 px-3">Nama</th>
                            <th class="py-3 px-3">Jiwa</th>
                            <th class="py-3 px-3">Zakat / Infaq</th>
                            <th class="py-3 px-3">RT</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($recentMuzakkis as $item)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-3 font-semibold text-slate-800">{{ $item->nama_muzakki }}</td>
                                <td class="py-3 px-3">{{ $item->jumlah_jiwa }} Orang</td>
                                <td class="py-3 px-3">
                                    @if ($item->uang > 0)
                                        Rp {{ number_format($item->uang, 0, ',', '.') }}
                                    @elseif ($item->beras > 0)
                                        {{ $item->beras }} Liter
                                    @else
                                        Infaq Rp {{ number_format($item->infaq, 0, ',', '.') }}
                                    @endif
                                </td>
                                <td class="py-3 px-3">
                                    <span class="px-2 py-0.5 rounded-md text-xs font-medium bg-slate-100 text-slate-600">
                                        RT {{ $item->RTWarga->nomor_RT ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-slate-400 text-sm">Belum ada transaksi muzakki.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Mustahik Table -->
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold text-slate-800 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                    Mustahik Terbaru
                </h3>
                <a href="{{ route('zakatMustahik.index') }}" class="text-xs font-semibold text-amber-600 hover:text-amber-700">
                    Lihat Semua &rarr;
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="text-xs uppercase bg-slate-50 text-slate-400 font-semibold border-y border-slate-100">
                        <tr>
                            <th class="py-3 px-3">Keluarga</th>
                            <th class="py-3 px-3">Kategori</th>
                            <th class="py-3 px-3">No. HP</th>
                            <th class="py-3 px-3">RT</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($recentMustahiks as $item)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3 px-3 font-semibold text-slate-800">{{ $item->nama_keluarga }}</td>
                                <td class="py-3 px-3">
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 capitalize">
                                        {{ $item->kelompok ?? 'Fakir Miskin' }}
                                    </span>
                                </td>
                                <td class="py-3 px-3 text-xs">{{ $item->nomor_hp ?? '-' }}</td>
                                <td class="py-3 px-3">
                                    <span class="px-2 py-0.5 rounded-md text-xs font-medium bg-slate-100 text-slate-600">
                                        RT {{ $item->RTWarga->nomor_RT ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-slate-400 text-sm">Belum ada data mustahik.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
