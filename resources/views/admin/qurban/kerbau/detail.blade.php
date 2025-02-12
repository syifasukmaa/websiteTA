@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Detail Pendaftar Qurban';
    @endphp
    <div class="w-full px-20 py-5 mx-auto">
        <a href="{{ route('pendaftarQurban.kerbau') }}"
            class="px-4 py-2 text-base font-medium text-white bg-black rounded-md ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-20 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2">Detail Data Pendaftar Qurban Sapi</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-6 overflow-x-auto">
                            <div class="dark:bg-gray-700">
                                <form method=""
                                    action="{{ route('pendaftarQurban.kerbau.edit', $qurban->id_pengqurban_sapi) }}">
                                    @csrf
                                    <div class="grid grid-cols-1 gap-x-4 gap-y-6 lg:grid-cols-4 md:grid-cols-2">
                                        <div>
                                            <label for="nama_satu"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Pengqurban 1
                                                <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama_satu" name="nama_satu"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->nama_satu }}" disabled />
                                            @error('nama_satu')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_satu"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 1<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_satu" name="pahala_satu"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->pahala_satu }}"disabled />
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
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->nama_dua }}" disabled />
                                            @error('nama_dua')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_dua"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 2<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_dua"" name="pahala_dua""
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->pahala_dua }}" disabled />
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
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->nama_tiga }}" disabled />
                                            @error('nama_tiga')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_tiga"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 3<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_tiga" name="pahala_tiga"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->pahala_tiga }}" disabled />
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
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->nama_empat }}" disabled />
                                            @error('nama_empat')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_empat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 4<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_empat"" name="pahala_empat""
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->pahala_empat }}" disabled />
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
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->nama_lima }}" disabled />
                                            @error('nama_lima')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_lima"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 5<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_lima" name="pahala_lima"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->pahala_lima }}"disabled />
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
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->nama_enam }}" disabled />
                                            @error('nama_enam"')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_enam"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 6<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_enam"" name="pahala_enam""
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->pahala_enam }}" disabled />
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
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->nama_tujuh }}" disabled />
                                            @error('nama_tujuh')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="pahala_tujuh"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tujuan
                                                Pahala 7<span class="text-red-500">*</span></label>
                                            <input type="text" id="pahala_tujuh" name="pahala_tujuh"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->pahala_tujuh }}" disabled />
                                            @error('pahala_tujuh')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
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
                                                Pengqurban <span class="text-red-500">*</span></label>
                                            <input type="text" id="hak_pengqurban" name="hak_pengqurban"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ $qurban->hak_pengqurban }}" disabled />
                                            @error('hak_pengqurban')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="biaya"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Biaya
                                                Pembayaran <span class="text-red-500">*</span></label>
                                            <input type="text" id="biaya" name="biaya"
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                value="{{ number_format($qurban->biaya) }}" disabled />
                                            @error('biaya')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="status_pembayaran"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status
                                                Pembayaran</label>
                                            <input type="text" id="status_pembayaran" disabled
                                                class="block w-full px-0 text-sm text-gray-900 capitalize border-none rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white"
                                                placeholder="Jumlah Uang" value="{{ $qurban->status_pembayaran }}" />
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
                                    <div class="col-span-4 mt-8">
                                        <input type="submit"
                                            class="inline-block px-5 py-3 text-sm font-semibold leading-tight text-white rounded-lg cursor-pointer bg-hijau2 hover:bg-hijau1"
                                            value="Edit">
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
