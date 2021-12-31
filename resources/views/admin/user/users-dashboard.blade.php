@extends('admin.dashboard')
@section('content1')
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        {{-- <th>image</th> --}}
        <th >Role</th>
        <th >created at</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            {{-- <td><img class="rounded-md w-10 h-10" src="{{ asset('images/'.$user->image) }}" cover="resize" /></td> --}}
            <td>
                @if ($user->hasRole('admin'))
                admin
                @else
                user
                @endif
            </td>
            <td>{{ $user->created_at }}</td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection()
