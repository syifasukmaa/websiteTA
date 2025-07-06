@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Edit Pendaftar Qurban';
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
                        <h6 class="font-bold text-hijau1">Edit Data Pendaftar Qurban</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="post"
                                    action="{{ route('pendaftarQurban.update', $qurban->id_pendaftar_qurban) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="grid grid-cols-1 gap-x-4 gap-y-6 md:grid-cols-2"">
                                        {{-- <div>
                                            <label for="nama"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban</label>
                                            <input type="text" id="nama" name="nama"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nama pengqurban" value="{{ $qurban->nama }}" />
                                        </div> --}}
                                        <x-input-field name="nama" label=" Nama Pengqurban"
                                            placeholder="Masukkan Nama Pengqurban" value="{{ $qurban->nama }}" />

                                        <div>
                                            <label for="nomor_antrian"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nomor
                                                Antrian</label>
                                            <input type="text" id="nomor_antrian"
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="Nomor Antrian" value="{{ $qurban->nomor_antrian }}" />
                                        </div>


                                        @if ($qurban->jenis_hewan === 'sapi' || $qurban->jenis_hewan === 'kerbau')
                                            <div>
                                                <label for="tujuan_pahala"
                                                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                    Pahala</label>
                                                <textarea id="tujuan_pahala" name="tujuan_pahala"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-[80px]"
                                                    placeholder="Tujuan Pahala">{{ $qurban->tujuan_pahala }}</textarea>
                                            </div>
                                        @else
                                            {{-- <div>
                                                <label for="tujuan_pahala"
                                                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                    Pahala</label>
                                                <input type="text" id="tujuan_pahala" name="tujuan_pahala"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Tujuan Pahala" value="{{ $qurban->tujuan_pahala }}" />
                                            </div> --}}
                                            <x-input-field name="tujuan_pahala" label="Tujuan Pahala"
                                                placeholder="Masukkan Tujuan Pahala" value="{{ $qurban->tujuan_pahala }}" />
                                        @endif
                                        <div>
                                            <label for="jenis_hewan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jenis
                                                Hewan
                                            </label>
                                            <select id="jenis_hewan" name="jenis_hewan"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="kambing"
                                                    {{ $qurban->jenis_hewan == 'kambing' ? 'selected' : '' }}>Kambing
                                                </option>
                                                <option value="domba"
                                                    {{ $qurban->jenis_hewan == 'domba' ? 'selected' : '' }}>
                                                    Domba</option>
                                            </select>
                                        </div>
                                        {{-- <div>
                                            <label for="hak_pengqurban"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Hak
                                                Pengqurban</label>
                                            <input type="text" id="hak_pengqurban" name="hak_pengqurban"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Hak Pengqurban" value="{{ $qurban->hak_pengqurban }}" />
                                        </div> --}}
                                        <x-input-field name="hak_pengqurban" label="Hak Pengqurban"
                                            placeholder="Masukkan Hak Pengqurban" value="{{ $qurban->hak_pengqurban }}" />
                                        {{-- <div>
                                            <label for="biaya"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Biaya
                                                Pembayaran</label>
                                            <input type="text" id="biaya" name="biaya"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jumlah Zakat" value="{{ $qurban->biaya }}" />
                                        </div> --}}
                                        <x-input-field name="biaya" label=" Biaya Pembayaran" type="number"
                                            placeholder="Masukkan Biaya Pendaftaran" value="{{ $qurban->biaya }}" />
                                        <div>
                                            <label for="status_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status
                                                Pembayaran
                                            </label>
                                            <select id="status_pembayaran" name="status_pembayaran"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="lunas"
                                                    {{ $qurban->status_pembayaran === 'lunas' ? 'selected' : '' }}>
                                                    Lunas</option>
                                                <option value="belum bayaran"
                                                    {{ $qurban->status_pembayaran === 'belum bayar' ? 'selected' : '' }}>
                                                    Belum Bayar</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="RW"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RW
                                                Warga
                                            </label>
                                            <select id="RW" name="RW"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="16" {{ $qurban->RW === '16' ? 'selected' : '' }}>
                                                    16</option>
                                                <option value="21" {{ $qurban->RW === '21' ? 'selected' : '' }}>
                                                    21</option>
                                                <option value="Lainnya" {{ $qurban->RW === 'Lainnya' ? 'selected' : '' }}>
                                                    Lainnya</option>
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
                                                    <option value="{{ $rtwarga->id_RT }}"
                                                        {{ $rtwarga->id_RT == $qurban->RTWarga->id_RT ? 'selected' : '' }}>
                                                        {{ $rtwarga->nomor_RT }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="tanggal_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tanggal
                                                Dibuat</label>
                                            <input type="text" id="tanggal_pembayaran" disabled
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran"
                                                value="{{ date('d-m-Y', strtotime($qurban->created_at)) }}" disabled />
                                        </div>
                                        <div>
                                            <label for="pembuatData_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Penambah
                                                Data</label>
                                            <input type="text" id="pembuatData_id" disabled
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran" value="{{ $qurban->pembuatData->name }}"
                                                disabled />
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
