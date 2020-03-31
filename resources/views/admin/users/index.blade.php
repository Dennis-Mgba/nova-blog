@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <p>Users</p>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th>Status</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset($user->profile->avatar) }}" alt="users' avatar" width="50px" height="50px" style="border-radius: 50px;">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    @if ($user->admin)
                                        <a href="{{ route('user.remove.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Remove permisions</a>
                                    @else
                                        <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Make admin</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->admin)
                                        Admin
                                    @else
                                        Not admin
                                    @endif
                                </td>
                                <td>
                                    Delete
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center" style="color: #4267b2">No user.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
