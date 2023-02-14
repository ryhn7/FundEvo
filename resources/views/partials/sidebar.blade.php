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
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('/') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" href="/">
                        <div class="{{ request()->is('/') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is('/'))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="m498.195 222.695-.035-.035L289.305 13.813C280.402 4.905 268.566 0 255.977 0c-12.59 0-24.426 4.902-33.332 13.809L13.898 222.55c-.07.07-.14.144-.21.215-18.282 18.386-18.25 48.218.09 66.558 8.378 8.383 19.445 13.238 31.277 13.746.48.047.965.07 1.453.07h8.324v153.7C54.832 487.254 79.578 512 110 512h81.71c8.282 0 15-6.715 15-15V376.5c0-13.879 11.29-25.168 25.169-25.168h48.195c13.88 0 25.168 11.29 25.168 25.168V497c0 8.285 6.715 15 15 15h81.711c30.422 0 55.168-24.746 55.168-55.16v-153.7h7.719c12.586 0 24.422-4.902 33.332-13.808 18.36-18.371 18.367-48.254.023-66.637zm0 0" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 511 511.999" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M498.7 222.695c-.016-.011-.028-.027-.04-.039L289.805 13.81C280.902 4.902 269.066 0 256.477 0c-12.59 0-24.426 4.902-33.332 13.809L14.398 222.55c-.07.07-.144.144-.21.215-18.282 18.386-18.25 48.218.09 66.558 8.378 8.383 19.44 13.235 31.273 13.746.484.047.969.07 1.457.07h8.32v153.696c0 30.418 24.75 55.164 55.168 55.164h81.711c8.285 0 15-6.719 15-15V376.5c0-13.879 11.293-25.168 25.172-25.168h48.195c13.88 0 25.168 11.29 25.168 25.168V497c0 8.281 6.715 15 15 15h81.711c30.422 0 55.168-24.746 55.168-55.164V303.14h7.719c12.586 0 24.422-4.903 33.332-13.813 18.36-18.367 18.367-48.254.027-66.633zm-21.243 45.422a17.03 17.03 0 0 1-12.117 5.024H442.62c-8.285 0-15 6.714-15 15v168.695c0 13.875-11.289 25.164-25.168 25.164h-66.71V376.5c0-30.418-24.747-55.168-55.169-55.168H232.38c-30.422 0-55.172 24.75-55.172 55.168V482h-66.71c-13.876 0-25.169-11.29-25.169-25.164V288.14c0-8.286-6.715-15-15-15H48a13.9 13.9 0 0 0-.703-.032c-4.469-.078-8.66-1.851-11.8-4.996-6.68-6.68-6.68-17.55 0-24.234.003 0 .003-.004.007-.008l.012-.012L244.363 35.02A17.003 17.003 0 0 1 256.477 30c4.574 0 8.875 1.781 12.113 5.02l208.8 208.796.098.094c6.645 6.692 6.633 17.54-.031 24.207zm0 0" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                    </a>
                </li>

                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Keuangan SPBU</h6>
                </li>

                <li class="mt-3 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('penjualan-bbm*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" href="/penjualan-bbm">
                        <div class="{{ request()->is('penjualan-bbm*') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is('penjualan-bbm*'))
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Penjualan BBM Harian</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('pengeluaran-ops-bbm*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" href="/pengeluaran-ops-bbm">
                        <div class="{{ request()->is('pengeluaran-ops-bbm*') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is('pengeluaran-ops-bbm*'))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 448 448" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(1,0,0,1,0,20)">
                                    <path d="M10.668 298.668c-3.645-.035-7.25-.7-10.668-1.965v33.965c0 5.89 4.777 10.664 10.668 10.664h426.664c5.89 0 10.668-4.773 10.668-10.664v-33.965a31.583 31.583 0 0 1-10.668 1.965zM448 232.703a31.583 31.583 0 0 1-10.668 1.965H10.668c-3.645-.035-7.25-.7-10.668-1.965v33.965c0 5.89 4.777 10.664 10.668 10.664h426.664c5.89 0 10.668-4.773 10.668-10.664zM224 32c-41.238 0-74.668 33.43-74.668 74.668 0 41.234 33.43 74.664 74.668 74.664s74.668-33.43 74.668-74.664C298.621 65.449 265.218 32.047 224 32zm42.668 53.332h-21.336V74.668h-42.664V96h42.664c11.785 0 21.336 9.55 21.336 21.332v21.336c0 11.781-9.55 21.332-21.336 21.332h-10.664v10.668h-21.336V160h-10.664c-11.785 0-21.336-9.55-21.336-21.332V128h21.336v10.668h42.664v-21.336h-42.664c-11.785 0-21.336-9.55-21.336-21.332V74.668c0-11.785 9.55-21.336 21.336-21.336h10.664V42.668h21.336v10.664h10.664c11.785 0 21.336 9.55 21.336 21.336zm0 0" fill="#ffffff" data-original="#000000" class=""></path>
                                    <path d="M448 10.668C448 4.778 443.223 0 437.332 0H10.668C4.778 0 0 4.777 0 10.668v192c0 5.89 4.777 10.664 10.668 10.664h426.664c5.89 0 10.668-4.773 10.668-10.664zm-309.332 192H79.07A10.67 10.67 0 0 1 69.184 196 75.086 75.086 0 0 0 28 154.816a10.67 10.67 0 0 1-6.668-9.886V68.406c0-4.347 2.64-8.258 6.668-9.89a75.074 75.074 0 0 0 41.184-41.184 10.667 10.667 0 0 1 9.886-6.664h59.598V32H85.953a96.697 96.697 0 0 1-43.285 43.285v62.762a96.697 96.697 0 0 1 43.285 43.285h52.715zm85.332 0c-53.02 0-96-42.98-96-96s42.98-96 96-96 96 42.98 96 96c-.066 52.992-43.008 95.934-96 96zm202.668-57.738a10.67 10.67 0 0 1-6.668 9.886A75.086 75.086 0 0 0 378.816 196a10.67 10.67 0 0 1-9.886 6.668h-59.598v-21.336h52.715a96.697 96.697 0 0 1 43.285-43.285V75.285A96.697 96.697 0 0 1 362.047 32h-52.715V10.668h59.598c4.343 0 8.258 2.637 9.886 6.664A75.074 75.074 0 0 0 420 58.516a10.676 10.676 0 0 1 6.668 9.89zM10.668 405.332h426.664c5.89 0 10.668-4.773 10.668-10.664v-33.965a31.583 31.583 0 0 1-10.668 1.965H10.668c-3.645-.035-7.25-.7-10.668-1.965v33.965c0 5.89 4.777 10.664 10.668 10.664zm0 0" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(1,0,0,1,0,0)">
                                    <path d="M458.667 21.333H32c-17.673 0-32 14.327-32 32v384c0 17.673 14.327 32 32 32h426.667c17.673 0 32-14.327 32-32v-384c0-17.673-14.327-32-32-32zm10.666 416c0 5.891-4.776 10.667-10.667 10.667H32c-5.891 0-10.667-4.776-10.667-10.667V403.37A31.663 31.663 0 0 0 32 405.333h426.667a31.614 31.614 0 0 0 10.667-1.963v33.963zm0-64c0 5.891-4.776 10.667-10.667 10.667H32c-5.891 0-10.667-4.776-10.667-10.667V339.37A31.663 31.663 0 0 0 32 341.333h426.667a31.614 31.614 0 0 0 10.667-1.963v33.963zm0-64c0 5.891-4.776 10.667-10.667 10.667H32c-5.891 0-10.667-4.776-10.667-10.667V275.37A31.663 31.663 0 0 0 32 277.333h426.667a31.614 31.614 0 0 0 10.667-1.963v33.963zm0-64c0 5.891-4.776 10.667-10.667 10.667H32c-5.891 0-10.667-4.776-10.667-10.667v-192c0-5.891 4.776-10.667 10.667-10.667h426.667c5.891 0 10.667 4.776 10.667 10.667v192z" fill="#000000" data-original="#000000" class=""></path>
                                    <path d="M245.333 53.333c-53.019 0-96 42.981-96 96s42.981 96 96 96 96-42.981 96-96c-.064-52.992-43.007-95.935-96-96zm0 170.667c-41.237 0-74.667-33.429-74.667-74.667s33.429-74.667 74.667-74.667S320 108.096 320 149.333c-.047 41.218-33.449 74.62-74.667 74.667z" fill="#000000" data-original="#000000" class=""></path>
                                    <path d="M441.333 101.184A75.085 75.085 0 0 1 400.149 60a10.668 10.668 0 0 0-9.888-6.667h-59.595v21.333h52.715a96.676 96.676 0 0 0 43.285 43.285v62.763a96.676 96.676 0 0 0-43.285 43.285h-52.715v21.333h59.595c4.346 0 8.258-2.637 9.888-6.667a75.082 75.082 0 0 1 41.184-41.184 10.668 10.668 0 0 0 6.667-9.888V111.07c0-4.344-2.637-8.256-6.667-9.886zM107.285 74.667H160V53.333h-59.595A10.666 10.666 0 0 0 90.517 60a75.082 75.082 0 0 1-41.184 41.184 10.668 10.668 0 0 0-6.667 9.888v76.523c0 4.346 2.637 8.258 6.667 9.888a75.082 75.082 0 0 1 41.184 41.184 10.668 10.668 0 0 0 9.888 6.667H160V224h-52.715A96.676 96.676 0 0 0 64 180.715v-62.763a96.676 96.676 0 0 0 43.285-43.285zM288 128v-10.667C288 105.551 278.449 96 266.667 96H256V85.333h-21.333V96H224c-11.782 0-21.333 9.551-21.333 21.333v21.333c0 11.782 9.551 21.333 21.333 21.333h42.667v21.333H224v-10.667h-21.333v10.667c0 11.782 9.551 21.333 21.333 21.333h10.667v10.667H256v-10.667h10.667c11.782 0 21.333-9.551 21.333-21.333V160c0-11.782-9.551-21.333-21.333-21.333H224v-21.333h42.667V128H288z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pengeluaran Harian</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-3 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('kategori-bbm*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" href="/kategori-bbm">
                        <div class="{{ request()->is('kategori-bbm') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is('kategori-bbm'))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(1,0,0,1,70,0)">
                                    <path d="M0 183.652h374.559v81H0zM0 294.652h374.559v79.36H0zM0 462.586C0 489.832 22.168 512 49.414 512h275.73c27.247 0 49.41-22.168 49.41-49.414v-58.574H0zM251.543 69.18H123.012c-4.215 0-7.649 3.43-7.649 7.644 0 4.219 3.434 7.649 7.649 7.649h128.531c4.215 0 7.648-3.43 7.648-7.649 0-4.215-3.43-7.644-7.648-7.644zm0 0" fill="#ffffff" data-original="#000000" class=""></path>
                                    <path d="M325.145 0H49.415C22.164 0 0 22.168 0 49.414v104.238h374.559V49.414C374.555 22.168 352.39 0 325.145 0zm-73.602 114.473H123.012c-20.758 0-37.649-16.887-37.649-37.645s16.89-37.648 37.649-37.648h128.531c20.758 0 37.648 16.89 37.648 37.648s-16.89 37.645-37.648 37.645zm0 0" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(1,0,0,1,70,0)">
                                    <path d="M325.145 0H49.415C22.167 0 0 22.168 0 49.414v413.172C0 489.832 22.168 512 49.414 512h275.73c27.247 0 49.415-22.168 49.415-49.414V49.414C374.559 22.168 352.39 0 325.145 0zm19.414 264.652H30v-81h314.559zM30 294.652h314.559v79.36H30zM49.414 30h275.73c10.704 0 19.415 8.71 19.415 19.414v104.238H30V49.414C30 38.711 38.71 30 49.414 30zm275.73 452H49.415C38.711 482 30 473.29 30 462.586v-58.574h314.559v58.574c0 10.703-8.711 19.414-19.414 19.414zm0 0" fill="#000000" data-original="#000000" class=""></path>
                                    <path d="M123.016 128.145h128.53c20.759 0 37.645-16.891 37.645-37.649 0-20.758-16.886-37.648-37.644-37.648H123.016c-20.762 0-37.649 16.89-37.649 37.648 0 20.758 16.887 37.649 37.649 37.649zm0-45.297h128.53c4.216 0 7.645 3.43 7.645 7.648 0 4.215-3.43 7.645-7.644 7.645H123.016c-4.22 0-7.649-3.43-7.649-7.645 0-4.219 3.43-7.648 7.649-7.648zm0 0" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
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
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan Finansial</span>
                    </a>
                </li>

                <!-- TOKO LISTRIK -->
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Keuangan Toko Listrik</h6>
                </li>
                
                <li class="mt-0.5 w-full">
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/categories*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
                        href="/kategori">
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
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Kategori</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/categories*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
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
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Item</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/posts*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
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
                <li class="mt-0.5 w-full">
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/categories*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors"
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
                            @endif
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
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors" href="#">
                        <div class="{{ request()->is('') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is(''))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M139.13 0H38.957C29.74 0 22.261 7.479 22.261 16.696v478.609c0 9.217 7.479 16.696 16.696 16.696H139.13c9.217 0 16.696-7.479 16.696-16.696V16.696C155.826 7.479 148.348 0 139.13 0zM306.087 267.13H205.913c-9.217 0-16.696 7.479-16.696 16.696v211.478c0 9.217 7.479 16.696 16.696 16.696h100.174c9.217 0 16.696-7.479 16.696-16.696V283.826c0-9.217-7.479-16.696-16.696-16.696zM473.043 133.565H372.87c-9.217 0-16.696 7.479-16.696 16.696v345.043c0 9.217 7.479 16.696 16.696 16.696h100.174c9.217 0 16.696-7.479 16.696-16.696V150.261c-.001-9.217-7.479-16.696-16.697-16.696z" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M139.13 0H38.957c-9.22 0-16.696 7.475-16.696 16.696v478.609c0 9.22 7.475 16.696 16.696 16.696H139.13c9.22 0 16.696-7.475 16.696-16.696V16.696C155.826 7.475 148.351 0 139.13 0zm-16.695 478.609H55.652V33.391h66.783v445.218zM306.087 267.13H205.913c-9.22 0-16.696 7.475-16.696 16.696v211.478c0 9.22 7.475 16.696 16.696 16.696h100.174c9.22 0 16.696-7.475 16.696-16.696V283.826c0-9.22-7.476-16.696-16.696-16.696zm-16.696 211.479h-66.783V300.522h66.783v178.087zM473.043 133.565H372.87c-9.22 0-16.696 7.475-16.696 16.696v345.043c0 9.22 7.475 16.696 16.696 16.696h100.174c9.22 0 16.696-7.475 16.696-16.696V150.261c-.001-9.221-7.476-16.696-16.697-16.696zm-16.695 345.044h-66.783V166.957h66.783v311.652z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan Finansial</span>
                    </a>
                </li>

                <!-- TOKO LISTRIK -->
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Keuangan Toko Listrik</h6>
                </li>

                <li class="mt-0.5 w-full">
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/categories*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors" href="/kategori-item">
                        <div {{-- class="{{ request()->is('dashboard/categories*') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] opacity-80 ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5"> --}}
                            class="{{ request()->is('') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is(''))
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
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/posts*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors" href="/penjualan-item">
                        <div class="{{ request()->is('') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is(''))
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
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Penjualan Item Harian</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/categories*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors" href="pengeluaran-ops-listrik">
                        <div class="{{ request()->is('') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is(''))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 448 448" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(1,0,0,1,0,20)">
                                    <path d="M10.668 298.668c-3.645-.035-7.25-.7-10.668-1.965v33.965c0 5.89 4.777 10.664 10.668 10.664h426.664c5.89 0 10.668-4.773 10.668-10.664v-33.965a31.583 31.583 0 0 1-10.668 1.965zM448 232.703a31.583 31.583 0 0 1-10.668 1.965H10.668c-3.645-.035-7.25-.7-10.668-1.965v33.965c0 5.89 4.777 10.664 10.668 10.664h426.664c5.89 0 10.668-4.773 10.668-10.664zM224 32c-41.238 0-74.668 33.43-74.668 74.668 0 41.234 33.43 74.664 74.668 74.664s74.668-33.43 74.668-74.664C298.621 65.449 265.218 32.047 224 32zm42.668 53.332h-21.336V74.668h-42.664V96h42.664c11.785 0 21.336 9.55 21.336 21.332v21.336c0 11.781-9.55 21.332-21.336 21.332h-10.664v10.668h-21.336V160h-10.664c-11.785 0-21.336-9.55-21.336-21.332V128h21.336v10.668h42.664v-21.336h-42.664c-11.785 0-21.336-9.55-21.336-21.332V74.668c0-11.785 9.55-21.336 21.336-21.336h10.664V42.668h21.336v10.664h10.664c11.785 0 21.336 9.55 21.336 21.336zm0 0" fill="#ffffff" data-original="#000000" class=""></path>
                                    <path d="M448 10.668C448 4.778 443.223 0 437.332 0H10.668C4.778 0 0 4.777 0 10.668v192c0 5.89 4.777 10.664 10.668 10.664h426.664c5.89 0 10.668-4.773 10.668-10.664zm-309.332 192H79.07A10.67 10.67 0 0 1 69.184 196 75.086 75.086 0 0 0 28 154.816a10.67 10.67 0 0 1-6.668-9.886V68.406c0-4.347 2.64-8.258 6.668-9.89a75.074 75.074 0 0 0 41.184-41.184 10.667 10.667 0 0 1 9.886-6.664h59.598V32H85.953a96.697 96.697 0 0 1-43.285 43.285v62.762a96.697 96.697 0 0 1 43.285 43.285h52.715zm85.332 0c-53.02 0-96-42.98-96-96s42.98-96 96-96 96 42.98 96 96c-.066 52.992-43.008 95.934-96 96zm202.668-57.738a10.67 10.67 0 0 1-6.668 9.886A75.086 75.086 0 0 0 378.816 196a10.67 10.67 0 0 1-9.886 6.668h-59.598v-21.336h52.715a96.697 96.697 0 0 1 43.285-43.285V75.285A96.697 96.697 0 0 1 362.047 32h-52.715V10.668h59.598c4.343 0 8.258 2.637 9.886 6.664A75.074 75.074 0 0 0 420 58.516a10.676 10.676 0 0 1 6.668 9.89zM10.668 405.332h426.664c5.89 0 10.668-4.773 10.668-10.664v-33.965a31.583 31.583 0 0 1-10.668 1.965H10.668c-3.645-.035-7.25-.7-10.668-1.965v33.965c0 5.89 4.777 10.664 10.668 10.664zm0 0" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(1,0,0,1,0,0)">
                                    <path d="M458.667 21.333H32c-17.673 0-32 14.327-32 32v384c0 17.673 14.327 32 32 32h426.667c17.673 0 32-14.327 32-32v-384c0-17.673-14.327-32-32-32zm10.666 416c0 5.891-4.776 10.667-10.667 10.667H32c-5.891 0-10.667-4.776-10.667-10.667V403.37A31.663 31.663 0 0 0 32 405.333h426.667a31.614 31.614 0 0 0 10.667-1.963v33.963zm0-64c0 5.891-4.776 10.667-10.667 10.667H32c-5.891 0-10.667-4.776-10.667-10.667V339.37A31.663 31.663 0 0 0 32 341.333h426.667a31.614 31.614 0 0 0 10.667-1.963v33.963zm0-64c0 5.891-4.776 10.667-10.667 10.667H32c-5.891 0-10.667-4.776-10.667-10.667V275.37A31.663 31.663 0 0 0 32 277.333h426.667a31.614 31.614 0 0 0 10.667-1.963v33.963zm0-64c0 5.891-4.776 10.667-10.667 10.667H32c-5.891 0-10.667-4.776-10.667-10.667v-192c0-5.891 4.776-10.667 10.667-10.667h426.667c5.891 0 10.667 4.776 10.667 10.667v192z" fill="#000000" data-original="#000000" class=""></path>
                                    <path d="M245.333 53.333c-53.019 0-96 42.981-96 96s42.981 96 96 96 96-42.981 96-96c-.064-52.992-43.007-95.935-96-96zm0 170.667c-41.237 0-74.667-33.429-74.667-74.667s33.429-74.667 74.667-74.667S320 108.096 320 149.333c-.047 41.218-33.449 74.62-74.667 74.667z" fill="#000000" data-original="#000000" class=""></path>
                                    <path d="M441.333 101.184A75.085 75.085 0 0 1 400.149 60a10.668 10.668 0 0 0-9.888-6.667h-59.595v21.333h52.715a96.676 96.676 0 0 0 43.285 43.285v62.763a96.676 96.676 0 0 0-43.285 43.285h-52.715v21.333h59.595c4.346 0 8.258-2.637 9.888-6.667a75.082 75.082 0 0 1 41.184-41.184 10.668 10.668 0 0 0 6.667-9.888V111.07c0-4.344-2.637-8.256-6.667-9.886zM107.285 74.667H160V53.333h-59.595A10.666 10.666 0 0 0 90.517 60a75.082 75.082 0 0 1-41.184 41.184 10.668 10.668 0 0 0-6.667 9.888v76.523c0 4.346 2.637 8.258 6.667 9.888a75.082 75.082 0 0 1 41.184 41.184 10.668 10.668 0 0 0 9.888 6.667H160V224h-52.715A96.676 96.676 0 0 0 64 180.715v-62.763a96.676 96.676 0 0 0 43.285-43.285zM288 128v-10.667C288 105.551 278.449 96 266.667 96H256V85.333h-21.333V96H224c-11.782 0-21.333 9.551-21.333 21.333v21.333c0 11.782 9.551 21.333 21.333 21.333h42.667v21.333H224v-10.667h-21.333v10.667c0 11.782 9.551 21.333 21.333 21.333h10.667v10.667H256v-10.667h10.667c11.782 0 21.333-9.551 21.333-21.333V160c0-11.782-9.551-21.333-21.333-21.333H224v-21.333h42.667V128H288z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pengeluaran Harian</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    {{-- <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 {{ request()->is('dashboard/categories*') ? 'shadow-soft-xl bg-white font-semibold text-slate-700' : '' }} transition-colors" --}}
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors" href="#">
                        <div class="{{ request()->is('') ? 'bg-gradient-to-tl from-[#060764] to-[#00b7dd] ' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            @if(request()->is(''))
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M139.13 0H38.957C29.74 0 22.261 7.479 22.261 16.696v478.609c0 9.217 7.479 16.696 16.696 16.696H139.13c9.217 0 16.696-7.479 16.696-16.696V16.696C155.826 7.479 148.348 0 139.13 0zM306.087 267.13H205.913c-9.217 0-16.696 7.479-16.696 16.696v211.478c0 9.217 7.479 16.696 16.696 16.696h100.174c9.217 0 16.696-7.479 16.696-16.696V283.826c0-9.217-7.479-16.696-16.696-16.696zM473.043 133.565H372.87c-9.217 0-16.696 7.479-16.696 16.696v345.043c0 9.217 7.479 16.696 16.696 16.696h100.174c9.217 0 16.696-7.479 16.696-16.696V150.261c-.001-9.217-7.479-16.696-16.697-16.696z" fill="#ffffff" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M139.13 0H38.957c-9.22 0-16.696 7.475-16.696 16.696v478.609c0 9.22 7.475 16.696 16.696 16.696H139.13c9.22 0 16.696-7.475 16.696-16.696V16.696C155.826 7.475 148.351 0 139.13 0zm-16.695 478.609H55.652V33.391h66.783v445.218zM306.087 267.13H205.913c-9.22 0-16.696 7.475-16.696 16.696v211.478c0 9.22 7.475 16.696 16.696 16.696h100.174c9.22 0 16.696-7.475 16.696-16.696V283.826c0-9.22-7.476-16.696-16.696-16.696zm-16.696 211.479h-66.783V300.522h66.783v178.087zM473.043 133.565H372.87c-9.22 0-16.696 7.475-16.696 16.696v345.043c0 9.22 7.475 16.696 16.696 16.696h100.174c9.22 0 16.696-7.475 16.696-16.696V150.261c-.001-9.221-7.476-16.696-16.697-16.696zm-16.695 345.044h-66.783V166.957h66.783v311.652z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                            @endif
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Laporan Finansial</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- end sidenav -->