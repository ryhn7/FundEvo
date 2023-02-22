@extends('SPBU.laporanFinansial.index')

@section('filter')
    <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
        aria-labelledby="dropdownMenuButton1">
        <li class="dropdown">
            <div
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                Bulan</div>
            <ul class="dropdown-content absolute hidden text-gray-700 -pl-5 -ml-[177px] -mt-10">
                <form id="monthFilter" action="/LaporanFinansialBBM/PenjualanBBM/FilterBulan" class="py-0.5" method="GET">
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
                <form id="yearFilter" action="/LaporanFinansialBBM/PenjualanBBM/FilterTahun" class="py-0.5" method="GET">
                    <input id="year1" type="text" name="year" placeholder="Pilih Tahun"
                        value="{{ request('year') }}"
                        class="yearpicker px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                </form>
            </ul>
        </li>
    </ul>
@endsection

@section('laporan')
    @if (request()->is('LaporanFinansialBBM/PenjualanBBM'))
        <div class="flex flex-wrap -mx-3 mt-0">
            {{--  make a flex div and place it to right-0  --}}
            <div class="w-full px-3 mb-2 md:mb-1">
                <div class="flex justify-between">
                    <div class="px-4 py-5">Filter by time range</div>
                    <div>
                        <form id="rangeFilter" action="/LaporanFinansialBBM/PenjualanBBM/FilterRange" class="py-0.5"
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
        </div>
        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            @foreach ($bbms as $bbm)
                {{-- get sum of pendapatan from penjualan bbm use blade --}}
                @php
                    $revenue = $sells->where('bbm_id', $bbm->id)->sum('pendapatan');
                    $liter = $sells->where('bbm_id', $bbm->id)->sum('penjualan');
                    $penyusutan = $sells->where('bbm_id', $bbm->id)->sum('penyusutan');
                @endphp
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-open font-semibold leading-normal text-sm">
                                            {{ $bbm->jenis_bbm }}
                                        </p>
                                        <h5 class="mb-0 font-bold">
                                            @currency($revenue) </h5>
                                        <span
                                            class="leading-normal text-sm font-weight-bolder text-lime-500">{{ $liter }}
                                            Liter</span>
                                    </div>
                                    <span
                                        class="leading-normal text-sm font-weight-bolder text-lime-500">{{ $penyusutan }}
                                        Liter</span>
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
            @endforeach
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-open font-semibold leading-normal text-sm">
                                        Total
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        @currency($totalPendapatan)</h5>
                                    <span
                                        class="leading-normal text-sm font-weight-bolder text-lime-500">{{ $totalLiter }}
                                        Liter</span>
                                </div>
                                <span class="leading-normal text-sm font-weight-bolder text-lime-500">{{ $totalPenyusutan }}
                                    Liter</span>
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
    @endif

    <div class="flex-none w-full max-w-full">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid bg-clip-border">
            <div class="px-6 pb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            </div>
        </div>
        @if ($sells->count() > 0)
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('created_at', 'Tanggal')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('bbm_id', 'Jenis BBM')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('stock_awal', 'Stok Awal')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('penerimaan', 'Penerimaan')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('tera_densiti', 'Tera & Densiti')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('penjualan', ' Penjualan')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('stock_adm', 'Stok ADM')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('stock_fakta', 'Stok Fakta')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('penyusutan', 'Penyusutan')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('pendapatan', 'Pendapatan')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="ml-2 mb-0 font-semibold leading-tight text-xs text-slate-400">
                                                {{ $sells[0]->created_at->format('m/d/Y') }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        {{ $sells[0]->bbm->jenis_bbm }}
                                    </span>
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
                            </tr>
                            @foreach ($sells->skip(1) as $sell)
                                <tr>
                                    <td
                                        class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <h6 class="ml-2 mb-0 font-semibold leading-tight text-xs text-slate-400"">
                                                    {{ $sell->created_at->format('m/d/Y') }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div>
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
@endsection
