@extends('../general.app')
@section('content')
<div class=" lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 mx-auto ">
        <div class=" p-4 md:w-1/2 lg:w-1/2 sm:w-full mx-auto" >
            <div class="border border-blue rounded-md bg-pink p-2" >
                    <div class="relative">
                        <img class="rounded-md " src="{{ asset('images/logo-polytechnique-blanc.png') }}" cover="resize" />
                        {{-- <img class="rounded-md " src="{{ asset('images/'.$club->image) }}" cover="resize" /> --}}

                        @if (auth()->check())
                            @if ($test==false)
                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <button
                                class="absolute top-0 flex bg-purple rounded-md px-1 focus:outline-none hover:bg-pink hover:text-purple">
                                    <i class="fas fa-plus-circle pt-1 text-pink pb-1 hover:text-purple">
                                    &nbsp;<span class="font-normal">Follow</span></i>
                                </button>
                            </form>
                            @else()
                                @if(Request::url() ==='/show-clubs/'.$club->id)
                                <a href={{ "/show-clubs/unfollow/".$club->id }}>
                                    <button
                                    class="absolute top-0 flex bg-purple rounded-md px-1 focus:outline-none hover:bg-pink hover:text-purple">
                                        <i class="fas fa-plus-circle pt-1 text-pink pb-1 hover:text-purple">
                                        &nbsp;<span class="font-normal">Unfollow</span></i>
                                    </button>
                                </a>
                                @else()
                                <a href="{{ route('unfollow2',$club->id) }}">
                                    <button
                                    class="absolute top-0 flex bg-purple rounded-md px-1 focus:outline-none hover:bg-pink hover:text-purple">
                                        <i class="fas fa-plus-circle pt-1 text-pink pb-1 hover:text-purple">
                                        &nbsp;<span class="font-normal">Unfollow</span></i>
                                    </button>
                                </a>
                                @endif
                            @endif
                        @endif
                    </div>
                    <p class="text-center text-2xl py-2 text-blue">{{ $club->name }}</p>
                <p class="text-blue">{{ $club->description }}</p>
            </div>
        </div>
        <p class="text-left text-xl text-blue">{{ $club->name }}'s Events:</p>
        {{-- <div class=" p-4 md:w-1/2 lg:w-1/2 sm:w-full mx-auto"> --}}
            @if (count($events)==0 )
                <p class="text-center text-blue">{{ $club->name }} Club has no Events Right Now</p>
            @else
            <div class="flex flex-wrap">
                @foreach ($events as $event)
            <div class="flex justify-between sm:w-2/4 md:w-2/4 lg:w-1/4 p-4 ">

                <div class="border border-blue rounded-md bg-pink p-2">
                    <a class="hover:no-underline" href="{{ route('show-follows-event',$event->id) }}">
                        <img class="rounded-md" src="{{ asset('images/logo-polytechnique-blanc.png') }}" cover="resize" />
                        {{-- <img class="rounded-md" src="{{ asset('images/'.$event->image) }}" cover="resize" /> --}}
                        <p class="text-center text-2xl py-2 text-blue">{{ $event->name }}</p>
                    </a>
                    <p class="text-blue">{{ $event->description }}</p>
                </div>
            </div>

                @endforeach</div>
            @endif
    {{-- </div> --}}
</div>
@endsection()
