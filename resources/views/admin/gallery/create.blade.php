@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Tambah Media Galeri';
    @endphp

    <div class="w-full px-6 py-6 mx-auto">
        <!-- Breadcrumb / Back button -->
        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.gallery.index') }}"
                    class="w-9 h-9 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-slate-800">Tambah Media Baru</h1>
                    <p class="text-xs text-slate-500 mt-0.5">Unggah foto dokumentasi atau tambahkan link video YouTube</p>
                </div>
            </div>
        </div>

        @include('admin.layouts.partials.alert')

        <div class="max-w-3xl mx-auto bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Type Selector Tabs -->
            <div class="flex border-b border-slate-100 bg-slate-50/50 p-2 gap-2">
                <button type="button" id="tab-btn-foto" onclick="switchMediaType('foto')"
                    class="flex-1 py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 transition-all {{ $tipe === 'foto' ? 'bg-white text-emerald-800 shadow-sm border border-slate-200/60' : 'text-slate-500 hover:text-slate-800' }}">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Foto Galeri</span>
                </button>
                <button type="button" id="tab-btn-video" onclick="switchMediaType('video')"
                    class="flex-1 py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 transition-all {{ $tipe === 'video' ? 'bg-white text-rose-600 shadow-sm border border-slate-200/60' : 'text-slate-500 hover:text-slate-800' }}">
                    <svg class="w-4 h-4 text-rose-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                    </svg>
                    <span>Video YouTube</span>
                </button>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
                @csrf
                <input type="hidden" name="tipe" id="input-tipe" value="{{ old('tipe', $tipe) }}">

                <div class="space-y-6">
                    <!-- Judul Media -->
                    <div>
                        <label for="judul" class="block mb-1.5 text-sm font-medium text-slate-700">
                            Judul Media <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                            placeholder="Contoh: Sholat Idul Fitri 1445 H Bersama Jamaah"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border @error('judul') border-rose-400 @else border-slate-200 @enderror rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm transition" />
                        @error('judul')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section Khusus FOTO -->
                    <div id="section-foto" class="{{ old('tipe', $tipe) === 'video' ? 'hidden' : '' }}">
                        <label class="block mb-1.5 text-sm font-medium text-slate-700">
                            Unggah File Foto <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl hover:border-emerald-500 transition-colors bg-slate-50/50">
                            <div class="space-y-2 text-center">
                                <div id="preview-foto-container" class="hidden mb-3">
                                    <img id="preview-foto-img" src="" alt="Preview"
                                        class="mx-auto max-h-56 rounded-xl object-contain shadow-sm border border-slate-200">
                                </div>
                                <div id="upload-placeholder" class="flex flex-col items-center">
                                    <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-slate-600 mt-2">
                                        <label for="foto"
                                            class="relative cursor-pointer rounded-md font-semibold text-emerald-700 hover:text-emerald-800 focus-within:outline-none">
                                            <span>Pilih gambar</span>
                                            <input id="foto" name="foto" type="file" accept="image/png, image/jpeg, image/jpg, image/webp" class="sr-only" onchange="previewImage(this)">
                                        </label>
                                        <p class="pl-1">atau seret ke sini</p>
                                    </div>
                                    <p class="text-xs text-slate-400 mt-1">PNG, JPG, JPEG, WEBP hingga 5MB</p>
                                </div>
                            </div>
                        </div>
                        @error('foto')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section Khusus VIDEO YOUTUBE -->
                    <div id="section-video" class="{{ old('tipe', $tipe) === 'video' ? '' : 'hidden' }}">
                        <label for="youtube_url" class="block mb-1.5 text-sm font-medium text-slate-700">
                            Tautan Link Video YouTube <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <div class="relative">
                            <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url') }}"
                                placeholder="Contoh: https://www.youtube.com/watch?v=dQw4w9WgXcQ atau https://youtu.be/..."
                                oninput="checkYoutubePreview(this.value)"
                                class="w-full pl-10 pr-3.5 py-2.5 text-sm bg-white border @error('youtube_url') border-rose-400 @else border-slate-200 @enderror rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-600 shadow-sm transition" />
                            <svg class="w-5 h-5 text-rose-600 absolute left-3 top-2.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                            </svg>
                        </div>
                        <p class="mt-1 text-[11px] text-slate-400">Salin link video dari browser atau aplikasi YouTube.</p>
                        @error('youtube_url')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror

                        <!-- Preview Thumbnail YouTube -->
                        <div id="youtube-preview-container" class="hidden mt-4 p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <span class="text-xs font-semibold text-slate-600 block mb-2">Pratinjau Video YouTube:</span>
                            <div class="aspect-video w-full max-w-sm rounded-lg overflow-hidden relative shadow-sm border border-slate-200 bg-black">
                                <img id="youtube-preview-img" src="" alt="Thumbnail Preview" class="w-full h-full object-cover">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-10 h-10 rounded-full bg-rose-600 text-white flex items-center justify-center shadow-md">
                                        <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Urutan Tampil -->
                    <div>
                        <label for="urutan" class="block mb-1.5 text-sm font-medium text-slate-700">
                            Nomor Urutan Tampil (Opsional)
                        </label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}" min="0"
                            placeholder="0 (paling awal)"
                            class="w-full sm:w-48 px-3.5 py-2.5 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm transition" />
                        <p class="mt-1 text-[11px] text-slate-400">Nomor urut lebih kecil akan ditampilkan lebih dulu (0, 1, 2, ...).</p>
                    </div>

                    <!-- Keterangan / Deskripsi -->
                    <div>
                        <label for="keterangan" class="block mb-1.5 text-sm font-medium text-slate-700">
                            Keterangan / Deskripsi Singkat (Opsional)
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                            placeholder="Tuliskan keterangan kegiatan atau deskripsi singkat..."
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm transition">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="mt-8 pt-5 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.gallery.index') }}"
                        class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 hover:bg-slate-100 rounded-xl transition">
                        Batal
                    </a>
                    <button type="submit" id="btn-submit"
                        class="px-6 py-2.5 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01]">
                        Simpan Media
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function switchMediaType(type) {
            const inputTipe = document.getElementById('input-tipe');
            const sectionFoto = document.getElementById('section-foto');
            const sectionVideo = document.getElementById('section-video');
            const tabBtnFoto = document.getElementById('tab-btn-foto');
            const tabBtnVideo = document.getElementById('tab-btn-video');
            const btnSubmit = document.getElementById('btn-submit');

            inputTipe.value = type;

            if (type === 'foto') {
                sectionFoto.classList.remove('hidden');
                sectionVideo.classList.add('hidden');

                tabBtnFoto.className = 'flex-1 py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 transition-all bg-white text-emerald-800 shadow-sm border border-slate-200/60';
                tabBtnVideo.className = 'flex-1 py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 transition-all text-slate-500 hover:text-slate-800';

                btnSubmit.className = 'px-6 py-2.5 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01]';
                btnSubmit.textContent = 'Simpan Foto';
            } else {
                sectionFoto.classList.add('hidden');
                sectionVideo.classList.remove('hidden');

                tabBtnVideo.className = 'flex-1 py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 transition-all bg-white text-rose-600 shadow-sm border border-slate-200/60';
                tabBtnFoto.className = 'flex-1 py-3 px-4 rounded-xl text-sm font-semibold flex items-center justify-center gap-2 transition-all text-slate-500 hover:text-slate-800';

                btnSubmit.className = 'px-6 py-2.5 text-sm font-semibold text-white bg-rose-600 hover:bg-rose-700 rounded-xl shadow-md shadow-rose-600/20 transition-all hover:scale-[1.01]';
                btnSubmit.textContent = 'Simpan Video';
            }
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-foto-img').src = e.target.result;
                    document.getElementById('preview-foto-container').classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function extractYoutubeId(url) {
            const match = url.match(/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=|shorts\/))([\w-]{11})/);
            return match ? match[1] : null;
        }

        function checkYoutubePreview(url) {
            const id = extractYoutubeId(url);
            const container = document.getElementById('youtube-preview-container');
            const img = document.getElementById('youtube-preview-img');

            if (id) {
                img.src = `https://img.youtube.com/vi/${id}/hqdefault.jpg`;
                container.classList.remove('hidden');
            } else {
                container.classList.add('hidden');
            }
        }

        // Jalankan saat load jika ada nilai lama
        document.addEventListener('DOMContentLoaded', function() {
            const currentTipe = document.getElementById('input-tipe').value;
            switchMediaType(currentTipe || 'foto');

            const ytInput = document.getElementById('youtube_url');
            if (ytInput && ytInput.value) {
                checkYoutubePreview(ytInput.value);
            }
        });
    </script>
@endsection
