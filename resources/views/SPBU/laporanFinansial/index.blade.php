@extends('layouts.main')

@section('container')
    <div class="flex flex-col mt-6 -mx-3">
        <div class="w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-lg bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                @if (request()->is('LaporanFinansialBBM/PenjualanBBM'))
                                    <h3 class="font-bold">Total Penjualan BBM</h3>
                                @elseif (request()->is('LaporanFinansialBBM/PenjualanBBM/FilterRange*'))
                                    <h3 class="font-bold">Penjualan BBM Bulan {{ $start }} - {{ $end }} </h3>
                                @elseif(request()->is('LaporanFinansialBBM/PenjualanBBM/FilterBulan*'))
                                    <h3 class="font-bold">Penjualan BBM Bulan {{ $month }}</h3>
                                @elseif(request()->is('LaporanFinansialBBM/PenjualanBBM/FilterTahun*'))
                                    <h3 class="font-bold">Penjualan BBM Tahun {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialBBM/PengeluaranSPBU'))
                                    <h3 class="font-bold">Total Pengeluaran Operasional SPBU</h3>
                                @elseif(request()->is('LaporanFinansialBBM/PengeluaranSPBU/FilterRange*'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Bulan {{ $start }} -
                                        {{ $end }}</h3>
                                @elseif(request()->is('LaporanFinansialBBM/PengeluaranSPBU/FilterBulan*'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Bulan {{ $month }}</h3>
                                @elseif(request()->is('LaporanFinansialBBM/PengeluaranSPBU/FilterTahun*'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Tahun {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialBBM/PengeluaranSPBU/FilterRange*'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Bulan {{ $start }} -
                                        {{ $end }}</h3>
                                @else
                                @endif
                                <p class="mb-12">{{ $count }} Penjualan</p>
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
                                        @yield('filter')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <ul class="flex border-b-[1.5px]">
                            <li class="mb-1.8">
                                <a href="/LaporanFinansialBBM/PenjualanBBM"
                                    class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent
                                            @if (request()->is('LaporanFinansialBBM/PenjualanBBM*')) text-green-500 border-green-500 @endif
                                            ">
                                    Penjualan BBM
                                </a>
                                <a href="/LaporanFinansialBBM/PengeluaranSPBU"
                                    class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent
                                            @if (request()->is('LaporanFinansialBBM/PengeluaranSPBU*')) text-green-500 border-green-500 @endif
                                            ">
                                    Pengeluaran Operasional SPBU
                                </a>
                                <a href="/LaporanFinansialBBM"
                                    class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent
                                            @if (request()->is('LaporanFinansialBBM')) text-green-500 border-green-500 @endif
                                            ">
                                    Laporan Keuangan SPBU
                                </a>
                            </li>
                        </ul>
                    </div>
                    @yield('laporan')
                </div>
            </div>
        </div>
    </div>
    @yield('chartScript')
@endsection

@section('scripts')
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
