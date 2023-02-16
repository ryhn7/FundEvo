@extends('layouts.main')

@section('container')
    {{-- top --}}
    <div class="flex flex-col mt-6 -mx-3">
        <div class="w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-lg bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <h3 class="font-bold">Penjualan BBM Bulan (Month)</h3>
                                <p class="mb-12">xxx Penjualan</p>
                            </div>
                        </div>
                        <div class="max-w-full px-4.5 mt-12 ml-auto text-center lg:mt-0">
                            <div class="relative">
                                <div>
                                    <div class="dropdown relative">
                                        <button
                                            class="
                                                inline-block px-6 py-2 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-red-500 to-yellow-400 leading-pro text-sm ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs"
                                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Filter
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="caret-down" class="w-2 ml-2" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                                <path fill="currentColor"
                                                    d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                                                </path>
                                            </svg>
                                        </button>
                                        <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                                    href="#">Bulan</a>
                                            </li>
                                            <li>
                                                <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                                    href="#">Semester</a>
                                            </li>
                                            <li>
                                                <a class=" dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                                    href="#">Tahun</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div x-data="setup()">
                        <ul class="flex border-b-[1.5px]">
                            <template x-for="(tab, index) in tabs" :key="index">
                                <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent"
                                    :class="activeTab === index ? 'text-green-500 border-green-500' : ''"
                                    @click="activeTab = index" x-text="tab"></li>
                            </template>
                        </ul>

                        {{-- <div x-show="activeTab===0">Content 1</div>
                            <div x-show="activeTab===1">Content 2</div>
                            <div x-show="activeTab===2">Content 3</div>
                            <div x-show="activeTab===3">Content 4</div> --}}

                        <div class="flex flex-wrap -mx-3 mt-5">
                            <div x-show="activeTab===0" class="flex-none w-full max-w-full">
                                <div
                                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid bg-clip-border">
                                    <div
                                        class="px-6 pb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    </div>
                                    {{-- @if ($sells->count() > 0) --}}
                                    <div class="flex-auto px-0 pt-0 pb-2">
                                        <div class="p-0 overflow-x-auto">
                                            <table
                                                class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                                <thead class="align-bottom">
                                                    <tr>
                                                        <th
                                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                            Tanggal</th>
                                                        <th
                                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                            <div class="flex px-2 py-1">
                                                                <div class="flex flex-col justify-center">
                                                                    <h6
                                                                        class="ml-2 mb-0 font-semibold leading-tight text-xs text-slate-400">
                                                                        {{ $sells[0]->created_at->format('d/m/Y') }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                            <span
                                                                class="font-semibold leading-tight text-xs text-slate-400">
                                                                {{ $sells[0]->bbm->jenis_bbm }}</span>
                                                        </td>
                                                        <td
                                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                            <p class="mb-0 font-semibold leading-tight text-xs">
                                                                {{ $sells[0]->stock_awal }}
                                                            </p>
                                                        </td>
                                                        <td
                                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                            <span
                                                                class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penerimaan }}</span>
                                                        </td>
                                                        <td
                                                            class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                                            <span
                                                                class="font-semibold leading-tight text-xs text-slate-400">
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
                                                    </tr>
                                                    @foreach ($sells->skip(1) as $sell)
                                                        <tr>
                                                            <td
                                                                class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                                <div class="flex px-2 py-1">
                                                                    <div class="flex flex-col justify-center">
                                                                        <h6
                                                                            class="ml-2 mb-0 font-semibold leading-tight text-xs text-slate-400"">
                                                                            {{ $sell->created_at->format('d/m/Y') }}</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td
                                                                class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                                                <span
                                                                    class="font-semibold leading-tight text-xs text-slate-400">
                                                                    {{ $sell->bbm->jenis_bbm }}</span>
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
                                                                <span
                                                                    class="font-semibold leading-tight text-xs text-slate-400">
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
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </div>
                        {{-- </div> --}}
                    </div>

                    <script>
                        function setup() {
                            return {
                                activeTab: 0,
                                tabs: [
                                    "Penjualan BBM",
                                    "Pengeluaran Operasional SPBU",
                                    "Laporan Keuangan SPBU",
                                    "Tab No.4",
                                ]
                            };
                        };
                    </script>

                </div>
            </div>
        </div>

    </div>
@endsection
