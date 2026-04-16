<div class="modal fade" id="viewRoomModal" tabindex="-1" aria-labelledby="viewRoomModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewRoomModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <div class="modal-body">
        <div class="container-fluid">

            <!-- Room Image -->
            <div class="text-center mb-4">
                <img src="{{ asset('uploads/' . $room->image) }}"
                    alt="Room Image"
                    class="img-fluid rounded shadow-sm"
                    style="max-height: 200px;">
            </div>

            <!-- Room Details -->
            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Room Name:</div>
                <div class="col-8">{{ $room->name }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Type:</div>
                <div class="col-8">{{ $room->type->name ?? '-' }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Sub Type:</div>
                <div class="col-8">{{ $room->subtype->name ?? '-' }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Status:</div>
                <div class="col-8">
                    @if($room->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </div>
            </div>

        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
