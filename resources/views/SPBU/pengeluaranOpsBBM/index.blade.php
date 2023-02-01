@extends('layouts.main')

@section('container')
    <div class="px-3 mb-5">
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3" role="alert">
                <strong class="font-bold">Woaa!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                </span>
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
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total Pengeluaran/hari</p>
                                <h5 class="mb-0 font-bold">
                                    @currency($result)
                                    <span class="leading-normal text-sm font-weight-bolder text-lime-500">+55%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="flex justify-end mb-5 mr-1">
        <div class="mr-3 w-44">
            <form action="/pengeluaran-ops-bbm/filter" method="GET">
                <input type="date" name="date" value="{{ request('date') }}"
                    class="px-2 py-1 shadow-md border border-black">
                <button class="mt-1 border shadow">submit</button>
            </form>
        </div>
        <div
            class="flex w-44 px-2 py-1 rounded-md shadow-lg text-center group bg-gradient-to-tl from-sky-500 to-teal-500 hover:bg-gradient-to-tl hover:from-sky-600 hover:to-teal-600">
            <div class="mr-3 pb-1">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256"
                    width="20px" height="20px" fill-rule="nonzero">
                    <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <g transform="scale(9.84615,9.84615)">
                            <path
                                d="M19,3h-12c-2.19922,0 -4,1.80078 -4,4v12c0,2.19922 1.80078,4 4,4h12c2.19922,0 4,-1.80078 4,-4v-12c0,-2.19922 -1.80078,-4 -4,-4zM19,14h-5v5h-2v-5h-5v-2h5v-5h2v5h5z">
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="text-sm pt-0.5 text-white font-semibold group-hover:font-bold"><a
                    href="/pengeluaran-ops-bbm/create">Tambah
                    pengeluaran</a></div>
        </div>
    </div>
    @if ($spends->count() > 0)
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Pengularan Harian</h6>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Jenis BBM</th>
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
                                            class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="ml-2 mb-0 leading-normal text-sm">
                                                        @if ($spends[0]->bbm == null)
                                                            -
                                                        @else
                                                            {{ $spends[0]->bbm->jenis_bbm }}
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
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
                                                    {{ $spends[0]->keterangan }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($spends[0]->nota)
                                                    {{ $spends[0]->nota }}
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
                                            <div class="flex items-center space-x-4 text-sm">
                                                <button
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg hover:bg-orange-400 hover:text-white"
                                                    aria-label="Edit">
                                                    <a href="/pengeluaran-ops-bbm/{{ $spends[0]->id }}/edit">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg></a>
                                                </button>
                                                <form action="/pengeluaran-ops-bbm/{{ $spends[0]->id }}" method="POST">
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
                                                class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <h6 class="ml-2 mb-0 leading-normal text-sm">
                                                            @if ($spend->bbm == null)
                                                                -
                                                            @else
                                                                {{ $spend->bbm->jenis_bbm }}
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
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
                                                        {{ $spend->keterangan }}
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($spend->nota)
                                                        {{ $spend->nota }}
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
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <button
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg hover:bg-orange-400 hover:text-white"
                                                        aria-label="Edit">
                                                        <a href="/pengeluaran-ops-bbm/{{ $spend->id }}/edit">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                                </path>
                                                            </svg></a>
                                                    </button>
                                                    <form action="/pengeluaran-ops-bbm/{{ $spend->id }}"
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
                </div>
            </div>
        </div>
    @else
        <div class="mx-auto font-bold">Masih kosong gann</div>
    @endif
@endsection
