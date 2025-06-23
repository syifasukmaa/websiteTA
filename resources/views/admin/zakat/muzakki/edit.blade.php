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

                                        <x-input-field name="nama_muzakki" label=" Nama Muzakki"
                                            placeholder="Masukkan Nama Muzakki" value="{{ $zakat->nama_muzakki }}" />
                                        <x-input-field name="jumlah_jiwa" label="Jumlah Jiwa"
                                            placeholder="Masukkan Jumlah Jiwa" value="{{ $zakat->jumlah_jiwa }}" />

                                        <x-input-field name="uang" label="Uang (Rp)" placeholder="Masukkan Jumlah Uang"
                                            value="{{ $zakat->uang }}" />
                                        <x-input-field name="beras" label="Beras" placeholder="Masukkan Jumlah Beras"
                                            value="{{ $zakat->nama_istri }}" />

                                        <x-input-field name="infaq" label="Infaq" placeholder="Masukkan Nama Istri"
                                            value="{{ $zakat->infaq }}" />
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

                                        <x-textarea name="alamat" label="Alamat Muzakki" placeholder="Isi Alamat Muzakki"
                                            value="{{ $zakat->alamat }}" />
                                        <div>
                                            <label for="penerima_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Penerima
                                                Zakat</label>
                                            <input type="text" id="penerima_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran" disabled
                                                value="{{ $zakat->penerimaZakat->name }}" />
                                        </div>

                                        <x-textarea name="keterangan" label="Keterangan" placeholder="Isi Keterangan"
                                            value="{{ $zakat->keterangan }}" />

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
