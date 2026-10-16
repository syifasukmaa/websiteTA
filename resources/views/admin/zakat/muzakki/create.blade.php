@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Tambah Muzakki';
    @endphp
    <div class="w-full px-6 py-6 mx-auto max-w-5xl">
        <!-- Top Navigation -->
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('admin.muzakki.index') }}"
                class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 hover:text-emerald-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Data Muzakki
            </a>
            <span class="text-xs font-medium text-slate-400">Penerimaan Zakat Fitrah & Infaq</span>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Form Header with Islamic Theme Accent -->
            <div class="relative bg-gradient-to-r from-emerald-800 to-teal-800 px-8 py-6 text-white overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-32 h-32 rounded-full bg-white/5 blur-xl pointer-events-none"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-2 text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        Formulir Penerimaan Zakat
                    </div>
                    <h2 class="text-2xl font-bold text-white">Tambah Data Muzakki</h2>
                    <p class="text-emerald-100/80 text-sm mt-1">
                        Catat data penyerahan zakat fitrah (beras / uang) dan infaq dari muzakki warga.
                    </p>
                </div>
            </div>

            <!-- Form Content -->
            <form action="{{ route('admin.muzakki.store') }}" method="POST" class="p-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-field name="nama_muzakki" label="Nama Muzakki / Kepala Keluarga"
                            placeholder="Contoh: H. Ahmad Syukri" :required="true" />
                    </div>

                    <div>
                        <x-input-field name="jumlah_jiwa" label="Jumlah Jiwa Zakat Fitrah"
                            placeholder="Contoh: 4" :required="true" type="number" min="1" />
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
                        <x-input-field name="infaq" label="Infaq Shadaqah (Rp)"
                            placeholder="0 (opsional)" type="number" min="0" step="1000" />
                    </div>

                    <!-- Payment Choice Group: Beras vs Uang -->
                    <div class="md:col-span-2 p-5 bg-emerald-50/50 rounded-2xl border border-emerald-100">
                        <div class="text-xs font-bold uppercase tracking-wider text-emerald-800 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Bentuk Penunaian Zakat Fitrah
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-field name="uang" label="Nominal Uang Tunai (Rp)"
                                    placeholder="Contoh: 180000" type="number" min="0" step="1000" />
                                <p class="text-xs text-slate-500 mt-1">Isi jika membayar zakat dalam bentuk uang tunai.</p>
                            </div>
                            <div>
                                <x-input-field name="beras" label="Jumlah Beras (Liter)"
                                    placeholder="Contoh: 10" type="number" step="0.1" min="0" />
                                <p class="text-xs text-slate-500 mt-1">Isi jika membayar zakat dalam bentuk beras (e.g. 2.5 atau 3.5 Liter/jiwa).</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <x-textarea name="alamat" label="Alamat Domisili Muzakki"
                            placeholder="Alamat lengkap tempat tinggal muzakki" :required="true" />
                    </div>

                    <div class="md:col-span-2">
                        <x-textarea name="keterangan" label="Catatan / Keterangan Khusus"
                            placeholder="Catatan tambahan amilin (opsional, contoh: titipan keluarga/atas nama almarhum)" />
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row items-center justify-end gap-3">
                    <a href="{{ route('admin.muzakki.index') }}"
                        class="w-full sm:w-auto px-5 py-2.5 text-sm font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Data Muzakki
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
