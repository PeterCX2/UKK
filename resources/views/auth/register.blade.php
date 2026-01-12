@extends('layouts.app')
@section('title', 'Register')
@section('subtitle', 'Create your account')
@section('content')
    <div class="w-full flex justify-center">
        <div class="w-full max-w-md border-2 p-6 rounded-[20px] bg-white shadow-md h-150">
            <h2 class="font-heading text-4xl font-extrabold text-study-primary mb-8 text-center">Register</h2>
            <hr class="border-gray-300 my-6">

            <form class="space-y-6" method="post" action="{{ route('register') }}">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl focus:border-study-primary focus:ring-1 focus:ring-study-primary transition duration-150" placeholder="Your name" required value="{{ old('name') }}"/>
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" name="email" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl focus:border-study-primary focus:ring-1 focus:ring-study-primary transition duration-150" placeholder="email@example.com" required value="{{ old('email') }}"/>
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" name="password" class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl focus:border-study-primary focus:ring-1 focus:ring-study-primary transition duration-150" placeholder="••••••••" required/>
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3 rounded-xl bg-study-primary text-black font-bold text-lg hover:bg-study-secondary transition duration-300 shadow-md">
                Register
            </button>

            </form>

            <p class="mt-8 text-center text-base text-gray-600">
                Sudah punya akun?
                <a href="/login" class="text-study-primary font-bold hover:text-study-secondary hover:underline transition duration-150">Login</a>
            </p>
        </div>
    </div>
@endsection
