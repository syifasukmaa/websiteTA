@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Menambah Muzakki';
    @endphp
    <div class="w-full px-12 py-5 mx-auto">
        <a href="{{ route('admin.muzakki.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1 ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-12 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid md:px-5 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="pb-0 mb-0 bg-white border-b-0 md:p-6 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2">Form Tambah Data Muzakki</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-3 overflow-x-auto md:p-6">
                            <div class="dark:bg-gray-700">
                                <form action="{{ route('admin.muzakki.store') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                                        <div>
                                            <label for="nama_muzakki"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white ">
                                                Nama Muzazkki <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_muzakki" name="nama_muzakki"
                                                class=" bg-gray-50 capitalize border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="nama muzakki" />
                                            @error('nama_muzakki')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="Jumlah jiwa"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jumlah
                                                Jiwa <span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" id="Jumlah jiwa" name="jumlah_jiwa"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jumlah jiwa (Zakat Fitrah)" />
                                            @error('jumlah_jiwa')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="Uang"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Uang
                                                (Rp)</label>
                                            <input type="number" id="Uang" name="uang"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Uang" />
                                        </div>
                                        <div>
                                            <label for="beras"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Beras
                                                (Liter)</label>
                                            <input type="number" id="beras" name="beras"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="beras" />
                                        </div>
                                        <div>
                                            <label for="infaq"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Infaq
                                                (Rp)</label>
                                            <input type="number" id="infaq" name="infaq"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="infaq" />
                                        </div>
                                        <div>
                                            <label for="id_RT"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                                Warga <span class="text-red-500">*</span>
                                            </label>
                                            <select id="id_RT" name="id_RT"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                @foreach ($rt as $rtwarga)
                                                    <option value="{{ $rtwarga->id_RT }}">
                                                        {{ $rtwarga->nomor_RT }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_RT')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="alamat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat
                                                Muzakki <span class="text-red-500">*</span>
                                            </label>
                                            <textarea id="alamat" name="alamat"
                                                class="bg-gray-50 capitalize border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Alamat Muzakki"></textarea>
                                            @error('alamat')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="keterangan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Keterangan</label>
                                            <textarea type="tel" id="keterangan" name="keterangan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tidak wajib diisi"></textarea>
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
