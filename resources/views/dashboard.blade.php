<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-end">
                        <button type="button" id="addType" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Type
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="types-data">
                            <div>

                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="type-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="type_id" name="type_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputImage" class="form-label">image</label>
                        <input type="file" name="file" id="file" class="form-control">
                        <img id="image-preview" src="" width="100" style="display:none;">
                        <span class="text-danger error-text file_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter type name">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- view modal --}}
    <div class="modal fade" id="viewModal" tabindex="-1"></div>
</x-app-layout>

<script>
    $(document).ready(function() {
        getTypes();
    })

    function getTypes() {
        $.ajax({
            url: "{{ route('types.get') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#types-data').html(response.html);
                }
            }
        })
    }

    $(document).on('click', "#addType", function () {
        $('#type-form')[0].reset();

        // Clear hidden ID (important for edit vs add)
        $('#type_id').val('');

        // Clear image preview
        $('#image-preview').attr('src', '').hide();

        // Clear file input manually (important)
        $('#file').val('');

        // Clear all error messages
        $('.error-text').text('');

        // Remove validation classes if you added any
        $('.form-control').removeClass('is-invalid');
    });

    $(document).on('submit', '#type-form', function(e){
        e.preventDefault();

        var form = document.getElementById('#type-form');

        var formData = new FormData($('#type-form')[0]);

        $.ajax({
            url: "{{ route('types.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.status) {
                    alert(response.message);

                    $('#type-form')[0].reset();

                    $('#exampleModal').modal('hide');

                    getTypes();
                }
            },
            error: function(xhr) {
                if(xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function(key, value){
                        $('.' + key + '_error').text(value[0]);
                    });
                }
            }
        })
    });

    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');

        $('exampleModalLabel').text('Edit Type');
        $('saveBtn').text('Update');

        $('#exampleModal').modal('show');

        // Clear all error messages
        $('.error-text').text('');

        // Remove validation classes if you added any
        $('.form-control').removeClass('is-invalid');


        var url = "{{ route('types.edit', ':id') }}";
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {

                $('#type_id').val(response.id);
                $('#name').val(response.name);
                $('#status').val(response.status);

                if(response.image){
                    $('#image-preview').attr('src', '/uploads/' + response.image).show();
                }
            }
        });
    });

    $(document).on('click', '.delete-btn', function() {
        var type_id = $(this).data('id');

        var url = "{{ route('types.delete', ':id') }}";
        url = url.replace(':id', type_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                alert(response.message);
                getTypes();
            }
        })
    });

    $(document).on('click', '.view-btn', function() {
        var type_id = $(this).data('id');

        var url = "{{ route('types.view', ':id') }}";
        url = url.replace(':id', type_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#viewModal').html(response.html); // inject HTML

                    // IMPORTANT: show modal
                    var modal = new bootstrap.Modal(document.getElementById('viewModal'));
                    modal.show();
                }
            }
        })
    });

    $(document).on('input change', '#type-form input, #type-form select, #type-form textarea', function () {
        let fieldName = $(this).attr('name');
        
        $('.' + fieldName + '_error').text('');
        $(this).removeClass('is-invalid');
    });
</script>
