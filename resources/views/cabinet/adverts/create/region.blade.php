@extends('layouts.app')

@section('content')
    @include('cabinet.adverts._nav')

    @if ($region)
        <p>
            <a href="{{ route('cabinet.adverts.create.advert', [$category, $region]) }}" class="btn btn-success">Add Advert for {{ $region->name }}</a>
        </p>
    @else
        <p>
            <a href="{{ route('cabinet.adverts.create.advert', [$category]) }}" class="btn btn-success">Add Advert for all regions</a>
        </p>
    @endif

    <p>Or choose nested region:</p>

    <ul>
        @foreach ($regions as $current)
            <li>
                <a href="{{ route('cabinet.adverts.create.region', [$category, $current]) }}">{{ $current->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection