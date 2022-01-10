@extends('../general.app')
@section('content')
<div class=" lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 mx-auto">
    <div class=" p-4 md:w-1/2 lg:w-1/2 sm:w-full mx-auto" >
        <div class="border border-blue rounded-md bg-pink p-2">
                {{-- <img class="rounded-md" src="{{ asset('images/'.$event->image) }}" cover="resize" /> --}}
                <img class="rounded-md" src="{{ asset('images/logo-polytechnique-blanc.png') }}" cover="resize" />
                <p class="text-center text-2xl py-2 text-blue">{{ $event->name }}</p>
            <p class="text-blue">{{ $event->description }}</p>
        </div>
    </div>
</div>
@endsection()
