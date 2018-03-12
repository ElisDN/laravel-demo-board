@extends('layouts.app')

@section('content')
    @include('cabinet.profile._nav')

    <form method="POST" action="{{ route('cabinet.profile.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="col-form-label">First Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="last_name" class="col-form-label">Last Name</label>
            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
            @if ($errors->has('last_name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="phone" class="col-form-label">Phone</label>
            <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $user->phone) }}" required>
            @if ($errors->has('phone'))
                <span class="invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection