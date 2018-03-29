@extends('layouts.app')

@section('content')
    @include('cabinet.tickets._nav')

    <p><a href="{{ route('cabinet.tickets.create') }}" class="btn btn-success">Add Ticket</a></p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Subject</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->created_at }}</td>
                <td>{{ $ticket->updated_at }}</td>
                <td><a href="{{ route('cabinet.tickets.show', $ticket) }}" target="_blank">{{ $ticket->subject }}</a></td>
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
        @endforeach

        </tbody>
    </table>

    {{ $tickets->links() }}
@endsection