@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Manajemen Galeri & Media';
    @endphp

    <div class="w-full px-6 py-6 mx-auto">
        <!-- Top Toolbar -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-xl font-bold text-slate-800">Galeri & Media Publik</h1>
                <p class="text-xs text-slate-500 mt-0.5">Kelola dokumentasi foto dan video YouTube yang tampil di halaman depan website</p>
            </div>

            <!-- Actions & Add Buttons -->
            <div class="flex flex-wrap items-center gap-2.5">
                <form method="GET" action="{{ route('admin.gallery.index') }}" class="relative">
                    @if(request('tipe'))
                        <input type="hidden" name="tipe" value="{{ request('tipe') }}">
                    @endif
                    <input type="search" name="search" value="{{ request('search') }}"
                        class="w-56 pl-9 pr-3 py-2 text-xs sm:text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm"
                        placeholder="Cari judul..." autocomplete="off" />
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </form>

                <a href="{{ route('admin.gallery.create', ['tipe' => 'foto']) }}"
                    class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs sm:text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>+ Tambah Foto</span>
                </a>

                <a href="{{ route('admin.gallery.create', ['tipe' => 'video']) }}"
                    class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs sm:text-sm font-semibold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200/80 rounded-xl shadow-sm transition-all hover:scale-[1.01]">
                    <svg class="w-4 h-4 text-rose-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                    </svg>
                    <span>+ Tambah Video</span>
                </a>
            </div>
        </div>

        @include('admin.layouts.partials.alert')

        <!-- Summary & Filter Tabs -->
        <div class="mb-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="{{ route('admin.gallery.index') }}"
                class="p-4 rounded-2xl bg-white border {{ !request('tipe') ? 'border-emerald-600 ring-2 ring-emerald-500/10' : 'border-slate-100' }} shadow-sm flex items-center justify-between transition hover:border-slate-200">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Semua Media</span>
                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ $fotoCount + $videoCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
            </a>

            <a href="{{ route('admin.gallery.index', ['tipe' => 'foto']) }}"
                class="p-4 rounded-2xl bg-white border {{ request('tipe') === 'foto' ? 'border-emerald-600 ring-2 ring-emerald-500/10' : 'border-slate-100' }} shadow-sm flex items-center justify-between transition hover:border-slate-200">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Foto Galeri</span>
                    <p class="text-2xl font-bold text-emerald-700 mt-1">{{ $fotoCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </a>

            <a href="{{ route('admin.gallery.index', ['tipe' => 'video']) }}"
                class="p-4 rounded-2xl bg-white border {{ request('tipe') === 'video' ? 'border-rose-500 ring-2 ring-rose-500/10' : 'border-slate-100' }} shadow-sm flex items-center justify-between transition hover:border-slate-200">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Video YouTube</span>
                    <p class="text-2xl font-bold text-rose-600 mt-1">{{ $videoCount }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                    </svg>
                </div>
            </a>
        </div>

        <!-- Filter Tab Buttons -->
        <div class="flex items-center gap-2 mb-6 border-b border-slate-200 pb-3">
            <span class="text-xs font-medium text-slate-400 mr-2">Filter:</span>
            <a href="{{ route('admin.gallery.index') }}"
                class="px-3 py-1.5 rounded-lg text-xs font-semibold transition {{ !request('tipe') ? 'bg-slate-800 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Semua ({{ $fotoCount + $videoCount }})
            </a>
            <a href="{{ route('admin.gallery.index', ['tipe' => 'foto']) }}"
                class="px-3 py-1.5 rounded-lg text-xs font-semibold transition {{ request('tipe') === 'foto' ? 'bg-emerald-700 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Hanya Foto ({{ $fotoCount }})
            </a>
            <a href="{{ route('admin.gallery.index', ['tipe' => 'video']) }}"
                class="px-3 py-1.5 rounded-lg text-xs font-semibold transition {{ request('tipe') === 'video' ? 'bg-rose-600 text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Hanya Video ({{ $videoCount }})
            </a>
        </div>

        <!-- Content Grid -->
        @if ($galleries->isEmpty())
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-12 text-center">
                <div class="w-16 h-16 rounded-2xl bg-slate-50 text-slate-400 flex items-center justify-center mx-auto mb-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-800">Belum ada media galeri</h3>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">
                    Mulai tambahkan foto kegiatan masjid atau sematkan tautan video YouTube untuk ditampilkan pada website.
                </p>
                <div class="flex items-center justify-center gap-3 mt-5">
                    <a href="{{ route('admin.gallery.create', ['tipe' => 'foto']) }}"
                        class="px-4 py-2 text-xs font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl transition">
                        + Tambah Foto
                    </a>
                    <a href="{{ route('admin.gallery.create', ['tipe' => 'video']) }}"
                        class="px-4 py-2 text-xs font-semibold text-rose-700 bg-rose-50 hover:bg-rose-100 rounded-xl transition">
                        + Tambah Video
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach ($galleries as $item)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col justify-between group hover:shadow-md hover:border-slate-200 transition-all">
                        <!-- Media Preview Container -->
                        <div class="relative aspect-video w-full bg-slate-100 overflow-hidden">
                            @if ($item->tipe === 'foto')
                                <img src="{{ $item->image_url }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-2.5 left-2.5 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-emerald-800/80 text-white backdrop-blur-md flex items-center gap-1 shadow-sm">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Foto
                                </span>
                            @else
                                <img src="{{ $item->youtube_thumbnail }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                                    <div class="w-10 h-10 rounded-full bg-rose-600 text-white flex items-center justify-center shadow-md">
                                        <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span class="absolute top-2.5 left-2.5 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-rose-600/90 text-white backdrop-blur-md flex items-center gap-1 shadow-sm">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                    </svg>
                                    YouTube
                                </span>
                            @endif

                            @if($item->urutan > 0)
                                <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-md text-[10px] font-semibold bg-slate-900/70 text-white backdrop-blur-sm">
                                    Urutan: {{ $item->urutan }}
                                </span>
                            @endif
                        </div>

                        <!-- Info & Metadata -->
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="font-bold text-sm text-slate-800 line-clamp-1 group-hover:text-emerald-700 transition" title="{{ $item->judul }}">
                                    {{ $item->judul }}
                                </h4>
                                @if ($item->keterangan)
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2">{{ $item->keterangan }}</p>
                                @endif
                                @if ($item->tipe === 'video')
                                    <a href="{{ $item->youtube_url }}" target="_blank" rel="noopener noreferrer"
                                        class="mt-2 inline-flex items-center gap-1 text-[11px] font-medium text-rose-600 hover:text-rose-700 hover:underline">
                                        <span>Buka di YouTube</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>

                            <!-- Actions Footer -->
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[11px] text-slate-400">
                                    {{ $item->created_at->format('d M Y') }}
                                </span>

                                <div class="flex items-center gap-1.5">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.gallery.edit', $item->id) }}"
                                        title="Edit Media"
                                        class="w-7 h-7 rounded-lg flex items-center justify-center text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.gallery.delete', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus media &quot;{{ $item->judul }}&quot;?');"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus Media"
                                            class="w-7 h-7 rounded-lg flex items-center justify-center text-rose-600 bg-rose-50 hover:bg-rose-100 transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
@endsection
