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
    <!-- Preload hero jumbotron image for instant first refresh -->
    <link rel="preload" as="image" href="{{ asset('assets/img/masjid.jpg') }}" fetchpriority="high">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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

        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        .animate-marquee {
            animation: marquee 28s linear infinite;
        }

        .navbar-shadow {
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.12);
        }

        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.96) !important;
            box-shadow: 0 12px 28px -6px rgba(26, 83, 25, 0.12), 0 0 0 1px rgba(80, 141, 78, 0.15) !important;
        }

        /* Swiper styling */
        .swiper {
            --swiper-theme-color: currentColor;
        }

        .swiper-pagination-bullet {
            opacity: 0.4;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
            width: 24px !important;
            border-radius: 9999px !important;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Ensure sections align neatly beneath fixed navbar */
        #beranda, section[id] {
            scroll-margin-top: 85px;
        }

        /* --- Rich & Varied Scroll Reveal Animations --- */
        .reveal-init, .reveal-up {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal-init.revealed, .reveal-up.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-left {
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal-left.revealed {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(40px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal-right.revealed {
            opacity: 1;
            transform: translateX(0);
        }

        .reveal-scale {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal-scale.revealed {
            opacity: 1;
            transform: scale(1);
        }

        .reveal-flip {
            opacity: 0;
            transform: perspective(900px) rotateX(25deg) translateY(35px);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1), transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal-flip.revealed {
            opacity: 1;
            transform: perspective(900px) rotateX(0deg) translateY(0);
        }

        .reveal-zoom-in {
            opacity: 0;
            transform: scale(0.85);
            transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1), transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal-zoom-in.revealed {
            opacity: 1;
            transform: scale(1);
        }

        /* Staggered animation delays */
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }
        .delay-500 { transition-delay: 500ms; }
        .delay-600 { transition-delay: 600ms; }

        /* Slow decorative floating */
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-12px) rotate(2deg); }
        }
        .animate-float-slow {
            animation: floatSlow 6s ease-in-out infinite;
        }

        @keyframes floatReverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(12px) rotate(-3deg); }
        }
        .animate-float-reverse {
            animation: floatReverse 7s ease-in-out infinite;
        }

        /* Ken Burns slow hero zoom */
        @keyframes kenBurns {
            0% { transform: scale(1); }
            50% { transform: scale(1.08) translate(-1%, -0.5%); }
            100% { transform: scale(1); }
        }
        .animate-ken-burns {
            animation: kenBurns 22s ease-in-out infinite alternate;
        }

        /* Shimmer button light beam effect */
        @keyframes shimmerBeam {
            0% { transform: translateX(-130%) skewX(-20deg); }
            100% { transform: translateX(260%) skewX(-20deg); }
        }
        .animate-shimmer-btn {
            position: relative;
            overflow: hidden;
        }
        .animate-shimmer-btn::after {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 50%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transform: translateX(-130%) skewX(-20deg);
            animation: shimmerBeam 3.8s infinite cubic-bezier(0.4, 0, 0.2, 1);
        }


        /* Authentic Islamic geometric watermark background */
        .bg-islamic-pattern {
            background-color: #FDFBF7;
            background-image:
                radial-gradient(circle at 100% 100%, rgba(26, 83, 25, 0.035) 0, transparent 40%),
                radial-gradient(circle at 0% 0%, rgba(80, 141, 78, 0.035) 0, transparent 40%),
                url("data:image/svg+xml,%3Csvg width='72' height='72' viewBox='0 0 72 72' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%231A5319' stroke-width='0.65' stroke-opacity='0.055'%3E%3Cpath d='M36 0 L46 22 L68 22 L50 36 L57 58 L36 44 L15 58 L22 36 L4 22 L26 22 Z'/%3E%3Cpath d='M36 72 L46 50 L68 50 L50 36 L57 14 L36 28 L15 14 L22 36 L4 50 L26 50 Z'/%3E%3Ccircle cx='36' cy='36' r='11' stroke-width='0.5'/%3E%3Ccircle cx='0' cy='0' r='9' stroke-width='0.5'/%3E%3Ccircle cx='72' cy='0' r='9' stroke-width='0.5'/%3E%3Ccircle cx='0' cy='72' r='9' stroke-width='0.5'/%3E%3Ccircle cx='72' cy='72' r='9' stroke-width='0.5'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
        }

        .dark .bg-islamic-pattern {
            background-color: #0c130d;
            background-image:
                radial-gradient(circle at 100% 100%, rgba(80, 141, 78, 0.07) 0, transparent 45%),
                radial-gradient(circle at 0% 0%, rgba(128, 175, 129, 0.07) 0, transparent 45%),
                url("data:image/svg+xml,%3Csvg width='72' height='72' viewBox='0 0 72 72' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%2380AF81' stroke-width='0.65' stroke-opacity='0.12'%3E%3Cpath d='M36 0 L46 22 L68 22 L50 36 L57 58 L36 44 L15 58 L22 36 L4 22 L26 22 Z'/%3E%3Cpath d='M36 72 L46 50 L68 50 L50 36 L57 14 L36 28 L15 14 L22 36 L4 50 L26 50 Z'/%3E%3Ccircle cx='36' cy='36' r='11' stroke-width='0.5'/%3E%3Ccircle cx='0' cy='0' r='9' stroke-width='0.5'/%3E%3Ccircle cx='72' cy='0' r='9' stroke-width='0.5'/%3E%3Ccircle cx='0' cy='72' r='9' stroke-width='0.5'/%3E%3Ccircle cx='72' cy='72' r='9' stroke-width='0.5'/%3E%3C/g%3E%3C/svg%3E");
            background-attachment: fixed;
        }


        /* Section badge subtle glow when in view */
        .section-badge {
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.6s ease;
        }
        .section-in-view .section-badge {
            transform: scale(1.04);
            box-shadow: 0 4px 14px -2px rgba(26, 83, 25, 0.15);
        }

        /* Continuous parallax floating elements */
        .parallax-float {
            transition: transform 0.15s cubic-bezier(0, 0, 0.2, 1);
            will-change: transform;
        }

        /* Active prayer card highlight with pulsing halo */
        @keyframes prayerPulseHalo {
            0%, 100% {
                box-shadow: 0 16px 32px -6px rgba(26, 83, 25, 0.4), 0 0 0 2px #508D4E, 0 0 16px rgba(80, 141, 78, 0.3);
            }
            50% {
                box-shadow: 0 18px 36px -6px rgba(26, 83, 25, 0.5), 0 0 0 3px #80AF81, 0 0 28px rgba(80, 141, 78, 0.55);
            }
        }

        .prayer-active {
            background: linear-gradient(135deg, #1A5319 0%, #297428 100%) !important;
            border-color: #508D4E !important;
            color: #ffffff !important;
            transform: translateY(-4px) scale(1.02);
            animation: prayerPulseHalo 3.2s ease-in-out infinite !important;
        }

        .prayer-active span,
        .prayer-active div,
        .prayer-active svg {
            color: #ffffff !important;
            stroke: #ffffff !important;
        }

        .prayer-active .jadwal-icon-bg {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }

        .jadwal-card {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .jadwal-card:hover {
            transform: translateY(-5px);
            border-color: #80AF81 !important;
            box-shadow: 0 14px 28px -8px rgba(26, 83, 25, 0.18) !important;
        }

        /* --- 3D Rotating Card Carousel for Fasilitas --- */
        .card-3d-stage {
            perspective: 1100px;
            transform-style: preserve-3d;
        }

        .facility-card {
            position: absolute;
            top: 50%;
            left: 50%;
            transform-origin: center center;
            transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.6s ease;
            will-change: transform, opacity;
        }

        /* Center card: regular flat rectangular card */
        .facility-card.is-active {
            transform: translate(-50%, -50%) scale(1) rotateY(0deg);
            opacity: 1;
            z-index: 30;
            pointer-events: auto;
            box-shadow: 0 25px 50px -12px rgba(26, 83, 25, 0.3), 0 0 0 1px rgba(80, 141, 78, 0.2);
        }

        /* Left card: pushed back on one side */
        .facility-card.is-prev {
            transform: translate(-98%, -50%) scale(0.85) rotateY(24deg);
            opacity: 0.55;
            z-index: 20;
            cursor: pointer;
        }

        /* Right card: pushed back on one side */
        .facility-card.is-next {
            transform: translate(-2%, -50%) scale(0.85) rotateY(-24deg);
            opacity: 0.55;
            z-index: 20;
            cursor: pointer;
        }

        .facility-card.is-hidden-left {
            transform: translate(-130%, -50%) scale(0.7) rotateY(38deg);
            opacity: 0;
            z-index: 10;
            pointer-events: none;
        }

        .facility-card.is-hidden-right {
            transform: translate(30%, -50%) scale(0.7) rotateY(-38deg);
            opacity: 0;
            z-index: 10;
            pointer-events: none;
        }

        @media (max-width: 640px) {
            .facility-card.is-prev {
                transform: translate(-88%, -50%) scale(0.82) rotateY(20deg);
                opacity: 0.45;
            }
            .facility-card.is-next {
                transform: translate(-12%, -50%) scale(0.82) rotateY(-20deg);
                opacity: 0.45;
            }
        }
    </style>
</head>

<body class="font-sans antialiased text-black/70 dark:bg-black dark:text-white/70" style="font-family: 'IBM Plex Sans', ui-sans-serif, system-ui, sans-serif;">
    @php
        $masjidWaNumber = config('services.masjid.wa_number', '6281234567890');
        $masjidWaDisplay = config('services.masjid.wa_display', '+62 812-3456-7890');
    @endphp
    <div class="relative min-h-screen bg-islamic-pattern dark:bg-black overflow-hidden">

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
        <header id="site-navbar" class="sticky top-0 z-30 bg-white/90 backdrop-blur-md transition-all duration-300 dark:bg-black/90">
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
                <a href="#beranda" class="flex items-center gap-3 group">
                    <img src="{{ asset('assets/img/logoMasjid.png') }}" alt="Logo Masjid At Taubah" class="h-11 w-11 object-contain transition-transform duration-300 group-hover:scale-105">
                    <span class="hidden flex-col leading-tight sm:flex">
                        <span class="font-semibold text-hijau1 dark:text-white" style="font-family: Poppins, sans-serif;">Masjid Jami</span>
                        <span class="text-xs tracking-wide text-hijau2 dark:text-white/60">At Taubah — Juanda, Depok</span>
                    </span>
                </a>

                <ul class="hidden items-center gap-1.5 lg:flex" id="desktop-nav">
                    <li><a href="#beranda" class="nav-link rounded-full px-4 py-2 text-sm font-semibold transition-all duration-300 bg-hijau1 text-white shadow-md shadow-hijau1/25 ring-2 ring-hijau1/20">Beranda</a></li>
                    <li><a href="#jadwalSholat" class="nav-link rounded-full px-4 py-2 text-sm font-medium transition-all duration-200 text-black/70 hover:bg-hijau4/80 hover:text-hijau1 dark:text-white/70">Jadwal Sholat</a></li>
                    <li><a href="#layanan" class="nav-link rounded-full px-4 py-2 text-sm font-medium transition-all duration-200 text-black/70 hover:bg-hijau4/80 hover:text-hijau1 dark:text-white/70">Layanan</a></li>
                    <li><a href="#fasilitas" class="nav-link rounded-full px-4 py-2 text-sm font-medium transition-all duration-200 text-black/70 hover:bg-hijau4/80 hover:text-hijau1 dark:text-white/70">Fasilitas</a></li>
                    <li><a href="#galeri" class="nav-link rounded-full px-4 py-2 text-sm font-medium transition-all duration-200 text-black/70 hover:bg-hijau4/80 hover:text-hijau1 dark:text-white/70">Galeri</a></li>
                    <li><a href="#lokasi" class="nav-link rounded-full px-4 py-2 text-sm font-medium transition-all duration-200 text-black/70 hover:bg-hijau4/80 hover:text-hijau1 dark:text-white/70">Lokasi</a></li>
                </ul>

                <a href="https://wa.me/{{ $masjidWaNumber }}"
                    class="hidden rounded-full bg-hijau2 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:bg-hijau1 hover:shadow-md hover:scale-105 lg:inline-block">
                    Sewa Gedung
                </a>

                <button id="menu-toggle" type="button" aria-controls="mobile-menu" aria-expanded="false"
                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-black/5 text-hijau1 transition-colors hover:bg-hijau4/50 lg:hidden">
                    <svg id="icon-open" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" class="hidden h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </nav>

            <div id="mobile-menu" class="hidden border-t border-black/5 bg-white px-4 pb-4 lg:hidden dark:bg-black">
                <ul class="flex flex-col divide-y divide-black/5 py-1">
                    <li><a href="#beranda" class="mobile-nav-link block py-3 text-sm font-bold bg-hijau4/70 text-hijau1 pl-3 border-l-4 border-hijau1 rounded-r-md transition-all duration-200">Beranda</a></li>
                    <li><a href="#jadwalSholat" class="mobile-nav-link block py-3 text-sm font-medium text-black/70 hover:bg-black/5 hover:text-hijau1 pl-2 transition-all duration-200 dark:text-white/70">Jadwal Sholat</a></li>
                    <li><a href="#layanan" class="mobile-nav-link block py-3 text-sm font-medium text-black/70 hover:bg-black/5 hover:text-hijau1 pl-2 transition-all duration-200 dark:text-white/70">Layanan</a></li>
                    <li><a href="#fasilitas" class="mobile-nav-link block py-3 text-sm font-medium text-black/70 hover:bg-black/5 hover:text-hijau1 pl-2 transition-all duration-200 dark:text-white/70">Fasilitas</a></li>
                    <li><a href="#galeri" class="mobile-nav-link block py-3 text-sm font-medium text-black/70 hover:bg-black/5 hover:text-hijau1 pl-2 transition-all duration-200 dark:text-white/70">Galeri</a></li>
                    <li><a href="#lokasi" class="mobile-nav-link block py-3 text-sm font-medium text-black/70 hover:bg-black/5 hover:text-hijau1 pl-2 transition-all duration-200 dark:text-white/70">Lokasi</a></li>
                </ul>
                <a href="https://wa.me/{{ $masjidWaNumber }}"
                    class="mt-3 block rounded-full bg-hijau2 px-5 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition hover:bg-hijau1">
                    Sewa Gedung
                </a>
            </div>
        </header>

        <main>
            {{-- Hero --}}
            <header id="beranda" class="relative flex min-h-[92vh] items-center overflow-hidden bg-[#113811]">
                <!-- Jumbotron Image Optimized with Native <img>, eager loading, and async decode -->
                <div class="absolute inset-0 z-0 overflow-hidden">
                    <img src="{{ asset('assets/img/masjid.jpg') }}"
                        alt="Masjid Jami At Taubah Juanda Depok"
                        fetchpriority="high"
                        loading="eager"
                        decoding="async"
                        class="h-full w-full object-cover transition-transform duration-1000 scale-100 animate-ken-burns">
                    <div class="absolute inset-0 bg-gradient-to-t from-hijau1/95 via-hijau1/60 to-hijau1/25"></div>
                </div>

                <!-- Floating Ambient Islamic Motifs with Parallax drift -->
                <img src="{{ asset('assets/img/pattern1.png') }}" alt="" aria-hidden="true"
                    loading="lazy" decoding="async"
                    class="parallax-float parallax-motif animate-float-slow pointer-events-none absolute -right-10 -top-10 w-40 opacity-30 lg:w-56"
                    data-speed="0.08">
                <img src="{{ asset('assets/img/pattern1.png') }}" alt="" aria-hidden="true"
                    loading="lazy" decoding="async"
                    class="parallax-float parallax-motif animate-float-reverse pointer-events-none absolute -left-12 -bottom-10 w-48 opacity-20 lg:w-60 rotate-45"
                    data-speed="-0.08">

                <div class="relative z-10 mx-auto max-w-3xl px-6 text-center text-white sm:px-8">
                    <span class="reveal-init inline-block rounded-full border border-white/30 bg-white/10 px-4 py-1.5 text-xs font-medium tracking-wide backdrop-blur-md shadow-sm">
                        📍 Jl. Ir. H. Juanda No. Km.2, Baktijaya, Sukmajaya — Depok
                    </span>
                    <h1 class="reveal-init delay-100 mt-6 text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl tracking-tight" style="font-family: Poppins, sans-serif;">
                        Masjid Jami At Taubah
                    </h1>
                    <p class="reveal-init delay-200 mx-auto mt-5 max-w-xl text-base text-white/90 sm:text-lg leading-relaxed">
                        Rumah ibadah dan pusat kegiatan warga di Kota Depok — tempat sholat, belajar,
                        dan bersilaturahmi bagi jamaah dari segala usia.
                    </p>
                    <div class="reveal-init delay-300 mt-8 flex flex-col items-center justify-center gap-3.5 sm:flex-row">
                        <a href="https://wa.me/{{ $masjidWaNumber }}"
                            class="animate-shimmer-btn w-full rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-hijau1 shadow-xl shadow-black/20 transition-all duration-300 hover:scale-105 hover:bg-hijau4 sm:w-auto">
                            Sewa Gedung Serba Guna
                        </a>
                        <a href="#jadwalSholat"
                            class="w-full rounded-full border border-white/60 bg-white/10 backdrop-blur-sm px-7 py-3.5 text-sm font-semibold text-white transition-all duration-300 hover:bg-white/20 hover:scale-105 sm:w-auto">
                            Lihat Jadwal Sholat
                        </a>
                    </div>
                </div>
            </header>

            {{-- Smooth Architectural Transition Wave --}}
            <div class="relative w-full overflow-hidden leading-none z-10 -mt-2 pointer-events-none">
                <svg class="relative block w-full h-8 sm:h-12 text-[#FDFBF7] dark:text-[#0c130d]" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="currentColor">
                    <path d="M0,0 C150,85 350,-25 500,45 C650,110 900,20 1200,60 L1200,120 L0,120 Z"></path>
                </svg>
            </div>

            {{-- Jadwal Sholat --}}
            <section id="jadwalSholat" class="relative mx-auto max-w-6xl px-4 py-16 sm:py-20 sm:px-6 lg:px-8">
                <!-- Ambient Glow Orbs -->
                <div class="absolute -top-12 -left-12 w-80 h-80 rounded-full bg-emerald-200/35 blur-3xl pointer-events-none dark:bg-emerald-900/20"></div>
                <div class="absolute -bottom-16 -right-12 w-96 h-96 rounded-full bg-amber-100/50 blur-3xl pointer-events-none dark:bg-amber-900/15"></div>


                <img src="{{ asset('assets/img/pattern2.png') }}" class="parallax-float absolute -top-4 -right-6 w-28 sm:w-36 opacity-15 pointer-events-none" data-speed="0.1" alt="" aria-hidden="true">
                <img src="{{ asset('assets/img/pattern3.png') }}" class="parallax-float absolute -bottom-8 -left-6 w-24 sm:w-32 opacity-15 pointer-events-none" data-speed="-0.08" alt="" aria-hidden="true">

                <div class="relative text-center reveal-init">
                    <span class="section-badge inline-block rounded-full bg-white px-3.5 py-1 text-xs font-semibold tracking-wider uppercase text-hijau1 border border-hijau2/20 mb-2 shadow-xs dark:bg-white/10 dark:text-emerald-300">
                        Waktu Beribadah
                    </span>
                    <h2 class="text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl dark:text-white" style="font-family: Poppins, sans-serif;">
                        Jadwal Sholat
                    </h2>
                    <p class="mt-2 text-hijau2 font-medium dark:text-emerald-300">Depok, Sukmajaya</p>
                    <p class="text-sm text-hijau2/80 dark:text-emerald-400/80" id="date_sholat">Hari ini</p>

                    <!-- Interactive Live Time & Next Prayer Tracker -->
                    <div class="mt-4 inline-flex flex-wrap items-center justify-center gap-2 rounded-full border border-hijau2/20 bg-white/80 dark:bg-white/5 px-4 py-2 text-xs font-medium text-hijau1 shadow-sm backdrop-blur-sm">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-hijau2 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-hijau1"></span>
                        </span>
                        <span id="live-clock" class="font-bold tracking-wider">--:--:-- WIB</span>
                        <span class="text-hijau2/40 hidden sm:inline">•</span>
                        <span id="next-prayer-info" class="text-slate-700 dark:text-white/90">Memuat hitungan waktu sholat...</span>
                    </div>
                </div>

                <div class="mt-8 sm:mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
                    {{-- Imsak --}}
                    <div class="jadwal-card reveal-flip delay-100 flex flex-col items-center justify-between rounded-2xl bg-white p-4 py-5 text-center shadow-sm border border-slate-200/80 transition-all duration-300 hover:shadow-lg dark:bg-white/5 dark:border-white/10 cursor-default group" data-key="imsak">
                        <div class="jadwal-icon-bg flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-hijau1 transition-transform duration-300 group-hover:scale-110 dark:bg-white/10">
                            <svg class="h-6 w-6 text-hijau2 dark:text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </div>
                        <div class="mt-3">
                            <span class="text-xs font-semibold uppercase tracking-wider text-hijau2 dark:text-emerald-300">Imsak</span>
                            <div class="imsak mt-0.5 text-lg sm:text-xl font-bold text-slate-800 dark:text-white">--:--</div>
                        </div>
                    </div>

                    {{-- Subuh --}}
                    <div class="jadwal-card reveal-flip delay-200 flex flex-col items-center justify-between rounded-2xl bg-white p-4 py-5 text-center shadow-sm border border-slate-200/80 transition-all duration-300 hover:shadow-lg dark:bg-white/5 dark:border-white/10 cursor-default group" data-key="subuh">
                        <div class="jadwal-icon-bg flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-hijau1 transition-transform duration-300 group-hover:scale-110 dark:bg-white/10">
                            <svg class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414M16.95 16.95l1.414 1.414M7.05 7.05L5.636 5.636M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="mt-3">
                            <span class="text-xs font-semibold uppercase tracking-wider text-hijau2 dark:text-emerald-300">Subuh</span>
                            <div class="subuh mt-0.5 text-lg sm:text-xl font-bold text-slate-800 dark:text-white">--:--</div>
                        </div>
                    </div>

                    {{-- Dzuhur --}}
                    <div class="jadwal-card reveal-flip delay-300 flex flex-col items-center justify-between rounded-2xl bg-white p-4 py-5 text-center shadow-sm border border-slate-200/80 transition-all duration-300 hover:shadow-lg dark:bg-white/5 dark:border-white/10 cursor-default group" data-key="dzuhur">
                        <div class="jadwal-icon-bg flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-hijau1 transition-transform duration-300 group-hover:scale-110 dark:bg-white/10">
                            <svg class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="4" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41m14.14-14.14l-1.41 1.41" />
                            </svg>
                        </div>
                        <div class="mt-3">
                            <span class="text-xs font-semibold uppercase tracking-wider text-hijau2 dark:text-emerald-300">Dzuhur</span>
                            <div class="dzuhur mt-0.5 text-lg sm:text-xl font-bold text-slate-800 dark:text-white">--:--</div>
                        </div>
                    </div>

                    {{-- Ashar --}}
                    <div class="jadwal-card reveal-flip delay-400 flex flex-col items-center justify-between rounded-2xl bg-white p-4 py-5 text-center shadow-sm border border-slate-200/80 transition-all duration-300 hover:shadow-lg dark:bg-white/5 dark:border-white/10 cursor-default group" data-key="ashar">
                        <div class="jadwal-icon-bg flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-hijau1 transition-transform duration-300 group-hover:scale-110 dark:bg-white/10">
                            <svg class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="mt-3">
                            <span class="text-xs font-semibold uppercase tracking-wider text-hijau2 dark:text-emerald-300">Ashar</span>
                            <div class="ashar mt-0.5 text-lg sm:text-xl font-bold text-slate-800 dark:text-white">--:--</div>
                        </div>
                    </div>

                    {{-- Maghrib --}}
                    <div class="jadwal-card reveal-flip delay-500 flex flex-col items-center justify-between rounded-2xl bg-white p-4 py-5 text-center shadow-sm border border-slate-200/80 transition-all duration-300 hover:shadow-lg dark:bg-white/5 dark:border-white/10 cursor-default group" data-key="maghrib">
                        <div class="jadwal-icon-bg flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-hijau1 transition-transform duration-300 group-hover:scale-110 dark:bg-white/10">
                            <svg class="h-6 w-6 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 17h18M6 13a6 6 0 0112 0M12 3v4m0 0l-2-2m2 2l2-2" />
                            </svg>
                        </div>
                        <div class="mt-3">
                            <span class="text-xs font-semibold uppercase tracking-wider text-hijau2 dark:text-emerald-300">Maghrib</span>
                            <div class="maghrib mt-0.5 text-lg sm:text-xl font-bold text-slate-800 dark:text-white">--:--</div>
                        </div>
                    </div>

                    {{-- Isya --}}
                    <div class="jadwal-card reveal-flip delay-600 flex flex-col items-center justify-between rounded-2xl bg-white p-4 py-5 text-center shadow-sm border border-slate-200/80 transition-all duration-300 hover:shadow-lg dark:bg-white/5 dark:border-white/10 cursor-default group" data-key="isya">
                        <div class="jadwal-icon-bg flex h-11 w-11 items-center justify-center rounded-xl bg-slate-50 text-hijau1 transition-transform duration-300 group-hover:scale-110 dark:bg-white/10">
                            <svg class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 6h.01M18 9h.01" />
                            </svg>
                        </div>
                        <div class="mt-3">
                            <span class="text-xs font-semibold uppercase tracking-wider text-hijau2 dark:text-emerald-300">Isya</span>
                            <div class="isya mt-0.5 text-lg sm:text-xl font-bold text-slate-800 dark:text-white">--:--</div>
                        </div>
                    </div>
                </div>

                <p class="mt-6 text-center text-xs text-black/50 dark:text-white/40 reveal-init delay-300">
                    *Sumber
                    <a href="https://bimasislam.kemenag.go.id/jadwalshalat" target="_blank" rel="noopener" class="underline hover:text-hijau2">bimasislam.kemenag.go.id</a>
                </p>
            </section>

            {{-- Wave Transition to Layanan --}}
            <div class="relative w-full overflow-hidden leading-none pointer-events-none -mb-1 z-10">
                <svg class="relative block w-full h-8 sm:h-12 text-[#123812]" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="currentColor">
                    <path d="M0,0 C300,70 600,10 900,65 C1050,90 1150,40 1200,20 L1200,120 L0,120 Z"></path>
                </svg>
            </div>

            {{-- Layanan --}}
            <section id="layanan" class="bg-gradient-to-br from-[#123812] via-[#1A5319] to-[#0f2e0f] py-20 relative overflow-hidden">
                <!-- Ambient Glow Shine -->
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(255,255,255,0.08)_0,transparent_65%)] pointer-events-none"></div>

                <!-- Floating Parallax Islamic Ornaments -->
                <img src="{{ asset('assets/img/pattern4.png') }}" class="parallax-float absolute top-8 right-6 w-52 sm:w-64 opacity-15 pointer-events-none" data-speed="0.08" alt="" aria-hidden="true">
                <img src="{{ asset('assets/img/pattern1.png') }}" class="parallax-float absolute -bottom-10 left-6 w-44 sm:w-56 opacity-15 pointer-events-none rotate-90" data-speed="-0.08" alt="" aria-hidden="true">

                <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="text-center text-white reveal-init">
                        <span class="section-badge inline-block rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold tracking-wider uppercase text-emerald-200 backdrop-blur-sm border border-white/10 mb-2">
                            Program Kemaslahatan
                        </span>
                        <h2 class="text-2xl font-bold uppercase tracking-wide text-white sm:text-3xl" style="font-family: Poppins, sans-serif;">
                            Layanan dan Bantuan Masjid
                        </h2>
                        <p class="mx-auto mt-2 max-w-md text-sm text-white/80 leading-relaxed">
                            Beberapa layanan yang bisa dimanfaatkan jamaah dan warga sekitar.
                        </p>
                    </div>

                    <div class="mt-12 swiper text-hijau3 reveal-zoom-in delay-200">
                        <div class="swiper-wrapper items-stretch">
                            <div class="swiper-slide h-auto py-4">
                                <div class="reveal-up delay-100 group flex h-full flex-col rounded-3xl bg-white shadow-xl shadow-black/15 transition-all duration-300 hover:-translate-y-2.5 hover:shadow-2xl border border-emerald-950/5">
                                    <div class="relative">
                                        <div class="overflow-hidden rounded-t-3xl aspect-[16/10]">
                                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                src="{{ asset('assets/img/zakat.jpeg') }}"
                                                alt="Pembayaran zakat"
                                                loading="lazy" decoding="async">
                                        </div>
                                        <span class="absolute -bottom-6 left-6 z-20 flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-tr from-hijau1 to-hijau2 text-xl text-white shadow-xl ring-4 ring-white transition-all duration-300 group-hover:rotate-12 group-hover:scale-110">💰</span>
                                    </div>
                                    <div class="flex flex-1 flex-col px-6 pb-6 pt-9">
                                        <h3 class="font-semibold text-hijau1 text-lg" style="font-family: Poppins, sans-serif;">Pembayaran Zakat</h3>
                                        <p class="mt-2 text-sm text-black/60 leading-relaxed">Salurkan zakat fitrah dan mal langsung melalui pengurus masjid terpercaya.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto py-4">
                                <div class="reveal-up delay-200 group flex h-full flex-col rounded-3xl bg-white shadow-xl shadow-black/15 transition-all duration-300 hover:-translate-y-2.5 hover:shadow-2xl border border-emerald-950/5">
                                    <div class="relative">
                                        <div class="overflow-hidden rounded-t-3xl aspect-[16/10]">
                                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                src="{{ asset('assets/img/hewanqurban.jpeg') }}"
                                                alt="Pendaftaran hewan qurban"
                                                loading="lazy" decoding="async">
                                        </div>
                                        <span class="absolute -bottom-6 left-6 z-20 flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-tr from-hijau1 to-hijau2 text-xl text-white shadow-xl ring-4 ring-white transition-all duration-300 group-hover:rotate-12 group-hover:scale-110">🐐</span>
                                    </div>
                                    <div class="flex flex-1 flex-col px-6 pb-6 pt-9">
                                        <h3 class="font-semibold text-hijau1 text-lg" style="font-family: Poppins, sans-serif;">Pendaftaran Hewan Qurban</h3>
                                        <p class="mt-2 text-sm text-black/60 leading-relaxed">Daftarkan hewan qurban Anda untuk Idul Adha setiap tahunnya dengan amanah.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto py-4">
                                <div class="reveal-up delay-300 group flex h-full flex-col rounded-3xl bg-white shadow-xl shadow-black/15 transition-all duration-300 hover:-translate-y-2.5 hover:shadow-2xl border border-emerald-950/5">
                                    <div class="relative">
                                        <div class="overflow-hidden rounded-t-3xl aspect-[16/10]">
                                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                src="{{ asset('assets/img/santunan.jpg') }}"
                                                alt="Santunan yatim piatu"
                                                loading="lazy" decoding="async">
                                        </div>
                                        <span class="absolute -bottom-6 left-6 z-20 flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-tr from-hijau1 to-hijau2 text-xl text-white shadow-xl ring-4 ring-white transition-all duration-300 group-hover:rotate-12 group-hover:scale-110">🤲</span>
                                    </div>
                                    <div class="flex flex-1 flex-col px-6 pb-6 pt-9">
                                        <h3 class="font-semibold text-hijau1 text-lg" style="font-family: Poppins, sans-serif;">Santunan Yatim Piatu</h3>
                                        <p class="mt-2 text-sm text-black/60 leading-relaxed">Program santunan berkala bagi anak-anak yatim piatu di lingkungan sekitar Juanda.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto py-4">
                                <div class="reveal-up delay-400 group flex h-full flex-col rounded-3xl bg-white shadow-xl shadow-black/15 transition-all duration-300 hover:-translate-y-2.5 hover:shadow-2xl border border-emerald-950/5">
                                    <div class="relative">
                                        <div class="overflow-hidden rounded-t-3xl aspect-[16/10]">
                                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                                src="{{ asset('assets/img/penggalanganDana.jpg') }}"
                                                alt="Penggalangan dana"
                                                loading="lazy" decoding="async">
                                        </div>
                                        <span class="absolute -bottom-6 left-6 z-20 flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-tr from-hijau1 to-hijau2 text-xl text-white shadow-xl ring-4 ring-white transition-all duration-300 group-hover:rotate-12 group-hover:scale-110">🤝</span>
                                    </div>
                                    <div class="flex flex-1 flex-col px-6 pb-6 pt-9">
                                        <h3 class="font-semibold text-hijau1 text-lg" style="font-family: Poppins, sans-serif;">Penggalangan Dana</h3>
                                        <p class="mt-2 text-sm text-black/60 leading-relaxed">Bantu perbaikan fasilitas dan operasional dakwah masjid melalui infaq dan donasi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination !relative mt-8"></div>
                    </div>
                </div>
            </section>

            {{-- Wave Transition from Layanan to Fasilitas --}}
            <div class="relative w-full overflow-hidden leading-none pointer-events-none -mt-1 z-10">
                <svg class="relative block w-full h-8 sm:h-12 text-[#0f2e0f]" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="currentColor">
                    <path d="M1200,120 C900,50 600,110 300,55 C150,30 50,80 0,100 L0,0 L1200,0 Z"></path>
                </svg>
            </div>

            {{-- Fasilitas --}}
            <section id="fasilitas" class="relative mx-auto max-w-6xl px-4 py-16 sm:py-20 sm:px-6 lg:px-8">
                <!-- Ambient Spotlight Glow Behind 3D Carousel -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[360px] rounded-full bg-emerald-200/40 blur-3xl pointer-events-none dark:bg-emerald-900/20"></div>

                <!-- Floating Parallax Islamic Ornaments -->
                <img src="{{ asset('assets/img/pattern5.png') }}" class="parallax-float absolute top-10 left-4 w-28 sm:w-36 opacity-20 pointer-events-none" data-speed="0.12" alt="" aria-hidden="true">
                <img src="{{ asset('assets/img/pattern6.png') }}" class="parallax-float absolute bottom-8 right-6 w-28 sm:w-36 opacity-20 pointer-events-none" data-speed="-0.1" alt="" aria-hidden="true">

                <div class="relative text-center reveal-init">
                    <span class="section-badge inline-block rounded-full bg-hijau4 px-3.5 py-1 text-xs font-semibold tracking-wider uppercase text-hijau1 border border-hijau3/30 mb-2 dark:bg-white/10 dark:text-emerald-300">
                        Kenyamanan Beribadah
                    </span>
                    <h2 class="text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl dark:text-white" style="font-family: Poppins, sans-serif;">
                        Fasilitas Masjid
                    </h2>
                    <p class="mx-auto mt-2 max-w-md text-sm text-black/60 dark:text-white/60">
                        Geser atau klik kartu untuk melihat berbagai sarana dan prasarana jamaah.
                    </p>
                </div>

                <!-- 3D Card Stack Carousel -->
                <div class="relative mt-8 sm:mt-12 reveal-zoom-in delay-200">
                    <div id="fasilitas-3d" class="card-3d-stage relative h-[360px] sm:h-[420px] md:h-[460px] w-full overflow-hidden select-none">
                        {{-- Facility 1: GSM --}}
                        <div class="facility-card w-[82%] sm:w-[58%] md:w-[48%] max-w-[520px] aspect-[16/11] sm:aspect-[16/10] rounded-2xl sm:rounded-3xl overflow-hidden bg-slate-900 border border-slate-100/30">
                            <img src="{{ asset('assets/img/GSM.jpg') }}" class="h-full w-full object-cover" alt="Gedung Serba Guna" decoding="async">
                            <div class="card-dimmer absolute inset-0 bg-black/45 transition-opacity duration-300"></div>
                            <div class="card-caption absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/90 via-black/40 to-transparent p-5 sm:p-7 transition-opacity duration-300">
                                <span class="inline-block w-fit rounded-full bg-white/20 px-3 py-0.5 text-[11px] font-semibold text-emerald-200 backdrop-blur-md mb-2">
                                    Fasilitas 1 dari 6
                                </span>
                                <h3 class="text-lg sm:text-2xl font-bold text-white tracking-tight leading-snug" style="font-family: Poppins, sans-serif;">
                                    Gedung Serba Guna
                                </h3>
                                <p class="mt-1 text-xs sm:text-sm text-white/85 line-clamp-2 leading-relaxed">
                                    Gedung representatif untuk pernikahan, pengajian akbar, dan peringatan hari besar Islam.
                                </p>
                            </div>
                        </div>

                        {{-- Facility 2: Tempat Sholat --}}
                        <div class="facility-card w-[82%] sm:w-[58%] md:w-[48%] max-w-[520px] aspect-[16/11] sm:aspect-[16/10] rounded-2xl sm:rounded-3xl overflow-hidden bg-slate-900 border border-slate-100/30">
                            <img src="{{ asset('assets/img/tempatsholat.jpg') }}" class="h-full w-full object-cover" alt="Tempat Sholat" loading="lazy" decoding="async">
                            <div class="card-dimmer absolute inset-0 bg-black/45 transition-opacity duration-300"></div>
                            <div class="card-caption absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/90 via-black/40 to-transparent p-5 sm:p-7 transition-opacity duration-300">
                                <span class="inline-block w-fit rounded-full bg-white/20 px-3 py-0.5 text-[11px] font-semibold text-emerald-200 backdrop-blur-md mb-2">
                                    Fasilitas 2 dari 6
                                </span>
                                <h3 class="text-lg sm:text-2xl font-bold text-white tracking-tight leading-snug" style="font-family: Poppins, sans-serif;">
                                    Tempat Sholat
                                </h3>
                                <p class="mt-1 text-xs sm:text-sm text-white/85 line-clamp-2 leading-relaxed">
                                    Ruang sholat 2 lantai yang sejuk dan luas dengan karpet lembut, berkapasitas ratusan jamaah.
                                </p>
                            </div>
                        </div>

                        {{-- Facility 3: Keranda Jenazah --}}
                        <div class="facility-card w-[82%] sm:w-[58%] md:w-[48%] max-w-[520px] aspect-[16/11] sm:aspect-[16/10] rounded-2xl sm:rounded-3xl overflow-hidden bg-slate-900 border border-slate-100/30">
                            <img src="{{ asset('assets/img/keranda.jpg') }}" class="h-full w-full object-cover" alt="Keranda Jenazah" loading="lazy" decoding="async">
                            <div class="card-dimmer absolute inset-0 bg-black/45 transition-opacity duration-300"></div>
                            <div class="card-caption absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/90 via-black/40 to-transparent p-5 sm:p-7 transition-opacity duration-300">
                                <span class="inline-block w-fit rounded-full bg-white/20 px-3 py-0.5 text-[11px] font-semibold text-emerald-200 backdrop-blur-md mb-2">
                                    Fasilitas 3 dari 6
                                </span>
                                <h3 class="text-lg sm:text-2xl font-bold text-white tracking-tight leading-snug" style="font-family: Poppins, sans-serif;">
                                    Keranda Jenazah
                                </h3>
                                <p class="mt-1 text-xs sm:text-sm text-white/85 line-clamp-2 leading-relaxed">
                                    Keranda dan perlengkapan pemulasaraan jenazah lengkap serta mobil ambulans untuk warga.
                                </p>
                            </div>
                        </div>

                        {{-- Facility 4: Kain Kafan --}}
                        <div class="facility-card w-[82%] sm:w-[58%] md:w-[48%] max-w-[520px] aspect-[16/11] sm:aspect-[16/10] rounded-2xl sm:rounded-3xl overflow-hidden bg-slate-900 border border-slate-100/30">
                            <img src="{{ asset('assets/img/kainkafan.jpg') }}" class="h-full w-full object-cover" alt="Kain Kafan" loading="lazy" decoding="async">
                            <div class="card-dimmer absolute inset-0 bg-black/45 transition-opacity duration-300"></div>
                            <div class="card-caption absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/90 via-black/40 to-transparent p-5 sm:p-7 transition-opacity duration-300">
                                <span class="inline-block w-fit rounded-full bg-white/20 px-3 py-0.5 text-[11px] font-semibold text-emerald-200 backdrop-blur-md mb-2">
                                    Fasilitas 4 dari 6
                                </span>
                                <h3 class="text-lg sm:text-2xl font-bold text-white tracking-tight leading-snug" style="font-family: Poppins, sans-serif;">
                                    Kain Kafan
                                </h3>
                                <p class="mt-1 text-xs sm:text-sm text-white/85 line-clamp-2 leading-relaxed">
                                    Persediaan kain kafan, wewangian, dan perlengkapan memandikan jenazah selalu siap siaga.
                                </p>
                            </div>
                        </div>

                        {{-- Facility 5: Toilet & Wudhu --}}
                        <div class="facility-card w-[82%] sm:w-[58%] md:w-[48%] max-w-[520px] aspect-[16/11] sm:aspect-[16/10] rounded-2xl sm:rounded-3xl overflow-hidden bg-slate-900 border border-slate-100/30">
                            <img src="{{ asset('assets/img/toilet.jpg') }}" class="h-full w-full object-cover" alt="Toilet & Tempat Wudhu" loading="lazy" decoding="async">
                            <div class="card-dimmer absolute inset-0 bg-black/45 transition-opacity duration-300"></div>
                            <div class="card-caption absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/90 via-black/40 to-transparent p-5 sm:p-7 transition-opacity duration-300">
                                <span class="inline-block w-fit rounded-full bg-white/20 px-3 py-0.5 text-[11px] font-semibold text-emerald-200 backdrop-blur-md mb-2">
                                    Fasilitas 5 dari 6
                                </span>
                                <h3 class="text-lg sm:text-2xl font-bold text-white tracking-tight leading-snug" style="font-family: Poppins, sans-serif;">
                                    Toilet & Tempat Wudhu
                                </h3>
                                <p class="mt-1 text-xs sm:text-sm text-white/85 line-clamp-2 leading-relaxed">
                                    Toilet dan wudhu terpisah: laki-laki di lantai bawah dan perempuan di lantai atas, bersih dan higienis.
                                </p>
                            </div>
                        </div>

                        {{-- Facility 6: AC --}}
                        <div class="facility-card w-[82%] sm:w-[58%] md:w-[48%] max-w-[520px] aspect-[16/11] sm:aspect-[16/10] rounded-2xl sm:rounded-3xl overflow-hidden bg-slate-900 border border-slate-100/30">
                            <img src="{{ asset('assets/img/AC.jpg') }}" class="h-full w-full object-cover" alt="Pendingin Ruangan AC" loading="lazy" decoding="async">
                            <div class="card-dimmer absolute inset-0 bg-black/45 transition-opacity duration-300"></div>
                            <div class="card-caption absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/90 via-black/40 to-transparent p-5 sm:p-7 transition-opacity duration-300">
                                <span class="inline-block w-fit rounded-full bg-white/20 px-3 py-0.5 text-[11px] font-semibold text-emerald-200 backdrop-blur-md mb-2">
                                    Fasilitas 6 dari 6
                                </span>
                                <h3 class="text-lg sm:text-2xl font-bold text-white tracking-tight leading-snug" style="font-family: Poppins, sans-serif;">
                                    Pendingin Ruangan (AC)
                                </h3>
                                <p class="mt-1 text-xs sm:text-sm text-white/85 line-clamp-2 leading-relaxed">
                                    Seluruh area utama masjid dilengkapi penyejuk udara sejuk agar jamaah khusyuk beribadah.
                                </p>
                            </div>
                        </div>

                        <!-- Prev Button -->
                        <button type="button" id="fas-prev-btn" aria-label="Fasilitas sebelumnya"
                            class="absolute left-1 sm:left-4 top-1/2 z-40 flex h-11 w-11 sm:h-12 sm:w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-hijau1 shadow-xl backdrop-blur-md transition-all duration-300 hover:scale-110 hover:bg-white active:scale-95">
                            <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                        </button>
                        <!-- Next Button -->
                        <button type="button" id="fas-next-btn" aria-label="Fasilitas berikutnya"
                            class="absolute right-1 sm:right-4 top-1/2 z-40 flex h-11 w-11 sm:h-12 sm:w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-hijau1 shadow-xl backdrop-blur-md transition-all duration-300 hover:scale-110 hover:bg-white active:scale-95">
                            <svg class="h-5 w-5 sm:h-6 sm:w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </button>
                    </div>

                    <!-- Dots indicator -->
                    <div id="fasilitas-dots" class="mt-6 flex items-center justify-center gap-2"></div>
                </div>
            </section>


            <section id="galeri" class="relative py-20 overflow-hidden bg-gradient-to-b from-emerald-50/70 via-hijau4/40 to-emerald-50/70 dark:bg-white/5">
                <!-- Ambient Glow Blobs -->
                <div class="absolute -top-12 right-1/4 w-80 h-80 rounded-full bg-emerald-200/30 blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-10 left-1/4 w-80 h-80 rounded-full bg-amber-100/40 blur-3xl pointer-events-none"></div>

                <!-- Floating Parallax Islamic Ornament -->
                <img src="{{ asset('assets/img/pattern3.png') }}" class="parallax-float absolute top-8 right-8 w-32 opacity-15 pointer-events-none" data-speed="0.09" alt="" aria-hidden="true">

                <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="text-center reveal-init">
                        <span class="section-badge inline-block rounded-full bg-white px-3.5 py-1 text-xs font-semibold tracking-wider uppercase text-hijau1 border border-hijau2/20 mb-2 shadow-xs dark:bg-white/10 dark:text-emerald-300">
                            Dokumentasi & Arsip
                        </span>
                        <h2 class="text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl dark:text-white" style="font-family: Poppins, sans-serif;">
                            Galeri Masjid
                        </h2>
                        <p class="mt-2 text-sm text-black/60 dark:text-white/60">Klik pada salah satu foto untuk melihat dalam resolusi penuh.</p>
                    </div>

                    @php
                        $spanPatterns = [
                            'col-span-2 row-span-2',
                            'col-span-1 row-span-1',
                            'col-span-1 row-span-1',
                            'col-span-2 row-span-1',
                            'col-span-1 row-span-1',
                            'col-span-1 row-span-1',
                        ];
                        $animPatterns = ['reveal-left', 'reveal-flip', 'reveal-zoom-in', 'reveal-right', 'reveal-scale', 'reveal-flip'];
                    @endphp

                        @if(isset($galleryPhotos) && $galleryPhotos->isNotEmpty())
                            @php
                                $photoCount = $galleryPhotos->count();
                            @endphp

                            @if($photoCount === 1)
                                <div class="mt-10 max-w-2xl mx-auto">
                                    @php $photo = $galleryPhotos->first(); @endphp
                                    <div class="gallery-card group relative overflow-hidden rounded-3xl cursor-pointer reveal-init shadow-md aspect-[16/10]"
                                        data-img="{{ $photo->image_url }}"
                                        data-title="{{ $photo->judul }}">
                                        <img class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                                            src="{{ $photo->image_url }}" alt="{{ $photo->judul }}"
                                            loading="lazy" decoding="async">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100 flex flex-col justify-end p-6">
                                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-white">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                                Buka Gambar
                                            </span>
                                            <span class="text-sm text-white/95 mt-1 font-medium">{{ $photo->judul }}</span>
                                        </div>
                                    </div>
                                </div>
                            @elseif($photoCount === 2)
                                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-4xl mx-auto">
                                    @foreach ($galleryPhotos as $idx => $photo)
                                        <div class="gallery-card group relative overflow-hidden rounded-2xl cursor-pointer reveal-init delay-{{ ($idx + 1) * 100 }} shadow-sm aspect-[16/10] hover:shadow-xl transition-all duration-300"
                                            data-img="{{ $photo->image_url }}"
                                            data-title="{{ $photo->judul }}">
                                            <img class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                                src="{{ $photo->image_url }}" alt="{{ $photo->judul }}"
                                                loading="lazy" decoding="async">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100 flex flex-col justify-end p-4">
                                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-white">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                                    Buka Gambar
                                                </span>
                                                <span class="text-xs text-white/90 line-clamp-1 mt-0.5 font-medium">{{ $photo->judul }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif($photoCount === 3)
                                <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    @foreach ($galleryPhotos as $idx => $photo)
                                        <div class="gallery-card group relative overflow-hidden rounded-2xl cursor-pointer reveal-init delay-{{ ($idx + 1) * 100 }} shadow-sm aspect-[4/3] hover:shadow-xl transition-all duration-300"
                                            data-img="{{ $photo->image_url }}"
                                            data-title="{{ $photo->judul }}">
                                            <img class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                                src="{{ $photo->image_url }}" alt="{{ $photo->judul }}"
                                                loading="lazy" decoding="async">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100 flex flex-col justify-end p-4">
                                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-white">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                                    Buka Gambar
                                                </span>
                                                <span class="text-xs text-white/90 line-clamp-1 mt-0.5 font-medium">{{ $photo->judul }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="mt-10 grid grid-flow-dense auto-rows-[130px] grid-cols-2 gap-3 sm:auto-rows-[150px] sm:grid-cols-4 sm:gap-4 lg:auto-rows-[170px]">
                                    @foreach ($galleryPhotos as $idx => $photo)
                                        @php
                                            $span = $spanPatterns[$idx % count($spanPatterns)];
                                            $anim = $animPatterns[$idx % count($animPatterns)];
                                        @endphp
                                        <div class="gallery-card group relative overflow-hidden rounded-2xl cursor-pointer {{ $anim }} delay-{{ (($idx % 6) + 1) * 100 }} {{ $span }} shadow-sm transition-all duration-300 hover:shadow-xl"
                                            data-img="{{ $photo->image_url }}"
                                            data-title="{{ $photo->judul }}">
                                            <img class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                                src="{{ $photo->image_url }}" alt="{{ $photo->judul }}"
                                                loading="lazy" decoding="async">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100 flex flex-col justify-end p-4">
                                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-white">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                                    Buka Gambar
                                                </span>
                                                <span class="text-xs text-white/90 line-clamp-1 mt-0.5 font-medium">{{ $photo->judul }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="mt-10 grid grid-flow-dense auto-rows-[130px] grid-cols-2 gap-3 sm:auto-rows-[150px] sm:grid-cols-4 sm:gap-4 lg:auto-rows-[170px]">
                                @php
                                    $tiles = [
                                        ['n' => 2, 'span' => 'col-span-2 row-span-2', 'title' => 'Sholat Berjamaah & Kajian Rutin', 'anim' => 'reveal-left'],
                                        ['n' => 3, 'span' => 'col-span-1 row-span-1', 'title' => 'Kegiatan Hari Besar Islam', 'anim' => 'reveal-flip'],
                                        ['n' => 1, 'span' => 'col-span-1 row-span-1', 'title' => 'Tampak Depan Pelataran Masjid', 'anim' => 'reveal-zoom-in'],
                                        ['n' => 4, 'span' => 'col-span-2 row-span-1', 'title' => 'Penyaluran Santunan Anak Yatim', 'anim' => 'reveal-right'],
                                        ['n' => 6, 'span' => 'col-span-1 row-span-1', 'title' => 'Keluarga Jamaah Beribadah', 'anim' => 'reveal-scale'],
                                        ['n' => 5, 'span' => 'col-span-1 row-span-1', 'title' => 'Majelis Taklim & Pengajian Ibu-Ibu', 'anim' => 'reveal-flip'],
                                    ];
                                @endphp
                                @foreach ($tiles as $idx => $tile)
                                    <div class="gallery-card group relative overflow-hidden rounded-2xl cursor-pointer {{ $tile['anim'] }} delay-{{ ($idx + 1) * 100 }} {{ $tile['span'] }} shadow-sm transition-all duration-300 hover:shadow-xl"
                                        data-img="{{ asset('assets/img/galeri' . $tile['n'] . '.jpg') }}"
                                        data-title="{{ $tile['title'] }}">
                                        <img class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                                            src="{{ asset('assets/img/galeri' . $tile['n'] . '.jpg') }}" alt="{{ $tile['title'] }}"
                                            loading="lazy" decoding="async">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100 flex flex-col justify-end p-4">
                                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-white">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                                Buka Gambar
                                            </span>
                                            <span class="text-xs text-white/90 line-clamp-1 mt-0.5 font-medium">{{ $tile['title'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    <!-- Sub-section: Video Dokumentasi & Kajian YouTube -->
                    <div class="mt-20 pt-16 border-t border-emerald-900/10 dark:border-white/10">
                        <div class="text-center reveal-init mb-10">
                            <span class="section-badge inline-flex items-center gap-1.5 rounded-full bg-rose-50 px-3.5 py-1 text-xs font-semibold tracking-wider uppercase text-rose-600 border border-rose-200/60 mb-2 dark:bg-rose-950/40 dark:text-rose-300">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                </svg>
                                Video Kegiatan & Kajian
                            </span>
                            <h3 class="text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl dark:text-white" style="font-family: Poppins, sans-serif;">
                                Video YouTube Masjid
                            </h3>
                            <p class="mt-2 text-sm text-black/60 dark:text-white/60">Tonton rekaman kajian, khutbah, dan dokumentasi kegiatan terkini.</p>
                        </div>

                        @if(isset($galleryVideos) && $galleryVideos->isNotEmpty())
                            @php
                                $videoCount = $galleryVideos->count();
                                $videoGridClass = match($videoCount) {
                                    1 => 'max-w-xl mx-auto',
                                    2 => 'grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto',
                                    default => 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6',
                                };
                            @endphp
                            <div class="{{ $videoGridClass }}">
                                @foreach($galleryVideos as $video)
                                    <div class="bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-emerald-100/60 dark:border-white/10 flex flex-col justify-between group">
                                        <!-- Video Embed Responsive -->
                                        <div class="relative aspect-video w-full bg-black overflow-hidden">
                                            <iframe class="w-full h-full"
                                                src="{{ $video->youtube_embed_url }}"
                                                title="{{ $video->judul }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen
                                                loading="lazy">
                                            </iframe>
                                        </div>
                                        <div class="p-5 flex-1 flex flex-col justify-between">
                                            <div>
                                                <h4 class="font-bold text-base text-slate-800 dark:text-white line-clamp-2 group-hover:text-hijau1 transition" title="{{ $video->judul }}">
                                                    {{ $video->judul }}
                                                </h4>
                                                @if($video->keterangan)
                                                    <p class="mt-2 text-xs text-slate-600 dark:text-slate-300 line-clamp-2 leading-relaxed">
                                                        {{ $video->keterangan }}
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="mt-4 pt-3 border-t border-slate-100 dark:border-slate-700/60 flex items-center justify-between">
                                                <span class="text-xs text-slate-400">
                                                    {{ $video->created_at->format('d M Y') }}
                                                </span>
                                                <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener noreferrer"
                                                    class="inline-flex items-center gap-1 text-xs font-semibold text-rose-600 hover:text-rose-700 dark:text-rose-400 transition">
                                                    <span>Tonton di YouTube</span>
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-white/80 dark:bg-white/5 backdrop-blur-sm rounded-3xl p-8 border border-dashed border-slate-200 dark:border-white/10 text-center max-w-lg mx-auto">
                                <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 dark:bg-rose-950/40 dark:text-rose-400 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                    </svg>
                                </div>
                                <h4 class="text-sm font-bold text-slate-800 dark:text-white">Video Dokumentasi Belum Ditambahkan</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                    Admin media dapat menambahkan video YouTube melalui Dashboard Admin.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </section>


            <section id="lokasi" class="relative mx-auto max-w-6xl px-4 py-20 sm:px-6 lg:px-8 overflow-hidden">
                <!-- Ambient Glow Blobs -->
                <div class="absolute top-1/3 -left-12 w-80 h-80 rounded-full bg-emerald-200/35 blur-3xl pointer-events-none dark:bg-emerald-900/15"></div>
                <div class="absolute bottom-10 -right-12 w-96 h-96 rounded-full bg-emerald-100/40 blur-3xl pointer-events-none dark:bg-emerald-900/15"></div>

                <!-- Floating Parallax Islamic Ornament -->
                <img src="{{ asset('assets/img/pattern2.png') }}" class="parallax-float absolute bottom-6 left-8 w-32 opacity-15 pointer-events-none rotate-12" data-speed="-0.08" alt="" aria-hidden="true">

                <div class="relative text-center reveal-init">
                    <span class="section-badge inline-block rounded-full bg-hijau4 px-3.5 py-1 text-xs font-semibold tracking-wider uppercase text-hijau1 border border-hijau3/30 mb-2 dark:bg-white/10 dark:text-emerald-300">
                        Peta & Kontak
                    </span>
                    <h2 class="text-2xl font-bold uppercase tracking-wide text-hijau1 sm:text-3xl dark:text-white" style="font-family: Poppins, sans-serif;">
                        Lokasi Masjid
                    </h2>
                </div>

                <div class="mt-10 grid gap-6 lg:grid-cols-3 items-stretch">
                    <div class="reveal-left delay-200 rounded-3xl bg-hijau1 p-8 text-white lg:col-span-1 shadow-xl flex flex-col justify-between">
                        <div>
                            <div class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-3 py-1.5 text-xs font-semibold text-emerald-200 mb-4 border border-white/10">
                                <span>📍 Lokasi Strategis</span>
                            </div>
                            <h3 class="font-bold text-lg text-white" style="font-family: Poppins, sans-serif;">Alamat Lengkap</h3>
                            <p class="mt-2 text-sm text-white/85 leading-relaxed">
                                Jl. Ir. H. Juanda No. Km.2, RW.16, Kel. Baktijaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16418.
                            </p>
                            <h3 class="mt-6 font-bold text-lg text-white" style="font-family: Poppins, sans-serif;">Kontak & Layanan</h3>
                            <a href="https://wa.me/{{ $masjidWaNumber }}" target="_blank" rel="noopener"
                                class="mt-2 inline-flex items-center gap-2 text-sm text-emerald-300 hover:text-white transition font-medium hover:underline">
                                <span>💬</span> {{ $masjidWaDisplay }} (WhatsApp)
                            </a>
                        </div>
                        <div class="mt-8 pt-6 border-t border-white/10 text-xs text-white/60">
                            Masjid buka 24 jam untuk jamaah yang ingin menunaikan ibadah sholat dan i'tikaf.
                        </div>
                    </div>
                    <div class="reveal-right delay-200 overflow-hidden rounded-3xl lg:col-span-2 shadow-xl border border-slate-100 min-h-[320px]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4368505855245!2d106.8479536!3d-6.3799304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec77d6134e97%3A0xf5bedde41bf5124e!2sMasjid%20Jami'%20At-Taubah!5e0!3m2!1sen!2sid!4v1612309600000!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0; min-height: 350px;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-hijau1 text-white/70">
            <div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="reveal-init delay-100">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/img/logoMasjid.png') }}" alt="Logo Masjid" class="h-10 w-10" loading="lazy" decoding="async">
                            <span class="font-semibold text-white" style="font-family: Poppins, sans-serif;">Masjid Jami At Taubah</span>
                        </div>
                        <p class="mt-3 text-sm">Rumah ibadah dan pusat kegiatan warga di Juanda, Kota Depok.</p>
                    </div>
                    <div class="reveal-init delay-200">
                        <h4 class="font-semibold text-white">Jelajahi</h4>
                        <ul class="mt-3 space-y-2 text-sm">
                            <li><a href="#jadwalSholat" class="hover:text-white hover:underline">Jadwal Sholat</a></li>
                            <li><a href="#layanan" class="hover:text-white hover:underline">Layanan</a></li>
                            <li><a href="#fasilitas" class="hover:text-white hover:underline">Fasilitas</a></li>
                            <li><a href="#galeri" class="hover:text-white hover:underline">Galeri</a></li>
                        </ul>
                    </div>
                    <div class="reveal-init delay-300">
                        <h4 class="font-semibold text-white">Kontak</h4>
                        <ul class="mt-3 space-y-2 text-sm">
                            <li><a href="https://wa.me/{{ $masjidWaNumber }}" class="hover:text-white hover:underline">WhatsApp Pengurus</a></li>
                            <li><a href="#lokasi" class="hover:text-white hover:underline">Lihat Lokasi</a></li>
                        </ul>
                    </div>
                    <div class="reveal-init delay-400">
                        <h4 class="font-semibold text-white">Dukung Masjid</h4>
                        <p class="mt-3 text-sm">Ikut berkontribusi lewat donasi atau penggalangan dana masjid.</p>
                        <a href="#layanan" class="mt-3 inline-block rounded-full bg-white px-5 py-2 text-sm font-semibold text-hijau1 hover:bg-emerald-50 transition-colors">
                            Donasi Sekarang
                        </a>
                    </div>
                </div>
                <div class="mt-10 border-t border-white/10 pt-6 text-center text-xs text-white/50">
                    © {{ date('Y') }} Masjid Jami At Taubah — Juanda, Kota Depok.
                </div>
            </div>
        </footer>


        <div id="gallery-lightbox" class="fixed inset-0 z-50 flex items-center justify-center bg-black/85 p-4 opacity-0 pointer-events-none transition-all duration-300 backdrop-blur-md" role="dialog" aria-modal="true" aria-hidden="true">
            <div id="lightbox-container" class="relative max-w-4xl max-h-[90vh] overflow-hidden rounded-3xl bg-black/40 p-2 shadow-2xl scale-95 transition-transform duration-300 flex flex-col items-center">
                <button id="lightbox-close" type="button" aria-label="Tutup"
                    class="absolute top-4 right-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-black/60 text-white backdrop-blur-sm transition-all hover:bg-white hover:text-black hover:rotate-90">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <img id="lightbox-img" src="" alt="Preview Foto Galeri" class="max-h-[75vh] w-auto rounded-2xl object-contain shadow-md">
                <p id="lightbox-caption" class="mt-3 text-center text-sm font-semibold text-white/95 px-4 pb-1"></p>
            </div>
        </div>


        <button id="back-to-top" type="button" aria-label="Kembali ke atas"
            class="fixed bottom-6 right-6 z-40 flex h-12 w-12 items-center justify-center rounded-full bg-hijau1 text-white shadow-2xl shadow-hijau1/40 border border-white/20 transition-all duration-300 hover:scale-110 hover:bg-hijau2 opacity-0 pointer-events-none translate-y-8 group">
            <svg class="h-5 w-5 transition-transform duration-300 group-hover:-translate-y-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7"/>
            </svg>
        </button>
    </div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nav = document.getElementById('site-navbar');
        window.addEventListener('scroll', () => {
            if (nav) {
                nav.classList.toggle('navbar-shadow', window.scrollY > 8);
                nav.classList.toggle('navbar-scrolled', window.scrollY > 15);
            }
        }, { passive: true });


        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', () => {
                const isOpen = !mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden');
                if (iconOpen) iconOpen.classList.toggle('hidden', !isOpen);
                if (iconClose) iconClose.classList.toggle('hidden', isOpen);
                menuToggle.setAttribute('aria-expanded', String(!isOpen));
            });
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    if (iconOpen) iconOpen.classList.remove('hidden');
                    if (iconClose) iconClose.classList.add('hidden');
                });
            });
        }


        const desktopNavLinks = document.querySelectorAll('#desktop-nav .nav-link');
        const mobileNavLinks = document.querySelectorAll('#mobile-menu .mobile-nav-link');
        const navSections = [
            document.getElementById('beranda'),
            document.getElementById('jadwalSholat'),
            document.getElementById('layanan'),
            document.getElementById('fasilitas'),
            document.getElementById('galeri'),
            document.getElementById('lokasi')
        ].filter(Boolean);

        function updateActiveNavbar(activeId) {
            desktopNavLinks.forEach(link => {
                const targetId = (link.getAttribute('href') || '').replace('#', '');
                if (targetId === activeId) {
                    link.className = 'nav-link rounded-full px-4 py-2 text-sm font-semibold transition-all duration-300 bg-hijau1 text-white shadow-md shadow-hijau1/25 ring-2 ring-hijau1/20';
                } else {
                    link.className = 'nav-link rounded-full px-4 py-2 text-sm font-medium transition-all duration-200 text-black/70 hover:bg-hijau4/80 hover:text-hijau1 dark:text-white/70';
                }
            });

            mobileNavLinks.forEach(link => {
                const targetId = (link.getAttribute('href') || '').replace('#', '');
                if (targetId === activeId) {
                    link.className = 'mobile-nav-link block py-3 text-sm font-bold bg-hijau4/70 text-hijau1 pl-3 border-l-4 border-hijau1 rounded-r-md transition-all duration-200';
                } else {
                    link.className = 'mobile-nav-link block py-3 text-sm font-medium text-black/70 hover:bg-black/5 hover:text-hijau1 pl-2 transition-all duration-200 dark:text-white/70';
                }
            });
        }

        const backToTopBtn = document.getElementById('back-to-top');
        const parallaxItems = document.querySelectorAll('.parallax-float, .parallax-motif');

        function handleScrollEffects() {
            // Per-section active in-view and continuous relative parallax
            const viewportCenter = window.innerHeight / 2;

            navSections.forEach(section => {
                const rect = section.getBoundingClientRect();
                const inView = rect.top < window.innerHeight * 0.82 && rect.bottom > window.innerHeight * 0.18;
                if (inView) {
                    section.classList.add('section-in-view');
                } else if (rect.top > window.innerHeight || rect.bottom < 0) {
                    section.classList.remove('section-in-view');
                }

                // Continuous parallax motion for motifs and ornaments within each section
                const sectionCenter = rect.top + rect.height / 2;
                const distFromCenter = sectionCenter - viewportCenter;

                const sectionParallax = section.querySelectorAll('.parallax-float, .parallax-motif');
                sectionParallax.forEach(el => {
                    const speed = parseFloat(el.getAttribute('data-speed') || '0.08');
                    const translateY = Math.round(distFromCenter * speed);
                    const isRotate45 = el.classList.contains('rotate-45');
                    const isRotate90 = el.classList.contains('rotate-90');
                    const isRotate12 = el.classList.contains('rotate-12');

                    let rot = '';
                    if (isRotate45) rot = ' rotate(45deg)';
                    else if (isRotate90) rot = ' rotate(90deg)';
                    else if (isRotate12) rot = ' rotate(12deg)';

                    el.style.transform = `translate3d(0, ${translateY}px, 0)${rot}`;
                });
            });
        }

        function handleScrollspy() {
            handleScrollEffects();
            const scrollPos = window.scrollY + 140; // Navbar offset
            let currentId = 'beranda';

            navSections.forEach(section => {
                const top = section.offsetTop;
                const height = section.offsetHeight;
                if (scrollPos >= top && scrollPos < top + height) {
                    currentId = section.getAttribute('id');
                }
            });

            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 70) {
                currentId = 'lokasi';
            }

            updateActiveNavbar(currentId);

            if (backToTopBtn) {
                if (window.scrollY > 350) {
                    backToTopBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-8');
                    backToTopBtn.classList.add('opacity-100', 'translate-y-0');
                } else {
                    backToTopBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-8');
                    backToTopBtn.classList.remove('opacity-100', 'translate-y-0');
                }
            }
        }

        window.addEventListener('scroll', handleScrollspy, { passive: true });
        handleScrollspy();

        if (backToTopBtn) {
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        const revealElements = document.querySelectorAll('.reveal-init, .reveal-up, .reveal-left, .reveal-right, .reveal-scale, .reveal-flip, .reveal-zoom-in');
        if ('IntersectionObserver' in window) {
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -30px 0px'
            });

            revealElements.forEach(el => revealObserver.observe(el));
        } else {
            revealElements.forEach(el => el.classList.add('revealed'));
        }

        const today = new Date();
        const pad = (n) => String(n).padStart(2, '0');
        const tanggal = `${today.getFullYear()}-${pad(today.getMonth() + 1)}-${pad(today.getDate())}`;

        fetch(`https://api.myquran.com/v2/sholat/jadwal/1225/${tanggal}`)
            .then(res => res.json())
            .then(data => {
                const jadwal = data.data.jadwal;
                const dateEl = document.getElementById('date_sholat');
                if (dateEl) dateEl.textContent = jadwal.tanggal;

                const keys = ['imsak', 'subuh', 'dzuhur', 'ashar', 'maghrib', 'isya'];
                const prayerNames = {
                    imsak: 'Imsak',
                    subuh: 'Subuh',
                    dzuhur: 'Dzuhur',
                    ashar: 'Ashar',
                    maghrib: 'Maghrib',
                    isya: 'Isya'
                };

                let activeKey = null;
                const nowMinutes = today.getHours() * 60 + today.getMinutes();

                keys.forEach(key => {
                    const el = document.querySelector('.' + key);
                    if (el) el.textContent = jadwal[key];

                    const [h, m] = jadwal[key].split(':').map(Number);
                    const minutes = h * 60 + m;
                    if (minutes <= nowMinutes) activeKey = key;
                });

                if (activeKey) {
                    const card = document.querySelector(`.jadwal-card[data-key="${activeKey}"]`);
                    if (card) {
                        card.classList.add('prayer-active');

                        if (!card.querySelector('.active-badge')) {
                            const badge = document.createElement('span');
                            badge.className = 'active-badge mt-2 inline-flex items-center gap-1 rounded-full bg-white/20 text-white text-[10px] px-2.5 py-0.5 font-bold shadow-sm backdrop-blur-sm';
                            badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-emerald-200 animate-pulse"></span> Waktu Ini';
                            card.appendChild(badge);
                        }
                    }
                }


                function startPrayerClock() {
                    function tick() {
                        const now = new Date();
                        const timeStr = `${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())} WIB`;
                        const clockEl = document.getElementById('live-clock');
                        if (clockEl) clockEl.textContent = timeStr;

                        const curMin = now.getHours() * 60 + now.getMinutes();
                        const curSec = curMin * 60 + now.getSeconds();

                        let nextKey = null;
                        let nextMin = null;

                        for (const key of keys) {
                            if (jadwal[key]) {
                                const [h, m] = jadwal[key].split(':').map(Number);
                                const pMin = h * 60 + m;
                                if (pMin > curMin) {
                                    nextKey = key;
                                    nextMin = pMin;
                                    break;
                                }
                            }
                        }

                        const nextInfoEl = document.getElementById('next-prayer-info');
                        if (!nextInfoEl) return;

                        if (nextKey) {
                            const diffSec = (nextMin * 60) - curSec;
                            const diffH = Math.floor(diffSec / 3600);
                            const diffM = Math.floor((diffSec % 3600) / 60);
                            const diffS = diffSec % 60;

                            let countdown = '';
                            if (diffH > 0) countdown += `${diffH}j `;
                            if (diffM > 0 || diffH > 0) countdown += `${diffM}m `;
                            countdown += `${diffS}d`;

                            nextInfoEl.innerHTML = `Menuju <span class="font-bold text-hijau1 dark:text-emerald-300">${prayerNames[nextKey]}</span> (${jadwal[nextKey]}): <span class="text-emerald-700 dark:text-emerald-400 font-bold">${countdown}</span>`;
                        } else {
                            nextInfoEl.innerHTML = `Waktu Isya telah masuk • Menuju <span class="font-bold text-hijau1 dark:text-emerald-300">Subuh</span> besok`;
                        }
                    }

                    tick();
                    setInterval(tick, 1000);
                }

                startPrayerClock();
            })
            .catch(() => {
                const dateEl = document.getElementById('date_sholat');
                if (dateEl) dateEl.textContent = 'Jadwal sholat terhubung';
            });

        // --- 6. Swiper Carousel for Layanan ---
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

        // --- 7. Fasilitas 3D Rotating Card Stack Carousel ---
        (function initFasilitas3D() {
            const root = document.getElementById('fasilitas-3d');
            if (!root) return;
            const cards = Array.from(root.querySelectorAll('.facility-card'));
            const dotsWrap = document.getElementById('fasilitas-dots');
            const total = cards.length;
            let current = 0;

            if (dotsWrap) {
                dotsWrap.innerHTML = '';
                cards.forEach((_, i) => {
                    const dot = document.createElement('button');
                    dot.type = 'button';
                    dot.setAttribute('aria-label', `Lihat fasilitas ${i + 1}`);
                    dot.className = 'h-2 rounded-full transition-all duration-300 ' + (i === 0 ? 'w-7 bg-hijau1' : 'w-2 bg-hijau2/30');
                    dot.addEventListener('click', () => update(i));
                    dotsWrap.appendChild(dot);
                });
            }

            function update(newIndex) {
                current = (newIndex + total) % total;
                const prevIndex = (current - 1 + total) % total;
                const nextIndex = (current + 1) % total;

                cards.forEach((card, i) => {
                    card.classList.remove('is-active', 'is-prev', 'is-next', 'is-hidden-left', 'is-hidden-right');
                    const dimmer = card.querySelector('.card-dimmer');
                    const caption = card.querySelector('.card-caption');

                    if (i === current) {
                        card.classList.add('is-active');
                        if (dimmer) {
                            dimmer.classList.add('opacity-0');
                            dimmer.classList.remove('opacity-100');
                        }
                        if (caption) {
                            caption.classList.remove('opacity-0');
                            caption.classList.add('opacity-100');
                        }
                    } else if (i === prevIndex) {
                        card.classList.add('is-prev');
                        if (dimmer) {
                            dimmer.classList.remove('opacity-0');
                            dimmer.classList.add('opacity-100');
                        }
                        if (caption) {
                            caption.classList.add('opacity-0');
                            caption.classList.remove('opacity-100');
                        }
                    } else if (i === nextIndex) {
                        card.classList.add('is-next');
                        if (dimmer) {
                            dimmer.classList.remove('opacity-0');
                            dimmer.classList.add('opacity-100');
                        }
                        if (caption) {
                            caption.classList.add('opacity-0');
                            caption.classList.remove('opacity-100');
                        }
                    } else {
                        card.classList.add(i < current ? 'is-hidden-left' : 'is-hidden-right');
                        if (dimmer) {
                            dimmer.classList.remove('opacity-0');
                            dimmer.classList.add('opacity-100');
                        }
                        if (caption) {
                            caption.classList.add('opacity-0');
                            caption.classList.remove('opacity-100');
                        }
                    }
                });

                if (dotsWrap) {
                    Array.from(dotsWrap.children).forEach((dot, i) => {
                        if (i === current) {
                            dot.className = 'h-2 w-7 rounded-full bg-hijau1 transition-all duration-300 shadow-sm';
                        } else {
                            dot.className = 'h-2 w-2 rounded-full bg-hijau2/30 transition-all duration-300 hover:bg-hijau2/60';
                        }
                    });
                }
            }

            cards.forEach((card, i) => {
                card.addEventListener('click', () => {
                    if (card.classList.contains('is-prev')) update(current - 1);
                    else if (card.classList.contains('is-next')) update(current + 1);
                });
            });

            const prevBtn = document.getElementById('fas-prev-btn');
            const nextBtn = document.getElementById('fas-next-btn');
            if (prevBtn) prevBtn.addEventListener('click', () => update(current - 1));
            if (nextBtn) nextBtn.addEventListener('click', () => update(current + 1));

            // Mobile touch swipe gestures
            let touchStartX = 0;
            let touchEndX = 0;
            root.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });
            root.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 40) {
                    if (diff > 0) update(current + 1);
                    else update(current - 1);
                }
            }, { passive: true });

            let autoTimer = setInterval(() => update(current + 1), 5000);
            root.addEventListener('mouseenter', () => clearInterval(autoTimer));
            root.addEventListener('mouseleave', () => autoTimer = setInterval(() => update(current + 1), 5000));

            update(0);
        })();

        // --- 8. Gallery Interactive Lightbox ---
        const lightbox = document.getElementById('gallery-lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxCaption = document.getElementById('lightbox-caption');
        const lightboxClose = document.getElementById('lightbox-close');
        const lightboxContainer = document.getElementById('lightbox-container');

        function openLightbox(src, title) {
            if (!lightbox || !lightboxImg) return;
            lightboxImg.src = src;
            if (lightboxCaption) lightboxCaption.textContent = title || 'Dokumentasi Masjid Jami At Taubah';
            lightbox.classList.remove('opacity-0', 'pointer-events-none');
            lightbox.classList.add('opacity-100');
            lightbox.setAttribute('aria-hidden', 'false');
            if (lightboxContainer) {
                lightboxContainer.classList.remove('scale-95');
                lightboxContainer.classList.add('scale-100');
            }
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            if (!lightbox) return;
            lightbox.classList.remove('opacity-100');
            lightbox.classList.add('opacity-0', 'pointer-events-none');
            lightbox.setAttribute('aria-hidden', 'true');
            if (lightboxContainer) {
                lightboxContainer.classList.remove('scale-100');
                lightboxContainer.classList.add('scale-95');
            }
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.gallery-card').forEach(card => {
            card.addEventListener('click', () => {
                const src = card.getAttribute('data-img');
                const title = card.getAttribute('data-title');
                openLightbox(src, title);
            });
        });

        if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
        if (lightbox) {
            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) closeLightbox();
            });
        }
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && lightbox && !lightbox.classList.contains('opacity-0')) {
                closeLightbox();
            }
        });
    });
</script>
</body>
</html>
