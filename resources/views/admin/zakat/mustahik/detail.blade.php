@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Mustahik';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('zakatMustahik.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1 ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-20 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2 ">Detail Data Mustahik</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-y-10 gap-x-4"
                                    method="get" action="{{ route('zakatMustahik.edit', $mustahik->id_mustahik) }}">
                                    <div>
                                        <label for="first_name"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                            Keluarga</label>
                                        <input type="text" id="first_name"
                                            class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                            disabled placeholder="John" value="{{ $mustahik->nama_keluarga }}" />
                                    </div>
                                    <div>
                                        <label for="first_name"
                                            class="block mb-2 text-base font-medium text-gray-900 capitalize dark:text-white">Kelompok</label>
                                        <input type="text" id="first_name"
                                            class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                            disabled placeholder="John" value="{{ $mustahik->kelompok }}" />
                                    </div>
                                    <div>
                                        <label for="jenis_zakat"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                            Istri</label>
                                        <input type="text" id="jenis_zakat" disabled
                                            class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                            placeholder="Jenis Zakat" value="{{ $mustahik->nama_istri }}" />
                                    </div>
                                    <div>
                                        <label for="jumlah_zakat"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                            Suami</label>
                                        <input type="text" id="jumlah_zakat" disabled
                                            class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                            placeholder="Jumlah Zakat" value="{{ $mustahik->nama_suami }}" />
                                    </div>

                                    <div>
                                        <label for="jumlah_zakat"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nomor
                                            HP</label>
                                        <input type="text" id="jumlah_zakat" disabled
                                            class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                            placeholder="Jumlah Zakat" value="{{ $mustahik->nomor_hp }}" />
                                    </div>


                                    <div>
                                        <label for="alamat_muzakki"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat
                                            Mustahik</label>
                                        <textarea id="alamat_muzakki" disabled
                                            class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                            placeholder="Alamat Muzakki">{{ $mustahik->alamat }}</textarea>
                                    </div>
                                    <div>
                                        <label for="tanggal_pembayaran"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tanggal
                                            Dibuat</label>
                                        <input type="text" id="tanggal_pembayaran" disabled
                                            class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                            placeholder="Tanggal Pembayaran"
                                            value="{{ date('d-m-Y', strtotime($mustahik->created_at)) }}" disabled />
                                    </div>
                                    <div>
                                        <label for="pembuatData_id"
                                            class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Penambah
                                            Data</label>
                                        <input type="text" id="pembuatData_id" disabled
                                            class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                            placeholder="Tanggal Pembayaran" value="{{ $mustahik->pembuatData->name }}"
                                            disabled />
                                    </div>
                                    <div class="col-span-4 mt-5">
                                        <input type="submit"
                                            class="inline-block px-4 py-2 text-sm font-semibold leading-tight text-white rounded-lg cursor-pointer bg-hijau2 hover:bg-hijau1"
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
