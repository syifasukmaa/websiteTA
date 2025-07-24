@extends('admin.layouts.main')
@section('contents')
    <div class="w-full px-6 py-6 mx-auto">
        {{-- @include('sweetalert::alert') --}}
        <div class="flex flex-wrap -mx-3">
            <div
                class="relative flex flex-col justify-center w-full min-w-0 mb-6 mr-3 break-words bg-transparent border-0 border-transparent border-solid rounded-2xl bg-clip-border">
                <div class="p-6 mb-0 bg-transparent border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h1 class="text-2xl font-semibold text-hijau1">Dashboard</h1>
                    <div class="grid grid-cols-1 gap-4 mt-5 md:grid-cols-2 lg:grid-cols-3">
                        <x-card-dashboard judul="Total Dana Qurban" type="number" background="bg-cyan-300"
                            text="Rp. {{ number_format($totalDanaQurban) }}">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M3 7h18v10H3z" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16 11h2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </x-card-dashboard>
                        <x-card-dashboard judul="Data Muzakki" text="{{ $muzakki }}" background="bg-sky-300">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.5 0 4.5-2 4.5-4.5S14.5 3 12 3 7.5 5 7.5 7.5 9.5 12 12 12zm0 2c-2.67 0-8 1.34-8 4v1h16v-1c0-2.66-5.33-4-8-4z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </x-card-dashboard>
                        <x-card-dashboard judul="Data Mustahik" text="{{ $mustahik }}" background="bg-violet-300">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M3 12s2-2 6-2 6 2 6 2 2 2 6 2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 14v6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </x-card-dashboard>
                        <x-card-dashboard judul="Data Yatim Piatu" text="{{ $yatimpiatu }}" background="bg-red-300">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <circle cx="9" cy="7" r="4" />
                                <circle cx="17" cy="7" r="4" />
                                <path d="M2 21v-2a4 4 0 014-4h3a4 4 0 014 4v2M14 21v-2a4 4 0 014-4h2a4 4 0 014 4v2" />
                            </svg>

                        </x-card-dashboard>
                        <x-card-dashboard judul="Data Kambing" type="kambing" text="{{ $kambing }}"
                            background="bg-amber-300">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M20 17c0 2-1.5 3-3.5 3S13 19 13 17s.5-3 2.5-3S20 15 20 17Z" />
                                <path d="M3 17c0-2 1.5-3 3.5-3S10 15 10 17s-.5 3-2.5 3S3 19 3 17Z" />
                                <path d="M12 17v4" />
                                <path d="M12 3a2 2 0 0 1 2 2" />
                                <path d="M12 3a2 2 0 0 0-2 2" />
                            </svg>

                        </x-card-dashboard>
                        <x-card-dashboard judul="Data Sapi" type="sapi" text="{{ $sapi }}"
                            background="bg-lime-300">
                            <svg class="w-6 h-6 text-lime-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M3 11l1-2 1 1 1-1 1 2v2H3v-2Z" />
                                <path d="M21 11l-1-2-1 1-1-1-1 2v2h4v-2Z" />
                                <path d="M8 16v5" />
                                <path d="M16 16v5" />
                                <path d="M5 13h14v3H5z" />
                                <circle cx="9" cy="9" r="1" />
                                <circle cx="15" cy="9" r="1" />
                            </svg>
                        </x-card-dashboard>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
