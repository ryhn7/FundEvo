@extends('layouts.main')

@section('container')
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)" class="px-3 mb-5">
        @if (session()->has('error'))
            <div alert
                class="relative p-4 pr-12 mb-4 text-white border border-red-300 border-solid rounded-lg bg-gradient-to-tl from-red-600 to-rose-400"
                role="alert">
                <strong class="font-bold">Oops!</strong>
                {{ session('error') }}
                <button type="button" alert-close
                    class="box-content absolute top-0 right-0 p-4 text-sm text-white bg-transparent border-0 rounded w-4 h-4 z-2">
                </button>
            </div>
        @endif
    </div>
    <div class="flex flex-col mt-6 -mx-3">
        <div class="w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-lg bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                @if (request()->is('LaporanFinansialSPBU/PenjualanBBM'))
                                    <h3 class="font-bold">Penjualan BBM Bulan {{ $month }} {{ $year }}</h3>
                                @elseif (request()->is('LaporanFinansialSPBU/PenjualanBBM/FilterRange*'))
                                    <h3 class="font-bold">Penjualan BBM Bulan {{ $start }} - {{ $end }}
                                    </h3>
                                @elseif(request()->is('LaporanFinansialSPBU/PenjualanBBM/FilterBulan*'))
                                    <h3 class="font-bold">Penjualan BBM Bulan {{ $month }} {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/PenjualanBBM/FilterTahun*'))
                                    <h3 class="font-bold">Penjualan BBM Tahun {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/PengeluaranSPBU'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Bulan {{ $month }}
                                        {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/PengeluaranSPBU/FilterRange*'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Bulan {{ $start }} -
                                        {{ $end }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/PengeluaranSPBU/FilterBulan*'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Bulan {{ $month }}
                                        {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/PengeluaranSPBU/FilterTahun*'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Tahun {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/PengeluaranSPBU/FilterRange*'))
                                    <h3 class="font-bold">Pengeluaran Operasional SPBU Bulan {{ $start }} -
                                        {{ $end }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/LaporanRabaRugi'))
                                    <h3 class="font-bold">Laporan Raba Rugi SPBU Bulan {{ $month }}
                                        {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/LaporanRabaRugi/FilterBulan*'))
                                    <h3 class="font-bold">Laporan Raba Rugi SPBU Bulan {{ $month }}
                                        {{ $year }}</h3>
                                @elseif(request()->is('LaporanFinansialSPBU/LaporanRabaRugi/FilterTahun*'))
                                    <h3 class="font-bold">Laporan Raba Rugi SPBU Tahun {{ $year }}</h3>
                                @else
                                @endif

                                @if (request()->is('LaporanFinansialSPBU/LaporanRabaRugi*'))
                                    <p class="mb-12"></p>
                                @else
                                    <p class="mb-12">{{ $count }} {{ $info }}</p>
                                @endif
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
                                <a href="/LaporanFinansialSPBU/LaporanRabaRugi"
                                    class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent
                                        @if (request()->is('LaporanFinansialSPBU/LaporanRabaRugi*')) text-green-500 border-green-500 @endif
                                        ">
                                    Laporan Laba Rugi
                                </a>
                                <a href="/LaporanFinansialSPBU/PenjualanBBM"
                                    class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent
                                            @if (request()->is('LaporanFinansialSPBU/PenjualanBBM*')) text-green-500 border-green-500 @endif
                                            ">
                                    Penjualan BBM
                                </a>
                                <a href="/LaporanFinansialSPBU/PengeluaranSPBU"
                                    class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent
                                            @if (request()->is('LaporanFinansialSPBU/PengeluaranSPBU*')) text-green-500 border-green-500 @endif
                                            ">
                                    Pengeluaran Operasional SPBU
                                </a>
                            </li>
                        </ul>
                    </div>
                    @yield('laporan')
                </div>
            </div>
        </div>
    </div>
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
    @yield('slick')
@endsection
