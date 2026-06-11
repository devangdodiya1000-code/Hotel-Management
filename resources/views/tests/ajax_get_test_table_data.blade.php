@if ($tests->count() > 0)
    @foreach ($tests as $test)
    <tr>
        <td>
            <img src="{{ asset('uploads/'.$test->image) }}" width="100">
        </td>
        <td> {{ $test->name }}</td>
        <td>{{ $test->description }}</td>
        <td>
            @if($test->status == 1)
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Inactive</span>
            @endif
        </td>
        <td>
            <a href="#" class="btn btn-info edit-btn" data-id="{{ $test->id }}">Edit</a>
            <a href="#" class="btn btn-danger delete-btn" data-id="{{ $test->id }}">Delete</a>
            <a href="# " class="btn btn-warning view-btn" data-id="{{ $test->id }}">View</a>
        </td>
    </tr>
    @endforeach
@else
    <tr>
        <td class="text-center" colspan="5"></td>
    </tr>
@endif
