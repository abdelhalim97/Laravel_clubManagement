@extends('admin.dashboard')
@section('content1')
<form class="mx-auto w-full lg:w-2/3 " method="POST" action="{{ url('') }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-8 w-5/6 sm:w-1/2 md:w-1/2 lg:w-1/2 mx-auto flex">
        <label class="w-1/3">Name:</label>
        <input value="{{ $club->name }}" class="border border-blue rounded-md w-2/3" name="name" />
    </div>
    <div class="mt-4 w-5/6 sm:w-1/2 md:w-1/2 lg:w-1/2 mx-auto flex">
        <label class="w-1/3">Description:</label>
        <input value="{{ $club->description }}" class="border border-blue rounded-md w-2/3" name="description"/>
    </div>
    <div class="mt-4 mx-auto w-5/6 sm:w-1/2 md:w-1/2 lg:w-1/2">
        <label>Image:</label>
        <img class="rounded-md w-30 h-30 mx-auto" src="{{ asset('images/'.$club->image) }}" cover="resize" />
        <div class="input-group mt-4">
            <div class="custom-file">
            <input name="img" type="file" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">Choose New Image</label>
            </div>
        </div>
    </div>
    <div class="mt-4 w-5/6 sm:w-1/2 md:w-1/2 lg:w-1/2 mx-auto ">
        <label>Club Leader:</label>
        <label>{{ $club->user->name }}</label>
        <select class="form-control  border-purple " style="box-shadow: none !important" name="user_id">
            @foreach ($users as $user)
                @if ($userLeaderId==$user->id)
                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                @else
                    <option value="{{ $user->id }}" >{{ $user->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="my-4 w-8/12 mx-auto">
        <div class="flex justify-center w-full">
            <button type="submit" class="bg-blue  text-pink p-2 text-xl rounded hover:no-underline hover:bg-pink hover:text-blue
        transition duration-450 ease-in-out w-2/3" href={{ "/dashboard/clubs-dashboard/".$club->id }}>Update</button>
        </div>

    </div>
    @if ($errors->any())
    <ul class=" mb-4">
        @foreach ($errors->all() as $error)
        <li class="text-red-700"><i class="fas fa-exclamation-triangle "></i>&nbsp;{{ $error }}</li>
        @endforeach
    </ul>
@endif
</form>

@endsection()
