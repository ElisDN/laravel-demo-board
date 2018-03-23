@extends('layouts.app')

@section('content')
    @include('cabinet.banners._nav')

    <form method="POST" action="{{ route('cabinet.banners.edit', $banner) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $banner->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="limit" class="col-form-label">Views</label>
            <input id="limit" type="number" class="form-control{{ $errors->has('limit') ? ' is-invalid' : '' }}" name="limit" value="{{ old('limit', $banner->limit) }}" required>
            @if ($errors->has('limit'))
                <span class="invalid-feedback"><strong>{{ $errors->first('limit') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="url" class="col-form-label">URL</label>
            <input id="url" type="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url', $banner->url) }}" required>
            @if ($errors->has('url'))
                <span class="invalid-feedback"><strong>{{ $errors->first('url') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection