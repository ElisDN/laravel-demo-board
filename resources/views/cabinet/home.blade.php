@extends('layouts.app')

@section('breadcrumbs')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Cabinet</li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            You are logged in!
        </div>
    </div>
@endsection