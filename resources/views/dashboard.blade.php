<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-hijau1 leading-tight flex items-center gap-2">
                <span>🕌</span>
                <span>{{ __('Dashboard Jamaah') }}</span>
            </h2>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-semibold bg-hijau4 text-hijau1 hover:bg-hijau3 hover:text-white transition-all shadow-sm">
                <span>Lihat Website Utama</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Hero Banner -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-hijau1 via-hijau2 to-emerald-700 p-8 text-white shadow-xl">
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/15 px-3 py-1 text-xs font-semibold backdrop-blur-md border border-white/20 mb-3">
                        <span class="w-2 h-2 rounded-full bg-green-300 animate-pulse"></span>
                        Akun Terverifikasi
                    </span>
                    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                        Ahlan wa Sahlan, {{ Auth::user()->name }}! 👋
                    </h1>
                    <p class="mt-2 text-white/85 text-sm sm:text-base leading-relaxed">
                        Selamat datang di portal jamaah Masjid Jami At Taubah Juanda. Anda dapat mengakses informasi kegiatan ibadah, layanan sosial, dan jadwal sholat dengan mudah.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('home') }}#jadwalSholat" class="rounded-xl bg-white px-5 py-2.5 text-xs font-bold text-hijau1 shadow-md hover:bg-hijau4 transition-all hover:scale-105">
                            Jadwal Sholat Hari Ini
                        </a>
                        <a href="{{ route('home') }}#layanan" class="rounded-xl border border-white/40 bg-white/10 px-5 py-2.5 text-xs font-semibold text-white hover:bg-white/20 transition-all">
                            Layanan Zakat & Qurban
                        </a>
                    </div>
                </div>
                <div class="absolute -right-8 -bottom-8 w-64 h-64 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
            </div>

            <!-- Quick Action Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                        📖
                    </div>
                    <h3 class="font-bold text-slate-800 text-base">Pengajian & Kajian</h3>
                    <p class="mt-1.5 text-xs text-slate-500 leading-relaxed">
                        Ikuti kajian rutin mingguan dan majelis taklim di ruang utama Masjid Jami At Taubah.
                    </p>
                    <a href="{{ route('home') }}#layanan" class="mt-4 inline-flex items-center text-xs font-bold text-hijau2 hover:text-hijau1">
                        Selengkapnya &rarr;
                    </a>
                </div>

                <div class="group bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                        🤝
                    </div>
                    <h3 class="font-bold text-slate-800 text-base">Zakat & Infaq</h3>
                    <p class="mt-1.5 text-xs text-slate-500 leading-relaxed">
                        Salurkan zakat fitrah, mal, serta sedekah pembangunan melalui pengurus resmi masjid.
                    </p>
                    <a href="{{ route('home') }}#layanan" class="mt-4 inline-flex items-center text-xs font-bold text-sky-600 hover:text-sky-800">
                        Info Donasi &rarr;
                    </a>
                </div>

                <div class="group bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                        🏢
                    </div>
                    <h3 class="font-bold text-slate-800 text-base">Sewa Gedung Serba Guna</h3>
                    <p class="mt-1.5 text-xs text-slate-500 leading-relaxed">
                        Penyewaan gedung serba guna untuk acara pernikahan, seminar, dan peringatan hari besar.
                    </p>
                    <a href="https://wa.me/{{ config('services.masjid.wa_number', '6281234567890') }}" target="_blank" rel="noopener" class="mt-4 inline-flex items-center text-xs font-bold text-amber-600 hover:text-amber-800">
                        Hubungi WhatsApp &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
