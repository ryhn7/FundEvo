@extends('index')

@section('dashboard')
{{-- @dd($rekaps) --}}
<!-- row 1 -->
<div class="flex flex-wrap -mx-3">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-open font-semibold leading-normal text-sm">Total Penjualan Item</p>
                            <h5 class="mb-0 font-bold">
                                @currency($totalPendapatan)
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="flex items-center justify-center h-full">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-[#060764] to-[#00b7dd]">
                                <i class="fa-solid fa-arrow-trend-up text-white py-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-open font-semibold leading-normal text-sm">Total Pengeluaran</p>
                            <h5 class="mb-0 font-bold">
                                @currency($totalPengeluaran)
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="flex items-center justify-center h-full">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-[#060764] to-[#00b7dd]">
                                <i class="fa-solid fa-arrow-trend-down text-white py-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-open font-semibold leading-normal text-sm">Total Laba Kotor</p>
                            <h5 class="mb-0 font-bold">
                                @currency($totalLabaKotor)
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="flex items-center justify-center h-full">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-[#060764] to-[#00b7dd]">
                                <i class="fa-solid fa-money-check text-white py-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card4 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-open font-semibold leading-normal text-sm">Total Laba Bersih</p>
                            <h5 class="mb-0 font-bold">
                                @currency($totalLabaBersih)
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
</div>



<!-- cards row 3 -->
<div class="flex flex-wrap mt-6 -mx-3">
    <!-- Grafik 1 -->
    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-5/12 lg:flex-none">
        <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border h-full">
            <div class="flex-auto p-4">
                <h6>Gambaran Umum Laba Bersih</h6>
                <div class="py-4 pr-1 mb-4 bg-gradient-to-tl from-red-500 to-yellow-400 rounded-xl" style="width: 100%; height: 85%;">
                    <div>
                        <canvas id="canvas" class="chart-canvas" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grafik 2 -->
    <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
        <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border h-full">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                <h6>Gambaran Umum Penjualan</h6>
            </div>
            <div class="flex-auto p-4">
                <div>
                    <canvas id="chart-line" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Tabel  -->
<div class="flex flex-wrap -mx-3 mt-4">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-5 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                        <h6 class="mb-0">Rekapitulasi Omset Penjualan Toko Listrik</h6>
                    </div>
                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                        <div class="flex justify-end">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Bulan</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Penjualan Barang</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    HPP</th>
                                <!-- <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Piutang</th> -->
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Keuntungan</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Persentase</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Pengeluaran</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Laba Kotor</th>
                                <th class="px-6 py-3 font-bold text-start uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Penyusutan</th>
                                <!-- <th class="px-6 py-3 font-bold text-start uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Pendapatan Lain</th> -->
                                <th class="px-6 py-3 font-bold text-start uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Laba Bersih</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($rekaps as $rekap)
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="ml-2 mb-0 leading-normal text-sm">
                                                {{ $rekap['month'] }}
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">
                                        @if ($rekap['total_pendapatan'] == null)
                                        -
                                        @else
                                        @currency($rekap['total_pendapatan'])
                                        @endif
                                    </p>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs">
                                        @if ($rekap['total_hpp_bulan'] == null)
                                        -
                                        @else
                                        @currency($rekap['total_hpp_bulan'])
                                        @endif
                                    </p>
                                </td>
                                <!-- <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        -
                                    </span>
                                </td> -->
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($rekap['total_laba_kotorSatu_bulan'] == null)
                                        -
                                        @else
                                        @currency($rekap['total_laba_kotorSatu_bulan'])
                                        @endif
                                    </span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($rekap['persentase_bulan'] == null)
                                        -
                                        @else
                                        {{ $rekap['persentase_bulan'] }}%
                                        @endif
                                    </span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($rekap['total_pengeluaran_bulan'] == null)
                                        -
                                        @else
                                        @currency($rekap['total_pengeluaran_bulan'])
                                        @endif
                                    </span>
                                </td>

                                {{-- TODO: cek lagi mengenai laba kotor 2 --}}

                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($rekap['total_laba_kotorDua_bulan'] == null)
                                        -
                                        @else
                                        @currency($rekap['total_laba_kotorDua_bulan'])
                                        @endif
                                    </span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($rekap['total_loss_bulan'] == null)
                                        -
                                        @else
                                        @currency($rekap['total_loss_bulan'])
                                        @endif
                                    </span>
                                </td>
                                <!-- <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">-</span>
                                </td> -->
                                <td class="p-2 text-center align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                    <span class="font-semibold leading-tight text-xs text-slate-400">
                                        @if ($rekap['laba_bersih_per_bulan'] == null)
                                        -
                                        @else
                                        @currency($rekap['laba_bersih_per_bulan'])
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('chartScript')
<script>
    window.onload = function() {
        //chart untuk laba

        var ctx = document.getElementById("canvas").getContext("2d");
        var labels = <?php echo $labels; ?>;
        var values = <?php echo $values; ?>;

        var barChartData = {
            labels: labels,
            datasets: [{
                label: 'Laba Bersih Toko Listrik',
                data: values,
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#fff",
                maxBarThickness: 6,
                label: "Laba Bersih",
            }]
        };


        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                interaction: {
                    intersect: false,
                    mode: "index",
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 600,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: "normal",
                                lineHeight: 2,
                            },
                            color: "#fff",
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            display: false,
                        },
                    },
                },
            }
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
        gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
        gradientStroke1.addColorStop(0, "rgba(203,12,159,0)"); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
        gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
        gradientStroke2.addColorStop(0, "rgba(20,23,39,0)"); //purple colors

        var labelLines = <?php echo $labelLines; ?>;
        var valueSatu = <?php echo $valueSatu; ?>;
        var valueDua = <?php echo $valueDua; ?>;

        var lineChartData = {
            labels: labelLines,
            datasets: [{
                    label: "Penjualan Barang",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: valueSatu,
                    maxBarThickness: 6,
                },
                {
                    label: "Penyusutan Barang",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#3A416F",
                    borderWidth: 3,
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: valueDua,
                    maxBarThickness: 6,
                },
            ],
        };

        window.myBar = new Chart(ctx2, {
            type: 'line',
            data: lineChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                interaction: {
                    intersect: false,
                    mode: "index",
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: "#b2b9bf",
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: "normal",
                                lineHeight: 2,
                            },
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            color: "#b2b9bf",
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: "normal",
                                lineHeight: 2,
                            },
                        },
                    },
                },
            },
        });
    };
</script>
@endsection