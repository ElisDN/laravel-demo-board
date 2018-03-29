@extends('layouts.app')

@section('content')
    @include('admin.tickets._nav')


    <div class="d-flex flex-row mb-3">

        <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-primary mr-1">Edit</a>

        @if ($ticket->isOpen())
            <form method="POST" action="{{ route('admin.tickets.approve', $ticket) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Approve</button>
            </form>
        @endif

        @if (!$ticket->isClosed())
            <form method="POST" action="{{ route('admin.tickets.close', $ticket) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Close</button>
            </form>
        @endif

        @if ($ticket->isClosed())
            <form method="POST" action="{{ route('admin.tickets.reopen', $ticket) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Reopen</button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.tickets.destroy', $ticket) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-7">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $ticket->id }}</td>
                </tr>
                <tr>
                    <th>Created</th>
                    <td>{{ $ticket->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated</th>
                    <td>{{ $ticket->updated_at }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td><a href="{{ route('admin.users.show', $ticket->user) }}" target="_blank">{{ $ticket->user->name }}</a></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($ticket->isOpen())
                            <span class="badge badge-danger">Open</span>
                        @elseif ($ticket->isApproved())
                            <span class="badge badge-primary">Approved</span>
                        @elseif ($ticket->isClosed())
                            <span class="badge badge-secondary">Closed</span>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-5">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($ticket->statuses()->orderBy('id')->with('user')->get() as $status)
                    <tr>
                        <td>{{ $status->created_at }}</td>
                        <td>{{ $status->user->name }}</td>
                        <td>
                            @if ($status->isOpen())
                                <span class="badge badge-danger">Open</span>
                            @elseif ($status->isApproved())
                                <span class="badge badge-primary">Approved</span>
                            @elseif ($status->isClosed())
                                <span class="badge badge-secondary">Closed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            {{ $ticket->subject }}
        </div>
        <div class="card-body">
            {!! nl2br(e($ticket->content)) !!}
        </div>
    </div>

    @foreach ($ticket->messages()->orderBy('id')->with('user')->get() as $message)
        <div class="card mb-3">
            <div class="card-header">
                {{ $message->created_at }} by {{ $message->user->name }}
            </div>
            <div class="card-body">
                {!! nl2br(e($message->message)) !!}
            </div>
        </div>
    @endforeach

    @if ($ticket->allowsMessages())
        <form method="POST" action="{{ route('admin.tickets.message', $ticket) }}">
            @csrf

            <div class="form-group">
                <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" rows="3" required>{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('message') }}</strong></span>
                @endif
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
        </form>
    @endif
@endsection