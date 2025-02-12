@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Yatim Piatu';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('yatimPiatu.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-4 mx-auto md:px-20">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2">Detail Data Yatim Piatu</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="get"
                                    action="{{ route('yatimPiatu.edit', $yatim->id_yatim_piatu) }}">
                                    <div class="grid grid-cols-1 gap-x-4 gap-y-6 lg:grid-cols-4 md:grid-cols-2">
                                        <div>
                                            <label for="first_name"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Penerima</label>
                                            <input type="text" id="first_name"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="John" value="{{ $yatim->nama }}" />
                                        </div>
                                        <div>
                                            <label for="first_name"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Ibu</label>
                                            <input type="text" id="first_name"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="John" value="{{ $yatim->nama_ibu }}" />
                                        </div>
                                        <div>
                                            <label for="jenis_zakat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Ayah</label>
                                            <input type="text" id="jenis_zakat" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jenis Zakat" value="{{ $yatim->nama_ayah }}" />
                                        </div>
                                        <div>
                                            <label for="jumlah_zakat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status</label>
                                            <input type="text" id="jumlah_zakat" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jumlah Zakat" value="{{ $yatim->status }}" />
                                        </div>
                                        <div>
                                            <label for="jumlah_zakat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Pendidikan</label>
                                            <input type="text" id="jumlah_zakat"
                                                class="block w-full px-0 text-sm text-gray-900 uppercase border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="Jumlah Zakat" value="{{ $yatim->pendidikan }}" />
                                        </div>
                                        <div>
                                            <label for="jumlah_zakat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Biaya
                                                Santunan</label>
                                            <input type="text" id="jumlah_zakat" disabled
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jumlah Zakat" value="Rp. {{ number_format($yatim->biaya) }}" />
                                        </div>
                                        <div>
                                            <label for="rt"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                                Warga
                                            </label>
                                            <textarea id="alamat_muzakki" disabled
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Alamat Muzakki">{{ $yatim->RTWarga->nomor_RT }}</textarea>
                                        </div>

                                        <div>
                                            <label for="alamat_muzakki"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat
                                            </label>
                                            <textarea id="alamat_muzakki" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Alamat Muzakki">{{ $yatim->alamat }}</textarea>
                                        </div>
                                        <div>
                                            <label for="tanggal_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Dibuat
                                                tanggal</label>
                                            <input type="text" id="tanggal_pembayaran" disabled
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Tanggal Pembayaran"
                                                value="{{ date('d-m-Y', strtotime($yatim->created_at)) }}" disabled />
                                        </div>
                                        <div>
                                            <label for="penerima_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Penerima
                                                Zakat</label>
                                            <input type="text" id="penerima_id" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Tanggal Pembayaran" value="{{ $yatim->pembuatData->name }}"
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
