@extends('layouts.main')

@section('login')
    <div class="jaya"></div>
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="hidden md:block w-1/2 py-10 px-10 polygon">
                    <div class="z-10">
                        <img src="{{ asset('assets/img/shapes/logo.png') }}" alt="logo" width="300px">
                    </div>

                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-left mb-10">
                        <h1 class="font-bold text-4xl text-gray-900 mb-3">Login</h1>
                        <p class="text-gray-600">Silakan masukan kredensial Anda</p>
                    </div>
                    {{-- <div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">First name</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="John">
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Last name</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Smith">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                <input type="email" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="johnsmith@example.com">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Password</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input type="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <button class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">REGISTER NOW</button>
                        </div>
                    </div>
                </div> --}}

                    <div>
                        <form action="/login" method="POST">
                            @csrf
                            <div>
                                <div class="flex flex-col">
                                    <input type="email" name="email" id="email" autofocus required
                                        value="{{ old('email') }}" placeholder="Email"
                                        class=" text-sm leading-5.6 ease-soft block w-full appearance-none rounded-full border bg-[#f1f1f1] bg-clip-padding px-3 py-3 font-normal text-black outline-none transition-all placeholder:text-gray-700 pl-5  focus:border-[#00b7dd] focus:outline-none">
                                    @error('email')
                                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col mt-5">
                                    <input type="password" name="password" id="password" autofocus required
                                        value="{{ old('password') }}" placeholder="Password"
                                        class=" text-sm leading-5.6 ease-soft block w-full appearance-none rounded-full border bg-[#f1f1f1] bg-clip-padding px-3 py-3 font-normal text-black outline-none transition-all placeholder:text-gray-700 pl-5  focus:border-[#00b7dd] focus:outline-none">
                                    @error('password')
                                        <p class="text-xs mt-1 text-red-700 font-franklin">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="button"
                                    class="mt-5 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-full cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-red-500 to-yellow-400 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
