@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Menambah Pendaftar Qurban';
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
                        <h6 class="font-medium text-hijau2">Tambah Data Pendaftar Qurban</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="post" action="{{ route('pendaftarQurban.store') }}">
                                    @csrf
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                        <x-input-field name="nama" label=" Nama Pengqurban"
                                            placeholder="Masukkan Nama Pengqurban" :required="true" />
                                        <x-input-field name="tujuan_pahala" label="Tujuan Pahala"
                                            placeholder="Masukkan Tujuan Pahala" :required="true" />
                                        <div>
                                            <label for="jenis_hewan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jenis
                                                Hewan <span class="text-red-500">*</span>
                                            </label>
                                            <select id="jenis_hewan" name="jenis_hewan"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="kambing">Kambing</option>
                                                <option value="domba">
                                                    Domba</option>
                                            </select>
                                        </div>

                                        <x-input-field name="hak_pengqurban" label="Hak Pengqurban"
                                            placeholder="Masukkan Hal Pengqurban" :required="true" />
                                        <x-input-field name="biaya" label="Biaya Pembayaran"
                                            placeholder="Masukkan Jumlah Biaya" :required="true" type="number" />
                                        <div>
                                            <label for="status_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status
                                                Pembayaran <span class="text-red-500">*</span>
                                            </label>
                                            <select id="status_pembayaran" name="status_pembayaran"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="lunas">
                                                    Lunas</option>
                                                <option value="belum bayaran">
                                                    Belum Bayar</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="RW"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RW
                                                Warga <span class="text-red-500">*</span>
                                            </label>
                                            <select id="RW" name="RW"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="16">
                                                    16</option>
                                                <option value="21">
                                                    21</option>
                                                <option value="lainnya">
                                                    Lainnya</option>
                                            </select>
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
                                        </div>
                                    </div>
                                    <div class="col-span-4 mt-8">
                                        <input type="submit"
                                            class="inline-block px-5 py-3 text-sm font-semibold leading-tight text-white rounded-lg cursor-pointer bg-hijau2 hover:bg-hijau1"
                                            value="Tambah Data">
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
