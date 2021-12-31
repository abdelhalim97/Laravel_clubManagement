{{-- @extends('../general.app')
@section('content')
        <div class=" lg:max-w-screen-lg md:max-w-screen-sm px-10 md:px-0 flex justify-between mx-auto ">
            <div class="mx-auto ">
                <form method="POST" action="/add-club" enctype="multipart/form-data">
                    @csrf
                    <p class="text-center my-6 text-purple text-xl border-purple">Add New Club</p>
                    <input type="text" class="w-full my-3 border-purple"  style="box-shadow: none !important" placeholder="Club Name" name="name"/>
                    <textarea class="w-full my-3 border-purple outline-none" style="box-shadow: none !important" placeholder="Club Desccription" name="description"></textarea>
                    <div class="input-group mt-3 mb-6">
                        <div class="custom-file">
                        <input name="img" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group mb-6 text-purple">
                        <label>Select Club Leader</label>
                        <select class="form-control  border-purple" style="box-shadow: none !important" name="user_id">
                            @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-center ">
                        <Button type="submit" class="w-3/4 bg-blue text-pink p-2 text-xl rounded hover:no-underline hover:bg-pink hover:text-blue
                        transition duration-450 ease-in-out">Create Club</Button>
                    </div>
                </form>
            </div>
        </div>
        @endsection() --}}
