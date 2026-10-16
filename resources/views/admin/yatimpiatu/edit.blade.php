@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Edit Yatim Piatu';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('yatimPiatu.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Santunan Yatim
            </a>
            <span class="text-xs font-medium text-slate-400">Modul Santunan Anak Yatim & Piatu</span>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Form Header with Islamic Theme Accent -->
            <div class="relative bg-gradient-to-r from-emerald-800 to-teal-800 px-8 py-6 text-white overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/5 blur-xl pointer-events-none"></div>
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            Mode Perubahan Data
                        </div>
                        <h2 class="text-2xl font-bold text-white">Edit Data Anak Yatim / Piatu</h2>
                        <p class="text-emerald-100/80 text-sm mt-1">
                            Perbarui rincian santunan: <span class="font-semibold text-white">{{ $yatim->nama }}</span>
                        </p>
                    </div>
                    <!-- Metadata Badge -->
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-3 border border-white/15 text-xs text-emerald-100">
                        <div class="flex items-center gap-2 mb-1">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Dibuat: {{ date('d M Y', strtotime($yatim->created_at)) }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Oleh: {{ $yatim->pembuatData->name ?? 'Admin' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('yatimPiatu.update', $yatim->id_yatim_piatu) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <x-input-field name="nama" label="Nama Lengkap Anak"
                            placeholder="Contoh: Muhammad Rayhan" :required="true"
                            value="{{ old('nama', $yatim->nama) }}" />
                    </div>

                    <div>
                        <x-input-field name="nama_ayah" label="Nama Ayah (Alm/Wali)"
                            placeholder="Nama ayah kandung" :required="true"
                            value="{{ old('nama_ayah', $yatim->nama_ayah) }}" />
                    </div>

                    <div>
                        <x-input-field name="nama_ibu" label="Nama Ibu (Almh/Wali)"
                            placeholder="Nama ibu kandung" :required="true"
                            value="{{ old('nama_ibu', $yatim->nama_ibu) }}" />
                    </div>

                    <div>
                        <label for="status" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Status Anak <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="status" name="status"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            <option value="yatim" {{ old('status', $yatim->status) == 'yatim' ? 'selected' : '' }}>Yatim (Ayah Wafat)</option>
                            <option value="piatu" {{ old('status', $yatim->status) == 'piatu' ? 'selected' : '' }}>Piatu (Ibu Wafat / Yatim Piatu)</option>
                        </select>
                        @error('status')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pendidikan" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Jenjang Pendidikan <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="pendidikan" name="pendidikan"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            <option value="paud" {{ old('pendidikan', $yatim->pendidikan) == 'paud' ? 'selected' : '' }}>PAUD / TK</option>
                            <option value="sd" {{ old('pendidikan', $yatim->pendidikan) == 'sd' ? 'selected' : '' }}>SD / MI</option>
                            <option value="smp" {{ old('pendidikan', $yatim->pendidikan) == 'smp' ? 'selected' : '' }}>SMP / MTs</option>
                            <option value="sma" {{ old('pendidikan', $yatim->pendidikan) == 'sma' ? 'selected' : '' }}>SMA / SMK / MA</option>
                        </select>
                        @error('pendidikan')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-input-field name="biaya" label="Biaya Santunan Rutin (Rp)"
                            placeholder="Contoh: 350000" type="number" min="0" step="1000" :required="true"
                            value="{{ old('biaya', $yatim->biaya) }}" />
                    </div>

                    <div>
                        <label for="id_RT" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Wilayah RT Warga <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="id_RT" name="id_RT"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            @foreach ($rt as $rtwarga)
                                <option value="{{ $rtwarga->id_RT }}"
                                    {{ old('id_RT', $yatim->id_RT) == $rtwarga->id_RT ? 'selected' : '' }}>
                                    RT {{ $rtwarga->nomor_RT }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_RT')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <x-textarea name="alamat" label="Alamat Tempat Tinggal"
                            placeholder="Alamat lengkap domisili anak / wali" :required="true"
                            value="{{ old('alamat', $yatim->alamat) }}" />
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                    <a href="{{ route('yatimPiatu.index') }}"
                        class="w-full sm:w-auto px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Perbarui Data Yatim / Piatu
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
