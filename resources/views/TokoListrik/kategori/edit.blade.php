@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/kategori/{{$KategoriItem->id}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="kategori" class="block text-sm">
                    <span class="text-gray-700 font-semibold">Kategori</span>
                    <input type="text" id="kategori" name="kategori" required value="{{ old('kategori', $KategoriItem->kategori) }}" autofocus
                        class="block px-2 py-1 w-full mt-1 text-sm border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('kategori')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('kategori')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>


                <button
                    class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Edit
                    Kategori</button>
            </div>
        </form>
    </div>
@endsection
