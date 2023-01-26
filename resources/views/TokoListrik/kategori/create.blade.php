@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/kategori" method="POST">
            @csrf
            <div>
                <label for="kategori" class="block text-sm">
                    <span class="text-gray-700 font-semibold">Nama Kategori</span>
                    <input type="text" id="kategori" name="kategori" required value="{{ old('kategori') }}" autofocus
                        class="block px-2 py-1 w-full mt-1 text-sm border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('kategori')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('kategori')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-black text-white font-bold rounded shadow-md hover:bg-[#333333]">Tambah
                    Kategori</button>
            </div>
        </form>
    </div>
@endsection
