@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Hello</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            Your site
        </div>
    </div>
@endsection
