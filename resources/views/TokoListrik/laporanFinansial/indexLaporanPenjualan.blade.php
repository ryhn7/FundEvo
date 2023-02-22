@extends('SPBU.laporanFinansial.index')

@section('laporan')
    <div class="flex flex-wrap -mx-3 mt-0">
        {{--  make a flex div and place it to right-0  --}}
        @if (request()->is('LaporanFinansialBBM/PenjualanBBM'))
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
        @endif
    </div>
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
                                    Jenis BBM</th>
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
                                        {{ $sells[0]->bbm->jenis_bbm }} Bensin Solar
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
