<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logoMasjid.png') }}" />
    <title>Login Admin</title>
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
                                    <p class="mt-2 mb-0">Masukkan Email dan Kata Sandi Untuk Login Dashboard</p>
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
                                        {{-- <div class="mt-4">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="block w-full mt-2" type="password"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Masukkan Kata Sandi" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div> --}}
                                        <div class="relative">
                                            <x-text-input id="password" class="block w-full pr-10 mt-2" type="password"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Masukkan Kata Sandi" />

                                            <button type="button" onclick="togglePassword()"
                                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">

                                                <!-- Mata terbuka (Eye) -->
                                                <svg id="eyeOpen" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>

                                                <!-- Mata tertutup (Eye-off) -->
                                                <svg id="eyeOff" class="hidden w-6 h-6"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
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
<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeOff = document.getElementById('eyeOff');

        if (input.type === 'password') {
            input.type = 'text';
            eyeOpen.classList.add('hidden');
            eyeOff.classList.remove('hidden');
        } else {
            input.type = 'password';
            eyeOpen.classList.remove('hidden');
            eyeOff.classList.add('hidden');
        }
    }
</script>

</html>
