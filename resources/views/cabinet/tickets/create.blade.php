@extends('layouts.app')

@section('content')
    @include('cabinet.tickets._nav')

    <form method="POST" action="{{ route('cabinet.tickets.store') }}">
        @csrf

        <div class="form-group">
            <label for="subject" class="col-form-label">Subject</label>
            <input id="subject" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}" required>
            @if ($errors->has('subject'))
                <span class="invalid-feedback"><strong>{{ $errors->first('subject') }}</strong></span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="content" class="col-form-label">Content</label>
            <textarea id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" rows="10" required>{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <span class="invalid-feedback"><strong>{{ $errors->first('content') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection