@extends('layouts.app')

@section('content')
    @include('admin.banners._nav')

    <form method="POST" action="?">
        @csrf

        <div class="form-group">
            <label for="reason" class="col-form-label">Reason</label>
            <textarea id="reason" class="form-control{{ $errors->has('reason') ? ' is-invalid' : '' }}" name="reason" rows="10" required>{{ old('reason', $banner->reject_reason) }}</textarea>
            @if ($errors->has('reason'))
                <span class="invalid-feedback"><strong>{{ $errors->first('reason') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Reject</button>
        </div>
    </form>

@endsection