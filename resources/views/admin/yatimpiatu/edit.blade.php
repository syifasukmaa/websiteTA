@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Edit Yatim Piatu';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('yatimPiatu.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-20 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2">Edit Data Yatim Piatu</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="post"
                                    action="{{ route('yatimPiatu.update', $yatim->id_yatim_piatu) }}">
                                    @csrf
                                    @method('put')
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                                        <div>
                                            <label for="nama"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Penerima</label>
                                            <input type="text" id="nama" name="nama"
                                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="John" value="{{ $yatim->nama }}" />
                                        </div>
                                        <div>
                                            <label for="nama_ibu"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Ibu</label>
                                            <input type="text" id="nama_ibu" name="nama_ibu"
                                                class="bg-gray-50 border capitalizev border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="John" value="{{ $yatim->nama_ibu }}" />
                                        </div>
                                        <div>
                                            <label for="nama_ayah"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Ayah</label>
                                            <input type="text" id="nama_ayah" name="nama_ayah"
                                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jenis Zakat" value="{{ $yatim->nama_ayah }}" />
                                        </div>
                                        <div>
                                            <label for="status"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status
                                            </label>
                                            <select id="status" name="status"
                                                class="text-slate-700  bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="yatim" {{ $yatim->status == 'yatim' ? 'selected' : '' }}>
                                                    Yatim</option>
                                                <option value="piatu" {{ $yatim->status == 'piatu' ? 'selected' : '' }}>
                                                    Piatu</option>

                                            </select>
                                        </div>
                                        <div>
                                            <label for="pendidikan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Pendidikan
                                            </label>
                                            <select id="pendidikan" name="pendidikan"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="sd" {{ $yatim->pendidikan == 'sd' ? 'selected' : '' }}>
                                                    SD</option>
                                                <option value="smp" {{ $yatim->pendidikan == 'smp' ? 'selected' : '' }}>
                                                    SMP</option>
                                                <option value="sma" {{ $yatim->pendidikan == 'sma' ? 'selected' : '' }}>
                                                    SMA</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="biaya"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Biaya
                                                Santunan</label>
                                            <input type="text" id="biaya" name="biaya"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jumlah Zakat" value="{{ $yatim->biaya }}" />
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
                                                        {{ $rtwarga->id_RT == $yatim->RTWarga->id_RT ? 'selected' : '' }}>
                                                        {{ $rtwarga->nomor_RT }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="alamat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat
                                            </label>
                                            <textarea id="alamat" name="alamat"
                                                class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Alamat Muzakki">{{ $yatim->alamat }}</textarea>
                                        </div>
                                        <div>
                                            <label for="tanggal_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Dibuat
                                                tanggal</label>
                                            <input type="text" id="tanggal_pembayaran" disabled
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran"
                                                value="{{ date('d-m-Y', strtotime($yatim->created_at)) }}" />
                                        </div>
                                        <div>
                                            <label for="penerima_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Pembuat
                                                Data</label>
                                            <input type="text" id="penerima_id" disabled
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran" value="{{ $yatim->pembuatData->name }}"
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
