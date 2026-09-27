<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Masjid Jami At Taubah Juanda</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logoMasjid.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @include('admin.layouts.partials.links')
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            *,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}
            :host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree,ui-sans-serif,system-ui,sans-serif;-webkit-tap-highlight-color:transparent}
            body{margin:0;line-height:inherit}
            a{color:inherit;text-decoration:inherit}
            h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}
            button{cursor:pointer;background-color:transparent;background-image:none;font:inherit;color:inherit}
            img,video{max-width:100%;height:auto;display:block}

        </style>
    @endif

    <style>

        .arch {
            border-radius: 45% 45% 0 0 / 70% 70% 0 0;
        }

        .arch-sm {
            border-radius: 50% 50% 0 0 / 90% 90% 0 0;
        }

        .prayer-active {
            box-shadow: inset 0 0 0 2px currentColor;
        }

        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        .animate-marquee {
            animation: marquee 28s linear infinite;
        }

        .navbar-shadow {
            box-shadow: 0 8px 30px -12px rgba(0, 0, 0, 0.15);
        }

        /* Make Swiper's pagination follow the mosque's green palette instead of
           its default blue theme. `.swiper.text-hijau3` sets the CSS color on the
           container (a real, compiled Tailwind color), and currentColor picks it up. */
        .swiper {
            --swiper-theme-color: currentColor;
        }

        .swiper-pagination-bullet {
            opacity: 0.45;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-sans antialiased text-black/70 dark:bg-black dark:text-white/70" style="font-family: 'IBM Plex Sans', ui-sans-serif, system-ui, sans-serif;">
    <div class="bg-[#FBFAF6] dark:bg-black">

        {{-- Top announcement strip --}}
        <div class="relative z-40 overflow-hidden py-2 bg-hijau1 text-white">
            <p class="inline-block w-full whitespace-nowrap animate-marquee text-sm font-medium">
                🕌&nbsp; <a href="#jadwalSholat" class="hover:underline">Selamat datang di Masjid Jami At Taubah</a>
                &nbsp;&nbsp;•&nbsp;&nbsp;
                📖&nbsp; <a href="#layanan" class="hover:underline">Pengajian Mingguan</a>
                &nbsp;&nbsp;•&nbsp;&nbsp;
                🌙&nbsp; <a href="#layanan" class="hover:underline">Kegiatan Bulan Ramadhan</a>
                &nbsp;&nbsp;•&nbsp;&nbsp;
                🕋&nbsp; <a href="#layanan" class="hover:underline">Donasi Masjid</a>
            </p>
        </div>

        {{-- Navbar --}}
        <header id="site-navbar" class="sticky top-0 z-30 bg-white/90 backdrop-blur-md transition-shadow duration-300 dark:bg-black/90">
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
                <a href="#beranda" class="flex items-center gap-3">
                    <img src="{{ asset('assets/img/logoMasjid.png') }}" alt="Logo Masjid At Taubah" class="h-11 w-11 object-contain">
                    <span class="hidden flex-col leading-tight sm:flex">
                        <span class="font-semibold text-hijau1 dark:text-white" style="font-family: Poppins, sans-serif;">Masjid Jami</span>
                        <span class="text-xs tracking-wide text-hijau2 dark:text-white/60">At Taubah — Juanda, Depok</span>
                    </span>
                </a>

                <ul class="hidden items-center gap-1 lg:flex">
                    <li><a href="#beranda" class="rounded-md px-4 py-2 text-sm font-medium text-black/70 transition hover:bg-hijau4 hover:text-hijau1 dark:text-white/70">Beranda</a></li>
                    <li><a href="#jadwalSholat" class="rounded-md px-4 py-2 text-sm font-medium text-black/70 transition hover:bg-hijau4 hover:text-hijau1 dark:text-white/70">Jadwal Sholat</a></li>
                    <li><a href="#layanan" class="rounded-md px-4 py-2 text-sm font-medium text-black/70 transition hover:bg-hijau4 hover:text-hijau1 dark:text-white/70">Layanan</a></li>
                    <li><a href="#fasilitas" class="rounded-md px-4 py-2 text-sm font-medium text-black/70 transition hover:bg-hijau4 hover:text-hijau1 dark:text-white/70">Fasilitas</a></li>
                    <li><a href="#galeri" class="rounded-md px-4 py-2 text-sm font-medium text-black/70 transition hover:bg-hijau4 hover:text-hijau1 dark:text-white/70">Galeri</a></li>
                    <li><a href="#lokasi" class="rounded-md px-4 py-2 text-sm font-medium text-black/70 transition hover:bg-hijau4 hover:text-hijau1 dark:text-white/70">Lokasi</a></li>
                </ul>

                <a href="https://wa.me/6281318806256"
                    class="hidden rounded-full bg-hijau2 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-hijau1 lg:inline-block">
                    Sewa Gedung
                </a>

                <button id="menu-toggle" type="button" aria-controls="mobile-menu" aria-expanded="false"
                    class="flex h-10 w-10 items-center justify-center rounded-md text-hijau1 lg:hidden">
                    <svg id="icon-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" class="hidden h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </nav>

            <div id="mobile-menu" class="hidden border-t border-black/5 bg-white px-4 pb-4 lg:hidden dark:bg-black">
                <ul class="flex flex-col divide-y divide-black/5">
                    <li><a href="#beranda" class="block py-3 text-sm font-medium text-black/70 dark:text-white/70">Beranda</a></li>
                    <li><a href="#jadwalSholat" class="block py-3 text-sm font-medium text-black/70 dark:text-white/70">Jadwal Sholat</a></li>
                    <li><a href="#layanan" class="block py-3 text-sm font-medium text-black/70 dark:text-white/70">Layanan</a></li>
                    <li><a href="#fasilitas" class="block py-3 text-sm font-medium text-black/70 dark:text-white/70">Fasilitas</a></li>
                    <li><a href="#galeri" class="block py-3 text-sm font-medium text-black/70 dark:text-white/70">Galeri</a></li>
                    <li><a href="#lokasi" class="block py-3 text-sm font-medium text-black/70 dark:text-white/70">Lokasi</a></li>
                </ul>
                <a href="https://wa.me/6281318806256"
                    class="mt-3 block rounded-full bg-hijau2 px-5 py-2.5 text-center text-sm font-semibold text-white">
                    Sewa Gedung
                </a>
            </div>
        </header>

        <main>
            {{-- Hero --}}
            <header id="beranda" class="relative flex min-h-[92vh] items-center overflow-hidden">
                <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/img/masjid.jpg') }}');">
                    <div class="absolute inset-0 bg-gradient-to-t from-hijau1/90 via-hijau1/50 to-hijau1/20"></div>
                </div>

                <img src="{{ asset('assets/img/pattern1.png') }}" alt="" aria-hidden="true"
                    class="pointer-events-none absolute -right-10 -top-10 w-40 opacity-30 lg:w-56">

                <div class="relative z-10 mx-auto max-w-3xl px-6 text-center text-white sm:px-8">
                    <span class="inline-block rounded-full border border-white/30 bg-white/10 px-4 py-1 text-xs font-medium tracking-wide backdrop-blur-sm">
                        Jl. Ir. H. Juanda No. Km.2, Baktijaya, Sukmajaya — Depok
                    </span>
                    <h1 class="mt-6 text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl" style="font-family: Poppins, sans-serif;">
                        Masjid Jami At Taubah
                    </h1>
                    <p class="mx-auto mt-5 max-w-xl text-base text-white/85 sm:text-lg">
                        Rumah ibadah dan pusat kegiatan warga di Kota Depok — tempat sholat, belajar,
                        dan bersilaturahmi bagi jamaah dari segala usia.
                    </p>
                    <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                        <a href="https://wa.me/6281318806256"
                            class="w-full rounded-full bg-white px-7 py-3 text-sm font-semibold text-hijau1 shadow-lg transition hover:scale-105 sm:w-auto">
                            Sewa Gedung Serba Guna
                        </a>
                        <a href="#jadwalSholat"
                            class="w-full rounded-full border border-white/50 px-7 py-3 text-sm font-semibold text-white transition hover:bg-white/10 sm:w-auto">
                            Lihat Jadwal Sholat
                        </a>
                    </div>
                </div>
            </header>

            {{-- Jadwal Sholat --}}
            <section id="jadwalSholat" class="relative mx-auto max-w-6xl px-4 py-20 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl" style="font-family: Poppins, sans-serif;">
                        Jadwal Sholat
                    </h2>
                    <p class="mt-2 text-hijau2">Depok, Sukmajaya</p>
                    <p class="text-sm text-hijau2/80" id="date_sholat">Hari</p>
                </div>

                <div class="mt-10 grid grid-cols-3 gap-3 sm:grid-cols-6 lg:gap-4">
                    <div class="jadwal-card arch flex flex-col items-center gap-2 bg-white p-4 pt-7 text-center shadow-sm transition dark:bg-white/5" data-key="imsak">
                        <span class="text-2xl">🌘</span>
                        <span class="text-sm font-semibold text-hijau1 dark:text-white">Imsak</span>
                        <span class="imsak text-sm text-black/60 dark:text-white/60">--:--</span>
                    </div>
                    <div class="jadwal-card arch flex flex-col items-center gap-2 bg-hijau4 p-4 pt-7 text-center shadow-sm transition" data-key="subuh">
                        <span class="text-2xl">🌅</span>
                        <span class="text-sm font-semibold text-hijau1">Subuh</span>
                        <span class="subuh text-sm text-hijau1/70">--:--</span>
                    </div>
                    <div class="jadwal-card arch flex flex-col items-center gap-2 bg-white p-4 pt-7 text-center shadow-sm transition dark:bg-white/5" data-key="dzuhur">
                        <span class="text-2xl">🌞</span>
                        <span class="text-sm font-semibold text-hijau1 dark:text-white">Dzuhur</span>
                        <span class="dzuhur text-sm text-black/60 dark:text-white/60">--:--</span>
                    </div>
                    <div class="jadwal-card arch flex flex-col items-center gap-2 bg-hijau4 p-4 pt-7 text-center shadow-sm transition" data-key="ashar">
                        <span class="text-2xl">🌤️</span>
                        <span class="text-sm font-semibold text-hijau1">Ashar</span>
                        <span class="ashar text-sm text-hijau1/70">--:--</span>
                    </div>
                    <div class="jadwal-card arch flex flex-col items-center gap-2 bg-white p-4 pt-7 text-center shadow-sm transition dark:bg-white/5" data-key="maghrib">
                        <span class="text-2xl">🌌</span>
                        <span class="text-sm font-semibold text-hijau1 dark:text-white">Maghrib</span>
                        <span class="maghrib text-sm text-black/60 dark:text-white/60">--:--</span>
                    </div>
                    <div class="jadwal-card arch flex flex-col items-center gap-2 bg-hijau4 p-4 pt-7 text-center shadow-sm transition" data-key="isya">
                        <span class="text-2xl">🌙</span>
                        <span class="text-sm font-semibold text-hijau1">Isya</span>
                        <span class="isya text-sm text-hijau1/70">--:--</span>
                    </div>
                </div>

                <p class="mt-6 text-center text-xs text-black/50 dark:text-white/40">
                    *Sumber
                    <a href="https://bimasislam.kemenag.go.id/jadwalshalat" class="underline hover:text-hijau2">bimasislam.kemenag.go.id</a>
                </p>
            </section>

            {{-- Layanan --}}
            <section id="layanan" class="bg-hijau1 py-20">
                <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                    <div class="text-center text-white">
                        <h2 class="text-2xl font-bold uppercase tracking-wide text-white sm:text-3xl" style="font-family: Poppins, sans-serif;">
                            Layanan dan Bantuan Masjid
                        </h2>
                        <p class="mx-auto mt-2 max-w-md text-sm text-white/70">
                            Beberapa layanan yang bisa dimanfaatkan jamaah dan warga sekitar.
                        </p>
                    </div>

                    <div class="mt-12 swiper text-hijau3">
                        <div class="swiper-wrapper items-stretch">
                            <div class="swiper-slide h-auto py-3">
                                <div class="group flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-xl shadow-black/10 transition hover:-translate-y-1">
                                    <div class="relative">
                                        <img class="aspect-[16/10] w-full rounded-t-3xl object-cover" src="{{ asset('assets/img/zakat.jpeg') }}" alt="Pembayaran zakat">
                                        <span class="absolute -bottom-5 left-5 flex h-11 w-11 items-center justify-center rounded-full bg-hijau2 text-lg text-white shadow-lg ring-4 ring-white">💰</span>
                                    </div>
                                    <div class="flex flex-1 flex-col px-5 pb-5 pt-8">
                                        <h3 class="font-semibold text-hijau1" style="font-family: Poppins, sans-serif;">Pembayaran Zakat</h3>
                                        <p class="mt-1 text-sm text-black/55">Salurkan zakat fitrah dan mal langsung melalui pengurus masjid.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto py-3">
                                <div class="group flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-xl shadow-black/10 transition hover:-translate-y-1">
                                    <div class="relative">
                                        <img class="aspect-[16/10] w-full rounded-t-3xl object-cover" src="{{ asset('assets/img/hewanqurban.jpeg') }}" alt="Pendaftaran hewan qurban">
                                        <span class="absolute -bottom-5 left-5 flex h-11 w-11 items-center justify-center rounded-full bg-hijau2 text-lg text-white shadow-lg ring-4 ring-white">🐐</span>
                                    </div>
                                    <div class="flex flex-1 flex-col px-5 pb-5 pt-8">
                                        <h3 class="font-semibold text-hijau1" style="font-family: Poppins, sans-serif;">Pendaftaran Hewan Qurban</h3>
                                        <p class="mt-1 text-sm text-black/55">Daftarkan hewan qurban Anda untuk Idul Adha setiap tahunnya.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto py-3">
                                <div class="group flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-xl shadow-black/10 transition hover:-translate-y-1">
                                    <div class="relative">
                                        <img class="aspect-[16/10] w-full rounded-t-3xl object-cover" src="{{ asset('assets/img/santunan.jpg') }}" alt="Santunan yatim piatu">
                                        <span class="absolute -bottom-5 left-5 flex h-11 w-11 items-center justify-center rounded-full bg-hijau2 text-lg text-white shadow-lg ring-4 ring-white">🤲</span>
                                    </div>
                                    <div class="flex flex-1 flex-col px-5 pb-5 pt-8">
                                        <h3 class="font-semibold text-hijau1" style="font-family: Poppins, sans-serif;">Santunan Yatim Piatu</h3>
                                        <p class="mt-1 text-sm text-black/55">Program rutin santunan bagi anak yatim di lingkungan sekitar.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto py-3">
                                <div class="group flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-xl shadow-black/10 transition hover:-translate-y-1">
                                    <div class="relative">
                                        <img class="aspect-[16/10] w-full rounded-t-3xl object-cover" src="{{ asset('assets/img/penggalanganDana.jpg') }}" alt="Penggalangan dana">
                                        <span class="absolute -bottom-5 left-5 flex h-11 w-11 items-center justify-center rounded-full bg-hijau2 text-lg text-white shadow-lg ring-4 ring-white">🤝</span>
                                    </div>
                                    <div class="flex flex-1 flex-col px-5 pb-5 pt-8">
                                        <h3 class="font-semibold text-hijau1" style="font-family: Poppins, sans-serif;">Penggalangan Dana</h3>
                                        <p class="mt-1 text-sm text-black/55">Bantu pembangunan dan operasional masjid melalui donasi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination !relative mt-8"></div>
                    </div>
                </div>
            </section>

            {{-- Fasilitas --}}
            <section id="fasilitas" class="mx-auto max-w-6xl px-4 py-20 sm:px-6 lg:px-8">
                <h2 class="text-center text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl" style="font-family: Poppins, sans-serif;">
                    Fasilitas Masjid
                </h2>

                <div class="relative mt-12" data-fas-carousel>
                    <div class="relative h-96 overflow-hidden rounded-2xl md:h-[480px]">
                        <div data-fas-slide class="absolute inset-0 transition-opacity duration-700">
                            <img src="{{ asset('assets/img/GSM.jpg') }}" class="h-full w-full object-cover" alt="Gedung Serba Guna">
                            <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/60 via-black/10 to-transparent p-6 sm:p-10">
                                <div>
                                    <h3 class="text-xl font-bold text-white sm:text-2xl" style="font-family: Poppins, sans-serif;">Gedung Serba Guna</h3>
                                    <p class="mt-1 max-w-md text-sm text-white/85">Gedung untuk pernikahan, pengajian, dan acara hari besar.</p>
                                </div>
                            </div>
                        </div>
                        <div data-fas-slide class="absolute inset-0 hidden transition-opacity duration-700">
                            <img src="{{ asset('assets/img/tempatsholat.jpg') }}" class="h-full w-full object-cover" alt="Tempat sholat">
                            <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/60 via-black/10 to-transparent p-6 sm:p-10">
                                <div>
                                    <h3 class="text-xl font-bold text-white sm:text-2xl" style="font-family: Poppins, sans-serif;">Tempat Sholat</h3>
                                    <p class="mt-1 max-w-md text-sm text-white/85">Ruang sholat luas dengan 2 lantai.</p>
                                </div>
                            </div>
                        </div>
                        <div data-fas-slide class="absolute inset-0 hidden transition-opacity duration-700">
                            <img src="{{ asset('assets/img/keranda.jpg') }}" class="h-full w-full object-cover" alt="Keranda">
                            <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/60 via-black/10 to-transparent p-6 sm:p-10">
                                <div>
                                    <h3 class="text-xl font-bold text-white sm:text-2xl" style="font-family: Poppins, sans-serif;">Keranda</h3>
                                    <p class="mt-1 max-w-md text-sm text-white/85">Keranda untuk mengangkut jenazah tersedia di masjid.</p>
                                </div>
                            </div>
                        </div>
                        <div data-fas-slide class="absolute inset-0 hidden transition-opacity duration-700">
                            <img src="{{ asset('assets/img/kainkafan.jpg') }}" class="h-full w-full object-cover" alt="Kain kafan">
                            <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/60 via-black/10 to-transparent p-6 sm:p-10">
                                <div>
                                    <h3 class="text-xl font-bold text-white sm:text-2xl" style="font-family: Poppins, sans-serif;">Kain Kafan</h3>
                                    <p class="mt-1 max-w-md text-sm text-white/85">Kain kafan tersedia untuk keperluan jenazah.</p>
                                </div>
                            </div>
                        </div>
                        <div data-fas-slide class="absolute inset-0 hidden transition-opacity duration-700">
                            <img src="{{ asset('assets/img/toilet.jpg') }}" class="h-full w-full object-cover" alt="Toilet">
                            <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/60 via-black/10 to-transparent p-6 sm:p-10">
                                <div>
                                    <h3 class="text-xl font-bold text-white sm:text-2xl" style="font-family: Poppins, sans-serif;">Toilet</h3>
                                    <p class="mt-1 max-w-md text-sm text-white/85">Toilet laki-laki di lantai bawah, perempuan di lantai atas.</p>
                                </div>
                            </div>
                        </div>
                        <div data-fas-slide class="absolute inset-0 hidden transition-opacity duration-700">
                            <img src="{{ asset('assets/img/AC.jpg') }}" class="h-full w-full object-cover" alt="Air Conditioner">
                            <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/60 via-black/10 to-transparent p-6 sm:p-10">
                                <div>
                                    <h3 class="text-xl font-bold text-white sm:text-2xl" style="font-family: Poppins, sans-serif;">Air Conditioner</h3>
                                    <p class="mt-1 max-w-md text-sm text-white/85">Masjid dilengkapi AC agar jamaah nyaman beribadah.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-5 left-1/2 z-10 flex -translate-x-1/2 gap-2" data-fas-dots></div>

                    <button type="button" data-fas-prev aria-label="Sebelumnya"
                        class="absolute left-3 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/70 text-hijau1 backdrop-blur-sm hover:bg-white">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    </button>
                    <button type="button" data-fas-next aria-label="Berikutnya"
                        class="absolute right-3 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/70 text-hijau1 backdrop-blur-sm hover:bg-white">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                </div>
            </section>

            {{-- Galeri --}}
            <section id="galeri" class="bg-hijau4/60 py-20 dark:bg-white/5">
                <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                    <h2 class="text-center text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl" style="font-family: Poppins, sans-serif;">
                        Galeri Masjid
                    </h2>

                    <div class="mt-10 grid grid-flow-dense auto-rows-[130px] grid-cols-2 gap-3 sm:auto-rows-[150px] sm:grid-cols-4 sm:gap-4 lg:auto-rows-[170px]">
                        @php
                            $tiles = [
                                ['n' => 2, 'span' => 'col-span-2 row-span-2'],
                                ['n' => 3, 'span' => 'col-span-1 row-span-1'],
                                ['n' => 1, 'span' => 'col-span-1 row-span-1'],
                                ['n' => 4, 'span' => 'col-span-2 row-span-1'],
                                ['n' => 6, 'span' => 'col-span-1 row-span-1'],
                                ['n' => 5, 'span' => 'col-span-1 row-span-1'],
                            ];
                        @endphp
                        @foreach ($tiles as $tile)
                            <div class="group relative overflow-hidden rounded-2xl {{ $tile['span'] }}">
                                <img class="h-full w-full object-cover transition duration-500 group-hover:scale-110"
                                    src="{{ asset('assets/img/galeri' . $tile['n'] . '.jpg') }}" alt="Galeri kegiatan masjid {{ $tile['n'] }}">
                                <div class="absolute inset-0 bg-hijau1/0 transition group-hover:bg-hijau1/20"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Lokasi --}}
            <section id="lokasi" class="mx-auto max-w-6xl px-4 py-20 sm:px-6 lg:px-8">
                <h2 class="text-center text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl" style="font-family: Poppins, sans-serif;">
                    Lokasi Masjid
                </h2>

                <div class="mt-10 grid gap-6 lg:grid-cols-3">
                    <div class="rounded-2xl bg-hijau1 p-8 text-white lg:col-span-1">
                        <h3 class="font-semibold text-white" style="font-family: Poppins, sans-serif;">Alamat</h3>
                        <p class="mt-2 text-sm text-white/80">
                            Jl. Ir. H. Juanda No. Km.2, RW.16, Kel. Baktijaya, Kec. Sukmajaya, Kota Depok.
                        </p>
                        <h3 class="mt-6 font-semibold text-white" style="font-family: Poppins, sans-serif;">Kontak</h3>
                        <a href="https://wa.me/6281318806256" class="mt-2 inline-block text-sm text-white/80 hover:text-white hover:underline">
                            +62 813-1880-6256 (WhatsApp)
                        </a>
                    </div>
                    <div class="overflow-hidden rounded-2xl lg:col-span-2">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4368505855245!2d106.8479536!3d-6.3799304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec77d6134e97%3A0xf5bedde41bf5124e!2sMasjid%20Jami'%20At-Taubah!5e0!3m2!1sen!2sid!4v1612309600000!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0; min-height: 320px;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-hijau1 text-white/70">
            <div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/img/logoMasjid.png') }}" alt="Logo Masjid" class="h-10 w-10">
                            <span class="font-semibold text-white" style="font-family: Poppins, sans-serif;">Masjid Jami At Taubah</span>
                        </div>
                        <p class="mt-3 text-sm">Rumah ibadah dan pusat kegiatan warga di Juanda, Kota Depok.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white">Jelajahi</h4>
                        <ul class="mt-3 space-y-2 text-sm">
                            <li><a href="#jadwalSholat" class="hover:text-white hover:underline">Jadwal Sholat</a></li>
                            <li><a href="#layanan" class="hover:text-white hover:underline">Layanan</a></li>
                            <li><a href="#fasilitas" class="hover:text-white hover:underline">Fasilitas</a></li>
                            <li><a href="#galeri" class="hover:text-white hover:underline">Galeri</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white">Kontak</h4>
                        <ul class="mt-3 space-y-2 text-sm">
                            <li><a href="https://wa.me/6281318806256" class="hover:text-white hover:underline">WhatsApp Pengurus</a></li>
                            <li><a href="#lokasi" class="hover:text-white hover:underline">Lihat Lokasi</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white">Dukung Masjid</h4>
                        <p class="mt-3 text-sm">Ikut berkontribusi lewat donasi atau penggalangan dana masjid.</p>
                        <a href="#layanan" class="mt-3 inline-block rounded-full bg-white px-5 py-2 text-sm font-semibold text-hijau1">
                            Donasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="mt-10 border-t border-white/10 pt-6 text-center text-xs text-white/50">
                    © {{ date('Y') }} Masjid Jami At Taubah — Juanda, Kota Depok.
                </div>
            </div>
        </footer>
    </div>
