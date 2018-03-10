@extends('layouts.app')

@section('content')
    @include('admin.adverts.categories._nav')

    <p><a href="{{ route('admin.adverts.categories.create') }}" class="btn btn-success">Add Category</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($categories as $category)
            <tr>
                <td>
                    @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                    <a href="{{ route('admin.adverts.categories.show', $category) }}">{{ $category->name }}</a>
                </td>
                <td>{{ $category->slug }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection