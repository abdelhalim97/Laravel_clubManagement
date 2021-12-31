@extends('admin.dashboard')
@section('content1')
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th >Leader</th>
        <th >Created at</th>
        <th >Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($clubs as $club)
        <tr>
            <td>{{ $club->name }}</td>
            <td>{{ $club->description }}</td>
            <td><img class="rounded-md w-10 h-10" src="{{ asset('images/'.$club->image) }}" cover="resize" /></td>
            <td>{{ $club->user->name }}</td>
            <td>{{ $club->created_at }}</td>
            <td>
                <a class="bg-pink text-blue p-2 text-xl rounded hover:no-underline hover:bg-blue hover:text-pink
                transition duration-450 ease-in-out" href={{ "/dashboard/clubs-dashboard/delete/".$club->id }}>Delete</a>
            </td>

          </tr>
        @endforeach
    </tbody>
  </table>
@endsection()
