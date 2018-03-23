@extends('layouts.app')

@section('content')
    @include('cabinet.banners._nav')

    <p><a href="{{ route('cabinet.banners.create') }}" class="btn btn-success">Add Banner</a></p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Region</th>
            <th>Category</th>
            <th>Published</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td><a href="{{ route('cabinet.banners.show', $banner) }}" target="_blank">{{ $banner->name }}</a></td>
                <td>
                    @if ($banner->region)
                        {{ $banner->region->name }}
                    @endif
                </td>
                <td>{{ $banner->category->name }}</td>
                <td>{{ $banner->published_at }}</td>
                <td>
                    @if ($banner->isDraft())
                        <span class="badge badge-secondary">Draft</span>
                    @elseif ($banner->isOnModeration())
                        <span class="badge badge-primary">Moderation</span>
                    @elseif ($banner->isModerated())
                        <span class="badge badge-success">Ready to Payment</span>
                    @elseif ($banner->isOrdered())
                        <span class="badge badge-warning">Waiting for Payment</span>
                    @elseif ($banner->isActive())
                        <span class="badge badge-primary">Active</span>
                    @elseif ($banner->isClosed())
                        <span class="badge badge-secondary">Closed</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $banners->links() }}
@endsection