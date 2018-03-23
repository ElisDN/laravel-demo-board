@extends('layouts.app')

@section('content')
    @include('admin.banners._nav')

    <div class="card mb-3">
        <div class="card-header">Filter</div>
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="user" class="col-form-label">User</label>
                            <input id="user" class="form-control" name="user" value="{{ request('user') }}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="region" class="col-form-label">Region</label>
                            <input id="region" class="form-control" name="region" value="{{ request('region') }}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="category" class="col-form-label">Category</label>
                            <input id="category" class="form-control" name="category" value="{{ request('category') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status</label>
                            <select id="status" class="form-control" name="status">
                                <option value=""></option>
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}"{{ $value === request('status') ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach;
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="?" class="btn btn-outline-secondary">Clear</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>User</th>
            <th>Region</th>
            <th>Category</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td><a href="{{ route('admin.banners.show', $banner) }}" target="_blank">{{ $banner->name }}</a></td>
                <td>{{ $banner->user->id }} - {{ $banner->user->name }}</td>
                <td>
                    @if ($banner->region)
                        {{ $banner->region->id }} - {{ $banner->region->name }}
                    @endif
                </td>
                <td>{{ $banner->category->id }} - {{ $banner->category->name }}</td>
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