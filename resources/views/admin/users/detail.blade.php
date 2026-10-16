@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Pengguna';
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
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            Profil & Hak Akses
                        </div>
                        <h2 class="text-2xl font-bold text-white">Edit Pengguna Sistem</h2>
                        <p class="text-emerald-100/80 text-sm mt-1">
                            Perbarui informasi akun dan hak akses: <span class="font-semibold text-white">{{ $user->name }}</span>
                        </p>
                    </div>
                    <!-- Metadata Badge -->
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-3 border border-white/15 text-xs text-emerald-100">
                        <div class="flex items-center gap-2 mb-1">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Bergabung: {{ date('d M Y', strtotime($user->created_at)) }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <span>Role Saat Ini: <span class="capitalize font-semibold text-amber-300">{{ str_replace('_', ' ', $user->role) }}</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('pengguna.update', $user->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <x-input-field name="name" label="Nama Lengkap Pengguna"
                            placeholder="Contoh: Ahmad Fauzi, S.Kom" :required="true"
                            value="{{ old('name', $user->name) }}" />
                    </div>

                    <div class="md:col-span-2">
                        <x-input-field name="email" label="Alamat Email (Login)"
                            placeholder="Contoh: ahmad@masjid.id" type="email" :required="true"
                            value="{{ old('email', $user->email) }}" />
                    </div>

                    <div>
                        <label for="role" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Peran / Hak Akses (Role) <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="role" name="role"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin (Pengelola Masjid Penuh)</option>
                            <option value="admin_media" {{ old('role', $user->role) === 'admin_media' ? 'selected' : '' }}>Tim Media (Pengelola Galeri & Video)</option>
                            <option value="ketua_rt" {{ old('role', $user->role) === 'ketua_rt' ? 'selected' : '' }}>Ketua RT (Verifikator Wilayah)</option>
                            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Jamaah / User Biasa</option>
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
                            @foreach ($rt as $rtwarga)
                                <option value="{{ $rtwarga->id_RT }}"
                                    {{ old('id_RT', $user->id_RT) === $rtwarga->id_RT ? 'selected' : '' }}>
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
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Perbarui Data Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
