@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Edit Mustahik';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('zakatMustahik.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1 ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-4 mx-auto md:px-20">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2 ">Edit Data Mustahik</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="post"
                                    action="{{ route('zakatMustahik.update', $mustahik->id_mustahik) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-x-4 gap-y-6 lg:grid-cols-4 md:grid-cols-2">

                                        <x-input-field name="nama_keluarga" label=" Nama Keluarga"
                                            placeholder="Masukkan Nama Keluarga" :required="true"
                                            value="{{ $mustahik->nama_keluarga }}" />
                                        <div>
                                            <label for="kelompok"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Kelompok
                                                <span class="text-red-500">*</span></label>
                                            <select id="kelompok" name="kelompok"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="duafa"
                                                    {{ $mustahik->kelompok === 'duafa' ? 'selected' : '' }}>
                                                    Duafa</option>
                                                <option value="fakir miskin"
                                                    {{ $mustahik->kelompok === 'fakir miskin' ? 'selected' : '' }}>Fakir
                                                    Miskin
                                                </option>
                                                <option value="fisabilillah"
                                                    {{ $mustahik->kelompok === 'fisabilillah' ? 'selected' : '' }}>
                                                    Fisabilillah
                                                </option>
                                                <option value="mualaf"
                                                    {{ $mustahik->kelompok === 'mualaf' ? 'selected' : '' }}>
                                                    Mualaf</option>
                                                <option value="amilin"
                                                    {{ $mustahik->kelompok === 'amilin' ? 'selected' : '' }}>
                                                    Amilin</option>
                                            </select>
                                        </div>

                                        <x-input-field name="nama_istri" label=" Nama Istri"
                                            placeholder="Masukkan Nama Istri" value="{{ $mustahik->nama_istri }}" />
                                        <x-input-field name="nama_suami" label=" Nama Suami"
                                            placeholder="Masukkan Nama Suami" value="{{ $mustahik->nama_suami }}" />
                                        <div>
                                            <label for="id_RT"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">RT
                                                Warga
                                            </label>
                                            <select id="id_RT" name="id_RT"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                @foreach ($rt as $rtwarga)
                                                    <option value="{{ $rtwarga->id_RT }}"
                                                        {{ $rtwarga->id_RT == $mustahik->RTWarga->id_RT ? 'selected' : '' }}>
                                                        {{ $rtwarga->nomor_RT }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <x-input-field name="nomor_hp" label=" Nomor HP" placeholder="Masukkan Nomor HP"
                                            type="number" value="{{ $mustahik->nomor_hp }}" />
                                        <x-textarea name="alamat" label="Alamat Mustahik" placeholder="Isi Alamat Mustahik"
                                            value="{{ $mustahik->alamat }}" />
                                        <div>
                                            <label for="tanggal_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tanggal
                                                Dibuat</label>
                                            <input type="text" id="tanggal_pembayaran"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran"
                                                value="{{ date('d-m-Y', strtotime($mustahik->created_at)) }}" disabled />
                                        </div>
                                        <div>
                                            <label for="pembuatData_id"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Penambah
                                                Data</label>
                                            <input type="text" id="pembuatData_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tanggal Pembayaran"
                                                value="{{ $mustahik->pembuatData->name }}"disabled />
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
