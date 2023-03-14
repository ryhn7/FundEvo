    <!-- sidenav  -->
    <aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
        <div class="h-19.5">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700">
                {{-- <img src="{{ asset('assets/img/times.svg') }}"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" /> --}}
                <span class="ml-1 self-center text-lg whitespace-nowrap">PT Bhakti Usaha Jaya</span>
            </a>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent mb-5" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('/') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors"
                        href="/">
                        <div {{-- class="{{ request()->is('dashboard') ? 'bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80 ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5"> --}}
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0,0,256,256" width="12px" height="12px" fill-rule="nonzero">
                                <g fill="#FFFFFF" fill-rule="nonzero"
                                    stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
                                    stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                    font-weight="none" font-size="none" text-anchor="none"
                                    style="mix-blend-mode: normal">
                                    <g transform="scale(10.66667,10.66667)">
                                        <path
                                            d="M9,2h-5c-1.103,0 -2,0.897 -2,2v7c0,1.103 0.897,2 2,2h5c1.103,0 2,-0.897 2,-2v-7c0,-1.103 -0.897,-2 -2,-2zM20,2h-5c-1.103,0 -2,0.897 -2,2v3c0,1.103 0.897,2 2,2h5c1.103,0 2,-0.897 2,-2v-3c0,-1.103 -0.897,-2 -2,-2zM9,15h-5c-1.103,0 -2,0.897 -2,2v3c0,1.103 0.897,2 2,2h5c1.103,0 2,-0.897 2,-2v-3c0,-1.103 -0.897,-2 -2,-2zM20,11h-5c-1.103,0 -2,0.897 -2,2v7c0,1.103 0.897,2 2,2h5c1.103,0 2,-0.897 2,-2v-7c0,-1.103 -0.897,-2 -2,-2z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Keuangan SPBU</h6>
                </li>

                <li class="mt-3 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('penjualan-bbm*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors"
                        href="/penjualan-bbm">
                        <div
                            {{-- class="{{ request()->is('dashboard/posts*') ? 'bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80 ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5"> --}}
                            class=" shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0,0,256,256" width="12px" height="12px" fill-rule="nonzero">
                                <g fill="#FFFFFF"
                                    fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                    stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                    text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(4,4)">
                                        <path
                                            d="M16,4v42h32v-34h-7c-0.55228,0 -1,-0.44772 -1,-1v-7zM42,5.41406v4.58594h4.58594zM19,6h10c0.55228,0 1,0.44772 1,1v8c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-8c0,-0.55228 0.44772,-1 1,-1zM20,8v6h8v-6zM32,8h2v2h-2zM36,8h2v2h-2zM32,12h2v2h-2zM36,12h4v2h-4zM4,14v36h56v-36h-10v2h7c0.55228,0 1,0.44772 1,1v30c0,0.55228 -0.44772,1 -1,1h-50c-0.55228,0 -1,-0.44772 -1,-1v-30c0,-0.55228 0.44772,-1 1,-1h7v-2zM8,18v28h6v-28zM19,18h10c0.55228,0 1,0.44772 1,1v12c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-12c0,-0.55228 0.44772,-1 1,-1zM50,18v28h6v-28zM20,20v10h8v-10zM32,20h2v2h-2zM36,20h10v2h-10zM32,24h2v2h-2zM36,24h10v2h-10zM32,28h2v2h-2zM36,28h10v2h-10zM35,34h10c0.55228,0 1,0.44772 1,1v8c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-8c0,-0.55228 0.44772,-1 1,-1zM18,36h2v2h-2zM22,36h10v2h-10zM36,36v6h8v-6zM18,40h2v2h-2zM22,40h10v2h-10zM31,52v4h2v-4zM23.41406,58l-2,2h21.17188l-2,-2z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Penjualan BBM
                            Harian</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('pengeluaran-ops-bbm*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors"
                        href="/pengeluaran-ops-bbm">
                        <div
                            {{-- class="{{ request()->is('dashboard/categories*') ? 'bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80 ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5"> --}}
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0,0,256,256" width="12px" height="12px" fill-rule="nonzero">
                                <g fill="#FFFFFF"
                                    fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                    stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                    text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(4,4)">
                                        <path
                                            d="M16,4v42h32v-34h-7c-0.55228,0 -1,-0.44772 -1,-1v-7zM42,5.41406v4.58594h4.58594zM19,6h10c0.55228,0 1,0.44772 1,1v8c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-8c0,-0.55228 0.44772,-1 1,-1zM20,8v6h8v-6zM32,8h2v2h-2zM36,8h2v2h-2zM32,12h2v2h-2zM36,12h4v2h-4zM4,14v36h56v-36h-10v2h7c0.55228,0 1,0.44772 1,1v30c0,0.55228 -0.44772,1 -1,1h-50c-0.55228,0 -1,-0.44772 -1,-1v-30c0,-0.55228 0.44772,-1 1,-1h7v-2zM8,18v28h6v-28zM19,18h10c0.55228,0 1,0.44772 1,1v12c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-12c0,-0.55228 0.44772,-1 1,-1zM50,18v28h6v-28zM20,20v10h8v-10zM32,20h2v2h-2zM36,20h10v2h-10zM32,24h2v2h-2zM36,24h10v2h-10zM32,28h2v2h-2zM36,28h10v2h-10zM35,34h10c0.55228,0 1,0.44772 1,1v8c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-8c0,-0.55228 0.44772,-1 1,-1zM18,36h2v2h-2zM22,36h10v2h-10zM36,36v6h8v-6zM18,40h2v2h-2zM22,40h10v2h-10zM31,52v4h2v-4zM23.41406,58l-2,2h21.17188l-2,-2z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pengeluaran
                            Harian</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('kategori-bbm*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors"
                        href="/kategori-bbm">
                        <div
                            {{-- class="{{ request()->is('dashboard/categories*') ? 'bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80 ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5"> --}}
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0,0,256,256" width="12px" height="12px" fill-rule="nonzero">
                                <g fill="#FFFFFF"
                                    fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                    stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                    text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(4,4)">
                                        <path
                                            d="M16,4v42h32v-34h-7c-0.55228,0 -1,-0.44772 -1,-1v-7zM42,5.41406v4.58594h4.58594zM19,6h10c0.55228,0 1,0.44772 1,1v8c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-8c0,-0.55228 0.44772,-1 1,-1zM20,8v6h8v-6zM32,8h2v2h-2zM36,8h2v2h-2zM32,12h2v2h-2zM36,12h4v2h-4zM4,14v36h56v-36h-10v2h7c0.55228,0 1,0.44772 1,1v30c0,0.55228 -0.44772,1 -1,1h-50c-0.55228,0 -1,-0.44772 -1,-1v-30c0,-0.55228 0.44772,-1 1,-1h7v-2zM8,18v28h6v-28zM19,18h10c0.55228,0 1,0.44772 1,1v12c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-12c0,-0.55228 0.44772,-1 1,-1zM50,18v28h6v-28zM20,20v10h8v-10zM32,20h2v2h-2zM36,20h10v2h-10zM32,24h2v2h-2zM36,24h10v2h-10zM32,28h2v2h-2zM36,28h10v2h-10zM35,34h10c0.55228,0 1,0.44772 1,1v8c0,0.55228 -0.44772,1 -1,1h-10c-0.55228,0 -1,-0.44772 -1,-1v-8c0,-0.55228 0.44772,-1 1,-1zM18,36h2v2h-2zM22,36h10v2h-10zM36,36v6h8v-6zM18,40h2v2h-2zM22,40h10v2h-10zM31,52v4h2v-4zM23.41406,58l-2,2h21.17188l-2,-2z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kategori BBM</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                        href="/LaporanFinansialSPBU/PenjualanBBM">
                        <div
                            {{-- class="{{ request()->is('dashboard/categories*') ? 'bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80 ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5"> --}}
                            class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0,0,256,256" width="12px" height="12px" fill-rule="nonzero">
                                <g fill="#FFFFFF"
                                    fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                    stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                    stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                    text-anchor="none" style="mix-blend-mode: normal">
                                    <g transform="scale(4,4)">
                                        <path
                                            d="m414.954 1.673-97.046 161.748h30.118V470.17h-40.157V256H174.013v214.17h-40.157V349.699H0v160.627h481.882V163.421H512L414.954 1.673zM93.699 470.17H40.157v-80.314h53.542v80.314zm174.013 0H214.17V296.157h53.542V470.17zm174.014 0h-53.542V124.347l26.771-44.62 26.771 44.62V470.17z"
                                            fill="#000000" data-original="#000000" class=""></path>
                                    </g>
                                </svg>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan
                            Finansial</span>
                    </a>
                </li>

                <!-- TOKO LISTRIK -->
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Keuangan Toko Listrik
                    </h6>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('kategori') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" href="/kategori">
                        <div class="{{ request()->is('kategori') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if (request()->is('kategori'))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512.011 512.011" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="m9.881 188.672 234.667 149.333a21.396 21.396 0 0 0 11.456 3.328c3.989 0 7.957-1.109 11.456-3.328l234.667-149.333a21.374 21.374 0 0 0 9.877-18.005 21.31 21.31 0 0 0-9.877-17.984L267.459 3.328a21.383 21.383 0 0 0-22.912 0L9.881 152.683a21.31 21.31 0 0 0-9.877 17.984 21.371 21.371 0 0 0 9.877 18.005z" fill="#ffffff" data-original="#000000" class=""></path>
                                    <path d="m502.13 323.339-66.069-42.048-145.685 92.715c-10.347 6.549-22.208 10.005-34.368 10.005s-24.021-3.456-34.304-9.984l-145.75-92.736-66.069 42.048a21.374 21.374 0 0 0-9.877 18.005 21.31 21.31 0 0 0 9.877 17.984l234.667 149.355a21.344 21.344 0 0 0 11.456 3.328c3.968 0 7.957-1.109 11.456-3.328L502.13 359.328a21.31 21.31 0 0 0 9.877-17.984 21.371 21.371 0 0 0-9.877-18.005z" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="m502.12 323.335-105.815-67.333 105.815-67.337c13.173-8.383 13.173-27.613 0-35.996L267.453 3.335a21.334 21.334 0 0 0-22.907 0L9.88 152.669c-13.173 8.383-13.173 27.613 0 35.996l105.815 67.337L9.88 323.335c-13.174 8.383-13.174 27.613 0 35.997l234.667 149.333a21.334 21.334 0 0 0 22.907 0L502.12 359.331c13.174-8.383 13.173-27.613 0-35.996zM256 46.62l194.931 124.047-105.741 67.289c-.026.016-.053.03-.078.046L256 294.713l-89.112-56.711c-.026-.016-.053-.03-.078-.046L61.069 170.667 256 46.62zm0 418.76L61.07 341.334l94.361-60.045 88.971 56.618.144.091c.323.205.654.391.985.578.117.066.229.14.347.204.873.471 1.771.873 2.687 1.214.031.011.061.026.091.037.257.094.519.171.779.255.221.072.441.152.664.216.755.217 1.521.379 2.291.512 2.39.41 4.831.41 7.221 0 .77-.132 1.536-.294 2.291-.512.223-.064.442-.145.664-.216.26-.084.521-.16.779-.255.031-.011.061-.026.091-.037a21.306 21.306 0 0 0 2.687-1.214c.118-.063.23-.138.347-.204.331-.186.662-.372.985-.578l.145-.092 88.97-56.617 94.361 60.045L256 465.38z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kategori</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('kategori-item*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" href="/kategori-item">
                        <div class="{{ request()->is('kategori-item*') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if (request()->is('kategori-item*'))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 436 436.008" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(1,0,0,1,95,0)">
                                    <path d="M259.984 122.832h-84.336l45-109.016A9.998 9.998 0 0 0 211.41 0H31.88a10 10 0 0 0-9.957 9.07L.047 243.566c-.262 2.801.668 5.586 2.562 7.668a10.013 10.013 0 0 0 7.395 3.266h70.863L70.88 425.422a10 10 0 0 0 18.516 5.8L268.52 138.048a10.014 10.014 0 0 0 .187-10.11 10.004 10.004 0 0 0-8.723-5.105zm0 0" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 436 436.007" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(1,0,0,1,90,0)">
                                    <path d="M259.984 122.832h-84.336l45-109.016A9.998 9.998 0 0 0 211.41 0H31.88a10 10 0 0 0-9.957 9.07L.047 243.57a9.987 9.987 0 0 0 2.566 7.664 9.99 9.99 0 0 0 7.39 3.266h70.864L70.88 425.422a9.997 9.997 0 0 0 6.992 10.129 10.003 10.003 0 0 0 11.524-4.328l179.12-293.176a9.998 9.998 0 0 0-8.53-15.215zM93.18 386.66l8.273-141.582c.16-2.746-.82-5.441-2.707-7.445-1.89-2-4.523-3.137-7.273-3.137H20.98L40.992 20h155.469l-45 109.016c-1.27 3.086-.922 6.601.934 9.375s4.976 4.441 8.312 4.437h81.453zm0 0" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Item</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('penjualan-item*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" href="/penjualan-item">
                        <div class="{{ request()->is('penjualan-item*') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if (request()->is('penjualan-item*'))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 400 400" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M270 310h90V0H40v400h230v-90zM100 80h200v30H100V80zm0 60h200v30H100v-30zm0 60h200v30H100v-30z" fill="#ffffff" data-original="#000000" class=""></path>
                                    <path d="M300 340v59.999L360 340z" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M51.2 0v512h332.799l76.801-76.8V0H51.2zM384 457.693V435.2h22.493L384 457.693zm38.4-60.893h-76.8v76.8h-256V38.4h332.8v358.4z" fill="#000000" data-original="#000000" class=""></path>
                                    <path d="M128 102.4h256v38.4H128zM128 179.2h256v38.4H128zM128 256h256v38.4H128z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Penjualan Item
                            Harian</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('pengeluaran-ops-listrik*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" href="/pengeluaran-ops-listrik">
                        <div class="{{ request()->is('pengeluaran-ops-listrik*') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if (request()->is('pengeluaran-ops-listrik*'))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 472.615 472.615" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M172.471 159.55v222.654c15.957 3.231 28.635 14.144 32.765 28.086h62.149c4.13-13.942 16.807-24.856 32.764-28.086V159.55H172.471z" fill="#ffffff" data-original="#000000" class=""></path>
                                    <path d="M319.841 159.55v241.366h-9.846c-13.423 0-24.346 8.624-24.346 19.221v9.846h-98.678v-9.846c0-10.596-10.923-19.221-24.347-19.221h-9.846V159.55h-51.856v313.065h270.769V159.55h-51.85z" fill="#ffffff" data-original="#000000" class=""></path>
                                    <path d="M0 0v235.231h81.231V159.55H53.909v-19.692h364.798v19.692h-27.322v75.681h81.23V0z" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 492.308 492.308" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M0 0v254.923h100.923v237.385h290.462V254.923h100.923V0H0zm371.692 472.615H120.615V169.394h42.01V410.76h9.846c13.423 0 24.346 8.625 24.346 19.221v9.846h98.678v-9.846c0-10.596 10.923-19.221 24.346-19.221h9.846V169.394h42.005v303.221zm-189.375-80.567V169.394h127.678v222.654c-15.957 3.231-28.635 14.144-32.764 28.087h-62.149c-4.13-13.943-16.808-24.856-32.765-28.087zm290.298-156.817h-81.231v-65.836h37.168v-19.692H63.755v19.692h37.168v65.836H19.692V19.692h452.923v215.539z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pengeluaran
                            Harian</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                        href="/LaporanFinansialTokoListrik/PenjualanTokoListrik">
                        <div
                            class="{{ request()->is('') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if (request()->is(''))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 382.499 382.499" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M0 261.25h100v60H0zM130 191.25h100v130H130zM360 122.087h22.499L310 1.25l-72.5 120.837H260V321.25h100zM0 351.25h360v30H0z" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="m414.954 1.673-97.046 161.748h30.118V470.17h-40.157V256H174.013v214.17h-40.157V349.699H0v160.627h481.882V163.421H512L414.954 1.673zM93.699 470.17H40.157v-80.314h53.542v80.314zm174.013 0H214.17V296.157h53.542V470.17zm174.014 0h-53.542V124.347l26.771-44.62 26.771 44.62V470.17z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan
                            Finansial</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- end sidenav -->