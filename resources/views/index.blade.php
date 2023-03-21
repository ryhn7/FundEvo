{{-- @dd($rekaps) --}}

@extends('layouts.main')

@section('container')
    <div class="mb-3">
        <ul class="flex border-b-[1.5px]">
            <li class="mb-1.8">
                <a href="/Dashboard/SPBU"
                    class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent
                    @if (request()->is('Dashboard/SPBU*')) text-green-500 border-green-500 @endif
                    ">
                    Dashboard SPBU
                </a>
                <a href="/Dashboard/TokoListrik"
                    class="cursor-pointer py-2 px-4 text-gray-500 border-b-2 border-transparent
                        @if (request()->is('Dashboard/TokoListrik*')) text-green-500 border-green-500 @endif
                        ">
                    Dashboard Toko Listrik
                </a>
            </li>
        </ul>
    </div>

    @yield('dashboard')
    @yield('chartScript')


@endsection

<script>
    window.onload = function() {
        //chart untuk laba

        var ctx = document.getElementById("canvas").getContext("2d");
        var labels = <?php echo $labels; ?>;
        var values = <?php echo $values; ?>;

        var barChartData = {
            labels: labels,
            datasets: [{
                label: 'Laba Bersih SPBU',
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

        // chart untuk penjualan dan penyusutan bbm

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
                    label: "Penjualan BBM",
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
                    label: "Penyusutan BBM",
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
