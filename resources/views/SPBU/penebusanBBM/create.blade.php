@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/penebusan-bbm" method="POST">
            @csrf
            <div>
                <label for="bbm_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Jenis BBM
                    </span>
                    <select name="bbm_id" id="bbm_id" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
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

                <label for="harga_beli" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Harga Beli BBM
                    </span>
                    <select name="harga_beli" id="harga_beli" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Harga Beli BBM</option>
                        @foreach ($bbms as $bbm)
                            @if (old('harga_beli') == $bbm->id)
                                <option value="{{ $bbm->harga_beli }}" selected>Rp.{{ $bbm->harga_beli }}
                                    ({{ $bbm->jenis_bbm }})
                                </option>
                            @else
                                <option value="{{ $bbm->harga_beli }}">Rp.{{ $bbm->harga_beli }} ({{ $bbm->jenis_bbm }})
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('harga_beli')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="tebusan_per_liter" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Jumlah Tebusan</span>
                    <input type="number" min="0" step="any" id="tebusan_per_liter" name="tebusan_per_liter"
                        required value="{{ old('tebusan_per_liter') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('tebusan_per_liter')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('tebusan_per_liter')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_tebusan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga Tebusan</span>
                    <input type="number" min="1000" step="any" id="harga_tebusan" name="harga_tebusan" required
                        value="{{ old('harga_tebusan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_tebusan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_tebusan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pph" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">PPH</span>
                    <input type="number" min="1000" step="any" id="pph" name="pph" required
                        value="{{ old('pph') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pph')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pph')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="tips_sopir" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Tips Sopir</span>
                    <input type="number" min="1000" step="any" id="tips_sopir" name="tips_sopir" required
                        value="{{ old('tips_sopir') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('tips_sopir')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('tips_sopir')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="total_tebusan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Total Biaya</span>
                    <input type="number" min="1000" step="any" id="total_tebusan" name="total_tebusan" required
                        value="{{ old('total_tebusan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('total_tebusan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('total_tebusan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>


                <button
                    class="mt-10 w-full px-3 py-3 bg-black text-white font-bold rounded shadow-md hover:bg-[#333333]">Tambah
                    Penebusan BBM</button>
            </div>
        </form>
    </div>

    <script>
        const hargaBeli = document.getElementById('harga_beli');
        const tebusan = document.getElementById('tebusan_per_liter');
        const hargaTebusan = document.getElementById('harga_tebusan');
        const jenis = document.getElementById('jenis_bbm');
        const biaya = document.getElementById('total_tebusan');
        const tipSopir = document.getElementById('tips_sopir');
        const pph = document.getElementById('pph');

        tebusan.addEventListener('change', () => {
            const total = parseInt(hargaBeli.value) * parseInt(tebusan.value);
            hargaTebusan.value = total;
        })

        tipSopir.addEventListener('change', () => {
            const total = parseInt(hargaTebusan.value) + parseInt(pph.value) + parseInt(tipSopir.value);
            biaya.value = total;
        })
    </script>
@endsection
