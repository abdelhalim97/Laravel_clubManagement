@extends('../general.app')
@section('content')
<div>
    <div class=" lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 flex justify-between " >
        {{-- <div class=""> --}}
            <div class="xs:px-">
                <img cover="resize" src="" class="w-50"/>
                <x-custom.nav-links text="test" direct="/"/>
            </div>
            <div class="xs:px-">
                <img cover="resize" src="" class="w-50"/>
                <x-custom.nav-links text="test" direct="/"/>
        </div>
        {{-- </div> --}}

    </div>
</div>

@endsection()