</body>
@include('admin.layouts.partials.scripts')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const nav = document.getElementById('site-navbar');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('navbar-shadow', window.scrollY > 8);
    });

    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');
    menuToggle.addEventListener('click', () => {
        const isOpen = !mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden');
        iconOpen.classList.toggle('hidden', !isOpen);
        iconClose.classList.toggle('hidden', isOpen);
        menuToggle.setAttribute('aria-expanded', String(!isOpen));
    });
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
        });
    });


    const today = new Date();
    const pad = (n) => String(n).padStart(2, '0');
    const tanggal = `${today.getFullYear()}-${pad(today.getMonth() + 1)}-${pad(today.getDate())}`;

    fetch(`https://api.myquran.com/v2/sholat/jadwal/1225/${tanggal}`)
        .then(res => res.json())
        .then(data => {
            const jadwal = data.data.jadwal;
            document.getElementById('date_sholat').textContent = jadwal.tanggal;
            const keys = ['imsak', 'subuh', 'dzuhur', 'ashar', 'maghrib', 'isya'];
            let activeKey = null;
            const nowMinutes = today.getHours() * 60 + today.getMinutes();

            keys.forEach(key => {
                document.querySelector('.' + key).textContent = jadwal[key];
                const [h, m] = jadwal[key].split(':').map(Number);
                const minutes = h * 60 + m;
                if (minutes <= nowMinutes) activeKey = key;
            });

            if (activeKey) {
                const card = document.querySelector(`.jadwal-card[data-key="${activeKey}"]`);
                if (card) card.classList.add('prayer-active', 'text-hijau1');
            }
        })
        .catch(() => {
            document.getElementById('date_sholat').textContent = 'Jadwal tidak tersedia saat ini';
        });


    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.swiper', {
            slidesPerView: 1.25,
            spaceBetween: 20,
            centeredSlides: false,
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: {
                480: { slidesPerView: 1.6, spaceBetween: 20 },
                768: { slidesPerView: 2.4, spaceBetween: 24 },
                1024: { slidesPerView: 4, spaceBetween: 24 },
            },
        });
    });

    (function () {
        const root = document.querySelector('[data-fas-carousel]');
        if (!root) return;
        const slides = Array.from(root.querySelectorAll('[data-fas-slide]'));
        const dotsWrap = root.querySelector('[data-fas-dots]');
        let index = 0;

        slides.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.setAttribute('aria-label', `Slide ${i + 1}`);
            dot.className = 'h-2.5 w-2.5 rounded-full bg-white/60 transition';
            dot.addEventListener('click', () => show(i));
            dotsWrap.appendChild(dot);
        });
        const dots = Array.from(dotsWrap.children);

        function show(i) {
            slides[index].classList.add('hidden');
            dots[index].classList.remove('bg-white');
            dots[index].classList.add('bg-white/60');
            index = (i + slides.length) % slides.length;
            slides[index].classList.remove('hidden');
            dots[index].classList.remove('bg-white/60');
            dots[index].classList.add('bg-white');
        }
        show(0);

        root.querySelector('[data-fas-prev]').addEventListener('click', () => show(index - 1));
        root.querySelector('[data-fas-next]').addEventListener('click', () => show(index + 1));

        let timer = setInterval(() => show(index + 1), 6000);
        root.addEventListener('mouseenter', () => clearInterval(timer));
        root.addEventListener('mouseleave', () => timer = setInterval(() => show(index + 1), 6000));
    })();
</script>

</html>
