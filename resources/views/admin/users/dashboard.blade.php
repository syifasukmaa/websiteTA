@extends('admin.layouts.main')
@section('contents')
    @php
        $title = 'Pengguna';
    @endphp

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="flex justify-end">
                    <div class="flex flex-col justify-end md:items-center md:flex-row">
                        <div class="flex items-center md:ml-auto md:pr-4">
                            <form>
                                <div
                                    class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                                    <button type="submit"
                                        class="text-sm ease-soft leading-5.6 absolute z-50 right-5 flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <input type="search" name="search"
                                        class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2.5 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                        autocomplete="off" placeholder="Type here..." />
                                </div>
                            </form>
                        </div>

                        <a href="{{ route('pengguna.create') }}"
                            class="text-white bg-blue hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
                            Pengguna</a>
                    </div>
                </div>
                @include('admin.layouts.partials.alert')
                <div
                    class="relative flex flex-col min-w-0 mt-5 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="mb-3 font-medium text-hijau1">Data Seluruh Pengguna</h6>
                        <div class="flex items-center justify-between">
                            <div class="flex">

                                <p class="text-slate-800">Halaman <span class="font-bold ">{{ $users->currentPage() }}
                                    </span> sampai <span class="font-bold">{{ $users->lastPage() }}</span> dari
                                    <span class="font-bold">{{ $users->total() }} Data</span>
                                </p>
                            </div>

                            <div class="flex justify-end mt-4">
                                @if ($users->onFirstPage())
                                    <span
                                        class="px-4 py-2 font-medium text-green-300 border rounded-lg cursor-not-allowed">Previous</span>
                                @else
                                    <a href="{{ $users->previousPageUrl() }}"
                                        class="px-4 py-2 font-medium text-green-600 bg-blue-500 border rounded-lg">Previous</a>
                                @endif

                                @if ($users->hasMorePages())
                                    <a href="{{ $users->nextPageUrl() }}"
                                        class="px-4 py-2 ml-2 font-medium text-green-600 bg-blue-500 border rounded-lg">Next</a>
                                @else
                                    <span
                                        class="px-4 py-2 ml-2 font-medium text-green-300 border rounded-lg cursor-not-allowed">Next</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-sm font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-70">
                                            No</th>
                                        <th
                                            class="px-6 py-3 text-sm font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-70">
                                            Nama User</th>
                                        <th
                                            class="px-6 py-3 pl-2 text-sm font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-70">
                                            Role User</th>

                                        <th
                                            class="px-6 py-3 text-sm font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-70">
                                            Email</th>
                                        <th
                                            class="px-6 py-3 text-sm font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-70">
                                            Tanggal Dibuat</th>
                                        <th <th
                                            class="px-6 py-3 text-sm font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none border-b-solid tracking-none whitespace-nowrap text-slate-800 opacity-70">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-sm font-semibold leading-tight text-slate-800">{{ $loop->iteration }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-sm font-semibold leading-tight text-slate-800">{{ $user->name }}</span>
                                            </td>

                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-sm font-semibold leading-tight text-slate-800">{{ $user->role }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-sm font-semibold leading-tight text-slate-800">{{ $user->email }}</span>
                                            </td>


                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-sm font-semibold leading-tight text-slate-800">{{ date('d-m-Y', strtotime($user->created_at)) }}</span>
                                            </td>

                                            <td class="flex p-2 align-middle border-b gap-x-2">
                                                <a href="{{ route('pengguna.detail', $user->id) }}"
                                                    class="inline-block p-2 py-2 text-sm font-semibold leading-tight text-white bg-yellow-300 rounded-lg"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                            clip-rule="evenodd" />
                                                    </svg>

                                                </a>
                                                {{-- <form action="{{ route('pengguna.delete', $user->id) }}" method="POST"
                                                    class="cursor-pointer w-fit">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Hapus"
                                                        class="inline-block p-2 text-sm font-semibold leading-tight text-white bg-red-600 rounded-lg cursor-pointer w-fit">
                                                </form> --}}

                                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                    data-id="{{ $user->id }}"
                                                    data-action-url="{{ route('pengguna.delete', ':id') }}"
                                                    class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                                                    type="button">
                                                    Hapus
                                                </button>

                                                <div id="popup-modal" tabindex="-1"
                                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                    <div class="relative w-full max-w-md max-h-full p-4">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="popup-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-4 text-center md:p-5">
                                                                <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>
                                                                <h3
                                                                    class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                    Yakin ingin mengahapus data ini?</h3>

                                                                <div class="flex items-center justify-center">

                                                                    <form
                                                                        action="{{ route('pengguna.delete', $user->id) }}"
                                                                        method="POST" class="w-fit">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="submit" value="Hapus"
                                                                            data-modal-hide="popup-modal"
                                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    </form>
                                                                    <button data-modal-hide="popup-modal" type="button"
                                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                                        cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
