<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Slug</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($regions as $region)
        <tr>
            <td><a href="{{ route('admin.regions.show', $region) }}">{{ $region->name }}</a></td>
            <td>{{ $region->slug }}</td>
        </tr>
    @endforeach

    </tbody>
</table>