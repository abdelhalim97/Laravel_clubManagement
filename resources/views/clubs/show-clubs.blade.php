@extends('../general.app')
@section('content')
        <div class="lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 flex flex-wrap mx-auto">
                @foreach ($clubs as $club)
            <div class=" p-4 flex justify-between sm:w-2/4 md:w-2/4 lg:w-1/4" style="height: 500px">
                <div class="border border-blue rounded-md bg-pink p-2 h-4/5" >
                    <a class="hover:no-underline" href="{{ route('show-club',$club->id) }}">
                            <img class="rounded-md h-2/5 mx-auto" src="{{ asset('images/'.$club->image) }}" cover="resize" />
                        <p class="text-center text-2xl py-2 text-blue">{{ $club->name }}</p>
                    </a>
                        <p class="text-blue overflow-y-auto h-2/5 ">{{ $club->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mx-auto mb-8">{{ $clubs->links() }}</div>
        @endsection()
