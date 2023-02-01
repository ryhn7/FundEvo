@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/penjualan-bbm" method="POST">
            @csrf
            <div>
                <label for="bbm_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Jenis Tebusan BBM <span class="text-xxs text-green-500">√ Opsional</span>
                    </span>
                    <select name="bbm_id" id="bbm_id"
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Jenis Tebusan BBM</option>
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

                <label for="harga_penebusan_bbm" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga Penebusan <span class="text-xxs text-green-500">√
                            Opsional</span></span>
                    <input type="number" min="0" step="any" id="harga_penebusan_bbm" name="harga_penebusan_bbm"
                        value="{{ old('harga_penebusan_bbm') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_penebusan_bbm')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_penebusan_bbm')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pph" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">PPH <span class="text-xxs text-green-500">√
                            Opsional</span></span>
                    <input type="number" min="0" step="any" id="pph" name="pph"
                        value="{{ old('pph') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pph')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pph')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="tips_sopir" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Tips Sopir <span class="text-xxs text-green-500">√
                            Opsional</span></span>
                    <input type="number" min="0" step="any" id="tips_sopir" name="tips_sopir"
                        value="{{ old('tips_sopir') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('tips_sopir')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('tips_sopir')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="oli" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Oli <span class="text-xxs text-green-500">√
                            Opsional</span></span>
                    <input type="number" min="0" step="any" id="oli" name="oli"
                        value="{{ old('oli') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('oli')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('oli')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="gas" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Gas <span class="text-xxs text-green-500">√
                            Opsional</span></span>
                    <input type="number" min="0" step="any" id="gas" name="gas"
                        value="{{ old('gas') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('gas')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('gas')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                @if (now()->format('d') == 3)
                    <label for="gaji_supervisor" class="block mt-4 text-sm">
                        <span class="text-gray-700 font-semibold">Gaji Supervisor</span>
                        <input type="number" min="0" step="any" id="gaji_supervisor" name="gaji_supervisor"
                            value="{{ old('gaji_supervisor') }}"
                            class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('gaji_supervisor')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                        @error('gaji_supervisor')
                            <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                        @enderror
                    </label>
                @endif

                {{-- show label if today is 1st day of month --}}
                @if (now()->format('d') == 1)
                    <label for="gaji_karyawan" class="block mt-4 text-sm">
                        <span class="text-gray-700 font-semibold">Gaji Karyawan</span>
                        <input type="number" min="0" step="any" id="gaji_karyawan" name="gaji_karyawan"
                            value="{{ old('gaji_karyawan') }}"
                            class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('gaji_karyawan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                        @error('gaji_karyawan')
                            <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                        @enderror
                    </label>
                @endif

                @if (now()->format('d') == 1)
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
                @endif

                @if (now()->format('d') == 15)
                    <label for="pln" class="block mt-4 text-sm">
                        <span class="text-gray-700 font-semibold">PLN</span>
                        <input type="number" min="0" step="any" id="pln" name="pln"
                            value="{{ old('pln') }}"
                            class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pln')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                        @error('pln')
                            <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                        @enderror
                    </label>
                @endif

                @if (now()->format('d') == 15)
                    <label for="pdam" class="block mt-4 text-sm">
                        <span class="text-gray-700 font-semibold">PDAM</span>
                        <input type="number" min="0" step="any" id="pdam" name="pdam"
                            value="{{ old('pdam') }}"
                            class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pdam')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                        @error('pdam')
                            <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                        @enderror
                    </label>
                @endif

                @if (now()->format('d') == 3)
                    <label for="iuran_rt" class="block mt-4 text-sm">
                        <span class="text-gray-700 font-semibold">Iuran RT</span>
                        <input type="number" min="0" step="any" id="iuran_rt" name="iuran_rt"
                            value="{{ old('iuran_rt') }}"
                            class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('iuran_rt')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                        @error('iuran_rt')
                            <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                        @enderror
                    </label>
                @endif

                @if (now()->format('d') == 15)
                    <label for="pbb" class="block mt-4 text-sm">
                        <span class="text-gray-700 font-semibold">PBB</span>
                        <input type="number" min="0" step="any" id="pbb" name="pbb"
                            value="{{ old('pbb') }}"
                            class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pbb')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                        @error('pbb')
                            <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                        @enderror
                    </label>
                @endif

                <label for="biaya_lain" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Biaya lain-lain <span class="text-xxs text-green-500">√
                            Opsional</span></span>
                    <input type="number" min="0" step="any" id="biaya_lain" name="biaya_lain"
                        value="{{ old('biaya_lain') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('biaya_lain')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('biaya_lain')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="keterangan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Keterangan</span>
                    <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('keterangan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('keterangan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

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
                    Pengeluaran</button>
            </div>
        </form>
    </div>
@endsection

