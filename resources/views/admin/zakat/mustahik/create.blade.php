@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Daftar Zakat';
    @endphp
    <div class="w-full px-12 py-5 mx-auto">
        <a href="{{ route('zakatMustahik.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1 ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-4 mx-auto md:px-12">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid md:px-5 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="pb-0 mb-0 bg-white border-b-0 md:p-6 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="mb-2 font-medium text-hijau2">Daftar Mustahik</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-3 overflow-x-auto md:p-6">
                            <div class="dark:bg-gray-700">
                                <form action="{{ route('zakatMustahik.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 mb-6 gap-x-4 gap-y-6 lg:grid-cols-4 md:grid-cols-2">
                                        <div>
                                            <label for="nama_keluarga"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                                Nama Keluarga <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_keluarga" name="nama_keluarga"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="masukkan nama keluarga" />
                                            @error('nama_keluarga')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="kelompok"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Kelompok
                                                <span class="text-red-500">*</span></label>
                                            <select id="kelompok" name="kelompok"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="fakir miskin">Fakir Miskin</option>
                                                <option value="fisabilillah">Fisabilillah</option>
                                                <option value="mualaf">Mualaf</option>
                                                <option value="amilin">Amilin</option>
                                            </select>
                                            @error('kelompok')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="nama_istri"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Istri
                                            </label>
                                            <input type="text" id="nama_istri" name="nama_istri"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="isi nama istri" />
                                        </div>
                                        <div>
                                            <label for="nama_suami"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Suami
                                            </label>
                                            <input type="text" id="nama_suami" name="nama_suami"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="isi nama suami" />
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
                                        <div>
                                            <label for="alamat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat
                                                Mustahik <span class="text-red-500">*</span>
                                            </label>
                                            <textarea id="alamat" name="alamat"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Isi Alamat Mustahik"></textarea>
                                            @error('alamat')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nomor_hp"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">No
                                                Tlp</label>
                                            <input type="number" id="nomor_hp" name="nomor_hp"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="nomor hp" />
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-hijau2 hover:bg-hijau1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
