@extends('layouts.main')

@section('container')
<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)" class="px-3 mb-5">
    @if (session()->has('success'))
    <div alert class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-to-tl from-green-600 to-lime-400 border-lime-300" role="alert">
        <strong class="font-bold">Woaa!</strong>
        {{ session('success') }}
        <button type="button" alert-close class="box-content absolute top-0 right-0 p-4 text-sm text-white bg-transparent border-0 rounded w-4 h-4 z-2">
        </button>
    </div>
    @elseif (session()->has('error'))
    <div alert class="relative p-4 pr-12 mb-4 text-white border border-red-300 border-solid rounded-lg bg-gradient-to-tl from-red-600 to-rose-400" role="alert">
        <strong class="font-bold">Oops!</strong>
        {{ session('error') }}
        <button type="button" alert-close class="box-content absolute top-0 right-0 p-4 text-sm text-white bg-transparent border-0 rounded w-4 h-4 z-2">
        </button>
    </div>
    @endif
</div>
<!-- row 1 -->
<div class="flex flex-wrap px-3 -mx-3 mb-7">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
            <div class="flex-auto p-4 flex flex-col justify-center">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-open font-semibold leading-normal text-sm">Total Pendapatan/hari</p>
                            <h5 class="mb-0 font-bold">
                                @currency($totalAmount)
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="flex items-center justify-center h-full">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-[#060764] to-[#00b7dd]">
                                <i class="fa-solid fa-money-check-dollar text-white py-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
            <div class="flex-auto p-4 flex flex-col justify-center">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-open font-semibold leading-normal text-sm">Total Penjualan Item</p>
                            <h5 class="mb-0 font-bold">
                                {{ $totalSell }}
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="flex items-center justify-center h-full">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-[#060764] to-[#00b7dd]">
                                <i class="fa-solid fa-plug text-white py-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-5 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                        <h6 class="mb-0">Penjualan Item Harian</h6>
                    </div>
                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                        <div class="flex justify-end">
                            <div class="mr-5">
                                <form id="dateFilter" action="/penjualan-item/filter" class="py-0.5" method="GET">
                                    @php
                                    $today = \Carbon\Carbon::now()->format('Y-m-d');
                                    $selectedDate = request('date');
                                    $dateValue = $selectedDate ?: $today;
                                    @endphp
                                    <input id="date1" type="date" name="date" value="{{ $dateValue }}" placeholder="{{ date('Y-m-d') }}" class="px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                                </form>
                            </div>
                            <div class="">
                                <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-red-500 to-yellow-400 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25" href="/penjualan-item/create"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Tambah
                                    Penjualan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($sells->count() > 0)
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nama Item</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Kategori</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Stok Awal</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Penerimaan</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Penjualan</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Penyusutan</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Stok Akhir</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Pendapatan</th>
                                <th class="px-6 py-3 font-bold text-start uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="ml-2 mb-0 leading-normal text-sm">
                                                {{ $sells[0]->item->nama_item }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">
                                        {{ $sells[0]->item->itemKategoris->kategori }}
                                    </p>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->stock_awal }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penerimaan }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penjualan }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->penyusutan }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sells[0]->stock_akhir }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">@currency($sells[0]->pendapatan)</span>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg hover:bg-orange-400 hover:text-white" aria-label="Edit">
                                            <a href="/penjualan-item/{{ $sells[0]->id }}/edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg></a>
                                        </button>
                                        <form action="/penjualan-item/{{ $sells[0]->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-pink-600 rounded-lg hover:bg-pink-500 hover:text-white" aria-label="Delete" onclick="return confirm('Are you sure?')">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @foreach ($sells->skip(1) as $sell)
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="ml-2 mb-0 leading-normal text-sm">
                                                {{ $sell->item->nama_item }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">
                                        {{ $sell->item->itemKategoris->kategori }}
                                    </p>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->stock_awal }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penerimaan }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penjualan }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->penyusutan }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">{{ $sell->stock_akhir }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">@currency($sell->pendapatan)</span>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-orange-500 rounded-lg hover:bg-orange-400 hover:text-white" aria-label="Edit">
                                            <a href="/penjualan-item/{{ $sell->id }}/edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg></a>
                                        </button>
                                        <form action="/penjualan-item/{{ $sell->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-pink-600 rounded-lg hover:bg-pink-500 hover:text-white" aria-label="Delete" onclick="return confirm('Are you sure?')">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
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
        @else
        <div>
            <hr class="border-b-[1px] border-solid">
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




<script>
    const date = document.getElementById('date1');
    const formFilter = document.getElementById('dateFilter');


    date.addEventListener('change', () => {
        formFilter.submit();
    })
</script>
@endsection