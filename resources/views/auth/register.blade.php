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
<body class="overflow-hidden">
    <svg class="absolute " xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 1000'><rect fill='#330055' width='100' height='1000'/><g fill-opacity='0'><circle fill='#330055' cx='50' cy='0' r='50'/><g fill='#39005e' ><circle cx='0' cy='50' r='50'/><circle cx='100' cy='50' r='50'/></g><circle fill='#400066' cx='50' cy='100' r='50'/><g fill='#47006f' ><circle cx='0' cy='150' r='50'/><circle cx='100' cy='150' r='50'/></g><circle fill='#4e0077' cx='50' cy='200' r='50'/><g fill='#550080' ><circle cx='0' cy='250' r='50'/><circle cx='100' cy='250' r='50'/></g><circle fill='#5c0088' cx='50' cy='300' r='50'/><g fill='#640091' ><circle cx='0' cy='350' r='50'/><circle cx='100' cy='350' r='50'/></g><circle fill='#6c0099' cx='50' cy='400' r='50'/><g fill='#7400a2' ><circle cx='0' cy='450' r='50'/><circle cx='100' cy='450' r='50'/></g><circle fill='#7d00aa' cx='50' cy='500' r='50'/><g fill='#8500b3' ><circle cx='0' cy='550' r='50'/><circle cx='100' cy='550' r='50'/></g><circle fill='#8e00bb' cx='50' cy='600' r='50'/><g fill='#9700c4' ><circle cx='0' cy='650' r='50'/><circle cx='100' cy='650' r='50'/></g><circle fill='#a000cc' cx='50' cy='700' r='50'/><g fill='#aa00d4' ><circle cx='0' cy='750' r='50'/><circle cx='100' cy='750' r='50'/></g><circle fill='#b400dd' cx='50' cy='800' r='50'/><g fill='#be00e6' ><circle cx='0' cy='850' r='50'/><circle cx='100' cy='850' r='50'/></g><circle fill='#c800ee' cx='50' cy='900' r='50'/><g fill='#d200f7' ><circle cx='0' cy='950' r='50'/><circle cx='100' cy='950' r='50'/></g><circle fill='#D0F' cx='50' cy='1000' r='50'/></g></svg>
<div class="w-10/12 md:w-1/2 lg:w-1/3 sm:w-5/6 md:px-0 mx-auto relative pt-10">
    <div class="bg-black absolute w-full h-full opacity-10 " style="box-shadow: 10px 5px 5px #FFF"></div>
    <div class="pt-10 relative mx-auto">
        <p class="text-center relative xl:text-3xl md:text-2xl text-2xl mx-auto border-4 border-fuchsia p-1 px-2 text-fuchsia rounded-tr-3xl w-3/5 ">PolyClub</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="w-5/6 relative border-gray-400 border mt-20 mb-5 mx-auto">
                <i class="fas fa-user absolute text-fuchsia px-1 pt-1 pb-3 border-r h-full border-gray-400"></i>
                <input class="w-full h-full pl-7 focus:outline-none " placeholder="name" name="name" id="name" autofocus required :value="old('name')"/>
            </div>
            <div class="w-5/6 relative border-gray-400 border mb-5 mx-auto">
                <i class="fas fa-user absolute text-fuchsia px-1 pt-1 pb-3 border-r h-full border-gray-400"></i>
                <input class="w-full h-full pl-7 focus:outline-none " placeholder="email" name="email" id="email" required :value="old('email')"/>
            </div>
            <div class="relative w-5/6 form-group mb-5 mx-auto" >
                <label for="role_id" class="text-white">Select your Role (We are Showing this in Purpose so Visitors can test our Dashboard)</label>
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
                <a class=" text-sm text-white hover:text-indigo" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        <div class="relative w-1/2 mx-auto m-5">
            <button type="submit" class="w-full text-white bg-fuchsia rounded-sm py-1 mb-5">SignUp</button>
        </div>
        <x-auth-session-status class="relative mb-4" :status="session('status')" />
        <x-auth-validation-errors class="relative mb-4" :errors="$errors" />
        </form>
</body>
</html>
