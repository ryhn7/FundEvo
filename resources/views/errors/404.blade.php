@extends('errors.base')

@section('error')
    <div>
        <div class="container w-full h-[400px] mt-10" id="animation">
            <script>
                var animation = bodymovin.loadAnimation({
                    container: document.getElementById('animation'),
                    renderer: 'svg',
                    loop: true,
                    autoplay: true,
                    path: 'https://assets1.lottiefiles.com/private_files/lf30_tonsVH.json'
                })
            </script>
        </div>
        <div class="w-full">
            <div class="flex justify-center">
                <div class="text-center">
                    <h1 class="text-2xl font-bold">Halaman tidak ditemukan</h1>
                    <p class="text-gray-500">Silahkan kembali ke halaman sebelumnya</p>

                    <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-red-500 to-yellow-400 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                        href="javascript:history.back()">&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
