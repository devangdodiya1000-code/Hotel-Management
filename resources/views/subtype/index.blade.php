<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sub Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-end">
                        <button type="button" id="addSubType" class="btn btn-primary">
                            Add Sub Type
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="sub-types-data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modalContainer"></div>
</x-app-layout>

<script>

    $(document).ready(function() {
        getSubType();
    });

    function getSubType() {
        $.ajax({
            url: "{{ route('subtypes.get')}}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#sub-types-data').html(response.html);
                }
            }
        });
    }

    $(document).on('click', '#addSubType', function () {

        $.ajax({
            url: "{{ route('subtypes.create') }}",
            type: "GET",
            success: function (response) {
                $('#modalContainer').html(response.html);

                let modalEl = document.getElementById('addSubTypeModal');
                let modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    });

    $(document).on('submit', '#AddSubTypeForm', function(e) {

        e.preventDefault();

        var formData = new FormData($('#AddSubTypeForm')[0]);

        $.ajax({
            url: "{{ route('subtypes.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                getSubType();
                $('#addSubTypeModal').modal('hide');
            },
            error: function(error) {
                if(error.status === 422) {
                    let errors = error.responseJSON.errors;

                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    })
                }
            }
        });
    });

    $(document).on('click', '.edit-btn', function() {
        var subtype_id = $(this).data('id');

        let url = "{{ route('subtypes.edit', ':id') }}";
        url = url.replace(':id', subtype_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                $('#modalContainer').html(response.html);

                let modalEl = document.getElementById('addSubTypeModal');
                let modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    })

    $(document).on('input change', '#AddSubTypeForm input, #AddSubTypeForm select', function() {
        let fieldName = $(this).attr('name');

        $('.' + fieldName + '_error').text('');
        $(this).removeClass('is_invalid');
    });

    $(document).on('click', '.delete-btn', function() {
        var subtype_id = $(this).data('id');

        let url = "{{ route('subtypes.destroy', ':id') }}";
        url = url.replace(':id', subtype_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                alert(response.message);
                getSubType();
            }
        })
    });

    $(document).on('click', '.view-btn', function () {
        var subtype_id = $(this).data('id');

        let url = "{{ route('subtypes.view', ':id') }}";
        url = url.replace(':id', subtype_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let subtypeView = document.getElementById('SubtypeViewModal');
                    let modal = new bootstrap.Modal(subtypeView);

                    modal.show();
                }
            }
        });
    })

</script>
