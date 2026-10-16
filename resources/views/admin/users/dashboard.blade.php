@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Manajemen Pengguna';
    @endphp

    <div class="w-full px-6 py-6 mx-auto">
        <!-- Top Toolbar -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-xl font-bold text-slate-800">Manajemen Pengguna Sistem</h1>
                <p class="text-xs text-slate-500 mt-0.5">Kelola data administrator, ketua RT, dan hak akses pengguna aplikasi</p>
            </div>

            <!-- Search & Actions -->
            <div class="flex flex-wrap items-center gap-3">
                <form method="GET" action="{{ route('pengguna.index') }}" class="relative">
                    <input type="search" name="search" value="{{ request('search') }}"
                        class="w-64 pl-10 pr-4 py-2 text-sm bg-white border border-slate-200 rounded-xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 shadow-sm"
                        placeholder="Cari nama / email..." autocomplete="off" />
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </form>

                <a href="{{ route('pengguna.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-emerald-700 hover:bg-emerald-800 rounded-xl shadow-md shadow-emerald-700/20 transition-all hover:scale-[1.01]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah Pengguna</span>
                </a>
            </div>
        </div>

        @include('admin.layouts.partials.alert')

        <!-- Table Card -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-emerald-50/40 via-white to-transparent">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Daftar Akun Pengguna</h2>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Total {{ $users->total() }} akun terdaftar dalam sistem
                    </p>
                </div>

                <!-- Pagination Quick Links -->
                <div class="flex items-center gap-1.5">
                    @if ($users->onFirstPage())
                        <span class="px-3 py-1.5 text-xs font-semibold text-slate-300 bg-slate-50 rounded-lg cursor-not-allowed">Sebelumnya</span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Sebelumnya</a>
                    @endif

                    <span class="px-3 py-1.5 text-xs font-bold text-emerald-800 bg-emerald-50 rounded-lg">
                        {{ $users->currentPage() }} / {{ $users->lastPage() }}
                    </span>

                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="px-3 py-1.5 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition shadow-sm">Berikutnya</a>
                    @else
                        <span class="px-3 py-1.5 text-xs font-semibold text-slate-300 bg-slate-50 rounded-lg cursor-not-allowed">Berikutnya</span>
                    @endif
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50/80 text-xs font-bold uppercase tracking-wider text-slate-500 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-4 text-center w-12">No</th>
                            <th class="px-6 py-4">Nama Lengkap</th>
                            <th class="px-6 py-4">Alamat Email</th>
                            <th class="px-6 py-4 text-center">Hak Akses (Role)</th>
                            <th class="px-6 py-4">Tanggal Dibuat</th>
                            <th class="px-6 py-4 text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($users as $user)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="px-6 py-4 text-center font-medium text-slate-400">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-800">{{ $user->name }}</div>
                                    @if ($user->id_RT)
                                        <div class="text-xs text-slate-400">Wilayah RT {{ $user->id_RT }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-slate-700">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold capitalize
                                        {{ $user->role == 'admin' ? 'bg-emerald-50 text-emerald-800 border border-emerald-200/60' : '' }}
                                        {{ $user->role == 'ketua_rt' ? 'bg-blue-50 text-blue-800 border border-blue-200/60' : '' }}
                                        {{ $user->role == 'user' ? 'bg-slate-100 text-slate-700 border border-slate-200/60' : '' }}">
                                        {{ str_replace('_', ' ', $user->role) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-xs font-medium text-slate-500">
                                    {{ date('d M Y', strtotime($user->created_at)) }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <!-- Edit Button -->
                                        <a href="{{ route('pengguna.detail', $user->id) }}"
                                            title="Edit Pengguna"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                        </a>

                                        <!-- Delete Button -->
                                        @if(auth()->id() !== $user->id)
                                            <form action="{{ route('pengguna.delete', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun {{ $user->name }}?');"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Hapus Akun"
                                                    class="w-8 h-8 rounded-lg flex items-center justify-center text-rose-600 bg-rose-50 hover:bg-rose-100 transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                    </svg>
                                    <p class="font-semibold text-slate-600">Belum ada data pengguna</p>
                                    <p class="text-xs text-slate-400 mt-1">Gunakan tombol "Tambah Pengguna" untuk mendaftarkan akun baru.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer Pagination -->
            @if ($users->hasPages())
                <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between">
                    <p class="text-xs text-slate-500">
                        Halaman <span class="font-bold text-slate-700">{{ $users->currentPage() }}</span> dari <span class="font-bold text-slate-700">{{ $users->lastPage() }}</span>
                    </p>
                    <div class="flex items-center gap-1">
                        {{ $users->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
