@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/kategori-item" method="POST">
            @csrf
            <div>
                <label for="kategori" class="block text-sm">
                    <span class="text-gray-700 font-semibold">Kategori</span>
                    <input type="text" id="kategori" name="kategori" required value="{{ old('kategori') }}" autofocus
                        class="block px-2 py-1 w-full mt-1 text-sm border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('kategori')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('kategori')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                    <a href="/kategori" class="text-sm text-blue-600 hover:text-blue-800">Tambah Kategori</a>
                </label>

                <label for="nama_item" class="block text-sm">
                    <span class="text-gray-700 font-semibold">Nama Item</span>
                    <input type="text" id="nama_item" name="nama_item" required value="{{ old('nama_item') }}" autofocus
                        class="block px-2 py-1 w-full mt-1 text-sm border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('nama_item')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('nama_item')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_beli" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga Beli</span>
                    <input type="number" min="1000" step="any" id="harga_beli" name="harga_beli" required
                        value="{{ old('harga_beli') }}"
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
                        value="{{ old('harga_jual') }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_jual')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_jual')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>


                <button
                    class="mt-10 w-full px-3 py-3 bg-black text-white font-bold rounded shadow-md hover:bg-[#333333]">Tambah
                    Item</button>
            </div>
        </form>
    </div>
@endsection
