@extends('admin.dashboard')
@section('content1')
<div style="display:flex;flex-direction:column;min-height:100vh;height:100%">
    <table class="table w-full xl:w-10/12 lg:w-8/12 mx-auto">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th >Club</th>
            <th >Created at</th>
            <th >Update</th>
            <th >Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td class="text-sm ">{{ $event->description }}</td>
                <td><img class="rounded-md w-10 h-10" src="{{ asset('images/'.$event->image) }}" cover="resize" /></td>
                <td>{{ $event->club->name }}</td>
                <td>{{ $event->created_at }}</td>
                <td>
                    <a class="bg-pink text-blue p-2 text-xl rounded hover:no-underline hover:bg-blue hover:text-pink
                    transition duration-450 ease-in-out" href={{ "/dashboard/events-dashboard/".$event->id }}>Update</a>
                </td>
                <td><a class="bg-pink text-blue p-2 text-xl rounded hover:no-underline hover:bg-blue hover:text-pink
                    transition duration-450 ease-in-out" href={{ "/dashboard/events-dashboard/delete/".$event->id }} >Delete</a></td>
              </tr>
            @endforeach
        </tbody>
      </table>
      <div class="flex justify-center mb-8" style="margin-top: auto;">
          <div >{{ $events->links() }}</div>
        </div>
</div>
@endsection()
