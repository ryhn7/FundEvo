{{-- @dd($items[0]->kategori) --}}
@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/penjualan-item/{{$sell->id}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="kategori_item" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Kategori Item
                    </span>
                    <select name="kategori_item" id="kategori_item" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Kategori</option>
                        @foreach ($items as $item)
                            @if (old('kategori_item', $sell->item_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->kategori}}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->kategori}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="item_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">
                        Nama Item
                    </span>
                    <select name="item_id" id="item_id" required
                        class="block w-full mt-1 text-sm form-select px-2 py-1 border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow">
                        <option value="" class="font-semibold">Pilih Item</option>
                        @foreach ($items as $item)
                            @if (old('item_id', $sell->item_id) == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->nama_item}}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->nama_item}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('nama_id')
                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_awal" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Awal</span>
                    <input type="number" min="1000" step="any" id="stock_awal" name="stock_awal" required
                        value="{{ old('stock_awal', $sell->stock_awal) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_awal')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_awal')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penerimaan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penerimaan</span>
                    <input type="number" min="1000" step="any" id="penerimaan" name="penerimaan"
                        value="{{ old('penerimaan', $sell->penerimaan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penerimaan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penerimaan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="penjualan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Penjualan</span>
                    <input type="number" min="0" step="any" id="penjualan" name="penjualan"
                        value="{{ old('penjualan', $sell->penjualan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('penjualan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('penjualan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="stock_akhir" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Stock Akhir</span>
                    <input type="number" min="1000" step="any" id="stock_adm" name="stock_akhir" required
                        value="{{ old('stock_akhir', $sell->stock_akhir) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('stock_akhir')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('stock_akhir')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pendapatan" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Pendapatan</span>
                    <input type="number" min="1000" step="any" id="pendapatan" name="pendapatan" required
                        value="{{ old('pendapatan', $sell->pendapatan) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pendapatan')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pendapatan')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-black text-white font-bold rounded shadow-md hover:bg-[#333333]">Edit
                    Penjualan</button>
            </div>
        </form>
    </div>
@endsection
