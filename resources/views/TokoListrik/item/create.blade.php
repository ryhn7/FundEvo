@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/kategori-item" method="POST">
            @csrf
            <div>
                <label for="kategori" class="block text-sm">
                    <span class="text-gray-700 font-semibold">Kategori</span>
                    <select name="kategori" id="kategori" required
                        class="block w-full mt-1 mb-2 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Kategori</option>
                        @foreach ($kategoris->sortBy('kategori') as $kategor)
                            @if (old('kategori') == $kategor->id)
                                <option value="{{ $kategor->id }}" selected>{{ $kategor->kategori}}</option>
                            @else
                                <option value="{{ $kategor->id }}">{{ $kategor->kategori}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kategori')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>
                <!-- <label for="kategori" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Kategori
                    </span>
                    <select name="kategori" id="kategori" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Kategori</option>
                        @foreach ($kategoris as $kategor)
                            @if (old('kategori') == $kategor->id)
                                <option value="{{ $kategor->id }}" selected>{{ $kategor->kategori}}</option>
                            @else
                                <option value="{{ $kategor->id }}">{{ $kategor->kategori}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kategori')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                    <a href="/kategori"><button class=" mt-3 px-2 py-1 rounded text-white bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 ...">
                    Tambah Kategori
                    </button></a>
                </label> -->

                
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
                    class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Tambah
                    Item</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        const kategor = document.getElementById('kategori');

            $('#kategori').select2(
                {
                    placeholder: 'Pilih Kategori',
                    allowClear: true,
                }
            );
        
        
    </script>
@endsection
