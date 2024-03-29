@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/PenjualanBBM" method="POST">
            @csrf
            {{-- <div>
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

                <label for="bbm_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Jenis BBM
                    </span>
                    <select name="bbm_id" id="bbm_id" required
                        class="block w-full mt-1 text-sm px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Jenis BBM</option>
                        @foreach ($bbms as $bbm)
                            @if (old('bbm_id') == $bbm->id)
                                <option value="{{ $bbm->id }}" selected>{{ $bbm->jenis_bbm }}</option>
                            @else
                                <option value="{{ $bbm->id }}">{{ $bbm->jenis_bbm }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('bbm_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_jual" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga BBM</span>
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
                    <span class="text-gray-700 font-semibold">Stock Awal (Liter)</span>
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
                    <span class="text-gray-700 font-semibold">Penerimaan (Liter)</span>
                    <input type="number" min="0" step="any" id="penerimaan" name="penerimaan"
                        value="{{ old('penerimaan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penerimaan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penerimaan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="tera_densiti" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Tera & Densiti (Liter)</span>
                    <input type="number" min="0" step="any" id="tera_densiti" name="tera_densiti"
                        value="{{ old('tera_densiti') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('tera_densiti')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('tera_densiti')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_adm" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock ADM (Liter)</span>
                    <input type="number" min="0" step="any" id="stock_adm" name="stock_adm" required
                        value="{{ old('stock_adm') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_adm')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_adm')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_fakta" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Fakta (Liter)</span>
                    <input type="number" min="0" step="any" id="stock_fakta" name="stock_fakta" required
                        value="{{ old('stock_fakta') }}"
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
                        value="{{ old('penjualan') }}"
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
                        value="{{ old('penyusutan') }}"
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
            </div> --}}

            {{-- New form --}}
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

            <div class="grid grid-cols-2 gap-4">
                <label for="bbm_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        1. Jenis BBM
                    </span>
                    <select name="bbm_id" id="bbm_id" required
                        class="block w-full mt-1 text-sm px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Jenis BBM</option>
                        @foreach ($bbms as $bbm)
                            @if (old('bbm_id') == $bbm->id)
                                <option value="{{ $bbm->id }}" selected>{{ $bbm->jenis_bbm }}</option>
                            @else
                                <option value="{{ $bbm->id }}">{{ $bbm->jenis_bbm }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('bbm_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_adm" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">6. Stock ADM (Liter)</span>
                    <input type="number" min="0" step="any" id="stock_adm" name="stock_adm" required
                        value="{{ old('stock_adm') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_adm')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_adm')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_jual" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">2. Harga BBM (Rp)</span>
                    <input type="number" min="0" step="any" id="harga_jual" name="harga_jual" required
                        value="{{ old('harga_jual') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_jual')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_jual')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_fakta" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">7. Stock Fakta (liter)</span>
                    <input type="number" min="0" step="any" id="stock_fakta" name="stock_fakta" required
                        value="{{ old('stock_fakta') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_fakta')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_fakta')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_awal" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">3. Stock Awal (Liter)</span>
                    <input type="number" min="0" step="any" id="stock_awal" name="stock_awal" required
                        value="{{ old('stock_awal') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_awal')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_awal')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penjualan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">8. Penjualan (Liter)</span>
                    <input type="number" min="0" step="any" id="penjualan" name="penjualan" required
                        value="{{ old('penjualan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penjualan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penjualan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penerimaan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">4. Penerimaan (Liter)</span>
                    <input type="number" min="0" step="any" id="penerimaan" name="penerimaan"
                        value="{{ old('penerimaan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penerimaan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penerimaan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penyusutan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">9. Penyusutan (Liter)</span>
                    <input type="number" step="any" id="penyusutan" name="penyusutan" required
                        value="{{ old('penyusutan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penyusutan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penyusutan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="tera_densiti" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">5. Tera & Densiti (Liter)</span>
                    <input type="number" min="0" step="any" id="tera_densiti" name="tera_densiti"
                        value="{{ old('tera_densiti') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('tera_densiti')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('tera_densiti')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pendapatan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">10. Pendapatan (Rp)</span>
                    <input type="number" min="0" step="any" id="pendapatan" name="pendapatan" required
                        value="{{ old('pendapatan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pendapatan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pendapatan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>
            </div>

            <button
                class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Tambah
                Penjualan</button>
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
        const bbm = document.getElementById('bbm_id');
        const date = document.getElementById('date');
        const inputDate = document.getElementById('created_at');

        bbm.addEventListener('change', () => {
            const bbm_id = bbm.value;
            $.ajax({
                url: '/PenjualanBBM/getData/' + bbm_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    hargaJual.value = result.harga_jual;
                }
            })
        });

        bbm.addEventListener('change', () => {
            const bbm_id = bbm.value;
            $.ajax({
                url: '/PenjualanBBM/getPreviousStock/' + bbm_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    if (result.stock_awal > 0) {
                        stockAwal.value = result.stock_fakta;
                    } else {
                        stockAwal.value = null;
                    }
                }
            })
        });

        bbm.addEventListener('change', () => {
            const bbm_id = bbm.value;
            $.ajax({
                url: '/PenjualanBBM/checkBBM/' + bbm_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    if (result == true) {
                        date.classList.add('hidden');
                    } else if (result.created_at == date.value) {
                        date.classList.remove('hidden');
                        alert(
                            'Anda belum memasukan data penjualan BBM sebelumnya, silakan isi tanggal yang sesuai terlebih dahulu'
                        );
                        inputDate.setAttribute('required', 'true');
                    } else {
                        date.classList.add('hidden');
                    }
                }
            })
        });


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
