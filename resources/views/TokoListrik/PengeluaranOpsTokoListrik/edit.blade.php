{{-- @dd($opss[0]->kategori) --}}
@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/pengeluaran-ops-listrik/{{$spend->id}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="biaya_kulakan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Biaya Kulakan</span>
                    <input type="number" min="1000" step="any" id="biaya_kulakan" name="biaya_kulakan" required
                        value="{{ old('biaya_kulakan', $spend->biaya_kulakan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('biaya_kulakan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('biaya_kulakan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="gaji_supervisor" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Gaji Supervisor</span>
                    <input type="number" min="1000" step="any" id="gaji_supervisor" name="gaji_supervisor" required
                        value="{{ old('gaji_supervisor', $spend->gaji_supervisor) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('gaji_supervisor')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('gaji_supervisor')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="gaji_karyawan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Gaji Karyawan</span>
                    <input type="number" min="1000" step="any" id="gaji_karyawan" name="gaji_karyawan" required
                        value="{{ old('gaji_karyawan', $spend->gaji_karyawan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('gaji_karyawan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('gaji_karyawan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="reward_karyawan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Reward Karyawan</span>
                    <input type="number" min="1000" step="any" id="reward_karyawan" name="reward_karyawan"
                        value="{{ old('reward_karyawan', $spend->reward_karyawan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('reward_karyawan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('reward_karyawan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pln" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">PLN</span>
                    <input type="number" min="0" step="any" id="pln" name="pln"
                        value="{{ old('pln', $spend->pln) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pln')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pln')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pdam" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">PDAM</span>
                    <input type="number" min="1000" step="any" id="stock_adm" name="pdam" required
                        value="{{ old('pdam', $spend->pdam) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pdam')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pdam')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pbb" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">PBB</span>
                    <input type="number" min="1000" step="any" id="pbb" name="pbb" required
                        value="{{ old('pbb', $spend->pbb) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pbb')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pbb')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="biaya_lain" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Biaya Lainya</span>
                    <input type="number" min="1000" step="any" id="biaya_lain" name="biaya_lain" required
                        value="{{ old('biaya_lain', $spend->biaya_lain) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('biaya_lain')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('biaya_lain')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-black text-white font-bold rounded shadow-md hover:bg-[#333333]">Edit Pengeluaran Operasional</button>
            </div>
        </form>
    </div>
@endsection
