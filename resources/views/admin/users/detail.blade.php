@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail pengguna';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('pengguna.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-20 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Detail Data Pengguna</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="grid grid-cols-4 gap-y-10 gap-x-4" method="post"
                                    action="{{ route('pengguna.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label for="name"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                            User <span class="text-red-500">*</span></label>
                                        <input type="text" id="name" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="John" value="{{ $user->name }}" />
                                    </div>
                                    <div>
                                        <label for="email"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email
                                            Pengguna <span class="text-red-500">*</span></label>
                                        <input type="text" id="email" name="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Jenis Zakat" value="{{ $user->email }}" />
                                    </div>
                                    <div>
                                        <label for="jam"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tanggal
                                            Dibuat</label>
                                        <input type="text" id="jam" disabled
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tanggal dibuat"
                                            value="{{ date('d-m-Y', strtotime($user->created_at)) }}" />
                                    </div>
                                    <div>
                                        <label for="role"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Role
                                            <span class="text-red-500">*</span></label>
                                        <select id="role" name="role"
                                            class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="ketua_rt" {{ $user->role === 'ketua_rt' ? 'selected' : '' }}>
                                                Ketua RT</option>
                                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User
                                            </option>

                                        </select>
                                    </div>
                                    <div>
                                        <label for="id_RT"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                            Warga
                                        </label>
                                        <select id="id_RT" name="id_RT"
                                            class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            @foreach ($rt as $rtwarga)
                                                <option value="{{ $rtwarga->id_RT }}">
                                                    {{ $rtwarga->nomor_RT }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-4 mt-5">
                                        <input type="submit"
                                            class="inline-block px-4 py-3 text-sm font-semibold leading-tight text-white rounded-lg cursor-pointer bg-hijau2 hover:bg-hijau1"
                                            value="Edit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
