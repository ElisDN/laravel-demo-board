@extends('layouts.app')

@section('content')
    @include('admin.pages._nav')

    <p><a href="{{ route('admin.pages.create') }}" class="btn btn-success">Add Page</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($pages as $page)
            <tr>
                <td>
                    @for ($i = 0; $i < $page->depth; $i++) &mdash; @endfor
                    <a href="{{ route('admin.pages.show', $page) }}">{{ $page->title }}</a>
                </td>
                <td>{{ $page->menu_title }}</td>
                <td>{{ $page->slug }}</td>
                <td>
                    <div class="d-flex flex-row">
                        <form method="POST" action="{{ route('admin.pages.first', $page) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.pages.up', $page) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.pages.down', $page) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.pages.last', $page) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></span></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection