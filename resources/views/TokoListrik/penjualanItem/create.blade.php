@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/penjualan-item" method="POST">
            @csrf
            <div>
                <div id="date" class="hidden">
                    <label for="created_at" class="block mt-4 text-sm">
                        <span class="text-gray-700 font-semibold">Tanggal <span
                                class="text-[10px] text-red-500 tracking-wider">(Wajib diisi)
                            </span></span>
                        <input type="date" name="created_at" value="{{ old('created_at') }}"
                            class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('created_at')
                        border-red-600 focus:border-red-600 focus:ring-red-600
                        @enderror" />
                        @error('created_at')
                            <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                <label for="kategori_item" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Kategori Item
                    </span>
                    <select name="kategori_item" id="kategori_item" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" disabled selected class="font-semibold" style="display: none;" >Pilih Kategori</option>
                        @foreach ($kategoris as $kategor)
                            <!-- @if (old('kategori') == $kategor->id)
                                <option value="{{ $kategor->id }}" selected>{{ $kategor->kategori}}</option>
                            @else -->
                                <option value="{{ $kategor->id }}">{{ $kategor->kategori}}</option>
                            <!-- @endif -->
                        @endforeach
                    </select>
                    @error('kategori_item')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="item_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Nama Item
                    </span>
                    <select name="item_id" id="item_id" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <!-- <option value="" class="font-semibold" style="display: none;" disabled selected hidden>Pilih Item</option> -->
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

                <label for="harga_jual" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga Item</span>
                    <input type="number" min="0" step="any" id="harga_jual" name="harga_jual" required
                        value="{{ old('harga_jual') }}"
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

                <label for="penyusutan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penyusutan</span>
                    <input type="number" min="0" step="any" id="penyusutan" name="penyusutan" required
                        value="{{ old('penyusutan', $item->penyusutan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penyusutan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penyusutan')
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        const stockAwal = document.getElementById('stock_awal');
        const penerimaan = document.getElementById('penerimaan');
        const penjualan = document.getElementById('penjualan');
        const stockAkhir = document.getElementById('stock_akhir');
        const penyusutan = document.getElementById('penyusutan');
        const pendapatan = document.getElementById('pendapatan');
        const hargaJual = document.getElementById('harga_jual');
        const item = document.getElementById('item_id');

        stockAwal.addEventListener('change', ()=> {
            console.log(stockAwal.value)
        })

        penerimaan.addEventListener('change', ()=> {
            console.log(penerimaan.value)
        })

        // item.addEventListener('change', () => {
        //     const item_id = item.value;
        //     $.ajax({
        //         url: '/penjualan-item/getPreviousStock/' + item_id,
        //         type: 'GET',
        //         data: {
        //             _token: '{{ csrf_token() }}'
        //         },
        //         dataType: 'json',
        //         success: function(result) {
        //             //show harga_jual based on id 
        //             console.log(result);
        //             if (result.stock_akhir > 0) {
        //                 stockAwal.value = result.stock_akhir;
        //             } else {
        //                 stockAwal.value = null;
        //             }
        //         }
        //     })
        // });
        penyusutan.value = 0;
        penyusutan.addEventListener('keyup', ()=> {
            const jual = parseInt(stockAwal.value) + parseInt(penerimaan.value) - parseInt(penjualan.value)- parseInt(penyusutan.value);
            stockAkhir.value = jual;
        })

        penjualan.addEventListener('keyup', () => {
            const jual = parseInt(stockAwal.value) + parseInt(penerimaan.value) - parseInt(penjualan.value)- parseInt(penyusutan.value);
            const hasil = parseInt(penjualan.value) * parseInt(hargaJual.value);
            stockAkhir.value = jual;
            pendapatan.value =  hasil;
        });



            /*------------------------------------------
            --------------------------------------------
            Kategori Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#kategori_item').select2(
                {
                    placeholder: 'Pilih Kategori',
                    allowClear: true,
                }
            );
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
