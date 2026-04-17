<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="AddNotificationForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="notification_id" value="{{ old('notification_id', $notification->id ?? '') }}">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $notification->name ?? '')}}" placeholder="Please Enter The Name">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Type</label>
                        <select class="form-select" id="type_id"  name="type_id" aria-label="Default select example">
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $notification->type_id ?? '') == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text type_id_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Sub Type</label>
                        <select class="form-select" id="subtype_id"  name="subtype_id" aria-label="Default select example">
                            <option value="">Select Sub Type</option>
                            @foreach ($subtypes as $subtype)
                                <option value="{{ $subtype->id }}" {{ old('subtype_id', $notification->subtype_id ?? '') == $subtype->id ? 'selected' : ''}}>{{ $subtype->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text subtype_id_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Room</label>
                        <select class="form-select" id="room_id"  name="room_id" aria-label="Default select example">
                            <option value="">Select Room</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" {{ old('room_id', $notification->room_id ?? '') == $room->id ? 'selected' : ''}}>{{ $room->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text room_id_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Notification Image</label>
                        <input class="form-control form-control-sm mb-2" id="image" name="image" type="file">
                        @if (!@empty($notification->image))
                            <img src="{{ asset('uploads/'.$notification->image) }}" width="80px;" alt="Preview image of notifications">
                        @endif
                        <span class="text-danger error-text image_error"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
