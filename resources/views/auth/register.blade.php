<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" href="https://www.polytecsousse.tn/wp-content/uploads/2020/09/logo-polytechnique-blanc.png">
    <title>Register</title>
</head>
<body>
    {{-- class="h-screen mx-auto sm:w-full md:w-1/2 " --}}
    <div class="absolute">
        <img class="w-full h-full" src="{{ asset('images/purple.jpeg') }}" cover="resize" />
    </div>
<div class=" lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 mx-auto ">

    <div class="mx-auto md:w-1/2 lg:w-1/2 sm:w-ful h-1/2 relative pt-10 ">
        <p class="text-center relative xl:text-3xl md:text-2xl text-2xl mx-auto border-4 border-fuchsia p-1 px-2 text-fuchsia rounded-tr-3xl w-3/5 ">PolyClub</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="w-5/6 relative border-gray-400 border mt-20 mb-5 mx-auto">
                <i class="fas fa-user absolute text-fuchsia px-1 pt-1 pb-3 border-r h-full border-gray-400"></i>
                <input class="w-full h-full pl-7 focus:outline-none " placeholder="name" name="name" id="name" autofocus required :value="old('name')"/>
            </div>
            <div class="w-5/6 relative border-gray-400 border mx-auto">
                <i class="fas fa-user absolute text-fuchsia px-1 pt-1 pb-3 border-r h-full border-gray-400"></i>
                <input class="w-full h-full pl-7 focus:outline-none " placeholder="email" name="email" id="email" required :value="old('email')"/>
            </div>
            <div class="relative w-5/6 form-group mb-5 mx-auto" >
                <label for="role_id">Select your Role</label>
                <select id="role_id" name="role_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required style="box-shadow: none !important">
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                </select>
              </div>
            <div class="w-5/6 relative border-gray-400 border  mx-auto">
                <i class="fas fa-lock absolute text-fuchsia px-1 pt-1 pb-3 border-r h-full border-gray-400"></i>
                <input type="password" class="w-full h-full pl-7 focus:outline-none pt-0 pb-1 border-0" style="box-shadow: none !important" placeholder="password" name="password" id="password" required autocomplete="new-password"/>
            </div>
            <div class="w-5/6 relative border-gray-400 border mx-auto mt-5">
                <i class="fas fa-lock absolute text-fuchsia px-1 pt-1 pb-3 border-r h-full border-gray-400"></i>
                <input type="password" class="w-full h-full pl-7 focus:outline-none pt-0 pb-1 border-0" style="box-shadow: none !important" placeholder="password_confirmation" name="password_confirmation" id="password_confirmation" required />
            </div>
            <div class="mt-5 relative w-5/6 mx-auto">
                <a class=" text-sm text-white hover:text-fuchsia" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

        <div class="relative w-1/2 mx-auto m-10">
            <button type="submit" class="w-full text-white bg-fuchsia rounded-sm py-1">SignUp</button>
        </div>

        <x-auth-session-status class="relative mb-4" :status="session('status')" />
        <x-auth-validation-errors class="relative mb-4" :errors="$errors" />
        </form>
    </div></div>
</body>
</html>

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="form-group mt-4">
                <label for="role_id">Select your Role</label>
                <select id="role_id" name="role_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required>
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                </select>
              </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
