@extends('layouts.main')

@section('container')
    <div class="dropdown inline-block relative">
        <button
            class=" inline-block px-6 py-2 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-red-500 to-yellow-400 leading-pro text-sm ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs">
            <span>Filters</span>
        </button>

        <ul
            class="dropdown-content absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none pt-1">
            <li class="dropdown">
                <div
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                    Month</div>
                <ul class="dropdown-content absolute hidden text-gray-700 pl-5 ml-20 -mt-10">
                    <form id="dateFilter" action="/penjualan-bbm/filter" class="py-0.5" method="GET">
                        <input id="date1" type="month" name="date" value="{{ request('date') }}"
                            class="px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                    </form>
                </ul>
            </li>
            <li class="dropdown">
                <div
                    class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">
                    Year</div>
                <ul class="dropdown-content absolute hidden text-gray-700 pl-5 ml-20 -mt-10">
                    <form id="dateFilter" action="/penjualan-bbm/filter" class="py-0.5" method="GET">
                        <input id="date1" type="text" class="yearpicker" value="{{ request('date') }}"
                            class="px-2 py-1 shadow-md border rounded-lg border-[#CC5500] cursor-pointer leading-pro ease-soft-in hover:shadow-soft-xs active:opacity-85 active:border-red-500 hover:scale-102 tracking-tight-soft bg-x-25 ">
                    </form>
                </ul>
            </li>
        </ul>
    </div>

    {{-- <script>
        const date = document.getElementById('date1');
        const formFilter = document.getElementById('dateFilter');

        date.addEventListener('change', () => {
            formFilter.submit();
        })
    </script> --}}
@endsection
