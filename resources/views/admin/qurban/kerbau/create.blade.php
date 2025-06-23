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
                        <h6 class="font-medium text-hijau2">Tambah Data Pendaftar Qurban Sapi</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form class="" method="post" action="{{ route('pendaftarQurban.kerbau.store') }}">
                                    @csrf
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                        <x-input-field name="nama_satu" label=" Nama Pengqurban"
                                            placeholder="Masukkan Nama Pengqurban 1" :required="true" />
                                        {{-- <div>
                                            <label for="nama_satu"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 1
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_satu" name="nama_satu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nama pengqurban 1" />
                                            @error('nama_satu')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div>
                                            <label for="pahala_satu"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 1<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_satu" name="pahala_satu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tujuan Pahala 1" />
                                            @error('pahala_satu')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="pahala_satu" label=" Tujuan Pahala 1"
                                            placeholder="Tujuan Pahala 1" :required="true" />
                                        {{-- <div>
                                            <label for="nama_dua"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 2
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_dua" name="nama_dua"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nama pengqurban 2" />
                                            @error('nama_dua')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="nama_dua" label=" Nama Pengqurban 2"
                                            placeholder="Masukkan Nama Pengqurban 2" :required="true" />

                                        <x-input-field name="pahala_dua" label=" Tujuan Pahala 2"
                                            placeholder="Masukkan Tujuan Pahala 2" :required="true" />
                                        {{-- <div>
                                            <label for="pahala_dua"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 2<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_dua"" name="pahala_dua""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tujuan Pahala 2" />
                                            @error('pahala_dua"')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div>
                                            <label for="nama_tiga"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 3
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_tiga" name="nama_tiga"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nama pengqurban 3" />
                                            @error('nama_tiga')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="nama_tiga" label=" Nama Pengqurban 3"
                                            placeholder="Masukkan Nama Pengqurban 3" :required="true" />
                                        <x-input-field name="pahala_tiga" label=" Tujuan Pahala 3"
                                            placeholder="Masukkan Tujuan Pahala 3" :required="true" />
                                        {{-- <div>
                                            <label for="pahala_tiga"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 3<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_tiga" name="pahala_tiga"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tujuan Pahala 3" />
                                            @error('pahala_tiga')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div>
                                            <label for="nama_empat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 4
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_empat" name="nama_empat"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nama pengqurban 4" />
                                            @error('nama_empat')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="nama_empat" label=" Nama Pengqurban 4"
                                            placeholder="Masukkan Nama Pengqurban 4" :required="true" />
                                        <x-input-field name="pahala_empat" label=" Tujuan Pahala 4"
                                            placeholder="Masukkan Tujuan Pahala 4 " :required="true" />
                                        {{-- <div>
                                            <label for="pahala_empat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 4<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_empat"" name="pahala_empat""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tujuan Pahala 4" />
                                            @error('pahala_empat')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div>
                                            <label for="nama_lima"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 5
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_lima" name="nama_lima"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nama pengqurban 5" />
                                            @error('nama_lima')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="nama_lima" label=" Nama Pengqurban 5"
                                            placeholder="Masukkan Nama Pengqurban 5" :required="true" />
                                        <x-input-field name="pahala_lima" label=" Tujuan Pahala 5"
                                            placeholder="Masukkan Tujuan Pahala 5" :required="true" />
                                        {{-- <div>
                                            <label for="pahala_lima"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 5<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_lima" name="pahala_lima"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tujuan Pahala 5" />
                                            @error('pahala_lima')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div>
                                            <label for="nama_enam"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 6
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_enam"" name="nama_enam""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nama pengqurban 6" />
                                            @error('nama_enam"')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="nama_enam" label=" Nama Pengqurban 6"
                                            placeholder="Masukkan Nama Pengqurban 6" :required="true" />
                                        <x-input-field name="pahala_enam" label=" Tujuan Pahala 6"
                                            placeholder="Masukkan Tujuan Pahala 6" :required="true" />
                                        {{-- <div>
                                            <label for="pahala_enam"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 6<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_enam"" name="pahala_enam""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tujuan Pahala 6" />
                                            @error('pahala_enam"')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div>
                                            <label for="nama_tujuh"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 7
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_tujuh" name="nama_tujuh"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Nama pengqurban 7" />
                                            @error('nama_tujuh')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="nama_tujuh" label=" Nama Pengqurban 7"
                                            placeholder="Masukkan Nama Pengqurban 7" :required="true" />
                                        <x-input-field name="pahala_tujuh" label=" Tujuan Pahala 7"
                                            placeholder="Masukkan Tujuan Pahala 7" :required="true" />
                                        {{-- <div>
                                            <label for="pahala_tujuh"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 7<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_tujuh" name="pahala_tujuh"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Tujuan Pahala 7" />
                                            @error('pahala_tujuh')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div>
                                            <label for="jenis_hewan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jenis
                                                Hewan <span class="text-red-500">*</span>
                                            </label>
                                            <select id="jenis_hewan" name="jenis_hewan"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="sapi">
                                                    Sapi</option>
                                                <option value="kerbau">
                                                    Kerbau</option>
                                            </select>
                                        </div>
                                        {{-- <div>
                                            <label for="hak_pengqurban"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Hak
                                                Pengqurban <span class="text-red-500">*</span></label>
                                            <input type="text" id="hak_pengqurban" name="hak_pengqurban"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Hak Pengqurban" />
                                            @error('hak_pengqurban')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="hak_pengqurban" label=" Hak Pengqurban"
                                            placeholder="Masukkan Hak Pengqurban" :required="true" />
                                        <x-input-field name="biaya" label=" Biaya Pembayaran"
                                            placeholder="Masukkan Biaya Pendaftaran" :required="true" type="number" />
                                        {{-- <div>
                                            <label for="biaya"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Biaya
                                                Pembayaran <span class="text-red-500">*</span></label>
                                            <input type="text" id="biaya" name="biaya"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Jumlah Pembayaran" />
                                            @error('biaya')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
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
        {{-- <div class="flex flex-wrap -mx-3">
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
                                        <div>
                                            <label for="nama"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban</label>
                                            <input type="text" id="nama" name="nama"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <div>
                                            <label for="alamat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat</label>
                                            <input type="text" id="alamat" name="alamat"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <div>
                                            <label for="jenis_hewan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jenis
                                                Hewan</label>
                                            <input type="text" id="jenis_hewan" name="jenis_hewan"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <div>
                                            <label for="jumlah"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Jumlah</label>
                                            <input type="number" id="jumlah" name="jumlah"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <!-- Add more input fields as needed -->
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="px-4 py-2 text-white rounded-lg bg-hijau1 hover:bg-hijau2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
