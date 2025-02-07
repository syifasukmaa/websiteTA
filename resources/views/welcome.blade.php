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
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */
            *,
            ::after,
            ::before {
                box-sizing: border-box;
                border-width: 0;
                border-style: solid;
                border-color: #e5e7eb
            }

            ::after,
            ::before {
                --tw-content: ''
            }

            .swiper-slide img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-radius: 8px;
            }

            :host,
            html {
                line-height: 1.5;
                -webkit-text-size-adjust: 100%;
                -moz-tab-size: 4;
                tab-size: 4;
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
                font-feature-settings: normal;
                font-variation-settings: normal;
                -webkit-tap-highlight-color: transparent
            }

            body {
                margin: 0;
                line-height: inherit
            }

            hr {
                height: 0;
                color: inherit;
                border-top-width: 1px
            }

            abbr:where([title]) {
                -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-size: inherit;
                font-weight: inherit
            }

            a {
                color: inherit;
                text-decoration: inherit
            }

            b,
            strong {
                font-weight: bolder
            }

            code,
            kbd,
            pre,
            samp {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                font-feature-settings: normal;
                font-variation-settings: normal;
                font-size: 1em
            }

            small {
                font-size: 80%
            }

            sub,
            sup {
                font-size: 75%;
                line-height: 0;
                position: relative;
                vertical-align: baseline
            }

            sub {
                bottom: -.25em
            }

            sup {
                top: -.5em
            }

            table {
                text-indent: 0;
                border-color: inherit;
                border-collapse: collapse
            }

            button,
            input,
            optgroup,
            select,
            textarea {
                font-family: inherit;
                font-feature-settings: inherit;
                font-variation-settings: inherit;
                font-size: 100%;
                font-weight: inherit;
                line-height: inherit;
                color: inherit;
                margin: 0;
                padding: 0
            }

            button,
            select {
                text-transform: none
            }

            [type=button],
            [type=reset],
            [type=submit],
            button {
                -webkit-appearance: button;
                background-color: transparent;
                background-image: none
            }

            :-moz-focusring {
                outline: auto
            }

            :-moz-ui-invalid {
                box-shadow: none
            }

            progress {
                vertical-align: baseline
            }

            ::-webkit-inner-spin-button,
            ::-webkit-outer-spin-button {
                height: auto
            }

            [type=search] {
                -webkit-appearance: textfield;
                outline-offset: -2px
            }

            ::-webkit-search-decoration {
                -webkit-appearance: none
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit
            }

            summary {
                display: list-item
            }

            blockquote,
            dd,
            dl,
            figure,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            hr,
            p,
            pre {
                margin: 0
            }

            fieldset {
                margin: 0;
                padding: 0
            }

            legend {
                padding: 0
            }

            menu,
            ol,
            ul {
                list-style: none;
                margin: 0;
                padding: 0
            }

            dialog {
                padding: 0
            }

            textarea {
                resize: vertical
            }

            input::placeholder,
            textarea::placeholder {
                opacity: 1;
                color: #9ca3af
            }

            [role=button],
            button {
                cursor: pointer
            }

            :disabled {
                cursor: default
            }

            audio,
            canvas,
            embed,
            iframe,
            img,
            object,
            svg,
            video {
                display: block;
                vertical-align: middle
            }

            img,
            video {
                max-width: 100%;
                height: auto
            }

            [hidden] {
                display: none
            }

            *,
            ::before,
            ::after {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-gradient-from-position: ;
                --tw-gradient-via-position: ;
                --tw-gradient-to-position: ;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            ::backdrop {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-gradient-from-position: ;
                --tw-gradient-via-position: ;
                --tw-gradient-to-position: ;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia:
            }

            .absolute {
                position: absolute
            }

            .relative {
                position: relative
            }

            .-left-20 {
                left: -5rem
            }

            .top-0 {
                top: 0px
            }

            .-bottom-16 {
                bottom: -4rem
            }

            .-left-16 {
                left: -4rem
            }

            .-mx-3 {
                margin-left: -0.75rem;
                margin-right: -0.75rem
            }

            .mt-4 {
                margin-top: 1rem
            }

            .mt-6 {
                margin-top: 1.5rem
            }

            .flex {
                display: flex
            }

            .grid {
                display: grid
            }

            .hidden {
                display: none
            }

            .aspect-video {
                aspect-ratio: 16 / 9
            }

            .size-12 {
                width: 3rem;
                height: 3rem
            }

            .size-5 {
                width: 1.25rem;
                height: 1.25rem
            }

            .size-6 {
                width: 1.5rem;
                height: 1.5rem
            }

            .h-12 {
                height: 3rem
            }

            .h-40 {
                height: 10rem
            }

            .h-full {
                height: 100%
            }

            .min-h-screen {
                min-height: 100vh
            }

            .w-full {
                width: 100%
            }

            .w-\[calc\(100\%\+8rem\)\] {
                width: calc(100% + 8rem)
            }

            .w-auto {
                width: auto
            }

            .max-w-\[877px\] {
                max-width: 877px
            }

            .max-w-2xl {
                max-width: 42rem
            }

            .flex-1 {
                flex: 1 1 0%
            }

            .shrink-0 {
                flex-shrink: 0
            }

            .grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }

            .flex-col {
                flex-direction: column
            }

            .items-start {
                align-items: flex-start
            }

            .items-center {
                align-items: center
            }

            .items-stretch {
                align-items: stretch
            }

            .justify-end {
                justify-content: flex-end
            }

            .justify-center {
                justify-content: center
            }

            .gap-2 {
                gap: 0.5rem
            }

            .gap-4 {
                gap: 1rem
            }

            .gap-6 {
                gap: 1.5rem
            }

            .self-center {
                align-self: center
            }

            .overflow-hidden {
                overflow: hidden
            }

            .rounded-\[10px\] {
                border-radius: 10px
            }

            .rounded-full {
                border-radius: 9999px
            }

            .rounded-lg {
                border-radius: 0.5rem
            }

            .rounded-md {
                border-radius: 0.375rem
            }

            .rounded-sm {
                border-radius: 0.125rem
            }

            .bg-\[\#FF2D20\]\/10 {
                background-color: rgb(255 45 32 / 0.1)
            }

            .bg-white {
                --tw-bg-opacity: 1;
                background-color: rgb(255 255 255 / var(--tw-bg-opacity))
            }

            .bg-gradient-to-b {
                background-image: linear-gradient(to bottom, var(--tw-gradient-stops))
            }

            .from-transparent {
                --tw-gradient-from: transparent var(--tw-gradient-from-position);
                --tw-gradient-to: rgb(0 0 0 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
            }

            .via-white {
                --tw-gradient-to: rgb(255 255 255 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)
            }

            .to-white {
                --tw-gradient-to: #fff var(--tw-gradient-to-position)
            }

            .stroke-\[\#FF2D20\] {
                stroke: #FF2D20
            }

            .object-cover {
                object-fit: cover
            }

            .object-top {
                object-position: top
            }

            .p-6 {
                padding: 1.5rem
            }

            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem
            }

            .px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem
            }

            .py-16 {
                padding-top: 4rem;
                padding-bottom: 4rem
            }

            .py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem
            }

            .pt-3 {
                padding-top: 0.75rem
            }

            .text-center {
                text-align: center
            }

            .font-sans {
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji
            }

            .text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem
            }

            .text-sm\/relaxed {
                font-size: 0.875rem;
                line-height: 1.625
            }

            .text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem
            }

            .font-semibold {
                font-weight: 600
            }

            .text-black {
                --tw-text-opacity: 1;
                color: rgb(0 0 0 / var(--tw-text-opacity))
            }

            .text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .underline {
                -webkit-text-decoration-line: underline;
                text-decoration-line: underline
            }

            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale
            }

            .shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\] {
                --tw-shadow: 0px 14px 34px 0px rgba(0, 0, 0, 0.08);
                --tw-shadow-colored: 0px 14px 34px 0px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .ring-transparent {
                --tw-ring-color: transparent
            }

            .ring-white\/\[0\.05\] {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\] {
                --tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0, 0, 0, 0.06));
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
            }

            .drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\] {
                --tw-drop-shadow: drop-shadow(0px 4px 34px rgba(0, 0, 0, 0.25));
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)
            }

            .transition {
                transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms
            }

            .duration-300 {
                transition-duration: 300ms
            }

            .selection\:bg-\[\#FF2D20\] *::selection {
                --tw-bg-opacity: 1;
                background-color: rgb(255 45 32 / var(--tw-bg-opacity))
            }

            .selection\:text-white *::selection {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .selection\:bg-\[\#FF2D20\]::selection {
                --tw-bg-opacity: 1;
                background-color: rgb(255 45 32 / var(--tw-bg-opacity))
            }

            .selection\:text-white::selection {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .hover\:text-black:hover {
                --tw-text-opacity: 1;
                color: rgb(0 0 0 / var(--tw-text-opacity))
            }

            .hover\:text-black\/70:hover {
                color: rgb(0 0 0 / 0.7)
            }

            .hover\:ring-black\/20:hover {
                --tw-ring-color: rgb(0 0 0 / 0.2)
            }

            .focus\:outline-none:focus {
                outline: 2px solid transparent;
                outline-offset: 2px
            }

            .focus-visible\:ring-1:focus-visible {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .focus-visible\:ring-\[\#FF2D20\]:focus-visible {
                --tw-ring-opacity: 1;
                --tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity))
            }

            @media (min-width: 640px) {
                .sm\:size-16 {
                    width: 4rem;
                    height: 4rem
                }

                .sm\:size-6 {
                    width: 1.5rem;
                    height: 1.5rem
                }

                .sm\:pt-5 {
                    padding-top: 1.25rem
                }
            }

            @media (min-width: 768px) {
                .md\:row-span-3 {
                    grid-row: span 3 / span 3
                }
            }

            @media (min-width: 1024px) {
                .lg\:col-start-2 {
                    grid-column-start: 2
                }

                .lg\:h-16 {
                    height: 4rem
                }

                .lg\:max-w-7xl {
                    max-width: 80rem
                }

                .lg\:grid-cols-3 {
                    grid-template-columns: repeat(3, minmax(0, 1fr))
                }

                .lg\:grid-cols-2 {
                    grid-template-columns: repeat(2, minmax(0, 1fr))
                }

                .lg\:flex-col {
                    flex-direction: column
                }

                .lg\:items-end {
                    align-items: flex-end
                }

                .lg\:justify-center {
                    justify-content: center
                }

                .lg\:gap-8 {
                    gap: 2rem
                }

                .lg\:p-10 {
                    padding: 2.5rem
                }

                .lg\:pb-10 {
                    padding-bottom: 2.5rem
                }

                .lg\:pt-0 {
                    padding-top: 0px
                }

                .lg\:text-\[\#FF2D20\] {
                    --tw-text-opacity: 1;
                    color: rgb(255 45 32 / var(--tw-text-opacity))
                }
            }

            @media (prefers-color-scheme: dark) {
                .dark\:block {
                    display: block
                }

                .dark\:hidden {
                    display: none
                }

                .dark\:bg-black {
                    --tw-bg-opacity: 1;
                    background-color: rgb(0 0 0 / var(--tw-bg-opacity))
                }

                .dark\:bg-zinc-900 {
                    --tw-bg-opacity: 1;
                    background-color: rgb(24 24 27 / var(--tw-bg-opacity))
                }

                .dark\:via-zinc-900 {
                    --tw-gradient-to: rgb(24 24 27 / 0) var(--tw-gradient-to-position);
                    --tw-gradient-stops: var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)
                }

                .dark\:to-zinc-900 {
                    --tw-gradient-to: #18181b var(--tw-gradient-to-position)
                }

                .dark\:text-white\/50 {
                    color: rgb(255 255 255 / 0.5)
                }

                .dark\:text-white {
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity))
                }

                .dark\:text-white\/70 {
                    color: rgb(255 255 255 / 0.7)
                }

                .dark\:ring-zinc-800 {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(39 39 42 / var(--tw-ring-opacity))
                }

                .dark\:hover\:text-white:hover {
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity))
                }

                .dark\:hover\:text-white\/70:hover {
                    color: rgb(255 255 255 / 0.7)
                }

                .dark\:hover\:text-white\/80:hover {
                    color: rgb(255 255 255 / 0.8)
                }

                .dark\:hover\:ring-zinc-700:hover {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(63 63 70 / var(--tw-ring-opacity))
                }

                .dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(255 45 32 / var(--tw-ring-opacity))
                }

                .dark\:focus-visible\:ring-white:focus-visible {
                    --tw-ring-opacity: 1;
                    --tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity))
                }
            }
        </style>
    @endif
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative flex flex-col items-center justify-center min-h-screen overflow-hidden selection:bg-green-400 selection:text-white">
            <div class="relative w-full max-w-2xl md:max-w-full">
                <div class="py-2 overflow-hidden bg-green-100 border border-green-600 marquee-masjid-interaktif">
                    <p class="inline-block font-medium text-green-800 whitespace-nowrap animate-marquee">
                        🕌 <a href="#jadwal-sholat" class="text-green-700 hover:text-green-900">Selamat datang di Masjid
                            Jami At Taubah</a> |
                        📖 <a href="#pengajian" class="text-green-700 hover:text-green-900">Pengajian Mingguan</a> |
                        🌙 <a href="#ramadhan" class="text-green-700 hover:text-green-900">Kegiatan Bulan Ramadhan</a> |
                        🕋 <a href="#donasi" class="text-green-700 hover:text-green-900">Donasi Masjid</a>
                    </p>
                </div>

                <nav
                    class="absolute left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 mx-6 my-4 shadow-2xl top-10 rounded-xl bg-white/80 backdrop-blur-lg backdrop-saturate-100 lg:flex-nowrap lg:justify-start">
                    <div class="flex items-center justify-between w-full p-0 pl-6 mx-auto flex-wrap-inherit">
                        <img class="w-[13%] md:w-[8%] lg:w-[5%]  block mr-14"
                            src="{{ asset('assets/img/logoMasjid.png') }}"" alt="Logo Masjid At Taubah">
                        <button navbar-trigger
                            class="px-3 py-1 ml-1 text-lg leading-none transition-all ease-out bg-transparent rounded-lg shadow-none cursor-pointer lg:hidden"
                            type="button" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span
                                class="inline-block w-6 h-6 mt-2 align-middle bg-center bg-no-repeat bg-cover lg:mt-2 bg-none">
                                <span bar1
                                    class="relative block h-1 mx-auto my-0 transition-all duration-300 bg-gray-600 rounded-sm w-7"></span>
                                <span bar2
                                    class="relative block h-1 mx-auto my-0 mt-1 transition-all duration-300 bg-gray-600 rounded-sm w-7"></span>
                                <span bar3
                                    class="relative block h-1 mx-auto my-0 mt-1 transition-all duration-300 bg-gray-600 rounded-sm w-7"></span>
                            </span>
                        </button>
                        <div navbar-menu
                            class="items-center justify-end mt-4 overflow-hidden transition-all duration-500 lg:mt-0 ease-soft lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                            <ul class="flex flex-col justify-end pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                                <li class="text-xl">
                                    <a class="flex items-center px-4 py-2 mr-2 text-lg font-normal transition-all hover:underline hover:font-semibold lg-max:opacity-0 duration-250 ease-soft-in-out text-slate-700 lg:px-2"
                                        aria-current="page" href="#beranda">

                                        Beranda
                                    </a>
                                </li>
                                <li class="text-xl">
                                    <a class="flex items-center px-4 py-2 mr-2 text-lg font-normal transition-all hover:underline hover:font-semibold lg-max:opacity-0 duration-250 ease-soft-in-out text-slate-700 lg:px-2"
                                        aria-current="page" href="#jadwalSholat">

                                        Jadwal Sholat
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 text-lg font-normal transition-all hover:underline hover:font-semibold lg-max:opacity-0 duration-250 ease-soft-in-out text-slate-700 lg:px-2"
                                        href="#fasilitas">

                                        Fasilitas
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 text-lg font-normal transition-all hover:underline hover:font-semibold lg-max:opacity-0 duration-250 ease-soft-in-out text-slate-700 lg:px-2"
                                        href="#layanan">

                                        Layanan
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 text-lg font-normal transition-all hover:underline hover:font-semibold lg-max:opacity-0 duration-250 ease-soft-in-out text-slate-700 lg:px-2"
                                        href="#galeri">
                                        Galeri
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <main class="mt-24 md:mt-28 lg:mt-32">
                    <header id="beranda" class="relative flex items-center justify-center h-screen overflow-hidden">
                        <div class="absolute inset-0 z-0 w-full h-full bg-center bg-cover"
                            style="background-image: url('{{ asset('assets/img/masjid.jpg') }}');">
                            <div class="absolute inset-0 bg-black opacity-50"></div>
                        </div>
                        <div
                            class="relative z-10 flex flex-col items-center justify-center max-w-3xl p-5 text-white rounded-lg">
                            <h1 class="mb-5 text-3xl font-bold text-center text-white uppercase lg:text-5xl">
                                Masjid Jami At Taubah
                            </h1>
                            <p class="mb-3 text-base text-center md:text-lg">Masjid Jami At Taubah merupakan salah satu
                                masjid yang
                                ada di Kota
                                Depok, terletak di Jalan. Ir. H. Juanda No.Km.2, RW.16, Kel. Baktijaya, Kec. Sukmajaya.
                            </p>
                            <a href="https://wa.me/6281318806256"
                                class="p-3 mt-4 text-white transition-all ease-in-out rounded-md shadow-md md:mt-8 btn btn-primary bg-hijau2 w-fit hover:bg-hijau3 hover:scale-105">Menyewa
                                Gedung Serba Guna</a>
                        </div>
                    </header>

                    <div class="relative mt-14" id="jadwalSholat">
                        <img src="{{ asset('assets/img/pattern1.png') }}"
                            class="absolute -top-[55px] right-0 w-[20%] md:w-[15%] lg:w-[8%]" alt="patter islamic">
                        <img src="{{ asset('assets/img/pattern1.png') }}"
                            class="absolute -top-[55px] left-0 w-[20%] md:w-[15%] lg:w-[8%]" alt="patter islamic">
                        <img src="{{ asset('assets/img/pattern2.png') }}"
                            class="absolute -bottom-[50px] lg:-bottom-[90px] inset-x-0 w-[10%] md:w-[8%] lg:w-[5%]"
                            alt="patter islamic">
                        <h1
                            class="text-2xl font-bold tracking-wide text-center md:text-3xl text-hijau1 hover:underline">
                            Jadwal Sholat
                        </h1>
                        <p class="text-lg text-center text-hijau2">Depok, Sukmajaya</p>
                        <p class="text-lg text-center text-hijau2" id="date_sholat">Hari</p>
                        <div class="grid grid-cols-6 mt-9 lg:px-14 lg:gap-3">
                            <div
                                class="block p-2 text-center bg-white border border-gray-200 rounded-lg shadow lg:p-6 hover:bg-hijau4">
                                <h5
                                    class="mb-2 text-sm font-bold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                    🌘
                                    Imsak
                                </h5>
                                <p class="text-sm font-normal text-gray-700 dark:text-gray-400 imsak">Pukul </p>
                            </div>
                            <div
                                class="block p-2 text-center border border-gray-200 rounded-lg shadow lg:p-6 bg-hijau3 hover:bg-hijau2">
                                <h5
                                    class="mb-2 text-sm font-semibold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                    🌅
                                    Subuh
                                </h5>
                                <p class="text-sm font-normal text-gray-700 dark:text-gray-400 subuh">Pukul </p>
                            </div>
                            <div
                                class="block p-2 text-center bg-white border border-gray-200 rounded-lg shadow lg:p-6 hover:bg-hijau4">
                                <h5
                                    class="mb-2 text-sm font-semibold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                    🌞
                                    Dzuhur
                                </h5>
                                <p class="text-sm font-normal text-gray-700 dark:text-gray-400 dzuhur">Pukul </p>
                            </div>
                            <div
                                class="block p-2 text-center border border-gray-200 rounded-lg shadow lg:p-6 bg-hijau3 hover:bg-hijau4">
                                <h5
                                    class="mb-2 text-sm font-semibold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                    🌤️
                                    Ashar
                                </h5>
                                <p class="text-sm font-normal text-gray-700 dark:text-gray-400 ashar">Pukul </p>
                            </div>
                            <div
                                class="block p-2 text-center bg-white border border-gray-200 rounded-lg shadow lg:p-6 hover:bg-hijau4">
                                <h5
                                    class="mb-2 text-sm font-semibold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                    🌌
                                    Maghrib
                                </h5>
                                <p class="text-sm font-normal text-gray-700 dark:text-gray-400 maghrib">Pukul </p>
                            </div>
                            <div
                                class="block p-3 text-center border border-gray-200 rounded-lg shadow lg:p-6 bg-hijau3 hover:bg-hijau4">
                                <h5
                                    class="mb-2 text-sm font-semibold tracking-tight text-gray-900 lg:text-2xl dark:text-white">
                                    🌙 Isya
                                </h5>
                                <p class="text-sm font-normal text-gray-700 dark:text-gray-400 isya">Pukul </p>
                            </div>
                        </div>
                        <p class="px-4 mt-4 text-center lg:px-14">*Sumber <a
                                href="https://bimasislam.kemenag.go.id/jadwalshalat"
                                class="hover:text-green-600">https://bimasislam.kemenag.go.id/jadwalshalat</a>
                        </p>
                    </div>
                    <div class="px-8 py-16 border border-gray-200 rounded-lg shadow-lg lg:mt-24 mt-14 bg-gradient-to-r from-hijau3 via-hijau2 to-hijau3 bg-opacity-30 backdrop-blur-2xl"
                        id="layanan">
                        <div class="absolute inset-0 z-0 w-full h-full bg-center bg-cover invert-20 hue-rotat3-90 contrast-75"
                            style="background-image: url('{{ asset('assets/img/IMG_2350.jpg') }}');">
                            <div class="absolute inset-0 opacity-50 bg-hijau1"></div>
                        </div>
                        <div class="relative z-10 flex flex-col items-center justify-center p-5 text-white rounded-lg">
                            <h1
                                class="text-2xl font-bold tracking-wide text-center text-white md:text-3xl hover:underline">
                                Layanan dan
                                Bantuan
                                Masjid</h1>
                        </div>

                        <div class="mt-10 overflow-hidden md:mt-14 swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div
                                        class="max-w-sm transition ease-in-out bg-white rounded-lg shadow-xl bg-opacity-30 backdrop-blur-sm dark:bg-gray-800 dark:bg-opacity-30 dark:border-gray-700 hover:-translate-y-4 hover:-translate-x-2">
                                        <img class="rounded-t-lg" src="{{ asset('assets/img/zakat.jpeg') }}"
                                            alt="zakat" />
                                        <div class="p-5">
                                            <h3
                                                class="mb-2 text-xl font-semibold tracking-normal text-center text-hijau4">
                                                Pembayaran Zakat
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="max-w-sm transition ease-in-out bg-white rounded-lg shadow-xl bg-opacity-30 backdrop-blur-sm dark:bg-gray-800 dark:bg-opacity-30 dark:border-gray-700 hover:-translate-y-4 hover:-translate-x-2">
                                        <img class="rounded-t-lg" src="{{ asset('assets/img/hewanqurban.jpeg') }}"
                                            alt="hewan qurban" />
                                        <div class="p-5">
                                            <h3
                                                class="mb-2 text-xl font-semibold tracking-normal text-center text-hijau4">
                                                Pendaftaran Hewan Qurban
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="max-w-sm transition ease-in-out bg-white rounded-lg shadow-xl bg-opacity-30 backdrop-blur-sm dark:bg-gray-800 dark:bg-opacity-30 dark:border-gray-700 hover:-translate-y-4 hover:-translate-x-2">
                                        <img class="rounded-t-lg" src="{{ asset('assets/img/santunan.jpg') }}"
                                            alt="santunan" />
                                        <div class="p-5">
                                            <h3
                                                class="mb-2 text-xl font-semibold tracking-normal text-center text-hijau4">
                                                Santunan Yatim Piatu
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="max-w-sm transition ease-in-out bg-white rounded-lg shadow-xl bg-opacity-30 backdrop-blur-sm dark:bg-gray-800 dark:bg-opacity-30 dark:border-gray-700 hover:-translate-y-4 hover:-translate-x-2">
                                        <img class="rounded-t-lg"
                                            src="{{ asset('assets/img/penggalanganDana.jpg') }}"
                                            alt="penggalangan dana" />
                                        <div class="p-5">
                                            <h3
                                                class="mb-2 text-xl font-semibold tracking-normal text-center text-hijau4">
                                                Penggalangan Dana
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add more slides as needed -->
                            </div>
                        </div>

                    </div>
                    <div class="relative px-8 py-16 mt-10 md:px-14 lg:px-28 lg:mt-24" id="fasilitas">
                        <img src="{{ asset('assets/img/pattern4.png') }}"
                            class="absolute -top-10 lg:-top-[95px] right-0 w-[40%] lg:w-[20%] md:w-[25%]"
                            alt="patter islamic">
                        <img src="{{ asset('assets/img/pattern3.png') }}"
                            class="absolute -top-[40px] lg:-top-[75px] left-2 lg:left-4 w-[20%] lg:w-[8%] md:w-[15%]"
                            alt="patter islamic">
                        <h1 class="text-3xl font-bold tracking-wide text-center uppercase text-hijau1 hover:underline">
                            Fasilitas
                            Masjid</h1>


                        <div id="default-carousel" class="relative w-full mt-10 lg:mt-14" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative h-96 overflow-hidden rounded-lg  md:h-[500px]">
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/img/GSM.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="Gedung Serba Guna">
                                    <div class="absolute inset-0 flex items-center justify-center px-14 md:px-0">
                                        <div class="p-4 text-black bg-white rounded-lg backdrop-blur-sm bg-opacity-30">
                                            <h2 class="text-lg font-bold text-center md:text-2xl text-hijau1">Gedung
                                                Serba Guna
                                            </h2>
                                            <p class="hidden mt-2 text-sm md:text-base md:inline">Gedung untuk
                                                pernikahan, pengajian,
                                                acara hari besar.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 4 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/img/tempatsholat.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="tempat sholat">
                                    <div class="absolute inset-0 flex items-center justify-center px-14 md:px-0">
                                        <div class="p-4 text-black bg-white rounded-lg backdrop-blur-sm bg-opacity-30">
                                            <h2 class="text-lg font-bold text-center md:text-2xl text-hijau1">Tempat
                                                Sholat</h2>
                                            <p class="hidden mt-2 text-sm md:text-base md:inline">Tempat sholat yang
                                                tersedia dengan 2
                                                lantai.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/img/keranda.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="keranda">
                                    <div class="absolute inset-0 flex items-center justify-center px-14 md:px-0">
                                        <div class="p-4 text-black bg-white rounded-lg backdrop-blur-sm bg-opacity-30">
                                            <h2 class="text-lg font-bold text-center md:text-2xl text-hijau1">Keranda
                                            </h2>
                                            <p class="hidden mt-2 text-sm md:text-base md:inline">Keranda untuk
                                                mengangkut jenazah
                                                tersedia di masjid.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/img/kainkafan.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 "
                                        alt="kain kafan">
                                    <div class="absolute inset-0 flex items-center justify-center px-14 md:px-0">
                                        <div class="p-4 text-black bg-white rounded-lg backdrop-blur-sm bg-opacity-30">
                                            <h2 class="text-lg font-bold text-center md:text-2xl text-hijau1">Kain
                                                Kafan</h2>
                                            <p class="hidden mt-2 md:inline">Kain kafan tersedia untuk keperluan
                                                jenazah.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 5 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/img/toilet.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="toilet">
                                    <div class="absolute inset-0 flex items-center justify-center px-14 md:px-0">
                                        <div class="p-4 text-black bg-white rounded-lg backdrop-blur-sm bg-opacity-30">
                                            <h2 class="text-lg font-bold text-center md:text-2xl text-hijau1">Toilet
                                            </h2>
                                            <p class="hidden mt-2 md:inline">Tersedia toilet untuk laki - laki di
                                                lantai bawah dan
                                                perempuan di lantai atas.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item 6 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('assets/img/AC.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="AC">
                                    <div class="absolute inset-0 flex items-center justify-center px-14 md:px-0">
                                        <div class="p-4 text-black bg-white rounded-lg backdrop-blur-sm bg-opacity-30">
                                            <h2 class="text-lg font-bold text-center md:text-2xl text-hijau1">Air
                                                Conditioner</h2>
                                            <p class="hidden mt-2 md:inline">Masjid dilengkapi dengan AC agar jamaah
                                                nyaman dalam
                                                beribadah.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider indicators -->
                            <div
                                class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                                    aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 4" data-carousel-slide-to="3"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 5" data-carousel-slide-to="4"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide 6" data-carousel-slide-to="5"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none"
                                data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>

                    </div>
                    <div class="relative px-8 py-16 border border-gray-200 rounded-lg shadow-lg lg:mt-24 mt-14 bg-gradient-to-r from-hijau3 via-hijau2 to-hijau3 bg-opacity-30 backdrop-blur-2xl"
                        id="galeri">
                        <img src="{{ asset('assets/img/pattern5.png') }}"
                            class="absolute -top-[10px] right-0 lg:w-[8%] w-[20%] md:w-[15%]" alt="patter islamic">
                        <img src="{{ asset('assets/img/pattern6.png') }}"
                            class="absolute top-[5px] left-0 lg:w-[8%] w-[20%] md:w-[15%]" alt="patter islamic">
                        <h1 class="text-3xl font-bold tracking-wide text-center text-white uppercase hover:underline">
                            Galeri
                            Masjid</h1>
                        <div class="grid grid-cols-2 gap-4 mt-8 md:mt-14 md:grid-cols-3">
                            <div>
                                <img class="h-auto max-w-full transition-all ease-in-out rounded-lg hover:scale-105"
                                    src="{{ asset('assets/img/galeri2.jpg') }}" alt="fotoGaleri">
                            </div>
                            <div>
                                <img class="h-auto max-w-full transition-all ease-in-out rounded-lg hover:scale-105"
                                    src="{{ asset('assets/img/galeri3.jpg') }}" alt="fotoGaleri">
                            </div>
                            <div>
                                <img class="h-auto max-w-full transition-all ease-in-out rounded-lg hover:scale-105"
                                    src="{{ asset('assets/img/galeri1.jpg') }}" alt="fotoGaleri">
                            </div>
                            <div>
                                <img class="h-auto max-w-full transition-all ease-in-out rounded-lg hover:scale-105"
                                    src="{{ asset('assets/img/galeri4.jpg') }}" alt="fotoGaleri">
                            </div>
                            <div>
                                <img class="h-auto max-w-full transition-all ease-in-out rounded-lg hover:scale-105"
                                    src="{{ asset('assets/img/galeri6.jpg') }}" alt="fotoGaleri">
                            </div>
                            <div>
                                <img class="h-auto max-w-full transition-all ease-in-out rounded-lg hover:scale-105"
                                    src="{{ asset('assets/img/galeri5.jpg') }}" alt="fotoGaleri">
                            </div>
                        </div>
                    </div>

                    <div class="px-3 py-16 md:px-8 lg:mt-24 mt-14">
                        <h1 class="mb-8 text-3xl font-bold tracking-wide text-center uppercase text-hijau1">Lokasi
                            Masjid</h1>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4368505855245!2d106.8479536!3d-6.3799304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec77d6134e97%3A0xf5bedde41bf5124e!2sMasjid%20Jami'%20At-Taubah!5e0!3m2!1sen!2sid!4v1612309600000!5m2!1sen!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>


                    </div>
                </main>


                <footer class="m-4 overflow-hidden dark:bg-gray-800">
                    <div class="w-full max-w-screen-xl p-4 mx-auto md:flex md:items-center md:justify-between">
                        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                                href="https://flowbite.com/" class="hover:underline">Masjid Jami At Taubah juanda Kota
                                Depok</a>
                        </span>
                        <ul
                            class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                            <li>
                                <a href="#beranda" class="hover:underline me-4 md:me-6">Beranda</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline me-4 md:me-6">Jadwal Sholat</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline me-4 md:me-6">Fasilitas</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline me-4 md:me-6">Layanan</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Galeri</a>
                            </li>
                        </ul>
                    </div>
                </footer>

            </div>
        </div>
    </div>
</body>
@include('admin.layouts.partials.scripts')
<script>
    let getDate = new Date();
    let getYear = getDate.getFullYear();
    let getMonth = getDate.getMonth() + 1; // Tambahkan 1 karena getMonth() dimulai dari 0 (Januari = 0)
    let getDay = getDate.getDate();

    function bulan() {
        if (getMonth < 10) {
            bulan = '0' + getMonth
        } else {
            bulan = getMonth
        }
        return bulan
    }

    function hari() {
        if (getDay < 10) {
            hari = '0' + getDay
        } else {
            hari = getDay
        }
        return hari
    }


    let tanggal = getYear + '-' + bulan() + '-' + hari();
    console.log('tanggal' + tanggal)

    function getSholat() {
        fetch(`https://api.myquran.com/v2/sholat/jadwal/1225/${tanggal}`)
            .then(res => res.json())
            .then(data => {
                let jadwal = data.data.jadwal
                document.getElementById('date_sholat').textContent = jadwal.tanggal
                document.querySelector('.imsak').textContent = jadwal.imsak
                document.querySelector('.subuh').textContent = jadwal.subuh
                document.querySelector('.dzuhur').textContent = jadwal.dzuhur
                document.querySelector('.ashar').textContent = jadwal.ashar
                document.querySelector('.maghrib').textContent = jadwal.maghrib
                document.querySelector('.isya').textContent = jadwal.isya
            })
    }
    getSholat();
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM Content Loaded');
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
    });
</script>

</html>
