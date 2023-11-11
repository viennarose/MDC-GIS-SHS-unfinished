@extends('normal-view.layout.base')

@include('normal-view.layout.navbar')

@section('title')
    Login
@endsection

@section('content')
    <div
        class="container mx-auto rounded-lg md:flex md:flex-col md:items-center md:justify-center md:w-[600px]">
        <div class="flex items-center md:mb-8">

            <div class="text-center">
                <p class="text-2xl md:text-2xl font-semibold text-dark">
                    <strong class="font-extrabold text-2xl md:text-6xl"
                        style="color: black; -webkit-text-stroke: 2px rgb(255, 255, 255);"></strong>
                </p>
            </div>
        </div>

        <p class="text-black text-xl md:text-2xl font-serif mb-4">
            <strong>Guidance Information System</strong>
        </p>
        <div class="w-full md:w-[400px] bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p class="text-dark text-center text-xl font-bold">
                LOGIN
            </p>
            <div>
                <br />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4 relative">
                        <label for="id_number" class="block text-dark font-bold mb-2">ID Number</label>
                        <div class="flex items-center">
                            <input type="text" id="id_number" placeholder="ID Number" name="id_number"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                required autocomplete="id_number" autofocus />
                            <i class="fas fa-key text-gray-400 absolute right-4 top-1/10 transform -translate-y-1/10"></i>
                        </div>
                        @error('id_number')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6 relative">
                        <label for="password" class="block text-dark font-bold mb-2">Password</label>
                        <div class="flex items-center">
                            <input type="password" name="password" id="password" placeholder="Password" required autofocus
                                autocomplete="current-password"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500" />
                            <i class="fas fa-lock text-gray-400 absolute right-4 top-1/10 transform -translate-y-1/10"></i>
                        </div>
                        @error('password')
                            <div class="text-sm text-red-500 italic">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-dark mr-2">
                            <input type="checkbox" class="mr-1" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }} />
                            <span class="text-2xs">Remember Me</span>
                        </label>
                    </div>
                    <div class="flex flex-col items-center mt-5">
                        <button
                            class="bg-sky-500 w-full hover:bg-sky-600 text-white font-bold py-3 px-10 focus:outline-none focus:shadow-outline mb-4"
                            type="submit" style="border-radius: 20px;">
                            Login
                        </button>
                        <div class="items-center md:flex md:justify-center">
                            <a href="#" class="text-blue-500 md:ml-4">Forgot Password</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
