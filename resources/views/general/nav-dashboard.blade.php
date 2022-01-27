<nav class="navbar navbar-expand-lg  border-b-2 border-purple bg-pink justify-between" >
    <a href="/"><img resize="cover" class="w-14 " src="https://www.polytecsousse.tn/wp-content/uploads/2020/09/logo-polytechnique-blanc.png"/></a>
    <div style='position: relative;top:4px' class="flex-row"><!-- height:50px;-->
            <button class="navbar-toggler focus:outline-none "  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "><i class="fas fa-bars text-purple"></i></span>
            </button>
            <div class="collapse navbar-collapse w-full " id="navbarSupportedContent">
        {{-- <a class="nav-link text-purple" data-widget="pushmenu" href="#" role="button"><i class="fas fa-expand-alt"></i></a> --}}

{{--  --}}
            <ul class="navbar-nav mr-auto " >
                <div class="mr-8">
                    <x-custom.nav-links text="Poly Clubs" direct="/"/>
                </div>
                <x-custom.nav-links text="Clubs" direct="/show-clubs"/>
                <x-custom.nav-links text="Events" direct="/show-events"/>
                @if (Auth::user())
                    <x-custom.nav-links text="My Clubs" direct="/show-follows"/>
                @endif
                @if (Auth::user())
                <x-custom.nav-links text="Add Event" direct="/add-event"/>
                @if (Auth::user()->hasRole('admin'))
                    <x-custom.nav-links text="Dashboard" direct="/dashboard/users-dashboard"/>
                @endif
                @endif
            </ul>
        </div>
    </div>
    <div class="flex ">
            @if (Auth::user())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
    {{-- <x-custom.button :href="route('logout')"
    onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
    </x-custom.button> --}}
    <div class="flex">
        <a class="nav-link text-purple" data-widget="pushmenu" href="#" role="button"><i class="fas fa-expand-alt"></i></a>

        <x-responsive-nav-link :href="route('logout')" class="hover:bg-pink hover:text-blue hover:no-underline"
                onclick="event.preventDefault();this.closest('form').submit();">
                {{ __('Log Out') }}
        </x-responsive-nav-link>
    </div>

        </form>
        @else
            <x-custom.button text="Log In" class="mr-2" direct="/login"/>
            <x-custom.button text="SignUp" direct="/register"/>
        @endif
        </div>

  </nav>
