<div class="modal fade" id="viewNotificationModal" tabindex="-1" aria-labelledby="viewNotificationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewNotificationModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <div class="modal-body">
        <div class="container-fluid">

            <!-- Room Image -->
            <div class="text-center mb-4">
                <img src="{{ asset('uploads/' . $notification->image) }}"
                    alt="Room Image"
                    class="img-fluid rounded shadow-sm"
                    style="max-height: 200px;">
            </div>

            <!-- Room Details -->
            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Notification:</div>
                <div class="col-8">{{ $notification->name }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Type:</div>
                <div class="col-8">{{ $notification->type->name ?? '-' }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Sub Type:</div>
                <div class="col-8">{{ $notification->subtype->name ?? '-' }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Room Name:</div>
                <div class="col-8">{{ $notification->room->name ?? '-' }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Status:</div>
                <div class="col-8">
                    @if($notification->status == 1)
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
