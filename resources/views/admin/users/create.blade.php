@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Tambah Pengguna';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('pengguna.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Manajemen Pengguna
            </a>
            <span class="text-xs font-medium text-slate-400">Hak Akses & Akun Sistem</span>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Form Header with Islamic Theme Accent -->
            <div class="relative bg-gradient-to-r from-emerald-800 to-teal-800 px-8 py-6 text-white overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/5 blur-xl pointer-events-none"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-2 text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        Akun Baru
                    </div>
                    <h2 class="text-2xl font-bold text-white">Tambah Pengguna Sistem</h2>
                    <p class="text-emerald-100/80 text-sm mt-1">
                        Buat kredensial akun baru untuk Administrator, Pengurus RT, atau Jamaah.
                    </p>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('pengguna.store') }}" method="POST" class="p-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <x-input-field name="name" label="Nama Lengkap Pengguna"
                            placeholder="Contoh: Ahmad Fauzi, S.Kom" :required="true" />
                    </div>

                    <div class="md:col-span-2">
                        <x-input-field name="email" label="Alamat Email (Login)"
                            placeholder="Contoh: ahmad@masjid.id" type="email" :required="true" />
                    </div>

                    <div>
                        <x-input-field name="password" label="Kata Sandi / Password"
                            placeholder="Minimal 8 karakter" type="password" :required="true" />
                    </div>

                    <div>
                        <x-input-field name="confirmation_password" label="Konfirmasi Kata Sandi"
                            placeholder="Ulangi kata sandi" type="password" :required="true" />
                    </div>

                    <div>
                        <label for="role" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Peran / Hak Akses (Role) <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="role" name="role"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Pengelola Masjid Penuh)</option>
                            <option value="admin_media" {{ old('role') == 'admin_media' ? 'selected' : '' }}>Tim Media (Pengelola Galeri & Video)</option>
                            <option value="ketua_rt" {{ old('role') == 'ketua_rt' ? 'selected' : '' }}>Ketua RT (Verifikator Wilayah)</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Jamaah / User Biasa</option>
                        </select>
                        @error('role')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="id_RT" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Wilayah RT Asal <span class="text-rose-500 font-semibold">*</span>
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

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                    <a href="{{ route('pengguna.index') }}"
                        class="w-full sm:w-auto px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Buat Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
