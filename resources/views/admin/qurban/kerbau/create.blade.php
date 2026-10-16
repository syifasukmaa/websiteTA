@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Tambah Qurban Sapi / Kerbau';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-6xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('pendaftarQurban.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Qurban
            </a>
            <span class="text-xs font-medium text-slate-400">Modul Patungan Sapi / Kerbau (7 Jiwa)</span>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Form Header with Islamic Theme Accent -->
            <div class="relative bg-gradient-to-r from-emerald-800 to-teal-800 px-8 py-6 text-white overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/5 blur-xl pointer-events-none"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-2 text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        Pendaftaran Kelompok Qurban
                    </div>
                    <h2 class="text-2xl font-bold text-white">Tambah Data Qurban Sapi / Kerbau</h2>
                    <p class="text-emerald-100/80 text-sm mt-1">
                        Satu kelompok patungan qurban besar untuk 7 orang shohibul qurban berserta peruntukan pahalanya.
                    </p>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('pendaftarQurban.kerbau.store') }}" method="POST" class="p-8">
                @csrf

                <!-- Section 1: Daftar 7 Anggota Shohibul Qurban -->
                <div class="mb-8">
                    <div class="flex items-center gap-2 mb-4 text-emerald-900 font-bold text-base border-b border-emerald-100 pb-2">
                        <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Daftar 7 Anggota Shohibul Qurban (1 Ekor Sapi / Kerbau)
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $slots = [
                                ['num' => 1, 'nama' => 'nama_satu', 'pahala' => 'pahala_satu'],
                                ['num' => 2, 'nama' => 'nama_dua', 'pahala' => 'pahala_dua'],
                                ['num' => 3, 'nama' => 'nama_tiga', 'pahala' => 'pahala_tiga'],
                                ['num' => 4, 'nama' => 'nama_empat', 'pahala' => 'pahala_empat'],
                                ['num' => 5, 'nama' => 'nama_lima', 'pahala' => 'pahala_lima'],
                                ['num' => 6, 'nama' => 'nama_enam', 'pahala' => 'pahala_enam'],
                                ['num' => 7, 'nama' => 'nama_tujuh', 'pahala' => 'pahala_tujuh'],
                            ];
                        @endphp

                        @foreach ($slots as $slot)
                            <div class="p-4 rounded-2xl bg-slate-50/70 border border-slate-200/80 {{ $slot['num'] === 7 ? 'md:col-span-2' : '' }}">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="w-6 h-6 rounded-full bg-emerald-700 text-white text-xs font-bold flex items-center justify-center">
                                        {{ $slot['num'] }}
                                    </span>
                                    <span class="text-xs font-bold text-slate-700 uppercase tracking-wide">
                                        Shohibul Qurban Bagian ke-{{ $slot['num'] }}
                                    </span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <x-input-field name="{{ $slot['nama'] }}" label="Nama Pengqurban"
                                        placeholder="Nama shohibul qurban {{ $slot['num'] }}" :required="true" />
                                    <x-input-field name="{{ $slot['pahala'] }}" label="Tujuan Pahala"
                                        placeholder="Pahala atas nama {{ $slot['num'] }}" :required="true" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Section 2: Rincian Hewan & Administrasi -->
                <div class="border-t border-slate-100 pt-6">
                    <div class="flex items-center gap-2 mb-4 text-emerald-900 font-bold text-base border-b border-emerald-100 pb-2">
                        <svg class="w-5 h-5 text-emerald-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Rincian Hewan Qurban & Administrasi
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="jenis_hewan" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                                Jenis Hewan Qurban <span class="text-rose-500 font-semibold">*</span>
                            </label>
                            <select id="jenis_hewan" name="jenis_hewan"
                                class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                                <option value="sapi" {{ old('jenis_hewan') == 'sapi' ? 'selected' : '' }}>Sapi</option>
                                <option value="kerbau" {{ old('jenis_hewan') == 'kerbau' ? 'selected' : '' }}>Kerbau</option>
                            </select>
                            @error('jenis_hewan')
                                <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-input-field name="hak_pengqurban" label="Hak Daging Pengqurban"
                                placeholder="Contoh: 1/3 bagian total dibagi 7" :required="true" />
                        </div>

                        <div>
                            <x-input-field name="biaya" label="Total Biaya Patungan Kelompok (Rp)"
                                placeholder="Contoh: 21000000" type="number" min="0" step="10000" :required="true" />
                        </div>

                        <div>
                            <label for="status_pembayaran" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                                Status Pembayaran <span class="text-rose-500 font-semibold">*</span>
                            </label>
                            <select id="status_pembayaran" name="status_pembayaran"
                                class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                                <option value="lunas" {{ old('status_pembayaran') == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                <option value="belum bayar" {{ old('status_pembayaran') == 'belum bayar' ? 'selected' : '' }}>Belum Bayar</option>
                            </select>
                            @error('status_pembayaran')
                                <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="id_RT" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                                Wilayah RT Perwakilan <span class="text-rose-500 font-semibold">*</span>
                            </label>
                            <select id="id_RT" name="id_RT"
                                class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                                <option value="">-- Pilih Wilayah RT --</option>
                                @foreach ($rt as $rtwarga)
                                    <option value="{{ $rtwarga->id_RT }}" {{ old('id_RT') == $rtwarga->id_RT ? 'selected' : '' }}>
                                        RT {{ $rtwarga->nomor_RT }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_RT')
                                <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                    <a href="{{ route('pendaftarQurban.index') }}"
                        class="w-full sm:w-auto px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Data Kelompok Qurban
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
