@extends('admin.dashboard')
@section('content1')
<div style="display:flex;flex-direction:column;min-height:100vh;height:100%">
    <div class="mx-auto ">
        <form method="POST" action="{{ url('/add-event') }}"   enctype="multipart/form-data">
            @csrf
            <p class="text-center my-6 text-purple text-xl border-purple">Add New Event</p>
            <input type="text" class="w-full my-3 border-purple"  style="box-shadow: none !important" placeholder="Event Name" name="name"/>
            <textarea class="w-full my-3 border-purple outline-none" style="box-shadow: none !important" placeholder="Event Desccription" name="description"></textarea>
            <div class="input-group mt-3 mb-6">
                <div class="custom-file">
                <input name="img" type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
            </div>
        @if (auth()->check())
            @if (Auth::user()->hasRole('admin'))
                <div class="form-group mb-6 text-purple">
                    <label>Select Club Organiser</label>
                    <select class="form-control  border-purple" style="box-shadow: none !important" name="club_id">
                        @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <input name="club_id" value="{{ $currentUserClubId }}" readonly />
            @endif
            @if ($errors->any())
                <ul class=" mb-4">
                    @foreach ($errors->all() as $error)
                    <li class="text-red-700"><i class="fas fa-exclamation-triangle "></i>&nbsp;{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        @endif
            <div class="flex justify-center ">
                <Button type="submit" class="mb-4 w-3/4 bg-blue text-pink p-2 text-xl rounded hover:no-underline hover:bg-pink hover:text-blue
                transition duration-450 ease-in-out">Create Event</Button>
            </div>
        </form>
    </div>
</div>
@endsection()
