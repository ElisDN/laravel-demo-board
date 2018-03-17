@extends('layouts.app')

@section('content')
    @include('cabinet.adverts._nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Updated</th>
            <th>Title</th>
            <th>Region</th>
            <th>Category</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($adverts as $advert)
            <tr>
                <td>{{ $advert->id }}</td>
                <td>{{ $advert->updated_at }}</td>
                <td><a href="{{ route('adverts.show', $advert) }}" target="_blank">{{ $advert->title }}</a></td>
                <td>
                    @if ($advert->region)
                        {{ $advert->region->name }}
                    @endif
                </td>
                <td>{{ $advert->category->name }}</td>
                <td>
                    @if ($advert->isDraft())
                        <span class="badge badge-secondary">Draft</span>
                    @elseif ($advert->isOnModeration())
                        <span class="badge badge-primary">Moderation</span>
                    @elseif ($advert->isActive())
                        <span class="badge badge-primary">Active</span>
                    @elseif ($advert->isClosed())
                        <span class="badge badge-secondary">Closed</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $adverts->links() }}
@endsection