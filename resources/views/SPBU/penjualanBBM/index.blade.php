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
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total Pendapatan/hari</p>
                                <h5 class="mb-0 font-bold">
                                    @currency($totalAmount)
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

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Total Penjualan BBM</p>
                                <h5 class="mb-0 font-bold">
                                    {{ $totalSell }}
                                    <span class="leading-normal text-sm font-weight-bolder text-lime-500">+3%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-end mb-5 mr-1">
        <div class="mr-3 w-44">
            <form action="/penjualan-bbm/filter" method="GET">
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
                    href="/penjualan-bbm/create">Tambah
                    penjualan</a></div>
        </div>
    </div>
    @if ($sells->count() > 0)
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Penjualan Harian</h6>
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
                                            Stok Awal</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Penerimaan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Tera & Densiti</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Penjualan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Stok ADM</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Stok Fakta</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Penyusutan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Pendapatan</th>
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
                                                        {{ $sells[0]->bbm->jenis_bbm }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 font-semibold leading-tight text-xs">{{ $sells[0]->stock_awal }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penerimaan }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                                @if ($sells[0]->tera_densiti)
                                                    {{ $sells[0]->tera_densiti }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penjualan }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->stock_adm }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->stock_fakta }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penyusutan }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs text-slate-400">@currency($sells[0]->pendapatan)</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->created_at->format('d/m/Y') }}</span>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                            <div class="flex items-center space-x-1.25 text-sm">
                                                <button
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg hover:bg-orange-400 hover:text-white"
                                                    aria-label="Edit">
                                                    <a href="/penjualan-bbm/{{ $sells[0]->id }}/edit">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg></a>
                                                </button>
                                                <form action="/penjualan-bbm/{{ $sells[0]->id }}" method="POST">
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
                                    @foreach ($sells->skip(1) as $sell)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <h6 class="ml-2 mb-0 leading-normal text-sm">
                                                            {{ $sell->bbm->jenis_bbm }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 font-semibold leading-tight text-xs">
                                                    {{ $sell->stock_awal }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penerimaan }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <span class="font-semibold leading-tight text-xs text-slate-400">
                                                    @if ($sell->tera_densiti)
                                                        {{ $sell->tera_densiti }}
                                                    @else
                                                        -
                                                    @endif
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penjualan }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->stock_adm }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->stock_fakta }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penyusutan }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="font-semibold leading-tight text-xs text-slate-400">@currency($sell->pendapatan)</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->created_at->format('d/m/Y') }}</span>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                <div class="mr-1.5 flex items-center space-x-1.25 text-sm">
                                                    <button
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg hover:bg-orange-400 hover:text-white"
                                                        aria-label="Edit">
                                                        <a href="/penjualan-bbm/{{ $sell->id }}/edit">
                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                                </path>
                                                            </svg></a>
                                                    </button>
                                                    <form action="/penjualan-bbm/{{ $sell->id }}" method="POST">
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
