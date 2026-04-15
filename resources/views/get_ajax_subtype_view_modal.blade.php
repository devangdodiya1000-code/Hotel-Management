<div class="modal fade" id="SubtypeViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Header -->
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="row g-3">

                    <!-- Name -->
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Name</label>
                        <div class="border rounded p-2">
                            {{ $subtype->name ?? '-' }}
                        </div>
                    </div>

                    <!-- Type -->
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Type</label>
                        <div class="border rounded p-2">
                            {{ $subtype->type->name ?? '-' }}
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Image</label>
                        <div class="border rounded p-2 text-center">
                            @if(!empty($subtype->image))
                                <img src="{{ asset('uploads/'.$subtype->image) }}"
                                     class="img-fluid rounded"
                                     style="max-height:150px;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label class="fw-bold text-muted">Status</label>
                        <div class="border rounded p-2">
                            @if($subtype->status)
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
