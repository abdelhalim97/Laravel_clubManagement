@extends('../general.app')
@section('content')
<div class=" lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 mx-auto">
        <div class=" p-4  sm:w-full mx-auto flex" >
            <div class="border border-blue rounded-md bg-pink p-2 w-1/2 mx-2">
                    <img class="rounded-md" src="{{ asset('images/'.$event->image) }}" cover="resize" />
                    <p class="text-center text-2xl py-2 text-blue">{{ $event->name }}</p>
                <p class="text-blue">{{ $event->description }}</p>
            </div>
            <div class="w-1/2 mx-2 my-auto">
                @if (auth()->check())
                <form method="POST" action="" class="mb-2">
                    @csrf
                    @php
                        $like_count=0;
                        $dislike_count=0;
                        foreach ($event->likes as $like){

                    if ($like->like_type==1)
                        $like_count++;
                    else
                        $dislike_count++;
                    }
                    @endphp
                    @if ($test==false)
                    <a href='/show-events/{{ $event->id }}/like'><i class="far fa-thumbs-up"></i></a>{{ $like_count }}
                    <a href='/show-events/{{ $event->id }}/dislike'><i class="far fa-thumbs-down"></i></a>{{ $dislike_count }}
                    @elseif ($test==1)
                    <a href='/show-events/{{ $event->id }}/like'><i class="fas fa-thumbs-up"></i></a>{{ $like_count }}
                    <a href='/show-events/{{ $event->id }}/dislike'><i class="far fa-thumbs-down"></i></a>{{ $dislike_count }}
                    @elseif ($test==-1)
                    <a href='/show-events/{{ $event->id }}/like'><i class="far fa-thumbs-up"></i></a>{{ $like_count }}
                    <a href='/show-events/{{ $event->id }}/dislike'><i class="fas fa-thumbs-down"></i></a>{{ $dislike_count }}
                    @endif
                </form>
                <form method="POST" action="" class="mb-2">
                    @csrf
                    <input type="text" class="w-full my-3 border-purple rounded-3xl " placeholder="Write your Comment Here" name="description" style="box-shadow: none !important"/>
                    <div class="flex justify-center">
                        <button class="w-2/4 bg-blue text-pink p-2 text-xl rounded hover:no-underline hover:bg-pink hover:text-blue
                        transition duration-450 ease-in-out" type="submit">Comment</button>
                    </div>
                </form>
                @endif
                @if (count($comments)==0)
                <div></div>
                @else()
                <div class=" p-4 sm:w-full mx-auto bg-pink rounded-md" >
                @foreach ($comments as $comment)
                <div class="rounded-md bg-indigo p-2 my-2">
                    <div class="flex justify-between">
                        <p class="text-blue font-bold">{{ $comment->user->name }}</p>
                        <a href={{ "/show-events/comment/delete/".$comment->id }}>
                            <i class="fas fa-times-circle text-blue hover:text-purple"></i>
                        </a>
                    </div>
                    <p class="text-blue">{{ $comment->description }}</p>

                </div>
                @endforeach
                @if($errors->any())
                    <p class="text-red-700"><i class="fas fa-exclamation-triangle"></i>&nbsp;{{$errors->first()}}</p>
                    @endif
            </div>
            @endif
            </div>
        </div>
</div>
@endsection()
