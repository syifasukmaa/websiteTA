@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Edit Pendaftar Qurban';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('pendaftarQurban.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Qurban
            </a>
            <span class="text-xs font-medium text-slate-400">Modul Qurban Kambing & Domba</span>
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
                        <h2 class="text-2xl font-bold text-white">Edit Pendaftar Qurban</h2>
                        <p class="text-emerald-100/80 text-sm mt-1">
                            Perbarui data shohibul qurban: <span class="font-semibold text-white">{{ $qurban->nama }}</span>
                        </p>
                    </div>
                    <!-- Metadata Badge -->
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-3 border border-white/15 text-xs text-emerald-100">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2 py-0.5 rounded-lg bg-emerald-500/30 font-bold text-white">Antrian #{{ $qurban->nomor_antrian ?? '-' }}</span>
                            <span>{{ date('d M Y', strtotime($qurban->created_at)) }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Oleh: {{ $qurban->pembuatData->name ?? 'Admin' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('pendaftarQurban.update', $qurban->id_pendaftar_qurban) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-field name="nama" label="Nama Shohibul Qurban (Pendaftar)"
                            placeholder="Contoh: H. Abdullah" :required="true"
                            value="{{ old('nama', $qurban->nama) }}" />
                    </div>

                    <div>
                        <x-input-field name="tujuan_pahala" label="Tujuan Pahala Qurban (Atas Nama)"
                            placeholder="Contoh: Abdullah bin Ahmad" :required="true"
                            value="{{ old('tujuan_pahala', $qurban->tujuan_pahala) }}" />
                    </div>

                    <div>
                        <label for="jenis_hewan" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Jenis Hewan Qurban <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="jenis_hewan" name="jenis_hewan"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            <option value="kambing" {{ old('jenis_hewan', $qurban->jenis_hewan) == 'kambing' ? 'selected' : '' }}>Kambing</option>
                            <option value="domba" {{ old('jenis_hewan', $qurban->jenis_hewan) == 'domba' ? 'selected' : '' }}>Domba</option>
                            @if(in_array($qurban->jenis_hewan, ['sapi', 'kerbau']))
                                <option value="{{ $qurban->jenis_hewan }}" selected class="capitalize">{{ ucfirst($qurban->jenis_hewan) }}</option>
                            @endif
                        </select>
                        @error('jenis_hewan')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-input-field name="hak_pengqurban" label="Hak Daging Pengqurban"
                            placeholder="Contoh: 1/3 Bagian (Paha depan)" :required="true"
                            value="{{ old('hak_pengqurban', $qurban->hak_pengqurban) }}" />
                    </div>

                    <div>
                        <x-input-field name="biaya" label="Biaya / Iuran Qurban (Rp)"
                            placeholder="Contoh: 3200000" type="number" min="0" step="10000" :required="true"
                            value="{{ old('biaya', $qurban->biaya) }}" />
                    </div>

                    <div>
                        <label for="status_pembayaran" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Status Pembayaran <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="status_pembayaran" name="status_pembayaran"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            <option value="lunas" {{ in_array(old('status_pembayaran', $qurban->status_pembayaran), ['lunas', 'Lunas']) ? 'selected' : '' }}>Lunas</option>
                            <option value="belum bayar" {{ in_array(old('status_pembayaran', $qurban->status_pembayaran), ['belum bayar', 'belum bayaran', 'Belum Bayar']) ? 'selected' : '' }}>Belum Bayar</option>
                        </select>
                        @error('status_pembayaran')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="RW" class="block mb-1.5 text-sm font-medium text-slate-700 dark:text-slate-200">
                            Wilayah RW <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <select id="RW" name="RW"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-300 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-green-500/20 focus:border-green-600 hover:border-slate-400 shadow-sm transition-all duration-200">
                            <option value="16" {{ old('RW', $qurban->RW) == '16' ? 'selected' : '' }}>RW 16</option>
                            <option value="21" {{ old('RW', $qurban->RW) == '21' ? 'selected' : '' }}>RW 21</option>
                            <option value="lainnya" {{ strtolower(old('RW', $qurban->RW)) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('RW')
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
                                    {{ old('id_RT', $qurban->id_RT) == $rtwarga->id_RT ? 'selected' : '' }}>
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
                    <a href="{{ route('pendaftarQurban.index') }}"
                        class="w-full sm:w-auto px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Perbarui Data Qurban
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
