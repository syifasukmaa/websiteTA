@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Daftar Zakat';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('zakatMustahik.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Mustahik
            </a>
            <span class="text-xs font-medium text-slate-400">Modul Zakat Fitrah & Mal</span>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Form Header with Islamic Theme Accent -->
            <div class="relative bg-gradient-to-r from-emerald-800 to-teal-800 px-8 py-6 text-white overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/5 blur-xl pointer-events-none"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-2 text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        Formulir Entri Data
                    </div>
                    <h2 class="text-2xl font-bold text-white">Tambah Data Mustahik</h2>
                    <p class="text-emerald-100/80 text-sm mt-1">
                        Daftarkan kepala keluarga atau perorangan yang berhak menerima penyaluran zakat masjid.
                    </p>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('zakatMustahik.store') }}" method="POST" class="p-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <x-input-field name="nama_keluarga" label="Nama Keluarga / Kepala Keluarga"
                            placeholder="Contoh: Keluarga Bpk. Ahmad Dahlan" :required="true" />
                    </div>

                    <div>
                        <label for="kelompok" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Kelompok Asnaf Mustahik <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="kelompok" name="kelompok"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            <option value="fakir miskin" {{ old('kelompok') == 'fakir miskin' ? 'selected' : '' }}>Fakir Miskin</option>
                            <option value="fisabilillah" {{ old('kelompok') == 'fisabilillah' ? 'selected' : '' }}>Fisabilillah</option>
                            <option value="mualaf" {{ old('kelompok') == 'mualaf' ? 'selected' : '' }}>Mualaf</option>
                            <option value="amilin" {{ old('kelompok') == 'amilin' ? 'selected' : '' }}>Amilin</option>
                        </select>
                        @error('kelompok')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="id_RT" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Wilayah RT Warga <span class="text-rose-500 font-semibold">*</span>
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

                    <div>
                        <x-input-field name="nama_suami" label="Nama Suami"
                            placeholder="Nama lengkap suami (opsional)" />
                    </div>

                    <div>
                        <x-input-field name="nama_istri" label="Nama Istri"
                            placeholder="Nama lengkap istri (opsional)" />
                    </div>

                    <div>
                        <x-input-field name="nomor_hp" label="Nomor Telepon / WhatsApp"
                            placeholder="Contoh: 08123456789" type="text" />
                    </div>

                    <div class="md:col-span-2">
                        <x-textarea name="alamat" label="Alamat Domisili Lengkap"
                            placeholder="Tuliskan nama jalan, nomor rumah, gang, atau patokan rumah" :required="true" />
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                    <a href="{{ route('zakatMustahik.index') }}"
                        class="w-full sm:w-auto px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Data Mustahik
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
