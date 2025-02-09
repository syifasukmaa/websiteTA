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
    <div class="w-full px-20 mx-auto">
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
                                <form method="post"
                                    action="{{ route('pendaftarQurban.kerbau.update', $qurban->id_pengqurban_sapi) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                        <div>
                                            <label for="nomor_antrian"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nomor
                                                Antrian</label>
                                            <input type="text" id="nomor_antrian"
                                                class="block w-full px-0 text-sm text-gray-900 border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                disabled placeholder="Nomor Antrian" value="{{ $qurban->nomor_antrian }}" />
                                        </div>
                                        <div>
                                            <label for="jenis_hewan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jenis
                                                Hewan
                                            </label>
                                            <select id="jenis_hewan" name="jenis_hewan"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="sapi"
                                                    {{ $qurban->jenis_hewan == 'sapi' ? 'selected' : '' }}>
                                                    Sapi</option>
                                                <option value="kerbau"
                                                    {{ $qurban->jenis_hewan == 'kerbau' ? 'selected' : '' }}>
                                                    kerbau</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="nama_satu"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 1
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_satu" name="nama_satu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->nama_satu }}" />
                                            @error('nama_satu')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_satu"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 1<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_satu" name="pahala_satu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->pahala_satu }}" />
                                            @error('pahala_satu')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nama_dua"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 2
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_dua" name="nama_dua"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->nama_dua }}" />
                                            @error('nama_dua')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_dua"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 2<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_dua"" name="pahala_dua""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->pahala_dua }}" />
                                            @error('pahala_dua"')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nama_tiga"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 3
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_tiga" name="nama_tiga"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->nama_tiga }}" />
                                            @error('nama_tiga')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_tiga"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 3<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_tiga" name="pahala_tiga"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->pahala_tiga }}" />
                                            @error('pahala_tiga')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nama_empat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 4
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_empat" name="nama_empat"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->nama_empat }}" />
                                            @error('nama_empat')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_empat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 4<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_empat"" name="pahala_empat""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->pahala_empat }}" />
                                            @error('pahala_empat')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nama_lima"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 5
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_lima" name="nama_lima"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->nama_lima }}" />
                                            @error('nama_lima')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_lima"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 5<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_lima" name="pahala_lima"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->pahala_lima }}" />
                                            @error('pahala_lima')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nama_enam"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 6
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_enam"" name="nama_enam""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->nama_enam }}" />
                                            @error('nama_enam"')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_enam"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 6<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_enam"" name="pahala_enam""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->pahala_enam }}" />
                                            @error('pahala_enam"')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nama_tujuh"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 7
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_tujuh" name="nama_tujuh"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->nama_tujuh }}" />
                                            @error('nama_tujuh')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_tujuh"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 7<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_tujuh" name="pahala_tujuh"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                value="{{ $qurban->pahala_tujuh }}" />
                                            @error('pahala_tujuh')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="hak_pengqurban"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Hak
                                                Pengqurban</label>
                                            <input type="text" id="hak_pengqurban" name="hak_pengqurban"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Hak Pengqurban" value="{{ $qurban->hak_pengqurban }}" />
                                        </div>

                                        <div>
                                            <label for="biaya"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Biaya
                                                Pembayaran</label>
                                            <input type="text" id="biaya" name="biaya"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jumlah Biaya" value="{{ $qurban->biaya }}" />
                                        </div>
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
                                                <option value="belum bayara"
                                                    {{ $qurban->status_pembayaran === 'belum bayar' ? 'selected' : '' }}>
                                                    Belum Bayar</option>
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
