<div class="modal fade" id="addSubTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{ $title }} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id="AddSubTypeForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="subtype_id" value="{{ old('subtype_id', $subtype->id ?? '') }}">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $subtype->name ?? '') }}" placeholder="Please Enter The Name">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Select Type</label>
                        <select class="form-select" id="type_id"  name="type_id" aria-label="Default select example">
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $subtype->type_id ?? '') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text type_id_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Small file input example</label>
                        <input class="form-control form-control-sm" id="image" name="image" type="file">
                        @if (!@empty($subtype->image))
                            <img src="{{ asset('uploads/'.$subtype->image) }}" width="80" class="mt-2">
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
