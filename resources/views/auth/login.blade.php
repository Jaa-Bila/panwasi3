@extends('layouts.guest')

@section('content')
    <!-- component -->
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-amber-300 to-amber-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-center text-2xl font-semibold">PANWASI</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="py-6 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="relative">
                                    <input autocomplete="off" id="email" name="email" type="text"
                                        class="peer rounded placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-amber-600 @error('email') is-invalid @enderror"
                                        placeholder="Email address" />
                                    <label for="email"
                                        class="absolute left-0 px-2 -top-6 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-1.5 transition-all peer-focus:-top-6 peer-focus:-left-2 peer-focus:text-gray-600 peer-focus:text-sm">User</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="password" name="password" type="password"
                                        class="peer rounded placeholder-transparent mt-2 h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-amber-600 @error('password') is-invalid @enderror"
                                        placeholder="Password" />
                                    <label for="password"
                                        class="absolute mt-2 left-0 px-2 -top-6 text-gray-600 text-xs peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-1.5 transition-all peer-focus:-top-6 peer-focus:-left-2 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="divide-y divide-gray-200">
                                <div
                                    class="py-4 text-base text-center leading-6 space-y-6 text-gray-700 sm:text-sm sm:leading-7">
                                    <div class="relative">
                                        <button
                                            class="transition duration-75 hover:bg-cyan-300 bg-blue-500 w-20 text-white rounded-md px-2 py-1">LOGIN</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
