@extends('admin.dashboard')
@section('content1')
<div style="display:flex;flex-direction:column;min-height:100vh;height:100%">
    <table class="table" >
        <thead></thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th >Role</th>
            <th >created at</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
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
</div>

@endsection()
