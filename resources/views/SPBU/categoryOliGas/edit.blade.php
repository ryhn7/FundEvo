@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/KategoriOliGas/{{ $oligas->id }}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="oli_gas_static_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Jenis
                    </span>
                    <select name="oli_gas_static_id" id="oli_gas_static_id" required
                        class="block w-full mt-1 text-sm px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Jenis</option>
                        @foreach ($oligases as $key)
                            @if (old('oli_gas_static_id', $oligas->oli_gas_static_id) == $key->id)
                                <option value="{{ $key->id }}" selected>{{ $key->jenis }}</option>
                            @else
                                <option value="{{ $key->id }}">{{ $key->jenis }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('oli_gas_static_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="nama" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Nama</span>
                    <input type="text" id="nama" name="nama" required value="{{ old('nama', $oligas->nama) }}"
                        autofocus
                        class="block px-2 py-1 w-full mt-1 text-sm border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('nama')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('nama')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_beli" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Satuan Harga Beli</span>
                    <input type="number" min="1000" step="any" id="harga_beli" name="harga_beli" required
                        value="{{ old('harga_beli', $oligas->harga_beli) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_beli')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_beli')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="harga_jual" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Satuan Harga Jual</span>
                    <input type="number" min="1000" step="any" id="harga_jual" name="harga_jual" required
                        value="{{ old('harga_jual', $oligas->harga_jual) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_jual')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_jual')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Edit
                </button>
            </div>
        </form>
    </div>
@endsection
