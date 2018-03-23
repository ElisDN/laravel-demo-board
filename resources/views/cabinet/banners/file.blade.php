@extends('layouts.app')

@section('content')
    @include('cabinet.banners._nav')

    <form method="POST" action="{{ route('cabinet.banners.file', $banner) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="format" class="col-form-label">Format</label>
            <select id="format" class="form-control{{ $errors->has('format') ? ' is-invalid' : '' }}" name="format">
                @foreach ($formats as $value)
                    <option value="{{ $value }}"{{ $value === old('format', $banner->format) ? ' selected' : '' }}>{{ $value }}</option>
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