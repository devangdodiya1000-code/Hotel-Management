@if ($notifications->count() > 0)
    @foreach ($notifications as $notification)
        <tr>
            <td><img src="{{ asset('uploads/'.$notification->image) }}" width="80px;" alt="rooms image"></td>
            <td>{{ $notification->name }}</td>
            <td>{{ $notification->type->name }}</td>
            <td>{{ $notification->subtype->name }}</td>
            <td>{{ $notification->room->name }}</td>
            <td>
                <span class="badge {{ $notification->status == 1 ? 'bg-success' : 'bg-danger' }}">{{ $notification->status == 1 ? 'Active' : 'Inactive' }}</span>
            </td>
            <td>
                <a href="#" class="btn btn-info edit-btn" data-id="{{ $notification->id }}">Edit</a>
                <a href="#" class="btn btn-danger delete-btn" data-id="{{ $notification->id }}">Delete</a>
                <a href="# " class="btn btn-warning view-btn" data-id="{{ $notification->id }}">View</a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7">No data found</td>
    </tr>
@endif
