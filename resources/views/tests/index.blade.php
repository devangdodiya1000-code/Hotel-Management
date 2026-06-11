<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-end">
                        <button type="button" id="addTest" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Tests
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tests-data">
                            <div>

                            </div>
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
        getTestData();
    });

    function getTestData() {
        $.ajax({
            url: "{{ route('tests.get') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#tests-data').html(response.html);
                }
            }
        });
    }

    $(document).on('click', '#addTest', function() {
        $.ajax({
            url: "{{ route('tests.create') }}",
            type: "GET",
            success: function (response) {
                $('#modalContainer').html(response.html);

                let modalEl = document.getElementById('testModal');
                let modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    });

    $(document).on('click', '.edit-btn', function() {
        let test_id = $(this).data('id');

        let url = "{{ route('tests.edit', ':id') }}";
        url = url.replace(':id', test_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                $('#modalContainer').html(response.html);

                let modalEl = document.getElementById('testModal');
                let modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    })

    $(document).on('submit', '#addTestForm', function(e) {
        e.preventDefault();

        var formData = new FormData($('#addTestForm')[0]);

        $.ajax({
            url: "{{ route('tests.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                getTestData();
                $('#testModal').modal('hide');
            },
            error: function(error) {
                let errors = error.responseJSON.errors;

                $.each(errors, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }

        });
    });

    $(document).on('input change', '#addTestForm input, #addTestForm select', function() {
        let fields = $(this).attr('name');

        $('.' + fields + '_error').text('');
        $(this).removeClass('is_invalid');
    });

    $(document).on('click', '.delete-btn', function() {
        let test_id = $(this).data('id');

        let url = "{{ route('tests.destroy', ':id') }}";
        url = url.replace(':id', test_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                getTestData();
                alert('Test delete successfully.');
            }
        });
    });

    $(document).on('click', '.view-btn', function() {
        let test_id = $(this).data('id');

        let url = "{{ route('tests.view', ':id') }}";
        url = url.replace(':id', test_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('testViewModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    });
</script>

