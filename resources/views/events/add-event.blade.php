@extends('../general.app')
@section('content')
            <div class="mx-auto ">
                <form method="POST" action="/add-event" enctype="multipart/form-data">
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

                                @if (count($clubs)==0)
                                    <div class="mb-6">there s no Clubs</div>
                                    @else
                                    <div class="form-group mb-6 text-purple">
                                        <label>Select Club Organiser</label>
                                        <select class="form-control  border-purple" style="box-shadow: none !important" name="club_id">
                                @foreach ($clubs as $club)

                                            <option value="{{ $club->id }}">{{ $club->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

                    @else
                    @if ($currentUserClub==0)
                        <div class="mb-6">You are not a Leader</div>
                        @else
                        <input class="border-0 focus:outline-none mb-6 hidden" name="club_id" value="{{ $currentUserClub->id }}" readonly/>
                    <input class="border-0 focus:outline-none mb-6" value="{{ $currentUserClub->name }}" style="box-shadow: none !important" readonly />
                    @endif

                    @endif
                @endif
                @if ($errors->any())
                        <ul class=" mb-4">
                            @foreach ($errors->all() as $error)
                            <li class="text-red-700"><i class="fas fa-exclamation-triangle "></i>&nbsp;{{ $error }}</li>
                            @endforeach
                        </ul>
                @endif
                    <div class="flex justify-center ">
                        <Button type="submit" class="w-3/4 bg-blue text-pink p-2 text-xl rounded hover:no-underline hover:bg-pink hover:text-blue
                        transition duration-450 ease-in-out">Create Event</Button>
                    </div>
                </form>
            </div>
        @endsection()
