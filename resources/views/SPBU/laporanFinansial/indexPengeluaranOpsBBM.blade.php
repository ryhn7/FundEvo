@extends('SPBU.laporanFinansial.index')

@section('filter')
    <ul class=" dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
        aria-labelledby="dropdownMenuButton1">
        <li class="dropdown">
            <div
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                Bulan</div>
            <ul class="dropdown-content absolute hidden text-gray-700 -pl-5 -ml-[177px] -mt-10">
                <form id="monthFilter" action="/LaporanFinansialBBM/PengeluaranSPBU/FilterBulan" class="py-0.5" method="GET">
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
                <form id="yearFilter" action="/LaporanFinansialBBM/PengeluaranSPBU/FilterTahun" class="py-0.5" method="GET">
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
        @if (request()->is('LaporanFinansialBBM/PengeluaranSPBU'))
            <div class="w-full px-3 mb-2 md:mb-1">
                <div class="flex justify-between">
                    <div class="px-4 py-5">Filter by time range</div>
                    <div>
                        <form id="rangeFilter" action="/LaporanFinansialBBM/PengeluaranSPBU/FilterRange" class="py-0.5"
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
        @if ($spends->count() > 0)
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
                                    @sortablelink('harga_penebusan', 'Harga Penebusan')
                                </th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('pph', 'PPH')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('tips_sopir', 'Tips Sopir')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('oli', 'Oli')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('gas', ' Gas')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Gaji Supervisor</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Gaji Karyawan</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Reward Karyawan</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    PLN</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    PDAM</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Iuran RT</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    PBB</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    @sortablelink('biaya_lain', ' Biaya lain-lain')</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Keterangan</th>
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="ml-2 mb-0 font-semibold leading-tight text-xs text-slate-400">
                                                {{ $spends[0]->created_at->format('m/d/Y') }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->harga_penebusan_bbm)
                                            @currency($spends[0]->harga_penebusan_bbm)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">
                                        @if ($spends[0]->pph)
                                            @currency($spends[0]->pph)
                                        @else
                                            -
                                        @endif
                                    </p>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->tips_sopir)
                                            @currency($spends[0]->tips_sopir)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->oli)
                                            @currency($spends[0]->oli)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->gas)
                                            @currency($spends[0]->gas)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->gaji_supervisor)
                                            @currency($spends[0]->gaji_supervisor)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->gaji_karyawan)
                                            @currency($spends[0]->gaji_karyawan)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->reward_karyawan)
                                            @currency($spends[0]->reward_karyawan)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->pln)
                                            @currency($spends[0]->pln)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->pdam)
                                            @currency($spends[0]->pdam)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->iuran_rt)
                                            @currency($spends[0]->iuran_rt)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->pbb)
                                            @currency($spends[0]->pbb)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->biaya_lain)
                                            @currency($spends[0]->biaya_lain)
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($spends[0]->keterangan)
                                            {!! $spends[0]->keterangan !!}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-green-400">
                                        @if ($spends[0]->nota)
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalLg">Lihat Nota</button>

                                            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel"
                                                aria-modal="true" role="dialog">
                                                <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
                                                    <div
                                                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                        <div
                                                            class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                            <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                                id="exampleModalLgLabel">
                                                                Nota 1
                                                            </h5>
                                                            <button type="button"
                                                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body relative p-4">
                                                            <div id="spendsIndicator" class="carousel slide relative"
                                                                data-bs-ride="carousel">
                                                                <div
                                                                    class="carousel-inner relative w-full overflow-hidden">
                                                                    <div class="carousel-item active float-left w-full">
                                                                        <img src="{{ asset('storage/nota/' . $spends[0]->nota[0]) }}"
                                                                            class="block w-full" alt="Wild Landscape" />
                                                                    </div>
                                                                    {{-- @for ($i = 1; $i < count($spends[0]->nota); $i++)
                                                                @php($nota = $spends[0]->nota[$i])
                                                                <div
                                                                    class="carousel-item float-left w-full">
                                                                    <img src="{{ asset('storage/nota/' . $nota) }}"
                                                                        class="block w-full"
                                                                        alt="Camera" />
                                                                </div>
                                                            @endfor --}}

                                                                    @foreach ($spends[0]->nota as $index => $nota)
                                                                        @if ($index == 0)
                                                                            @continue
                                                                        @endif
                                                                        <div class="carousel-item float-left w-full">
                                                                            <img src="{{ asset('storage/nota/' . $nota) }}"
                                                                                class="block w-full" alt="Camera" />
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                                <button
                                                                    class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                                                                    type="button" data-bs-target="#spendsIndicator"
                                                                    data-bs-slide="prev">
                                                                    <span
                                                                        class="carousel-control-prev-icon inline-block bg-no-repeat"
                                                                        aria-hidden="true"></span>
                                                                    <span class="visually-hidden">Previous</span>
                                                                </button>
                                                                <button
                                                                    class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                                                                    type="button" data-bs-target="#spendsIndicator"
                                                                    data-bs-slide="next">
                                                                    <span
                                                                        class="carousel-control-next-icon inline-block bg-no-repeat"
                                                                        aria-hidden="true"></span>
                                                                    <span class="visually-hidden">Next</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            -
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @foreach ($spends->skip(1) as $spend)
                                <tr>
                                    <td
                                        class="p-2 align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <h6 class="ml-2 mb-0 font-semibold leading-tight text-xs text-slate-400"">
                                                    {{ $spend->created_at->format('m/d/Y') }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->harga_penebusan_bbm)
                                                @currency($spend->harga_penebusan_bbm)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">
                                            @if ($spend->pph)
                                                @currency($spend->pph)
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->tips_sopir)
                                                @currency($spend->tips_sopir)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->oli)
                                                @currency($spend->oli)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->gas)
                                                @currency($spend->gas)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->gaji_supervisor)
                                                @currency($spend->gaji_supervisor)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->gaji_karyawan)
                                                @currency($spend->gaji_karyawan)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->reward_karyawan)
                                                @currency($spend->reward_karyawan)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->pln)
                                                @currency($spend->pln)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->pdam)
                                                @currency($spend->pdam)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->iuran_rt)
                                                @currency($spend->iuran_rt)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->pbb)
                                                @currency($spend->pbb)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->biaya_lain)
                                                @currency($spend->biaya_lain)
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">
                                            @if ($spend->keterangan)
                                                {!! $spend->keterangan !!}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-t whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-green-400">
                                            @if ($spend->nota)
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#spend">Lihat Nota</button>

                                                <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                    id="spend" tabindex="-1" aria-labelledby="exampleModalLgLabel"
                                                    aria-modal="true" role="dialog">
                                                    <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
                                                        <div
                                                            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                            <div
                                                                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                                <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                                    id="exampleModalLgLabel">
                                                                    Nota 2
                                                                </h5>
                                                                <button type="button"
                                                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body relative p-4">
                                                                <div id="spendIndicator" class="carousel slide relative"
                                                                    data-bs-ride="carousel">
                                                                    <div
                                                                        class="carousel-inner relative w-full overflow-hidden">
                                                                        <div
                                                                            class="carousel-item active float-left w-full">
                                                                            <img src="{{ asset('storage/nota/' . $spend->nota[0]) }}"
                                                                                class="block w-full"
                                                                                alt="Wild Landscape" />
                                                                        </div>
                                                                        {{-- @for ($i = 1; $i < count($spends[0]->nota); $i++)
                                                            @php($nota = $spends[0]->nota[$i])
                                                            <div
                                                                class="carousel-item float-left w-full">
                                                                <img src="{{ asset('storage/nota/' . $nota) }}"
                                                                    class="block w-full"
                                                                    alt="Camera" />
                                                            </div>
                                                        @endfor --}}

                                                                        @foreach ($spend->nota as $index => $nota)
                                                                            @if ($index == 0)
                                                                                @continue
                                                                            @endif
                                                                            <div class="carousel-item float-left w-full">
                                                                                <img src="{{ asset('storage/nota/' . $nota) }}"
                                                                                    class="block w-full" alt="Camera" />
                                                                            </div>
                                                                        @endforeach

                                                                    </div>
                                                                    <button
                                                                        class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                                                                        type="button" data-bs-target="#spendIndicator"
                                                                        data-bs-slide="prev">
                                                                        <span
                                                                            class="carousel-control-prev-icon inline-block bg-no-repeat"
                                                                            aria-hidden="true"></span>
                                                                        <span class="visually-hidden">Previous</span>
                                                                    </button>
                                                                    <button
                                                                        class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                                                                        type="button" data-bs-target="#spendIndicator"
                                                                        data-bs-slide="next">
                                                                        <span
                                                                            class="carousel-control-next-icon inline-block bg-no-repeat"
                                                                            aria-hidden="true"></span>
                                                                        <span class="visually-hidden">Next</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                -
                                            @endif
                                        </span>
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
