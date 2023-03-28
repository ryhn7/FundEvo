@extends('layouts.main')

@section('container')
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <form action="/PengeluaranOperasionalSPBU/{{ $spend->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div>
                <label for="harga_penebusan_bbm" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Harga Penebusan <span
                            class="text-[10px] text-[#42dc7a] tracking-wider">(Optional)</span></span>
                    <input type="number" min="0" step="any" id="harga_penebusan_bbm" name="harga_penebusan_bbm"
                        value="{{ old('harga_penebusan_bbm', $spend->harga_penebusan_bbm) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('harga_penebusan_bbm')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('harga_penebusan_bbm')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pph" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">PPH <span
                            class="text-[10px] text-[#42dc7a] tracking-wider">(Optional)</span></span>
                    <input type="number" min="0" step="any" id="pph" name="pph"
                        value="{{ old('pph', $spend->pph) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pph')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pph')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="tips_sopir" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Tips Sopir <span
                            class="text-[10px] text-[#42dc7a] tracking-wider">(Optional)</span></span>
                    <input type="number" min="0" step="any" id="tips_sopir" name="tips_sopir"
                        value="{{ old('tips_sopir', $spend->tips_sopir) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('tips_sopir')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('tips_sopir')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="oli" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Oli <span
                            class="text-[10px] text-[#42dc7a] tracking-wider">(Optional)</span></span>
                    <input type="number" min="0" step="any" id="oli" name="oli"
                        value="{{ old('oli', $spend->oli) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('oli')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('oli')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="gas" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Gas <span
                            class="text-[10px] text-[#42dc7a] tracking-wider">(Optional)</span></span>
                    <input type="number" min="0" step="any" id="gas" name="gas"
                        value="{{ old('gas', $spend->gas) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('gas')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('gas')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="gaji_supervisor" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Gaji Supervisor</span>
                    <input type="number" min="0" step="any" id="gaji_supervisor" name="gaji_supervisor"
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
                    <input type="number" min="0" step="any" id="gaji_karyawan" name="gaji_karyawan"
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
                    <input type="number" min="0" step="any" id="reward_karyawan" name="reward_karyawan"
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
                    <input type="number" min="0" step="any" id="pdam" name="pdam"
                        value="{{ old('pdam', $spend->pdam) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pdam')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pdam')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="iuran_rt" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Iuran RT</span>
                    <input type="number" min="0" step="any" id="iuran_rt" name="iuran_rt"
                        value="{{ old('iuran_rt', $spend->iuran_rt) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('iuran_rt')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('iuran_rt')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="pbb" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">PBB</span>
                    <input type="number" min="0" step="any" id="pbb" name="pbb"
                        value="{{ old('pbb', $spend->pbb) }}"
                        class="block px-2 py-1 w-full mt-1 text-sm border border border-gray-500 rounded focus:border-sky-800 focus:outline-none focus:shadow-sm focus:shadow-[#2c3e50] focus:transition-shadow @error('pbb')
                    border-red-600 focus:border-red-600 focus:ring-red-600
                    @enderror" />
                    @error('pbb')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <label for="biaya_lain" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Biaya lain-lain <span
                            class="text-[10px] text-[#42dc7a] tracking-wider">(Optional)</span></span>
                    <input type="number" min="0" step="any" id="biaya_lain" name="biaya_lain"
                        value="{{ old('biaya_lain', $spend->biaya_lain) }}"
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
                        <input id="keterangan" type="hidden" name="keterangan"
                            value="{{ old('keterangan', $spend->keterangan) }}">
                        <trix-editor input="keterangan"></trix-editor>
                        @error('keterangan')
                            <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                        @enderror
                    </label>
                </div>

                <label for="nota" class="block mt-4 text-sm">
                    <span class="text-gray-700 font-semibold">Nota</span>

                    @if ($spend->nota == null)
                        <img id="preview" class="hidden sm:flex-row flex-col min-w-0 my-7 mx-auto rounded shadow-md"
                            width="200px">
                    @else
                        <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6 mb-5">
                            @foreach ($spend->nota as $nota)
                                <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                    style="padding-top: 100%;">
                                    <input type="hidden" name="oldImage[]" multiple value="{{ $nota }}">
                                    @if ($nota)
                                        <img src="{{ asset('storage/nota/' . $nota) }}" alt="preview" id="preview"
                                            class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview" />
                                    @else
                                        <img id="preview"
                                            class="hidden sm:flex-row flex-col min-w-0 my-7 mx-auto rounded shadow-md"
                                            width="200px">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div x-data="dataFileDnD()"
                        class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                        <div x-ref="dnd"
                            class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                            <input id="nota" name="nota[]" accept="image/*" type="file" multiple
                                onchange="imgPreview()"
                                class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer @error('nota')
                                border-red-600 focus:border-red-600 focus:ring-red-600
                                @enderror"
                                @change="addFiles($event)"
                                @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                title="" />

                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="m-0">Drag your files here or click in this area.</p>
                            </div>
                        </div>

                        <template x-if="files.length > 0">
                            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)"
                                @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                <template x-for="(_, index) in Array.from({ length: files.length })">
                                    <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                        style="padding-top: 100%;" @dragstart="dragstart($event)"
                                        @dragend="fileDragging = null"
                                        :class="{ 'border-blue-600': fileDragging == index }" draggable="true"
                                        :data-index="index">
                                        <button
                                            class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                            type="button" @click="remove(index)">
                                            <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                        <template
                                            x-if="files[index].type.includes('application/') || files[index].type === ''">
                                            <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </template>
                                        <template x-if="files[index].type.includes('image/')">
                                            <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                x-bind:src="loadFile(files[index])" />
                                        </template>

                                        <div
                                            class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                            <span class="w-full font-bold text-gray-900 truncate"
                                                x-text="files[index].name">Loading</span>
                                            <span class="text-xs text-gray-900"
                                                x-text="humanFileSize(files[index].size)">...</span>
                                        </div>

                                        <div class="absolute inset-0 z-40 transition-colors duration-300"
                                            @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                                            :class="{
                                                'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging !=
                                                    index
                                            }">
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                    @error('nota')
                        <p class="text-xs mt-1 text-red-700">{{ $message }}</p>
                    @enderror
                </label>

                <button
                    class="mt-10 w-full px-3 py-3 bg-orange-500 text-white font-bold uppercase transition-all bg-transparent rounded cursor-pointer leading-pro ease-soft-in shadow-soft-md hover:bg-yellow-500 hover:shadow-soft-xs active:opacity-85 hover:scale-[1.005] tracking-tight-soft bg-x-25">Edit
                    Pengeluaran</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/create-file-list"></script>
    <script src="{{ asset('assets/js/dropzoneConfig.js') }}"></script>
@endsection
