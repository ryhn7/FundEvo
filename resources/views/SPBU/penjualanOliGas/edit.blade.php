@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/PenjualanOliGas/{{ $sell->id }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="oli_gas_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Jenis
                    </span>
                    <select name="oli_gas_id" id="oli_gas_id" required
                        class="block w-full mt-1 text-sm px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Jenis</option>
                        @foreach ($oligases as $oligas)
                            @if (old('oli_gas_id', $sell->oli_gas_id) == $oligas->id)
                                <option value="{{ $oligas->id }}" selected>{{ $oligas->oliGasStatics->jenis }}</option>
                            @else
                                <option value="{{ $oligas->id }}">{{ $oligas->oliGasStatics->jenis }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('oli_gas_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_jual" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga BBM</span>
                    <input type="number" min="0" step="any" id="harga_jual" name="harga_jual" required
                        @foreach ($bbms as $bbm)
                        @if (old('harga_jual', $sell->bbm_id) == $bbm->id)
                        value="{{ old('harga_jual', $bbm->harga_jual) }}"
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
                    <input type="number" min="0" step="any" id="penerimaan" name="penerimaan"
                        value="{{ old('penerimaan', $sell->penerimaan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penerimaan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penerimaan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="tera_densiti" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Tera & Densiti</span>
                    <input type="number" min="0" step="any" id="tera_densiti" name="tera_densiti"
                        value="{{ old('tera_densiti', $sell->tera_densiti) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('tera_densiti')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('tera_densiti')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_adm" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock ADM</span>
                    <input type="number" min="0" step="any" id="stock_adm" name="stock_adm" required
                        value="{{ old('stock_adm', $sell->stock_adm) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_adm')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_adm')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_fakta" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Fakta</span>
                    <input type="number" min="0" step="any" id="stock_fakta" name="stock_fakta" required
                        value="{{ old('stock_fakta', $sell->stock_fakta) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_fakta')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_fakta')
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

                <label for="penyusutan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penyusutan</span>
                    <input type="number" step="any" id="penyusutan" name="penyusutan" required
                        value="{{ old('penyusutan', $sell->penyusutan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penyusutan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penyusutan')
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

                <label for="created_at" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Tanggal</span>
                    <input type="date" name="created_at"
                        value="{{ old('created_at', $sell->created_at->format('Y-m-d')) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('created_at')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('created_at')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Edit
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
        const stockAdm = document.getElementById('stock_adm');
        const stockFakta = document.getElementById('stock_fakta');
        const penyusutan = document.getElementById('penyusutan');
        const pendapatan = document.getElementById('pendapatan');
        const hargaJual = document.getElementById('harga_jual');


        stockAdm.addEventListener('change', () => {
            if (penerimaan.value == '') {
                penerimaan.value = 0;
            }
            const sum = parseInt(stockAwal.value) + parseInt(penerimaan.value);
            const sell = sum - parseInt(stockAdm.value);

            penjualan.value = sell;
        });

        stockFakta.addEventListener('change', () => {
            const result = parseInt(stockAdm.value) - parseInt(stockFakta.value);
            const hasil = parseInt(penjualan.value) * parseInt(hargaJual.value);

            if (result > 0) {
                penyusutan.value = result * -1;
            } else if (result < 0) {
                penyusutan.value = result * -1;
            } else {
                penyusutan.value = 0;
            }

            pendapatan.value = hasil;
        });
    </script>
@endsection
