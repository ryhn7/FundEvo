@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/pengeluaran-ops-listrik" method="POST">
            @csrf
            <div>
                <label for="biaya_kulakan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Biaya Kulakan</span>
                    <input type="number" min="0" step="any" id="biaya_kulakan" name="biaya_kulakan" required
                        value="{{ old('biaya_kulakan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('biaya_kulakan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('biaya_kulakan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="gaji_karyawan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Gaji Karyawan</span>
                    <input type="number" min="0" step="any" id="gaji_karyawan" name="gaji_karyawan" required
                        value="{{ old('gaji_karyawan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('gaji_karyawan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('gaji_karyawan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="reward_karyawan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Reward Karyawan</span>
                    <input type="number" min="0" step="any" id="reward_karyawan" name="reward_karyawan"
                        value="{{ old('reward_karyawan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('reward_karyawan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('reward_karyawan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pbb" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">PBB</span>
                    <input type="number" min="0" step="any" id="pbb" name="pbb" required
                        value="{{ old('pbb') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pbb')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pbb')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="biaya_lain" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Biaya Lainya</span>
                    <input type="number" min="0" step="any" id="biaya_lain" name="biaya_lain" required
                        value="{{ old('biaya_lain') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('biaya_lain')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('biaya_lain')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <div class="mt-4">
                    <label for="keterangan" class="block text-sm">
                        <span class="text-gray-700 font-semibold">Keterangan</span>
                        <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan') }}">
                        <trix-editor input="keterangan"></trix-editor>
                        @error('keterangan')
                            <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                <label for="nota" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Nota</span>
                    <input type="text" id="nota" name="nota" value="{{ old('nota') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('nota')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('nota')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-black text-white font-bold rounded shadow-md hover:bg-[#333333]">Tambah
                    Pengeluaran Operasional</button>
            </div>
        </form>
    </div>
@endsection
