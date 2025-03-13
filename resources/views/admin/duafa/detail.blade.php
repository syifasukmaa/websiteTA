@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Duafa';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('duafa.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-4 mx-auto md:px-20">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2">Detail Data Duafa</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="get" action="{{ route('duafa.edit', $duafa->id_duafa) }}">
                                    <div class="grid grid-cols-1 gap-x-4 gap-y-6 lg:grid-cols-4 md:grid-cols-2">
                                        <div>
                                            <label for="first_name"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama</label>
                                            <input type="text" id="first_name"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="John" value="{{ $duafa->nama }}" />
                                        </div>
                                        <div>
                                            <label for="first_name"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Istri</label>
                                            <input type="text" id="first_name"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="John" value="{{ $duafa->nama_istri }}" />
                                        </div>
                                        <div>
                                            <label for="jenis_zakat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Suami</label>
                                            <input type="text" id="jenis_zakat" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jenis Zakat" value="{{ $duafa->nama_suami }}" />
                                        </div>
                                        <div>
                                            <label for="jumlah_zakat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status</label>
                                            <input type="text" id="jumlah_zakat" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jumlah Zakat" value="{{ $duafa->status }}" />
                                        </div>

                                        <div>
                                            <label for="jumlah_uang"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Biaya
                                                Santunan</label>
                                            <input type="text" id="jumlah_uang" disabled
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jumlah Zakat"
                                                value="Rp. {{ number_format($duafa->jumlah_uang) }}" />
                                        </div>
                                        <div class="flex items-center">
                                            <label for="checked-checkbox"
                                                class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penerimaan</label>
                                            <input id="checked-checkbox" type="checkbox" disabled
                                                value="{{ $duafa->penerimaan }}"
                                                {{ $duafa->penerimaan == 'selesai' ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </div>
                                        <div>
                                            <label for="rt"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                                Warga
                                            </label>
                                            <textarea id="alamat_muzakki" disabled
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Alamat Muzakki">{{ $duafa->RTWarga->nomor_RT }}</textarea>
                                        </div>
                                        <div>
                                            <label for="rt"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RW
                                            </label>
                                            <textarea id="alamat_muzakki" disabled
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Alamat Muzakki">{{ $duafa->RW }}</textarea>
                                        </div>
                                        <div>
                                            <label for="tanggal_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Dibuat
                                                tanggal</label>
                                            <input type="text" id="tanggal_pembayaran" disabled
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Tanggal Pembayaran"
                                                value="{{ date('d-m-Y', strtotime($duafa->created_at)) }}" disabled />
                                        </div>
                                        <div>
                                            <label for="penerima_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Keterangan</label>
                                            <input type="text" id="penerima_id" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Tanggal Pembayaran" value="{{ $duafa->keterangan }}"
                                                disabled />
                                        </div>

                                        <div>
                                            <label for="penerima_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Pembuat
                                                Data</label>
                                            <input type="text" id="penerima_id"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Tanggal Pembayaran" value="{{ $duafa->pembuatData->name }}"
                                                disabled />
                                        </div>
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
