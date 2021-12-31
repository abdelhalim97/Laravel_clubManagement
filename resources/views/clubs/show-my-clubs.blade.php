@extends('../general.app')
@section('content')
        <div class="lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 flex flex-wrap mx-auto">
            @if (count($clubs)==0)
                <p class="text-blue text-lg">Sorry {{ Auth::user()->name }} you Have no Subscriptions</p>
            @else
                @foreach ($clubs as $club)
                <div class=" p-4 flex justify-between sm:w-2/4 md:w-2/4 lg:w-1/4" >
                    <div class="border border-blue rounded-md bg-pink p-2" >
                        <a class="hover:no-underline" href="{{ route('show-club',$club->id) }}">
                            <img class="rounded-md" src="{{ asset('images/'.$club->image) }}" cover="resize" />
                            <p class="text-center text-2xl py-2 text-blue">{{ $club->name }}</p>
                        </a>
                        <p class="text-blue">{{ $club->description }}</p>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        @endsection()
