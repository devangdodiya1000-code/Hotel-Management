<div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRoomModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id="AddRoomForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="room_id" value="{{ old('room_id', $room->id ?? '') }}">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $room->name ?? '') }}" placeholder="Please Enter The Name">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Type</label>
                        <select class="form-select" id="type_id"  name="type_id" aria-label="Default select example">
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $room->type_id ?? "") == $type->id ? 'selected' : ''}}> {{ $type->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text type_id_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Sub Type</label>
                        <select class="form-select" id="subtype_id"  name="subtype_id" aria-label="Default select example">
                            <option value="">Select Sub Type</option>
                            @foreach ($subtypes as $subtype)
                                <option value="{{ $subtype->id }}" {{ old('subtype_id', $room->subtype_id ?? '') == $subtype->id ? 'selected' : ''}}> {{ $subtype->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text subtype_id_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $room->price ?? '') }}" placeholder="Please Enter The Price">
                        <span class="text-danger error-text price_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Room Image</label>
                        <input class="form-control form-control-sm" id="image" name="image" type="file">
                        @if (!@empty($room->image))
                            <img src="{{ asset('uploads/'.$room->image) }}" alt="Room Image" width="80px;">
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
