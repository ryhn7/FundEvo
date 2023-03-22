<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Dashboard PT Bhakti Usaha Jaya</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href={{ asset('css/nucleo-icons.css') }} rel="stylesheet" />
    <link href={{ asset('css/nucleo-svg.css') }} rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href={{ asset('css/style.css') }} rel="stylesheet" />
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    {{-- bodymovin --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.2/lottie.min.js"
        integrity="sha512-fTTVSuY9tLP+l/6c6vWz7uAQqd1rq3Q/GyKBN2jOZvJSLC5RjggSdboIFL1ox09/Ezx/AKwcv/xnDeYN9+iDDA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- custom css --}}
    <link href={{ asset('css/custom-css.css') }} rel="stylesheet" />
    {{-- flowbite--}} 
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" /> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/css/splide.min.css">
</head>

<body class="m-0 font-open antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    @include('partials.sidebar')

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('partials.navbar')
        <!-- cards -->
        <div class="w-full px-6 py-6 mx-auto">
            @yield('container')
        </div>
        <!-- end cards -->
    </main>

    {{-- Alpine js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Jquery --}}
    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>

    {{--  --}}
    <script src="{{ asset('assets/js/index.min.js') }}"></script>

    {{-- yearpicker js --}}
    <link rel="stylesheet" href="{{ asset('css/yearpicker.css') }}">
    <script src="{{ asset('assets/js/yearpicker.js') }}"></script>
    <script src="{{ asset('assets/js/yearpicker-init.js') }}"></script>

    <script src="{{ asset('assets/js/chartjs.min.js') }}"></script>
    @yield('scripts')
</body>


</html>
