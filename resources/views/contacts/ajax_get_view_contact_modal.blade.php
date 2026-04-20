<div class="modal fade" id="viewcontactModal" tabindex="-1" aria-labelledby="viewcontactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewcontactModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <div class="modal-body">
        <div class="container-fluid">

            <!-- Room Details -->
            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Name:</div>
                <div class="col-8">{{ $contact->name }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Email:</div>
                <div class="col-8">{{ $contact->email }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Description:</div>
                <div class="col-8">{{ $contact->description }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-4 fw-bold text-muted">Message:</div>
                <div class="col-8">{{ $contact->message }}</div>
            </div>

        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
