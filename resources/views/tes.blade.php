@extends('layouts.main')

@section('container')
<div class="flex-auto px-0 pt-0 pb-2">
    <div class="p-0 overflow-x-auto">
        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <tr>
                <th
                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                    Total Pendapatan</th>
                {{-- <th
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
                </th> --}}
            </tr>
            <tr>
                <th
                    class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Penjualan BBM</th>
                    <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs"> 1000000
                    </p>
                </td>
                    
            </tr>
            <tr>
                <th
                    class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Pendapatan Lain</th>
                    <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs"> 50000
                    </p>
                </td>
            </tr>
            <tr>
                <td
                    class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <div class="flex px-2 py-1">
                        <div class="flex flex-col justify-center">
                            <h6 class="ml-2 mb-0 leading-normal text-sm">
                                -
                            </h6>
                        </div>
                    </div>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs">-
                    </p>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <span
                        class="font-semibold leading-tight text-xs text-slate-400">-</span>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <span class="font-semibold leading-tight text-xs text-slate-400">
                    -
                    </span>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <span
                        class="font-semibold leading-tight text-xs text-slate-400">-</span>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <span
                        class="font-semibold leading-tight text-xs text-slate-400">-</span>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <span
                        class="font-semibold leading-tight text-xs text-slate-400">-</span>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <span
                        class="font-semibold leading-tight text-xs text-slate-400">-</span>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <span
                        class="font-semibold leading-tight text-xs text-slate-400">-</span>
                </td>
                <td
                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                    <span
                        class="font-semibold leading-tight text-xs text-slate-400">-</span>
                </td>
            </tr>
            <tbody>
                {{-- <tr>
                    <td
                        class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <div class="flex px-2 py-1">
                            <div class="flex flex-col justify-center">
                                <h6 class="ml-2 mb-0 leading-normal text-sm">
                                    -
                                </h6>
                            </div>
                        </div>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">-
                        </p>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <span
                            class="font-semibold leading-tight text-xs text-slate-400">-</span>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <span class="font-semibold leading-tight text-xs text-slate-400">
                        -
                        </span>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <span
                            class="font-semibold leading-tight text-xs text-slate-400">-</span>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <span
                            class="font-semibold leading-tight text-xs text-slate-400">-</span>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <span
                            class="font-semibold leading-tight text-xs text-slate-400">-</span>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <span
                            class="font-semibold leading-tight text-xs text-slate-400">-</span>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <span
                            class="font-semibold leading-tight text-xs text-slate-400">-</span>
                    </td>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                        <span
                            class="font-semibold leading-tight text-xs text-slate-400">-</span>
                    </td>
                </tr> --}}
                {{-- @foreach (-)
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
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
