@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/penjualan-item" method="POST">
            @csrf
            <div>
                <label for="kategori_item" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Kategori Item
                    </span>
                    <select name="kategori_item" id="kategori_item" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <!-- <option value="" class="font-semibold">Pilih Kategori Item</option>
                        @foreach ($items as $item)
                            @if (old('kategori_item') == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->kategori}}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->kategori}}</option>
                            @endif
                        @endforeach -->
                        <option value="" class="font-semibold">Pilih Kategori</option>
                        @foreach ($kategoris as $kategor)
                            @if (old('kategori') == $kategor->id)
                                <option value="{{ $kategor->id }}" selected>{{ $kategor->kategori}}</option>
                            @else
                                <option value="{{ $kategor->id }}">{{ $kategor->kategori}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('item_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="item_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Nama Item
                    </span>
                    <select name="item_id" id="item_id" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Item</option>
                        <!-- @foreach ($items as $item)
                            @if (old('item_id') == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nama_item}}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nama_item}}</option>
                            @endif
                        @endforeach -->
                    </select>
                    @error('item_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_awal" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Awal</span>
                    <input type="number" min="0" step="any" id="stock_awal" name="stock_awal" required
                        value="{{ old('stock_awal', $item->stock_awal) }}"
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
                        value="{{ old('penerimaan', $item->penerimaan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penerimaan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penerimaan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penjualan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penjualan</span>
                    <input type="number" min="0" step="any" id="penjualan" name="penjualan"
                        value="{{ old('penjualan', $item->penjualan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penjualan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penjualan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_akhir" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Akhir</span>
                    <input type="number" min="0" step="any" id="stock_akhir" name="stock_akhir" required
                        value="{{ old('stock_akhir', $item->stock_akhir) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_akhir')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_akhir')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pendapatan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Pendapatan</span>
                    <input type="number" min="0" step="any" id="pendapatan" name="pendapatan" required
                        value="{{ old('pendapatan', $item->pendapatan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pendapatan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pendapatan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-black text-white font-bold rounded shadow-md hover:bg-[#333333]">Tambah
                    Penjualan</button>
            </div>
        </form>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            /*------------------------------------------
            --------------------------------------------
            Kategori Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#kategori_item').on('change', function () {
                var kategori_id = this.value;
                console.log(kategori_id);
                $("#nama_item").html('');
                $.ajax({
                    url: '/penjualan-item/'+kategori_id,
                    type: "GET",
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('select[name="item_id"]').empty();
                        $('#item_id').html('<option value="" class="font-semibold">Pilih Item </option>');
                        console.log(result);
                        $.each(result, function (key, value) {
                            $('select[name="item_id"]').append('<option value="' + value.id + '">' + value.nama_item + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script>
        const stockAwal = document.getElementById('stock_awal');
        const penerimaan = document.getElementById('penerimaan');
        const penjualan = document.getElementById('penjualan');
        const stockAkhir = document.getElementById('stock_akhir');
        const pendapatan = document.getElementById('pendapatan');
        const hargaJual = document.getElementById('harga_jual');

        stockAwal.addEventListener('change', ()=> {
            console.log(stockAwal.value)
        })

        penerimaan.addEventListener('change', ()=> {
            console.log(penerimaan.value)
        })

        penjualan.addEventListener('change', () => {
            const jual = parseInt(stockAwal.value) + parseInt(penerimaan.value) - parseInt(penjualan.value);
            const hasil = parseInt(penjualan.value) * 10000;

            stockAkhir.value = jual;
            pendapatan.value =  hasil;
        });

    </script>
@endsection
