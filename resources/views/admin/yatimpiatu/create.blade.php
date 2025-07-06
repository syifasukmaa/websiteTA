@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Menambah Yatim Piatu';
    @endphp
    <div class="w-full px-12 py-5 mx-auto">
        <a href="{{ route('yatimPiatu.index') }}"
            class="px-4 py-2 text-base font-medium border-2 rounded-md text-hijau1 border-hijau1 ">
            &larr; Kembali</a>
    </div>
    <div class="w-full px-4 mx-auto md:px-12">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid md:px-5 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="pb-0 mb-0 bg-white border-b-0 md:p-6 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="font-medium text-hijau2">Form Tambah Yatim Piatu</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-3 overflow-x-auto md:p-6">
                            <div class="dark:bg-gray-700">
                                <form action="{{ route('yatimPiatu.store') }}" method="POST">
                                    @csrf
                                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                                        {{-- <div>
                                            <label for="nama"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white ">
                                                Nama Yatim Piatu <span class="text-red-500">*</span></label>
                                            <input type="text" id="nama" name="nama"
                                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 capitalize dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="nama Yatim Piatu" />
                                            @error('nama')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="nama" label=" Nama Yatim Piatu" placeholder="Masukkan Nama"
                                            :required="true" />
                                        <x-input-field name="nama_ibu" label=" Nama Ibu" placeholder="Masukkan Nama Ibu"
                                            :required="true" />
                                        {{-- <div>
                                            <label for="nama_ibu"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Ibu<span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="nama_ibu" name="nama_ibu"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 capitalize"
                                                placeholder="Nama Ibu" />
                                            @error('nama_ayah')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div>
                                            <label for="nama_ayah"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Nama
                                                Ayah<span class="text-red-500">*</span>
                                            </label>
                                            <input type="text" id="nama_ayah" name="nama_ayah"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 capitalize"
                                                placeholder="Nama Ayah" />
                                            @error('nama_ayah')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-input-field name="nama_ayah" label=" Nama Ayah" placeholder="Masukkan Nama Ayah"
                                            :required="true" />
                                        <div>
                                            <label for="status"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Status
                                                <span class="text-red-500">*</span>
                                            </label>

                                            <select id="status" name="status"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="yatim">
                                                    Yatim</option>
                                                <option value="piatu">
                                                    Piatu</option>
                                            </select>
                                            @error('status')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div>
                                            <label for="biaya"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">biaya
                                                <span class="text-red-500">*</span>
                                                (Rp)</label>
                                            <input type="number" id="biaya" name="biaya"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Biaya Santunan" />
                                            @error('biaya')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}

                                        <x-input-field name="biaya" label="Biaya (Rp)"
                                            placeholder="Masukkan Jumlah Biaya Santunan" :required="true" type="number" />

                                        <div>
                                            <label for="pendidikan"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">pendidikan
                                                <span class="text-red-500">*</span>
                                            </label>

                                            <select id="pendidikan" name="pendidikan"
                                                class="text-slate-700 bg-white border border-slate-400  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <option value="paud">
                                                    Paud</option>
                                                <option value="sd">
                                                    SD</option>
                                                <option value="smp">
                                                    SMP</option>
                                                <option value="sma">
                                                    SMA</option>
                                            </select>
                                            @error('pendidikan')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div>
                                            <label for="alamat"
                                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Alamat
                                                Yatim Piatu<span class="text-red-500">*</span>
                                            </label>
                                            <textarea id="alamat" name="alamat"
                                                class="bg-gray-50 capitalize border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Alamat Muzakki"></textarea>
                                            @error('alamat')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <x-textarea name="alamat" label="Alamat Yatim Piatu"
                                            placeholder="Isi Alamat Yatim Piatu" :required="true" />
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
                                            @error('id_RT')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <button type="submit"
                                        class="text-white bg-hijau2 hover:bg-hijau1 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
