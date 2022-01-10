@extends('../general.app')
@section('content')
<div class="mt-8">
    <form method="POST" action="/show-clubs">
        @csrf
        <div class="relative w-1/3 mx-auto">
            <button type="submit" class=" bg-blue text-pink text-xl rounded-full hover:no-underline hover:bg-pink hover:text-blue
            transition duration-450 ease-in-out absolute left-2 mt-0.5">
                <i class="fas fa-search p-2"></i>
            </button>
            <input name="search" value="{{ request()->search??'' }}" class="w-full rounded-3xl h-10 pl-12 border-blue" type="text"/>
            @if (request()->search)
            <div>We Found {{ $clubs->total() }} Result(s) About :{{ request()->search }}</div>
            @endif
            @if ($errors->any())
                <ul class=" mb-4">
                    @foreach ($errors->all() as $error)
                    <li class="text-red-700"><i class="fas fa-exclamation-triangle "></i>&nbsp;{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </form>
    <div class="lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 flex flex-wrap mx-auto">
            @foreach ($clubs as $club)
        <div class=" p-4 flex justify-between sm:w-2/4 md:w-2/4 lg:w-1/4" style="height: 500px">
            <div class="border border-blue rounded-md bg-pink p-2 h-4/5" >
                <a class="hover:no-underline" href="{{ route('show-club',$club->id) }}">
                    {{-- <img class="rounded-md h-2/5 mx-auto" src="{{ asset('images/'.$club->image) }}" cover="resize" /> --}}
                    <img class="rounded-md h-2/5 mx-auto" src="{{ asset('images/logo-polytechnique-blanc.png') }}" cover="resize" />
                    <p class="text-center text-2xl py-2 text-blue">{{ $club->name }}</p>
                </a>
                <p class="text-blue overflow-y-auto h-2/5 ">{{ $club->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mb-8 flex justify-center">{{ $clubs->appends(request()->input())->links() }}</div>
</div>
@endsection()
