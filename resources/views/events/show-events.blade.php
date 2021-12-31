@extends('../general.app')
@section('content')
        <div class=" lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 flex flex-wrap mx-auto">
                @foreach ($events as $event)
            <div class=" p-4 flex justify-between sm:w-2/4 md:w-2/4 lg:w-1/4 " style="height: 550px" >
                <div class="border border-blue rounded-md bg-pink p-2 h-4/5">
                    <a class="hover:no-underline" href="{{ route('show-event',$event->id) }}">
                            <img class="rounded-md h-2/5 mx-auto" src="{{ asset('images/'.$event->image) }}" cover="resize" />
                        <p class="text-center text-2xl py-2 text-blue">{{ $event->name }}</p>
                    </a>
                    {{-- <div class="flex">
                        <p class=" text-sm py-2 text-blue">Club Organiser: &nbsp;</p>
                        <p class=" text-sm py-2 text-blue">{{ $event->club_name }}</p>
                    </div> --}}
                    <p class="text-blue overflow-y-scroll h-2/5">{{ $event->description }}</p>
                    <p class="text-right text-sm py-1 text-blue ">{{ $event->club->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
            <div class="mx-auto mb-8">{{ $events->links() }}</div>
        @endsection()
