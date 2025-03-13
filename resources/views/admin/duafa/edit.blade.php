@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Edit Duafa';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('duafa.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-20 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2">Edit Data Duafa</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="post" action="{{ route('duafa.update', $duafa->id_duafa) }}">
                                    @csrf
                                    @method('put')
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                                        <div>
                                            <label for="nama"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Penerima <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama" name="nama"
                                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="nama" value="{{ $duafa->nama }}" />
                                        </div>
                                        <div>
                                            <label for="nama_istri"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Istri</label>
                                            <input type="text" id="nama_istri" name="nama_istri"
                                                class="bg-gray-50 border capitalizev border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="nama istri" value="{{ $duafa->nama_istri }}" />
                                        </div>
                                        <div>
                                            <label for="nama_suami"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Suami</label>
                                            <input type="text" id="nama_suami" name="nama_suami"
                                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="nama suami" value="{{ $duafa->nama_suami ?? '-' }}" />
                                        </div>
                                        <div>
                                            <label for="status"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status
                                                <span class="text-red-500">*</span>
                                            </label>
                                            <select id="status" name="status"
                                                class="text-slate-700  bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="Janda" {{ $duafa->status == 'Janda' ? 'selected' : '' }}>
                                                    Janda</option>
                                                <option value="Duda" {{ $duafa->status == 'Duda' ? 'selected' : '' }}>
                                                    Duda</option>

                                            </select>
                                        </div>
                                        <div>
                                            <label for="jumlah_uang"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jumlah
                                                Uang
                                                Pembayaran <span class="text-red-500">*</span></label>
                                            <input type="number" id="jumlah_uang" name="jumlah_uang"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jumlah Santunan" value="{{ $duafa->jumlah_uang }}" />
                                            @error('jumlah_uang')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div>
                                            <label for="keterangan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">
                                                Keterangan
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="keterangan" name="keterangan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="keteranga" value="{{ $duafa->keterangan }}" />
                                            @error('keterangan')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">
                                            <label for="checked-checkbox"
                                                class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penerimaan
                                                <span class="text-red-500">*</span></label>
                                            <input type="hidden" name="penerimaan" value="belum">

                                            <!-- Checkbox -->
                                            <input id="checked-checkbox" type="checkbox" value="selesai" name="penerimaan"
                                                {{ $duafa->penerimaan == 'selesai' ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </div>
                                        <div>
                                            <div>
                                                <label for="id_RT"
                                                    class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                                    Warga <span class="text-red-500">*</span>
                                                </label>
                                                <select id="id_RT" name="id_RT"
                                                    class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    @foreach ($rt as $rtwarga)
                                                        <option value="{{ $rtwarga->id_RT }}"
                                                            {{ $rtwarga->id_RT == $duafa->RTWarga->id_RT ? 'selected' : '' }}>
                                                            {{ $rtwarga->nomor_RT }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div>
                                            <label for="RW"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RW
                                                Warga <span class="text-red-500">*</span>
                                            </label>
                                            <select id="RW" name="RW"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="16" {{ $duafa->RW == '16' ? 'selected' : '' }}>
                                                    16</option>
                                                <option value="21" {{ $duafa->RW == '16' ? 'selected' : '' }}>
                                                    21</option>
                                                <option value="lainnya" {{ $duafa->RW == 'lainnya' ? 'selected' : '' }}>
                                                    Lainnya</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="tanggal_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Dibuat
                                                tanggal</label>
                                            <input type="text" id="tanggal_pembayaran" disabled
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran"
                                                value="{{ date('d-m-Y', strtotime($duafa->created_at)) }}" disabled />
                                        </div>
                                        <div>
                                            <label for="penerima_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Pembuat
                                                Data</label>
                                            <input type="text" id="penerima_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran" value="{{ $duafa->pembuatData->name }}"
                                                disabled />
                                        </div>
                                    </div>

                                    <div class="col-span-4 mt-5">
                                        <input type="submit"
                                            class="inline-block px-4 py-3 text-sm font-semibold leading-tight text-white rounded-lg cursor-pointer bg-hijau2 hover:bg-hijau1"
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
