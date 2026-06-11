<div class="modal fade" id="testViewModal" tabindex="-1" aria-labelledby="testViewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="testViewModalLabel">Modal Test</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img id="view_image"
                        src="{{ asset('uploads/'. $test->image) }}"
                        class="img-fluid rounded shadow-sm border"
                        alt="Product Image">
                </div>

                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td id="view_name">{{ $test->name }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td id="view_description">
                                {{ $test->description }}
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <span id="view_status" class="badge bg-success">
                                    @if ($test->status == 1)
                                        <span id="view_status" class="badge bg-success">
                                            Active
                                        </span>
                                    @else
                                        <span id="view_status" class="badge bg-danger">
                                            Inactive
                                        </span>
                                    @endif
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
