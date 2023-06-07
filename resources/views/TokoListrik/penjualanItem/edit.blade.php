{{-- @dd($items[0]->kategori) --}}
@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/penjualan-item/{{ $sell->id }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="kategori_item" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Kategori Item
                    </span>
                    <select name="kategori_item" id="kategori_item" required disabled
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <!-- <option value="" class="font-semibold">Pilih Kategori</option> -->
                        @foreach ($items as $item)
                            @if (old('item_id', $sell->item_id) == $item->id)
                                @foreach ($kategoris as $kategori)
                                    @if (old('kategori_item', $item->kategori) == $kategori->id)
                                        <option value="{{ $kategori->id }}" selected>{{ $kategori->kategori }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                        {{-- <!-- @foreach ($kategoris as $kategori)
    @if (old('kategori', $sell->kategori) == $kategori->id)
    <option value="{{ $kategori->id }}" selected>{{ $kategori->kategori }}</option>
@else
    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
    @endif
    @endforeach -->
                        <!-- @foreach ($items as $item)
    @if (old('kategori_item', $item->kategori) == $kategori->id)
    <option value="{{ $kategori->kategori }}" selected>{{ $kategori->kategori }}</option>
@else
    <option value="{{ $kategori->kategori }}">{{ $kategori->kategori }}</option>
    @endif
    @endforeach -->
                        <!-- @foreach ($kategoris as $kategori)
    @if (old('kategori_item', $item->kategori) == $kategori->id)
    <option value="{{ $kategori->id }}" selected>{{ $kategori->kategori }}</option>
@else
    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
    @endif
    @endforeach --> --}}
                    </select>
                    @error('kategori_item')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="item_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Nama Item
                    </span>
                    <select name="item_id" id="item_id" required disabled
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Item</option>
                        @foreach ($items as $item)
                            @if (old('item_id', $sell->item_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nama_item }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nama_item }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('item_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_jual" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga Item</span>
                    <input type="number" min="0" step="any" id="harga_jual" name="harga_jual" required disabled
                        @foreach ($items as $item)
                            @if (old('harga_jual', $sell->item_id) == $item->id)
                            value="{{ old('harga_jual', $item->harga_jual) }}"
                            @endif @endforeach
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_jual')
                            border-red-600 focus:border-red-600 focus:ring-red-600
                            @enderror" />
                    @error('harga_jual')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_awal" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Awal</span>
                    <input type="number" min="0" step="any" id="stock_awal" name="stock_awal" required
                        value="{{ old('stock_awal', $sell->stock_awal) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_awal')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_awal')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penerimaan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penerimaan</span>
                    <input type="number" min="0" step="any" id="penerimaan" name="penerimaan" required
                        value="{{ old('penerimaan', $sell->penerimaan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penerimaan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penerimaan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penyusutan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penyusutan</span>
                    <input type="number" min="0" step="any" id="penyusutan" name="penyusutan" required
                        value="{{ old('penyusutan', $sell->penyusutan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penyusutan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penyusutan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penjualan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penjualan</span>
                    <input type="number" min="0" step="any" id="penjualan" name="penjualan" required
                        value="{{ old('penjualan', $sell->penjualan) }}"
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
                        value="{{ old('stock_akhir', $sell->stock_akhir) }}"
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
                        value="{{ old('pendapatan', $sell->pendapatan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pendapatan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pendapatan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Edit
                    Penjualan</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        const stockAwal = document.getElementById('stock_awal');
        const penerimaan = document.getElementById('penerimaan');
        const penjualan = document.getElementById('penjualan');
        const stockAkhir = document.getElementById('stock_akhir');
        const pendapatan = document.getElementById('pendapatan');
        const penyusutan = document.getElementById('penyusutan');
        const hargaJual = document.getElementById('harga_jual');


        penyusutan.addEventListener('keyup', () => {
            const jual = parseInt(stockAwal.value) + parseInt(penerimaan.value) - parseInt(penjualan.value) -
                parseInt(penyusutan.value);
            stockAkhir.value = jual;
        });

        penjualan.addEventListener('keyup', () => {
            const jual = parseInt(stockAwal.value) + parseInt(penerimaan.value) - parseInt(penjualan.value) -
                parseInt(penyusutan.value);
            const hasil = parseInt(penjualan.value) * parseInt(hargaJual.value);

            stockAkhir.value = jual;
            pendapatan.value = hasil;
        });




        $('#kategori_item').select2(
                {
                    placeholder: 'Pilih Kategori',
                    allowClear: true,
                }
            );
            $('#kategori_item').on('change', function () {
                var kategori_id = this.value;
                console.log(kategori_id);
                // $("#nama_item").html('');
                $.ajax({
                    url: '/penjualan-item/'+kategori_id,
                    type: "GET",
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('select[name="item_id"]').empty();
                        $('#item_id').html('<option value="" style="display: none;" class="font-semibold" disabled selected hidden>Pilih Item </option>');
                        console.log(result);
                        $.each(result, function (key, value) {
                            $('select[name="item_id"]').append('<option value="' + value.id + '">' + value.nama_item + '</option>');
                            console.log(value);
                        });
                    }
                });
            });
        

        $('#item_id').on('change', function () {
            const item_id = item.value;
            console.log(item_id);
            $.ajax({
                url: '/penjualan-item/getData/' + item_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    //show harga_jual based on id 
                    console.log(result);
                    hargaJual.value = result[0].harga_jual;
                }
            })
        });

        $('#item_id').on('change', function () {
            const item_id = item.value;
            console.log(item_id);
            $.ajax({
                url: '/penjualan-item/getPreviousStock/' + item_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    if (result.stock_akhir > 0) {
                        stockAwal.value = result.stock_akhir;
                    } else {
                        stockAwal.value = null;
                    }
                }
            })
        });

        if ((stockAwal.value) == null) {
            stockAwal.value = 0;
        } 

        $('#item_id').select2(
            {
                placeholder: 'Pilih Item',
                allowClear: true
            }
        );

        $('#item_id').on('change', function () {
            const item_id = item.value;
            console.log('masuk bos');
            $.ajax({
                url: '/penjualan-item/checkItem/' + item_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    if (result.created_at == date.value) {
                        date.classList.remove('hidden');
                        alert(
                            'Anda belum memasukan data penjualan Item sebelumnya, silakan isi tanggal yang sesuai terlebih dahulu'
                        );
                    } else {
                        date.classList.add('hidden');
                    }
                }
            })
        });
    </script>
@endsection