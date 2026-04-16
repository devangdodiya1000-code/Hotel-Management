<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hotel Rooms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-end">
                        <button type="button" id="addrooms" class="btn btn-primary">
                            Add Rooms
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type Name</th>
                            <th>Sub Type Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="rooms-data">

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
        getRooms();
    })

    function getRooms() {
        $.ajax({
            url: "{{ route('rooms.get') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#rooms-data').html(response.html);

                }
            }
        });
    }

    $(document).on('click', '#addrooms', function() {
        $.ajax({
            url: "{{ route('rooms.create') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('addRoomModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    })

    $(document).on('submit', '#AddRoomForm', function(e) {
        e.preventDefault();

        var formData = new FormData($('#AddRoomForm')[0]);

        $.ajax({
            url: "{{ route('rooms.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                getRooms();
                $('#addRoomModal').modal('hide');
            },
            error: function(error) {
                if(error.status === 422) {
                    var errors = error.responseJSON.errors;

                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    })
                }
            }
        });
    });

    $(document).on('input change', '#AddRoomForm input, #AddRoomForm select', function(){
        let fieldName = $(this).attr('name');

        $('.' + fieldName + '_error').text('');
        $(this).removeClass('is_invalid');
    });

    $(document).on('click', '.edit-btn', function() {
        var room_id = $(this).data('id');

        let url = "{{ route('rooms.edit', ':id') }}";
        url = url.replace(':id', room_id);

        $.ajax({
            url: url,
            type: "GET",
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('addRoomModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    });

    $(document).on('click', '.delete-btn', function() {
        let room_id = $(this).data('id');

        let url = "{{ route('rooms.destroy', ':id') }}";
        url = url.replace(':id', room_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                alert(response.message);
                getRooms();
            }
        });
    });

    $(document).on('click', '.view-btn', function() {
        let room_id = $(this).data('id');

        let url = "{{ route('rooms.view', ':id') }}";
        url = url.replace(':id', room_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status){
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('viewRoomModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    });
</script>
