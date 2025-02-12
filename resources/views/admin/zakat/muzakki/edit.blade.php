@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Edit Muzakki';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('admin.muzakki.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1 ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-4 mx-auto md:px-20">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="mb-2 font-medium text-hijau2">Edit Data Muzakki</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form method="post" action="{{ route('admin.muzakki.update', $zakat->id_muzakki) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-x-4 gap-y-6 lg:grid-cols-4 md:grid-cols-2">
                                        <div>
                                            <label for="nama_muzakki"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Keluarga</label>
                                            <input type="text" id="nama_muzakki"
                                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Masukkan Nama" name="nama_muzakki"
                                                value="{{ $zakat->nama_muzakki }}" />
                                        </div>
                                        <div>
                                            <label for="jumlah_jiwa"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jumlah
                                                Jiwa</label>
                                            <input type="text" id="jumlah_jiwa"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="John" name="jumlah_jiwa" value="{{ $zakat->jumlah_jiwa }}" />
                                        </div>
                                        <div>
                                            <label for="uang"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Uang
                                                (Rp)</label>
                                            <input type="text" id="uang"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="jumlah uang" name="uang" value="{{ $zakat->uang }}" />
                                        </div>
                                        <div>
                                            <label for="beras"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Beras
                                                (Liter)</label>
                                            <input type="text" id="beras"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jumlah beras" name="beras" value="{{ $zakat->beras }}" />
                                        </div>
                                        <div>
                                            <label for="infaq"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Infaq</label>
                                            <input type="text" id="infaq"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jumlah infaq" name="infaq" value="{{ $zakat->infaq }}" />
                                        </div>
                                        <div>
                                            <label for="id_RT"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                                Warga
                                            </label>
                                            <select id="id_RT" name="id_RT"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                @foreach ($rt as $rtwarga)
                                                    <option value="{{ $rtwarga->id_RT }}"
                                                        {{ $rtwarga->id_RT == $zakat->RTWarga->id_RT ? 'selected' : '' }}>
                                                        {{ $rtwarga->nomor_RT }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="tanggal_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tanggal
                                                Pembayaran</label>
                                            <input type="text" id="tanggal_pembayaran"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran" disabled
                                                value="{{ date('d-m-Y', strtotime($zakat->created_at)) }}" />
                                        </div>

                                        <div>
                                            <label for="alamat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat
                                                Muzakki</label>
                                            <textarea id="alamat"
                                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Alamat Muzakki" name="alamat">{{ $zakat->alamat }}</textarea>
                                        </div>

                                        <div>
                                            <label for="penerima_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Penerima
                                                Zakat</label>
                                            <input type="text" id="penerima_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran" disabled
                                                value="{{ $zakat->penerimaZakat->name }}" />
                                        </div>
                                        <div>
                                            <label for="keterangan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Keterangan</label>
                                            <textarea id="keterangan"
                                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-[100px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Deskripsi Zakat" name="keterangan">{{ $zakat->keterangan }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-span-4 mt-5">
                                        <input type="submit"
                                            class="inline-block px-4 py-2 text-sm font-semibold leading-tight text-white rounded-lg cursor-pointer bg-hijau2 hover:bg-hijau1"
                                            value="Ubah Data">
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
