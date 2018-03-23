@extends('layouts.app')

@section('content')
    @include('cabinet.banners._nav')

    <form method="POST" action="{{ route('cabinet.banners.create.banner.store', [$category, $region]) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="limit" class="col-form-label">Views</label>
            <input id="limit" type="number" class="form-control{{ $errors->has('limit') ? ' is-invalid' : '' }}" name="limit" value="{{ old('limit') }}" required>
            @if ($errors->has('limit'))
                <span class="invalid-feedback"><strong>{{ $errors->first('limit') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="url" class="col-form-label">URL</label>
            <input id="url" type="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url') }}" required>
            @if ($errors->has('url'))
                <span class="invalid-feedback"><strong>{{ $errors->first('url') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="format" class="col-form-label">Format</label>
            <select id="format" class="form-control{{ $errors->has('format') ? ' is-invalid' : '' }}" name="format">
                @foreach ($formats as $value)
                    <option value="{{ $value }}"{{ $value === old('format') ? ' selected' : '' }}>{{ $value }}</option>
                @endforeach;
            </select>
            @if ($errors->has('format'))
                <span class="invalid-feedback"><strong>{{ $errors->first('format') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="file" class="col-form-label">Banner</label>
            <input id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" required>
            @if ($errors->has('file'))
                <span class="invalid-feedback"><strong>{{ $errors->first('file') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection