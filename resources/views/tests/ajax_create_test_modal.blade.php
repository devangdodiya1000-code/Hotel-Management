<div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="testModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id="addTestForm" enctype="multipart/form-data" id="addTestForm">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="test_id" value="{{ old('test_id', $test->id ?? '')}}">
                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $test->name ?? '')}}" placeholder="Enter name">
                    <span class="text-danger error-text name_error"></span>
                </div>
                <!-- Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if (!@empty($test->image))
                            <img src="{{ asset('uploads/'.$test->image) }}" width="80" class="mt-2">
                        @endif
                    <span class="text-danger error-text image_error"></span>
                </div>
                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description">{{ old('description', $test->description ?? '')}}</textarea>
                    <span class="text-danger error-text description_error"></span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
  </div>
</div>
