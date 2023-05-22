@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/PenjualanOliGas" method="POST">
            @csrf
            <div>
                <div id="date" class="hidden">
                    <label for="created_at" class="block mt-4 text-sm">
                        <span class="text-gray-700 font-semibold">Tanggal <span
                                class="text-[10px] text-red-500 tracking-wider">(Wajib diisi)
                            </span></span>
                        <input type="date" id="created_at" name="created_at" value="{{ old('created_at') }}"
                            class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('created_at')
                        border-red-600 focus:border-red-600 focus:ring-red-600
                        @enderror" />
                        @error('created_at')
                            <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                <label for="oli_gas_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Jenis
                    </span>
                    <select name="oli_gas_id" id="oli_gas_id" required
                        class="block w-full mt-1 text-sm px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Jenis</option>
                        @foreach ($oligases as $oligas)
                            @if (old('oli_gas_id') == $oligas->id)
                                <option value="{{ $oligas->id }}" selected>
                                    {{ $oligas->jenis }}</option>
                            @else
                                <option value="{{ $oligas->id }}">{{ $oligas->jenis }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('oli_gas_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="nama" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Nama
                    </span>
                    <select name="nama" id="nama" required
                        class="block w-full mt-1 text-sm px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Nama</option>
                    </select>
                    @error('nama')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_awal" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Awal</span>
                    <input type="number" min="0" step="any" id="stock_awal" name="stock_awal" required
                        value="{{ old('stock_awal') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_awal')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_awal')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penerimaan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penerimaan</span>
                    <input type="number" min="0" step="any" id="penerimaan" name="penerimaan"
                        value="{{ old('penerimaan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penerimaan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penerimaan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_akhir" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Akhir</span>
                    <input type="number" min="0" step="any" id="stock_akhir" name="stock_akhir" required
                        value="{{ old('stock_akhir') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_akhir')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_akhir')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penjualan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penjualan</span>
                    <input type="number" min="0" step="any" id="penjualan" name="penjualan" required
                        value="{{ old('penjualan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penjualan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penjualan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>


                <label for="pendapatan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Pendapatan</span>
                    <input type="number" min="0" step="any" id="pendapatan" name="pendapatan" required
                        value="{{ old('pendapatan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pendapatan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pendapatan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Tambah
                    Penjualan</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const stockAwal = document.getElementById('stock_awal');
        const penerimaan = document.getElementById('penerimaan');
        const penjualan = document.getElementById('penjualan');
        const stockAkhir = document.getElementById('stock_akhir');
        const pendapatan = document.getElementById('pendapatan');
        // let harga = null;
        const oliGas = document.getElementById('oli_gas_id');
        const nama = document.getElementById('nama');
        const date = document.getElementById('date');
        const inputDate = document.getElementById('created_at');

        oliGas.addEventListener('change', () => {
            const oliGas_id = oliGas.value;
            $.ajax({
                url: '/PenjualanOliGas/getData/' + oliGas_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',

                success: function(result) {
                    $('select[name="nama"]').empty();
                    $('#nama').html('<option value="" class="font-semibold">Pilih Nama</option>');

                    $.each(result, function(key, value) {
                        $('select[name="nama"]').append('<option value="' + value.nama + '">' +
                            value.nama + '</option>');
                    });
                }
            })
        });

        nama.addEventListener('change', () => {
            const nama_id = nama.value;
            $.ajax({
                url: '/PenjualanOliGas/getPreviousStock/' + nama_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    // console.log(result);
                    if (result.stock_awal > 0) {
                        stockAwal.value = result.stock_akhir;
                    } else {
                        stockAwal.value = null;
                    }
                }
            })
        });

        stockAkhir.addEventListener('change', () => {
            if (penerimaan.value == '') {
                penerimaan.value = 0;
            }
            const sum = parseInt(stockAwal.value) + parseInt(penerimaan.value);
            const sell = sum - parseInt(stockAkhir.value);

            penjualan.value = sell;
        });

        stockAkhir.addEventListener('change', () => {
            const nama_id = nama.value;
            $.ajax({
                url: '/PenjualanOliGas/getHarga/' + nama_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',

                success: function(result) {
                    const harga = result[0].harga_jual;
                    const hasil = parseInt(penjualan.value) * parseInt(harga);

                    pendapatan.value = hasil;
                }
            })
        });


        // bbm.addEventListener('change', () => {
        //     const bbm_id = bbm.value;
        //     $.ajax({
        //         url: '/PenjualanBBM/checkBBM/' + bbm_id,
        //         type: 'GET',
        //         data: {
        //             _token: '{{ csrf_token() }}'
        //         },
        //         dataType: 'json',
        //         success: function(result) {
        //             console.log(result);
        //             if (result == true) {
        //                 date.classList.add('hidden');
        //             } else if (result.created_at == date.value) {
        //                 date.classList.remove('hidden');
        //                 alert(
        //                     'Anda belum memasukan data penjualan BBM sebelumnya, silakan isi tanggal yang sesuai terlebih dahulu'
        //                 );
        //                 inputDate.setAttribute('required', 'true');
        //             } else {
        //                 date.classList.add('hidden');
        //             }
        //         }
        //     })
        // });


        // stockAdm.addEventListener('change', () => {
        //     if (penerimaan.value == '') {
        //         penerimaan.value = 0;
        //     }
        //     const sum = parseInt(stockAwal.value) + parseInt(penerimaan.value);
        //     const sell = sum - parseInt(stockAdm.value);

        //     penjualan.value = sell;
        // });
    </script>
@endsection
