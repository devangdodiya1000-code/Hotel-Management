@if ($contacts->count() > 0)
    @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->description }}</td>
            <td>{{ $contact->message }}</td>
            <td>
                <a href="#" class="btn btn-info edit-btn" data-id="{{ $contact->id }}">Edit</a>
                <a href="#" class="btn btn-danger delete-btn" data-id="{{ $contact->id }}">Delete</a>
                <a href="# " class="btn btn-warning view-btn" data-id="{{ $contact->id }}">View</a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td class="text-center" colspan="4">No data found</td>
    </tr>
@endif
