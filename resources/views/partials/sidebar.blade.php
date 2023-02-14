    <!-- sidenav  -->
    <aside
        class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
        <div class="h-19.5">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
                sidenav-close></i>
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Penjualan BBM Harian</span>
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pengeluaran Harian</span>
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
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/categories*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                        href="/#">
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan Finansial</span>
                    </a>
                </li>

                <!-- TOKO LISTRIK -->
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Keuangan Toko Listrik</h6>
                </li>
                
                <li class="mt-3 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('kategori-item*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors"
                        href="/kategori-item">
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Item</span>
                    </a>
                </li>
                <li class="mt-3 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('penjualan-item*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors"
                        href="/penjualan-item">
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Penjualan Item Harian</span>
                    </a>
                </li>
                <li class="mt-3 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('pengeluaran-ops-listrik*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors"
                        href="/pengeluaran-ops-listrik">
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pengeluaran Harian</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/categories*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                        href="/#">
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan Finansial</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- end sidenav -->
