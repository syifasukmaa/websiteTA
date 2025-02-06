<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Data Zakat</title>
    @include('admin.layouts.partials.links')
    @vite('resources/css/app.css')
</head>

<body class="m-0 font-sans text-base antialiased font-normal bg-white text-start leading-default text-slate-500">
    <div class="container sticky top-0 z-sticky">
        <div class="flex flex-wrap -mx-3">

        </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
        <section>
            <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
                <div class="container z-10">
                    <div class="flex flex-wrap mt-0 -mx-3">
                        <div
                            class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                            <div
                                class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                                    <h3
                                        class="relative z-10 text-2xl font-semibold tracking-normal text-transparent bg-gradient-to-tl from-hijau1 to-hijau2 bg-clip-text">
                                        Selamat Datang</h3>
                                    <p class="mt-2 mb-0">Masukkan Email dan Kata Sandi Untuk Login</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Email Address -->
                                        <div>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block w-full mt-2" type="email"
                                                name="email" :value="old('email')" required autofocus
                                                autocomplete="username" placeholder="Masukkan Email Anda" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="block w-full mt-2" type="password"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Masukkan Kata Sandi" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-3" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif

                                            <x-primary-button class="bg-green-600 ms-3">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                                    <p class="mx-auto mb-6 text-sm leading-normal">
                                        Don't have an account?
                                        <a href="/register"
                                            class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Sign
                                            up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full h-screen max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                            <div
                                class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                                <div class="absolute inset-x-0 top-0 z-0 w-3/4 h-full -ml-16 bg-center bg-no-repeat bg-auto bg-teal-50 left-2 skew-x-10"
                                    style="background-image: url('{{ asset('/assets/img/logoMasjid.png') }}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- @include('admin.layouts.partials.scripts') --}}
</body>

</html>
