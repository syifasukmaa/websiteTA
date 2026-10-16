<aside
    class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-3xl border border-slate-100 bg-white p-0 antialiased shadow-sm transition-transform duration-200 xl:left-0 xl:translate-x-0 h-[calc(100vh-2rem)]">
    
    <!-- Sidebar Header / Logo -->
    <div class="h-20 px-6 flex items-center justify-between border-b border-slate-100">
        <a class="flex items-center gap-3 text-slate-800" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/img/logoMasjid.png') }}"
                class="w-10 h-10 object-contain drop-shadow-sm" alt="Logo Masjid" />
            <div class="flex flex-col">
                <span class="text-sm font-bold text-emerald-900 leading-tight">Masjid At-Taubah</span>
                <span class="text-[11px] font-medium text-emerald-600">Admin Portal</span>
            </div>
        </a>
        <button type="button" class="xl:hidden p-2 text-slate-400 hover:text-slate-600" sidenav-close>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Navigation Menu -->
    <div class="px-3 py-4 flex flex-col justify-between h-[calc(100%-5rem)]">
        <ul class="flex flex-col gap-1 pl-0 mb-0">
            @cannot('ketua_rt')
                <li>
                    <a class="{{ Request::is('admin/dashboard') ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-800' }} py-2.5 px-3.5 rounded-2xl text-sm flex items-center gap-3 transition-all"
                        href="{{ route('admin.dashboard') }}">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center {{ Request::is('admin/dashboard') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endcannot

            <!-- Modul Zakat -->
            @if(in_array(Auth::user()->role, ['admin', 'ketua_rt']))
            <li>
                <a class="{{ Request::is('admin/zakat*') ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-800' }} py-2.5 px-3.5 rounded-2xl text-sm flex items-center gap-3 transition-all"
                    href="{{ route('zakatMustahik.index') }}">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center {{ Request::is('admin/zakat*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span>Zakat & Infaq</span>
                </a>
            </li>
            @endif

            <!-- Modul Qurban -->
            @if(Auth::user()->role === 'admin')
                <li>
                    <a class="{{ Request::is('admin/qurban*') ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-800' }} py-2.5 px-3.5 rounded-2xl text-sm flex items-center gap-3 transition-all"
                        href="{{ route('pendaftarQurban.index') }}">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center {{ Request::is('admin/qurban*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <span>Hewan Qurban</span>
                    </a>
                </li>
            @endif

            <!-- Modul Yatim Piatu -->
            @if(in_array(Auth::user()->role, ['admin', 'ketua_rt']))
            <li>
                <a class="{{ Request::is('admin/yatimPiatu*') ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-800' }} py-2.5 px-3.5 rounded-2xl text-sm flex items-center gap-3 transition-all"
                    href="{{ route('yatimPiatu.index') }}">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center {{ Request::is('admin/yatimPiatu*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span>Yatim Piatu</span>
                </a>
            </li>
            @endif

            <!-- Modul Duafa -->
            @if(in_array(Auth::user()->role, ['admin', 'ketua_rt']))
            <li>
                <a class="{{ Request::is('admin/duafa*') ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-800' }} py-2.5 px-3.5 rounded-2xl text-sm flex items-center gap-3 transition-all"
                    href="{{ route('duafa.index') }}">
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center {{ Request::is('admin/duafa*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span>Kaum Duafa</span>
                </a>
            </li>
            @endif

            <!-- Modul Galeri & Media (Super Admin & Tim Media) -->
            @can('manage-media')
                <li>
                    <a class="{{ Request::is('admin/galeri*') ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-800' }} py-2.5 px-3.5 rounded-2xl text-sm flex items-center gap-3 transition-all"
                        href="{{ route('admin.gallery.index') }}">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center {{ Request::is('admin/galeri*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span>Galeri & Media</span>
                    </a>
                </li>
            @endcan

            <!-- Modul Pengguna (Admin Only) -->
            @can('admin')
                <li>
                    <a class="{{ Request::is('admin/pengguna*') ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20 font-semibold' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-800' }} py-2.5 px-3.5 rounded-2xl text-sm flex items-center gap-3 transition-all"
                        href="{{ route('pengguna.index') }}">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center {{ Request::is('admin/pengguna*') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <span>Akun Pengguna</span>
                    </a>
                </li>
            @endcan
        </ul>

        <!-- Logout Bottom Section -->
        <div class="pt-4 border-t border-slate-100">
            <a class="py-2.5 px-3.5 rounded-2xl text-sm flex items-center gap-3 text-rose-600 hover:bg-rose-50 transition-colors font-medium cursor-pointer"
                href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </div>
                <span>Keluar Aplikasi</span>
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</aside>

<!-- Main Wrapper -->
<main class="ease-soft-in-out xl:ml-68.5 relative h-full min-h-screen transition-all duration-200">
    <!-- Navbar Header -->
    <nav class="relative flex items-center justify-between px-6 py-4 mx-6 mt-4 bg-white/80 backdrop-blur-md border border-slate-100 shadow-sm rounded-2xl">
        <div class="flex items-center gap-3">
            <button type="button" class="xl:hidden p-2 text-slate-500 hover:text-slate-800" sidenav-trigger>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div>
                <nav class="flex text-xs text-slate-400 font-medium mb-0.5">
                    <span>Admin</span>
                    <span class="mx-1.5">/</span>
                    <span class="text-emerald-700 font-semibold">{{ $title ?? 'Dashboard' }}</span>
                </nav>
                <h1 class="text-base font-bold text-slate-800 leading-none">{{ $title ?? 'Dashboard' }}</h1>
            </div>
        </div>

        <!-- User Profile Pill -->
        <div class="flex items-center gap-3">
            <a href="/" target="_blank"
                class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Lihat Web Publik
            </a>

            <div class="flex items-center gap-2.5 pl-3 border-l border-slate-200">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-700 to-teal-600 text-white font-bold flex items-center justify-center text-sm shadow-sm">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="hidden md:flex flex-col text-left">
                    <span class="text-xs font-bold text-slate-800">{{ Auth::user()->name }}</span>
                    <span class="text-[11px] font-medium text-slate-400 capitalize">{{ str_replace('_', ' ', Auth::user()->role ?? 'Admin') }}</span>
                </div>
            </div>
        </div>
    </nav>
