<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Login</title>
</head>
<body>
    <div class="absolute">
        <img class="w-full h-full   " src="{{ asset('images/purple.jpeg') }}" cover="resize" />
    </div>
<div class=" lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 mx-auto ">

    <div class="mx-auto md:w-1/2 lg:w-1/2 sm:w-full h-1/2 relative pt-10 ">
        <p class="text-center relative xl:text-3xl md:text-2xl text-2xl mx-auto border-4 border-fuchsia p-1 px-2 text-fuchsia rounded-tr-3xl w-3/5 ">PolyClub</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="w-5/6 relative border-gray-400 border mt-20 mb-5 mx-auto ">
                <i class="fas fa-user absolute text-fuchsia px-1 pt-1 pb-3 border-r h-full border-gray-400"></i>
                <input class="w-full h-full pl-7 focus:outline-none pt-0 pb-1 border-0" placeholder="email" name="email" id="email" autofocus required :value="old('email')" style="box-shadow: none !important"/>
            </div>
            <div class="w-5/6 relative border-gray-400 border mx-auto">
                <i class="fas fa-lock absolute text-fuchsia px-1 pt-1 pb-3 border-r h-full border-gray-400"></i>
                <input type="password" class="w-full h-full pl-7 focus:outline-none pt-0 pb-1 border-0" style="box-shadow: none !important" placeholder="password" name="password" id="password" required autocomplete="current-password"/>
            </div>
            <div class="mt-5 relative w-5/6 mx-auto">
                <a class=" text-sm text-white hover:text-fuchsia" href="{{ route('register') }}">
                    {{ __('You dont have an Account yet?') }}
                </a>
            </div>
        <div class=" w-1/2 mx-auto m-10 relative">
            <button type="submit" class="w-full text-white bg-fuchsia rounded-sm py-1">LogIn</button>
        </div>
        <x-auth-session-status class="mb-4 relative" :status="session('status')" />
        <x-auth-validation-errors class="mb-4 relative" :errors="$errors" />
        </form>
    </div>
</div>
</body>
</html>




{{--
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
