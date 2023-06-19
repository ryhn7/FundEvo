@extends('SPBU.laporanFinansial.index')

@section('filter')
    <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
        aria-labelledby="dropdownMenuButton1">
        <li class="dropdown">
            <div
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                Bulan</div>
            <ul class="dropdown-content absolute hidden text-gray-700 -pl-5 -ml-[177px] -mt-10">
                <form id="monthFilter" action="/LaporanFinansialSPBU/LaporanRabaRugi/FilterBulan" class="py-0.5" method="GET">
                    <input id="month1" type="month" name="month" value="{{ request('month') }}"
                        class="px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                </form>
            </ul>
        </li>
        <li class="dropdown">
            <div
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                Tahun</div>
            <ul class="dropdown-content absolute hidden text-gray-700 -pl-5 -ml-[202px] -mt-10">
                <form id="yearFilter" action="/LaporanFinansialSPBU/LaporanRabaRugi/FilterTahun" class="py-0.5"
                    method="GET">
                    <input id="year1" type="text" name="year" placeholder="Pilih Tahun"
                        value="{{ request('year') }}"
                        class="yearpicker px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                </form>
            </ul>
        </li>
    </ul>
@endsection

@section('laporan')
    {{-- <div class="flex flex-wrap -mx-3 mt-0">
        @if (request()->is('LaporanFinansialSPBU/LaporanRabaRugi'))
            <div class="w-full px-3 mb-2 md:mb-1">
                <div class="flex justify-between">
                    <div class="px-4 py-5">Filter by time range</div>
                    <div>
                        <form id="rangeFilter" action="/LaporanFinansialSPBU/LaporanRabaRugi/FilterRange" class="py-0.5"
                            method="GET">
                            <div class="flex">
                                <div class="mr-5">
                                    <div class="text-sm font-semibold px-1">From</div>
                                    <input id="start" type="date" name="start" value="{{ request('start') }}"
                                        class="px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                                </div>
                                <div>
                                    <div class="text-sm font-semibold px-1">To</div>
                                    <input id="end" type="date" name="end" value="{{ request('end') }}"
                                        class="px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div> --}}
    <div class="flex-auto px-0 pt-5 pb-2">
        <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <tr>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none text-black opacity-70">
                        Pendapatan</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Penjualan BBM</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"> @currency($totalPendapatan)
                        </p>
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-12 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Total Pendapatan</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"> @currency($totalPendapatan) {{-- TMP --}}
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                        Harga Pokok Penjualan</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"> @currency($totalHpp)
                        </p>
                    </td>
                </tr>


                <tr>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                        Pengeluaran</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Gaji Supervisor</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($totalGajiSupervisor)
                                @currency($totalGajiSupervisor)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Gaji Karyawan</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($totalGajiKaryawan)
                                @currency($totalGajiKaryawan)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Reward Karyawan</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($totalReward)
                                @currency($totalReward)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        PLN</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($pln)
                                @currency($pln)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        PDAM</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($pdam)
                                @currency($pdam)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Iuran RT</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($iuranRt)
                                @currency($iuranRt)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Tips Sopir</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($tipsSopir)
                                @currency($tipsSopir)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Biaya Lainnya</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($etc)
                                @currency($etc)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-12 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Total Pengeluaran</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($totalPengeluaran)
                                @currency($totalPengeluaran)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                        Laba Kotor</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs"> @currency($labaKotor)
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                        Penyusutan</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($totalPenyusutan)
                                @currency($totalPenyusutan)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>


                <tr>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                        Tebusan</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        PPH</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($pph)
                                @currency($pph)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-16 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Tebusan BBM</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($tebusan)
                                @currency($tebusan)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-12 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Total Tebusan</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($totalTebusan)
                                @currency($totalTebusan)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>

                <tr>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-black opacity-70">
                        Laba Bersih</th>
                    <td
                        class="p-2 text-center align-middle bg-transparent border-b border-gray-200 whitespace-nowrap shadow-transparent">
                        <p class="mb-0 font-semibold leading-tight text-xs">
                            @if ($labaBersih)
                                @currency($labaBersih)
                            @else
                                -
                            @endif
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
