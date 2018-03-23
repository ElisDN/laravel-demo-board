<ul>
    @foreach($categories as $category)
        <li>
            <a href="{{ route('cabinet.banners.create.region', $category) }}">{{ $category->name }}</a>
            @include('cabinet.banners.create._categories', ['categories' => $category->children])
        </li>
    @endforeach
</ul>