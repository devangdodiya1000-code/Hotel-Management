@if ($subtypes->count() > 0)
    @foreach ($subtypes as $subtype)
    <tr>
        <td>
            <img src="{{ asset('uploads/'.$subtype->image) }}" width="100">
        </td>
        <td> {{ $subtype->name }}</td>
        <td>{{ $subtype->type->name ?? '-' }}</td>
        <td>
            @if($subtype->status == 1)
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Inactive</span>
            @endif
        </td>
        <td>
            <a href="#" class="btn btn-info edit-btn" data-id="{{ $subtype->id }}">Edit</a>
            <a href="#" class="btn btn-danger delete-btn" data-id="{{ $subtype->id }}">Delete</a>
            <a href="# " class="btn btn-warning view-btn" data-id="{{ $subtype->id }}">View</a>
        </td>
    </tr>
    @endforeach
@else
    <tr>
        <td class="text-center" colspan="5"></td>
    </tr>
@endif
