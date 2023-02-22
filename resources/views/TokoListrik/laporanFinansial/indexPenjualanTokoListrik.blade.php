@extends('TokoListrik.laporanFinansial.index')

@section('filter')
    <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
        aria-labelledby="dropdownMenuButton1">
        <li class="dropdown">
            <div
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                Bulan</div>
            <ul class="dropdown-content absolute hidden text-gray-700 -pl-5 -ml-[177px] -mt-10">
                <form id="monthFilter" action="/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterBulan" class="py-0.5"
                    method="GET">
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
                <form id="yearFilter" action="/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterTahun" class="py-0.5"
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
        @if (request()->is('LaporanFinansialTokoListrik/PenjualanTokoListrik'))
            <div class="w-full px-3 mb-2 md:mb-1">
                <div class="flex justify-between">
                    <div class="px-4 py-5">Filter by time range</div>
                    <div>
                        <form id="rangeFilter" action="/LaporanFinansialTokoListrik/PenjualanTokoListrik/FilterRange"
                            class="py-0.5" method="GET">
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
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('nama_item', 'Nama Item')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('kategori', 'Kategori')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('stock_awal', 'Stock Awal')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('penerimaan', 'Penerimaan')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('penjualan', 'Penjualan')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('penyusutan', 'Penyusutan')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('stock_akhir', 'Stock Akhir')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('pendapatan', 'Pendapatan')
                                </th>
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
                                <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="ml-2 mb-0 leading-normal text-sm">
                                                {{ $sells[0]->item->nama_item }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">
                                        {{ $sells[0]->item->itemKategoris->kategori }}
                                    </p>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->stock_awal }}</span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penerimaan }}</span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penjualan }}</span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penyusutan }}</span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span
                                        class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->stock_akhir }}</span>
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
                                        class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <h6 class="ml-2 mb-0 leading-normal text-sm">
                                                    {{ $sell->item->nama_item }}
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">
                                            {{ $sell->item->itemKategoris->kategori }}
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->stock_awal }}</span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penerimaan }}</span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penjualan }}</span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penyusutan }}</span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span
                                            class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->stock_akhir }}</span>
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
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        function setup() {
            return {
                activeTab: 0,
                tabs: [
                    "Penjualan BBM",
                    "Pengeluaran Operasional SPBU",
                    "Laporan Keuangan SPBU",
                ]
            };
        };
    </script>

    <script>
        const month = document.getElementById('month1');
        const end = document.getElementById('end');
        const monthForm = document.getElementById('monthFilter');
        const rangeForm = document.getElementById('rangeFilter');

        month.addEventListener('change', () => {
            monthForm.submit();
        })

        end.addEventListener('change', () => {
            rangeForm.submit();
        })
    </script>
@endsection


