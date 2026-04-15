@if ($types->count() > 0)
    @foreach ($types as $index => $type)
        <tr>
            <td>
                <img src="{{ asset('uploads/'.$type->image) }}" width="100">
            </td>
            <td>{{ $type->name }}</td>
            <td>{{ $type->status }}</td>
            <td>
                <a href="#" class="btn btn-info edit-btn" data-id="{{ $type->id }}">Edit</a>
                <a href="#" class="btn btn-danger delete-btn" data-id="{{ $type->id }}">Delete</a>
                <a href="# " class="btn btn-warning view-btn" data-id="{{ $type->id }}">View</a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td class="text-center" colspan="4">No data found</td>
    </tr>
@endif
