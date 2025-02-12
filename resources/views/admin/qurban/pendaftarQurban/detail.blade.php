@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Pendaftar Qurban';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('pendaftarQurban.index') }}"
            class="px-4 py-2 text-base font-medium text-white bg-black rounded-md ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-4 mx-auto md:px-20">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2">Detail Data Pendaftar Qurban</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="get"
                                    action="{{ route('pendaftarQurban.edit', $qurban->id_pendaftar_qurban) }}">
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                                        <div>
                                            <label for="nama"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban</label>
                                            <input type="text" id="nama"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="Nama pengqurban" value="{{ $qurban->nama }}" />
                                        </div>
                                        <div>
                                            <label for="nomor_antrian"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nomor
                                                Antrian</label>
                                            <input type="text" id="nomor_antrian"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="Nomor Antrian" value="{{ $qurban->nomor_antrian }}" />
                                        </div>

                                        @if ($qurban->jenis_hewan === 'sapi' || $qurban->jenis_hewan === 'kerbau')
                                            <div>
                                                <label for="tujuan_pahala"
                                                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                    Pahala</label>
                                                <textarea id="tujuan_pahala" name="tujuan_pahala"
                                                    class="block w-full px-0 text-sm capitalize text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white h-[80px]"
                                                    placeholder="Tujuan Pahala">{{ $qurban->tujuan_pahala }}</textarea>
                                            </div>
                                        @else
                                            <div>
                                                <label for="tujuan_pahala"
                                                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                    Pahala</label>
                                                <input type="text" id="tujuan_pahala" name="tujuan_pahala"
                                                    class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                    placeholder="Tujuan Pahala" value="{{ $qurban->tujuan_pahala }}" />
                                            </div>
                                        @endif
                                        <div>
                                            <label for="jenis_hewan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jenis
                                                Hewan</label>
                                            <input type="text" id="jenis_hewan"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="Jenis Hewan" value="{{ $qurban->jenis_hewan }}" />
                                        </div>
                                        <div>
                                            <label for="hak_pengqurban"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Hak
                                                Pengqurban</label>
                                            <input type="text" id="hak_pengqurban" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Hak Pengqurban" value="{{ $qurban->hak_pengqurban }}" />
                                        </div>

                                        <div>
                                            <label for="biaya"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Biaya
                                                Pembayaran</label>
                                            <input type="text" id="biaya" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jumlah Zakat" value="{{ number_format($qurban->biaya) }}" />
                                        </div>
                                        <div>
                                            <label for="status_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status
                                                Pembayaran</label>
                                            <input type="text" id="status_pembayaran" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jumlah Zakat" value="{{ $qurban->status_pembayaran }}" />
                                        </div>
                                        <div>
                                            <label for="RW"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RW
                                                Warga</label>
                                            <input type="text" id="RW"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="Nomor HP" value="{{ $qurban->RW }}" />
                                        </div>
                                        <div>
                                            <label for="RT warga"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                                Warga</label>
                                            <input type="text" id="RT warga" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="RT Warga" value="{{ $qurban->RTWarga->nomor_RT }}" />
                                        </div>

                                        <div>
                                            <label for="tanggal_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tanggal
                                                Dibuat</label>
                                            <input type="text" id="tanggal_pembayaran" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Tanggal Pembayaran"
                                                value="{{ date('d-m-Y', strtotime($qurban->created_at)) }}" disabled />
                                        </div>
                                        <div>
                                            <label for="pembuatData_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Penambah
                                                Data</label>
                                            <input type="text" id="pembuatData_id" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Tanggal Pembayaran" value="{{ $qurban->pembuatData->name }}"
                                                disabled />
                                        </div>
                                    </div>

                                    <div class="col-span-4 mt-5">
                                        <input type="submit"
                                            class="inline-block px-5 py-2.5 text-sm capitalize font-semibold leading-tight text-white bg-hijau2 hover:bg-hijau1 rounded-lg cursor-pointer"
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
