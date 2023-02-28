@extends('SPBU.laporanFinansial.index')

@section('filter')
    <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
        aria-labelledby="dropdownMenuButton1">
        <li class="dropdown">
            <div
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                Bulan</div>
            <ul class="dropdown-content absolute hidden text-gray-700 -pl-5 -ml-[177px] -mt-10">
                <form id="monthFilter" action="/LaporanFinansialSPBU/FilterBulan" class="py-0.5" method="GET">
                    <input id="month1" type="month" name="month" value="{{ request('month') }}"
                        class="px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                </form>
            </ul>
        </li>
        <li class="dropdown">
            <div
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                Tahun</div>
            <ul class="dropdown-content absolute hidden text-gray-700 -pl-5 -ml-[211px] -mt-10">
                <form id="yearFilter" action="/LaporanFinansialSPBU/FilterTahun" class="py-0.5"
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
    <div class="flex flex-wrap -mx-3 mt-0">
        {{--  make a flex div and place it to right-0  --}}
        @if (request()->is('LaporanFinansialSPBU'))
            <div class="w-full px-3 mb-2 md:mb-1">
                <div class="flex justify-between">
                    <div class="px-4 py-5">Filter by time range</div>
                    <div>
                        <form id="rangeFilter" action="/LaporanFinansialSPBU/FilterRange" class="py-0.5"
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
    </div>
@endsection
