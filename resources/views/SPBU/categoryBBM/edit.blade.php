@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/KategoriBBM/{{ $bbm->id }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="jenis_bbm" class="block text-sm">
                    <span class="text-gray-700 font-semibold">Jenis BBM</span>
                    <input type="text" id="jenis_bbm" name="jenis_bbm" required
                        value="{{ old('jenis_bbm', $bbm->jenis_bbm) }}" autofocus
                        class="block px-2 py-1 w-full mt-1 text-sm border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('jenis_bbm')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('jenis_bbm')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_beli" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga Beli</span>
                    <input type="number" min="1000" step="any" id="harga_beli" name="harga_beli" required
                        value="{{ old('harga_beli', $bbm->harga_beli) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_beli')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_beli')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_jual" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga Jual</span>
                    <input type="number" min="1000" step="any" id="harga_jual" name="harga_jual" required
                        value="{{ old('harga_jual', $bbm->harga_jual) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_jual')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_jual')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>


                <button
                    class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Edit
                    BBM</button>
            </div>
        </form>
    </div>
@endsection
