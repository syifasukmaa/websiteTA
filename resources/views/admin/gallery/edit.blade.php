@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Edit ' . ($gallery->tipe === 'foto' ? 'Foto Galeri' : 'Video YouTube');
    @endphp

    <div class="w-full px-6 py-6 mx-auto">
        <!-- Breadcrumb / Back button -->
        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.gallery.index', ['tipe' => $gallery->tipe]) }}"
                    class="w-9 h-9 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 flex items-center justify-center transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-slate-800">
                        Edit {{ $gallery->tipe === 'foto' ? 'Foto Galeri' : 'Video YouTube' }}
                    </h1>
                    <p class="text-xs text-slate-500 mt-0.5">Perbarui informasi media dokumentasi masjid</p>
                </div>
            </div>

            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $gallery->tipe === 'foto' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' : 'bg-rose-50 text-rose-700 border border-rose-200/60' }}">
                Tipe: {{ ucfirst($gallery->tipe) }}
            </span>
        </div>

        @include('admin.layouts.partials.alert')

        <div class="max-w-3xl mx-auto bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden p-6 sm:p-8">
            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Judul Media -->
                    <div>
                        <label for="judul" class="block mb-1.5 text-sm font-medium text-slate-700">
                            Judul Media <span class="text-rose-500 font-semibold">*</span>
                        </label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $gallery->judul) }}" required
                            class="w-full px-3.5 py-2.5 text-sm bg-white border @error('judul') border-rose-400 @else border-slate-200 @enderror rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm transition" />
                        @error('judul')
                            <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($gallery->tipe === 'foto')
                        <!-- Current Image Display -->
                        <div>
                            <label class="block mb-1.5 text-sm font-medium text-slate-700">Foto Saat Ini</label>
                            <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 inline-block">
                                <img src="{{ $gallery->image_url }}" alt="{{ $gallery->judul }}"
                                    class="max-h-48 rounded-lg object-contain">
                            </div>
                        </div>

                        <!-- Ganti Foto -->
                        <div>
                            <label class="block mb-1.5 text-sm font-medium text-slate-700">
                                Ganti File Foto (Kosongkan jika tidak ingin mengubah foto)
                            </label>
                            <input id="foto" name="foto" type="file" accept="image/png, image/jpeg, image/jpg, image/webp"
                                onchange="previewImage(this)"
                                class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                            <div id="preview-foto-container" class="hidden mt-3">
                                <p class="text-xs font-medium text-slate-500 mb-1">Pratinjau Foto Baru:</p>
                                <img id="preview-foto-img" src="" alt="Preview Baru"
                                    class="max-h-48 rounded-lg object-contain shadow-sm border border-slate-200">
                            </div>
                            @error('foto')
                                <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                        <!-- Current & Edit Video YouTube -->
                        <div>
                            <label for="youtube_url" class="block mb-1.5 text-sm font-medium text-slate-700">
                                Tautan Link Video YouTube <span class="text-rose-500 font-semibold">*</span>
                            </label>
                            <div class="relative">
                                <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $gallery->youtube_url) }}"
                                    required oninput="checkYoutubePreview(this.value)"
                                    class="w-full pl-10 pr-3.5 py-2.5 text-sm bg-white border @error('youtube_url') border-rose-400 @else border-slate-200 @enderror rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-rose-500/20 focus:border-rose-600 shadow-sm transition" />
                                <svg class="w-5 h-5 text-rose-600 absolute left-3 top-2.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                </svg>
                            </div>
                            @error('youtube_url')
                                <p class="mt-1.5 text-xs font-medium text-rose-500">{{ $message }}</p>
                            @enderror

                            <!-- Preview Thumbnail YouTube -->
                            <div id="youtube-preview-container" class="mt-4 p-4 rounded-xl bg-slate-50 border border-slate-200">
                                <span class="text-xs font-semibold text-slate-600 block mb-2">Pratinjau Video YouTube:</span>
                                <div class="aspect-video w-full max-w-sm rounded-lg overflow-hidden relative shadow-sm border border-slate-200 bg-black">
                                    <img id="youtube-preview-img" src="{{ $gallery->youtube_thumbnail }}" alt="Thumbnail Preview" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-10 h-10 rounded-full bg-rose-600 text-white flex items-center justify-center shadow-md">
                                            <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Urutan Tampil -->
                    <div>
                        <label for="urutan" class="block mb-1.5 text-sm font-medium text-slate-700">
                            Nomor Urutan Tampil
                        </label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', $gallery->urutan) }}" min="0"
                            class="w-full sm:w-48 px-3.5 py-2.5 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm transition" />
                        <p class="mt-1 text-[11px] text-slate-400">Nomor urut lebih kecil akan ditampilkan lebih dulu (0, 1, 2, ...).</p>
                    </div>

                    <!-- Keterangan / Deskripsi -->
                    <div>
                        <label for="keterangan" class="block mb-1.5 text-sm font-medium text-slate-700">
                            Keterangan / Deskripsi Singkat (Opsional)
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="3"
                            class="w-full px-3.5 py-2.5 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm transition">{{ old('keterangan', $gallery->keterangan) }}</textarea>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="mt-8 pt-5 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.gallery.index', ['tipe' => $gallery->tipe]) }}"
                        class="px-5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-800 hover:bg-slate-100 rounded-xl transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 text-sm font-semibold text-white {{ $gallery->tipe === 'foto' ? 'bg-emerald-700 hover:bg-emerald-800 shadow-emerald-700/20' : 'bg-rose-600 hover:bg-rose-700 shadow-rose-600/20' }} rounded-xl shadow-md transition-all hover:scale-[1.01]">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
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

            if (id && img) {
                img.src = `https://img.youtube.com/vi/${id}/hqdefault.jpg`;
                container.classList.remove('hidden');
            }
        }
    </script>
@endsection
