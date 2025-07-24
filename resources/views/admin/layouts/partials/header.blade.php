<aside
    class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-md transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent h-screen overflow-auto">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
            <img src="{{ asset('assets/img/logoMasjid.png') }}"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-10" alt="main_logo" />
            <span class="ml-1 text-base font-semibold transition-all duration-200 text-hijau2 ease-nav-brand">Dashboard
                Masjid</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
        {{-- <div class="flex flex-col justify-between"> --}}
        <ul class="flex flex-col flex-grow h-full pl-0 mb-0">
            @cannot('ketua_rt')
                <li class="mt-0.5 w-full">
                    <a class="{{ Request::is('admin/dashboard') ? 'shadow-soft-xl font-semibold bg-slate-100' : 'shadow-none' }} py-2.7 rounded-lg text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors text-slate-700"
                        href="{{ route('admin.dashboard') }}">
                        <div
                            class="{{ Request::is('admin/dashboard') ? 'bg-gradient-to-tl from-green-700 to-green-400 ' : 'bg-transparent' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 z-10">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                    d="M4 5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5Zm16 14a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2ZM4 13a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6Zm16-2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v6Z" />
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>
            @endcannot
            <li class="mt-0.5 w-full">
                <a class="{{ Request::is('admin/zakat/*') ? 'shadow-soft-xl font-semibold bg-slate-100' : 'shadow-none bg-transparent' }} py-2.7  text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 transition-colors"
                    href="{{ route('zakatMustahik.index') }}">
                    <div
                        class="{{ Request::is('admin/zakat/*') ? 'bg-gradient-to-tl from-green-700 to-green-400 ' : 'bg-transparent' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 z-auto">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L550.2 352l41.8 0c26.5 0 48-21.5 48-48l0-128c0-26.5-21.5-48-48-48l-76 0-4 0-.7 0-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48-80 0c-26.5 0-48 21.5-48 48L0 304c0 26.5 21.5 48 48 48l108.2 0 91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123z" />
                        </svg>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Zakat</span>
                </a>
            </li>
            @cannot('ketua_rt')
                <li class="mt-0.5 w-full">
                    <a class="{{ Request::is('admin/qurban/*') ? 'shadow-soft-xl font-semibold bg-slate-100' : 'shadow-none' }} py-2.7 rounded-lg text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors text-slate-700"
                        href="{{ route('pendaftarQurban.index') }}">
                        <div
                            class="{{ Request::is('admin/qurban/*') ? 'bg-gradient-to-tl from-green-700 to-green-400 ' : 'bg-transparent' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 z-10">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 5c0 1 1 3 3 3s3-2 3-3V3M19 5c0 1-1 3-3 3s-3-2-3-3V3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M8 12v2m8-2v2M12 8v4" stroke-linecap="round" stroke-linejoin="round" />
                                <circle cx="12" cy="16" r="6" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Qurban</span>
                    </a>
                </li>
            @endcannot

            <li class="mt-0.5 w-full">
                <a class="{{ Request::is('admin/yatimPiatu*') ? 'shadow-soft-xl font-semibold bg-slate-100' : 'shadow-none' }} py-2.7 text-sm rounded-lg ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors text-slate-700"
                    href="{{ route('yatimPiatu.index') }}">
                    <div
                        class="{{ Request::is('admin/yatimPiatu*') ? 'bg-gradient-to-tl from-green-700 to-green-400 ' : 'bg-transparent' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">


                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 21s-6-4.5-6-9a6 6 0 0 1 12 0c0 4.5-6 9-6 9z" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>


                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Yatim Piatu</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="{{ Request::is('admin/duafa*') ? 'shadow-soft-xl font-semibold bg-slate-100' : 'shadow-none' }} py-2.7 text-sm rounded-lg ease-nav-brand my-0 mx-4 items-center whitespace-nowrap px-4 transition-colors text-slate-700 hidden"
                    href="{{ route('duafa.index') }}">
                    <div
                        class="{{ Request::is('admin/duafa*') ? 'bg-gradient-to-tl from-green-700 to-green-400 ' : 'bg-transparent' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                        </svg>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Duafa</span>
                </a>
            </li>

            @cannot('ketua_rt')
                <li class="mt-0.5 w-full">
                    <a class="{{ Request::is('admin/pengguna*') ? 'shadow-soft-xl bg-slate-100' : 'shadow-none' }} py-2.7 text-sm ease-nav-brand rounded-lg my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="{{ route('pengguna.index') }}">
                        <div
                            class="{{ Request::is('admin/pengguna*') ? 'bg-gradient-to-tl from-green-700 to-green-400 ' : 'bg-transparent' }} shadow-soft-2xl  mr-2 flex h-8 w-8 items-center justify-center rounded-lg  bg-center stroke-0 text-center xl:p-2.5">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path fill="#383838" fill-rule="evenodd"
                                    d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Akun User</span>
                    </a>
                </li>
            @endcannot

            {{-- <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="./pages/rtl.html">
                    <div
                        class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>settings</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(304.000000, 151.000000)">
                                            <polygon class="fill-slate-800 opacity-60"
                                                points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                            </polygon>
                                            <path class="fill-slate-800 opacity-60"
                                                d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z">
                                            </path>
                                            <path class="fill-slate-800"
                                                d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </span>
                </a>
            </li> --}}

            <li class="mt-auto">
                <a class="py-2.7 text-sm rounded-lg ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div
                        class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-transparent bg-center stroke-0 text-center xl:p-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M16 13v-2H8V8l-5 4 5 4v-3h8zM20 3H8c-1.1 0-2 .9-2 2v4h2V5h12v14H8v-4H6v4c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
                        Keluar
                    </span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

    </div>


</aside>

<!-- end sidenav -->

<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
    <!-- Navbar -->
    <nav class="relative flex flex-wrap items-center px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start"
        navbar-main navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
            <nav>

                <h6 class="mb-0 font-bold capitalize text-hijau1">Halaman {{ $title ?? 'Dashboard' }}</h6>
            </nav>
            <div class="flex flex-row-reverse content-end">
                <div class="flex items-center font-medium text-wrap">
                    <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <h3 class="w-full ml-2 h-fit text-orange2">{{ Auth::user()->name }}</h3>
                </div>
                <ul class="flex flex-row items-center justify-end pl-0 mb-0 mr-2 list-none md-max:w-full">
                    <li class="flex items-center xl:hidden">
                        <a href="javascript:;" class="block p-0 text-sm transition-all ease-nav-brand text-slate-500"
                            sidenav-trigger>
                            <div class="w-4.5 overflow-hidden">
                                <i
                                    class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                                <i
                                    class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                                <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- end Navbar -->
