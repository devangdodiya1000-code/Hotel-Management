@if ($rooms->count() > 0)
    @foreach ($rooms as $room)
        <tr>
            <td><img src="{{ asset('uploads/'.$room->image) }}" width="80px;" alt="rooms image"></td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->type->name }}</td>
            <td>{{ $room->subtype->name }}</td>
            <td>
                <span class="badge {{ $room->status == 1 ? 'bg-success' : 'bg-danger' }}">{{ $room->status == 1 ? 'Active' : 'Inactive' }}</span>
            </td>
            <td>
                <a href="#" class="btn btn-info edit-btn" data-id="{{ $room->id }}">Edit</a>
                <a href="#" class="btn btn-danger delete-btn" data-id="{{ $room->id }}">Delete</a>
                <a href="# " class="btn btn-warning view-btn" data-id="{{ $room->id }}">View</a>
            </td>
        </tr>
    @endforeach
@else
        <tr>
            <td colspan="6"> No data found</td>
        </tr>
@endif
