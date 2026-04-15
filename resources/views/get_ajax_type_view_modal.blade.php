<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">View Type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <p><strong>Name:</strong> {{ $type->name }}</p>
            <p><strong>Status:</strong>
                <span class="btn btn-sm {{ $type->status == 1 ? 'btn-success' : 'btn-danger' }}">
                    {{ $type->status == 1 ? 'Active' : 'Inactive' }}
                </span>
            </p>
            <img src="{{ asset('uploads/'.$type->image) }}" width="100">
        </div>
    </div>
</div>
