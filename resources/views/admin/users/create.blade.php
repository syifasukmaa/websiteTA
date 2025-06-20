@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Menambah Pengguna';
    @endphp
    <div class="w-full px-12 py-5 mx-auto">
        <a href="{{ route('pengguna.index') }}" class="px-4 py-2 text-base font-medium text-white bg-black rounded-md ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-4 mx-auto md:px-12">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid md:px-5 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="pb-0 mb-0 bg-white border-b-0 md:p-6 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Menambah Data Pengguna</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-3 overflow-x-auto md:p-6">
                            <div class="dark:bg-gray-700">
                                <form action="{{ route('pengguna.store') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                                        <x-input-field name="name" label="Nama Pengguna"
                                            placeholder="Masukkan nama pengguna" :required="true" />
                                        <x-input-field name="email" label="Email" placeholder="Masukkan email pengguna"
                                            :required="true" />
                                        <x-input-field name="password" label="Password"
                                            placeholder="Masukkan password pengguna" :required="true" type="password" />
                                        <x-input-field name="confirmation_password" label="Confirmation Password"
                                            placeholder="Masukkan konfirmasi password pengguna" :required="true"
                                            type="password" />
                                        <div>
                                            <label for="role"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Role
                                                <span class="text-red-500">*</span></label>
                                            <select id="role" name="role"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="admin">Admin
                                                </option>
                                                <option value="ketua_rt">
                                                    Ketua RT</option>
                                                <option value="user">User
                                                </option>

                                            </select>
                                        </div>
                                        <div>
                                            <label for="id_RT"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                                Warga <span class="text-red-500">*</span>
                                            </label>
                                            <select id="id_RT" name="id_RT"
                                                class="text-slate-700 bg-white border border-slate-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                @foreach ($rt as $rtwarga)
                                                    <option value="{{ $rtwarga->id_RT }}">
                                                        {{ $rtwarga->nomor_RT }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="w-full px-5 py-2 text-base font-medium text-center text-white rounded-lg bg-hijau2 hover:bg-hijau1 focus:ring-4 focus:outline-none focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
