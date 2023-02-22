@extends('layouts.main')

@section('container')
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <tr>
                        <th
                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            @sortablelink('created_at', 'Tanggal')
                        </th>
                        <th
                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            @sortablelink('stock_awal', 'Pertalite')</th>
                        <th
                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            @sortablelink('penerimaan', 'Pertamax')</th>
                        <th
                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            @sortablelink('tera_densiti', 'Solar')</th>
                        <th
                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            @sortablelink('penjualan', ' Bio Solar')</th>
                        <th
                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            @sortablelink('penjualan', ' Total Penebusan')</th>
                        <th
                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                            @sortablelink('penjualan', ' PPH')</th>
                    </tr>
                <tbody>
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                                <div class="flex flex-col justify-center">
                                    <h6 class="ml-2 mb-0 font-semibold leading-tight text-xs text-slate-400">
                                        {{-- {{ $sells[0]->created_at->format('m/d/Y') }} --}} 05-06-2023
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td
                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-xs">
                                {{-- {{ $sells[0]->stock_awal }} --}}8000
                            </p>
                        </td>
                        <td
                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <span
                                class="font-semibold leading-tight text-xs text-slate-400"></span>
                        </td>
                        <td
                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <span class="font-semibold leading-tight text-xs text-slate-400">
                                {{-- @if ($sells[0]->tera_densiti)
                                    {{ $sells[0]->tera_densiti }}
                                @else
                                    -
                                @endif --}}800
                            </span>
                        </td>
                        <td
                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <span
                                class="font-semibold leading-tight text-xs text-slate-400"></span>
                        </td>
                        <td
                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <span
                                class="font-semibold leading-tight text-xs text-slate-400">100000000</span>
                        </td>
                        <td
                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <span
                                class="font-semibold leading-tight text-xs text-slate-400">150000</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
