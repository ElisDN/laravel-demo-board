@extends('layouts.app')

@section('content')
    @include('admin.users._nav')

    <p><a href="{{ route('admin.users.create') }}" class="btn btn-success">Add User</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->isWait())
                        <span class="badge badge-secondary">Waiting</span>
                    @endif
                    @if ($user->isActive())
                        <span class="badge badge-primary">Active</span>
                    @endif
                </td>
                <td>
                    @if ($user->isAdmin())
                        <span class="badge badge-danger">Admin</span>
                    @else
                        <span class="badge badge-secondary">User</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $users->links() }}
@endsection