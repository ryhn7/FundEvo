@extends('layouts.main')

@section('container')
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)" class="px-3 mb-5">
        @if (session()->has('success'))
            <div alert
                class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300"
                role="alert">
                <strong class="font-bold">Woaa!</strong>
                {{ session('success') }}
                <button type="button" alert-close
                    class="box-content absolute top-0 right-0 p-4 text-sm text-white bg-transparent border-0 rounded w-4 h-4 z-2">
                </button>
            </div>
        @elseif (session()->has('error'))
            <div alert
                class="relative p-4 pr-12 mb-4 text-white border border-red-300 border-solid rounded-lg bg-gradient-to-tl from-red-600 to-rose-400"
                role="alert">
                <strong class="font-bold">Oops!</strong>
                {{ session('error') }}
                <button type="button" alert-close
                    class="box-content absolute top-0 right-0 p-4 text-sm text-white bg-transparent border-0 rounded w-4 h-4 z-2">
                </button>
            </div>
        @endif
    </div>
    <!-- row 1 -->
    <div class="flex flex-wrap px-3 -mx-3 mb-7">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-3/4 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-open font-semibold leading-normal text-sm">Total Pengeluaran/hari</p>
                                <h5 class="mb-0 font-bold">
                                    @currency($result)
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-[#060764] to-[#00b7dd]">
                                <i class="fa-solid fa-cart-shopping text-white py-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-5 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                            <h6 class="mb-0">Pengeluaran Harian</h6>
                        </div>
                        <div class="flex-none w-1/2 max-w-full px-3 text-right">
                            <div class="flex justify-end">
                                <div class="mr-5">
                                    <form id="dateFilter" action="/PengeluaranOperasionalSPBU/filter" class="py-0.5"
                                        method="GET">
                                        <input id="date1" type="date" name="date" value="{{ request('date') }}"
                                            class="px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                                    </form>
                                </div>
                                <div class="">
                                    <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-red-500 to-yellow-400 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                                        href="/PengeluaranOperasionalSPBU/create"> <i class="fas fa-plus">
                                        </i>&nbsp;&nbsp;Tambah
                                        Pengeluaran</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($spends->count() > 0)
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Harga Penebusan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            PPH</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Tips Sopir</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Oli</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Gas</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Gaji Supervisor</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Gaji Karyawan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Reward Karyawan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            PLN</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            PDAM</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Iuran RT</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            PBB</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Biaya lain-lain</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Keterangan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Nota</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Tanggal</th>
                                        <th
                                            class="px-6 py-3 font-bold text-start uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 font-semibold leading-tight text-xs">
                                                @if ($spends[0]->harga_penebusan_bbm)
                                                    @currency($spends[0]->harga_penebusan_bbm)
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 font-semibold leading-tight text-xs">
                                                @if ($spends[0]->pph)
                                                    @currency($spends[0]->pph)
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 font-semibold leading-tight text-xs">
                                                @if ($spends[0]->tips_sopir)
                                                    @currency($spends[0]->tips_sopir)
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 font-semibold leading-tight text-xs">
                                                @if ($spends[0]->oli)
                                                    @currency($spends[0]->oli)
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->gas)
                                                    @currency($spends[0]->gas)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->gaji_supervisor)
                                                    @currency($spends[0]->gaji_supervisor)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->gaji_karyawan)
                                                    @currency($spends[0]->gaji_karyawan)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->reward_karyawan)
                                                    @currency($spends[0]->reward_karyawan)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->pln)
                                                    @currency($spends[0]->pln)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->pdam)
                                                    @currency($spends[0]->pdam)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->iuran_rt)
                                                    @currency($spends[0]->iuran_rt)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->pbb)
                                                    @currency($spends[0]->pbb)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->biaya_lain)
                                                    @currency($spends[0]->biaya_lain)
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->keterangan)
                                                    {!! $spends[0]->keterangan !!}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-green-400">
                                                @if ($spends[0]->nota)
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalLg">Lihat Nota</button>

                                                    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                        id="exampleModalLg" tabindex="-1"
                                                        aria-labelledby="exampleModalLgLabel" aria-modal="true"
                                                        role="dialog">
                                                        <div
                                                            class="modal-dialog modal-lg relative w-auto pointer-events-none">
                                                            <div
                                                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                                <div
                                                                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                                    <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                                        id="exampleModalLgLabel">
                                                                        Nota 1
                                                                    </h5>
                                                                    <button type="button"
                                                                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body relative p-4">
                                                                    <div id="spendsIndicator"
                                                                        class="carousel slide relative"
                                                                        data-bs-ride="carousel">
                                                                        <div
                                                                            class="carousel-inner relative w-full overflow-hidden">
                                                                            <div
                                                                                class="carousel-item active float-left w-full">
                                                                                <img src="{{ asset('storage/nota/' . $spends[0]->nota[0]) }}"
                                                                                    class="block w-full"
                                                                                    alt="Wild Landscape" />
                                                                            </div>
                                                                            {{-- @for ($i = 1; $i < count($spends[0]->nota); $i++)
                                                                                @php($nota = $spends[0]->nota[$i])
                                                                                <div
                                                                                    class="carousel-item float-left w-full">
                                                                                    <img src="{{ asset('storage/nota/' . $nota) }}"
                                                                                        class="block w-full"
                                                                                        alt="Camera" />
                                                                                </div>
                                                                            @endfor --}}

                                                                            @foreach ($spends[0]->nota as $index => $nota)
                                                                                @if ($index == 0)
                                                                                    @continue
                                                                                @endif
                                                                                <div
                                                                                    class="carousel-item float-left w-full">
                                                                                    <img src="{{ asset('storage/nota/' . $nota) }}"
                                                                                        class="block w-full"
                                                                                        alt="Camera" />
                                                                                </div>
                                                                            @endforeach

                                                                        </div>
                                                                        <button
                                                                            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                                                                            type="button"
                                                                            data-bs-target="#spendsIndicator"
                                                                            data-bs-slide="prev">
                                                                            <span
                                                                                class="carousel-control-prev-icon inline-block bg-no-repeat"
                                                                                aria-hidden="true"></span>
                                                                            <span class="visually-hidden">Previous</span>
                                                                        </button>
                                                                        <button
                                                                            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                                                                            type="button"
                                                                            data-bs-target="#spendsIndicator"
                                                                            data-bs-slide="next">
                                                                            <span
                                                                                class="carousel-control-next-icon inline-block bg-no-repeat"
                                                                                aria-hidden="true"></span>
                                                                            <span class="visually-hidden">Next</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs text-slate-400">{{ $spends[0]->created_at->format('d/m/Y') }}</span>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <div class="flex items-center space-x-1.25 text-sm">
                                                <button
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg hover:bg-orange-400 hover:text-white"
                                                    aria-label="Edit">
                                                    <a href="/PengeluaranOperasionalSPBU/{{ $spends[0]->id }}/edit">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg></a>
                                                </button>
                                                <form action="/PengeluaranOperasionalSPBU/{{ $spends[0]->id }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-pink-600 rounded-lg hover:bg-pink-500 hover:text-white"
                                                        aria-label="Delete" onclick="return confirm('Are you sure?')">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach ($spends->skip(1) as $spend)
                                        <tr>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 font-semibold leading-tight text-xs">
                                                    @if ($spend->harga_penebusan_bbm)
                                                        @currency($spend->harga_penebusan_bbm)
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 font-semibold leading-tight text-xs">
                                                    @if ($spend->pph)
                                                        @currency($spend->pph)
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 font-semibold leading-tight text-xs">
                                                    @if ($spend->tips_sopir)
                                                        @currency($spend->tips_sopir)
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 font-semibold leading-tight text-xs">
                                                    @if ($spend->oli)
                                                        @currency($spend->oli)
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->gas)
                                                        @currency($spend->gas)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->gaji_supervisor)
                                                        @currency($spend->gaji_supervisor)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->gaji_karyawan)
                                                        @currency($spend->gaji_karyawan)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->reward_karyawan)
                                                        @currency($spend->reward_karyawan)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->pln)
                                                        @currency($spend->pln)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->pdam)
                                                        @currency($spend->pdam)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->iuran_rt)
                                                        @currency($spend->iuran_rt)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->pbb)
                                                        @currency($spend->pbb)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->biaya_lain)
                                                        @currency($spend->biaya_lain)
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->keterangan)
                                                        {!! $spend->keterangan !!}
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-green-400">
                                                    @if ($spend->nota)
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#spend">Lihat Nota</button>

                                                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                            id="spend" tabindex="-1"
                                                            aria-labelledby="exampleModalLgLabel" aria-modal="true"
                                                            role="dialog">
                                                            <div
                                                                class="modal-dialog modal-lg relative w-auto pointer-events-none">
                                                                <div
                                                                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                                    <div
                                                                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                                        <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                                            id="exampleModalLgLabel">
                                                                            Nota 2
                                                                        </h5>
                                                                        <button type="button"
                                                                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body relative p-4">
                                                                        <div id="spendIndicator"
                                                                            class="carousel slide relative"
                                                                            data-bs-ride="carousel">
                                                                            <div
                                                                                class="carousel-inner relative w-full overflow-hidden">
                                                                                <div
                                                                                    class="carousel-item active float-left w-full">
                                                                                    <img src="{{ asset('storage/nota/' . $spend->nota[0]) }}"
                                                                                        class="block w-full"
                                                                                        alt="Wild Landscape" />
                                                                                </div>
                                                                                {{-- @for ($i = 1; $i < count($spends[0]->nota); $i++)
                                                                            @php($nota = $spends[0]->nota[$i])
                                                                            <div
                                                                                class="carousel-item float-left w-full">
                                                                                <img src="{{ asset('storage/nota/' . $nota) }}"
                                                                                    class="block w-full"
                                                                                    alt="Camera" />
                                                                            </div>
                                                                        @endfor --}}

                                                                                @foreach ($spend->nota as $index => $nota)
                                                                                    @if ($index == 0)
                                                                                        @continue
                                                                                    @endif
                                                                                    <div
                                                                                        class="carousel-item float-left w-full">
                                                                                        <img src="{{ asset('storage/nota/' . $nota) }}"
                                                                                            class="block w-full"
                                                                                            alt="Camera" />
                                                                                    </div>
                                                                                @endforeach

                                                                            </div>
                                                                            <button
                                                                                class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                                                                                type="button"
                                                                                data-bs-target="#spendIndicator"
                                                                                data-bs-slide="prev">
                                                                                <span
                                                                                    class="carousel-control-prev-icon inline-block bg-no-repeat"
                                                                                    aria-hidden="true"></span>
                                                                                <span
                                                                                    class="visually-hidden">Previous</span>
                                                                            </button>
                                                                            <button
                                                                                class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                                                                                type="button"
                                                                                data-bs-target="#spendIndicator"
                                                                                data-bs-slide="next">
                                                                                <span
                                                                                    class="carousel-control-next-icon inline-block bg-no-repeat"
                                                                                    aria-hidden="true"></span>
                                                                                <span class="visually-hidden">Next</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="font-semibold leading-tight text-xs text-slate-400">{{ $spend->created_at->format('d/m/Y') }}</span>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <div class="flex items-center space-x-1.25 text-sm">
                                                    <button
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg hover:bg-orange-400 hover:text-white"
                                                        aria-label="Edit">
                                                        <a href="/PengeluaranOperasionalSPBU/{{ $spend->id }}/edit">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                                </path>
                                                            </svg></a>
                                                    </button>
                                                    <form action="/PengeluaranOperasionalSPBU/{{ $spend->id }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button
                                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-pink-600 rounded-lg hover:bg-pink-500 hover:text-white"
                                                            aria-label="Delete" onclick="return confirm('Are you sure?')">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div>
                        <hr class="border-b-[1px] border-solid">
                        <div class="w-full">
                            <div class="flex justify-center">
                                <div class="text-center">
                                    <h1 class="text-2xl font-bold">Data masih kosong</h1>
                                    <p class="text-gray-500">Silahkan tambahkan data terlebih dahulu</p>
                                </div>
                            </div>
                        </div>
                        <div class="container w-full h-[400px]" id="animation">
                            <script>
                                var animation = bodymovin.loadAnimation({
                                    container: document.getElementById('animation'),
                                    renderer: 'svg',
                                    loop: true,
                                    autoplay: true,
                                    path: 'https://assets2.lottiefiles.com/packages/lf20_ysrn2iwp.json'
                                })
                            </script>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/submitDateFilter.js') }}"></script>
@endsection
