<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-end">
                        <button type="button" id="addNotification" class="btn btn-primary">
                            Add Notifications
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type Name</th>
                            <th>Sub Type Name</th>
                            <th>Room Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="notification-data">

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
        getNotifications();
    });

    function getNotifications() {
        $.ajax({
            url: "{{ route('notifications.get') }}",
            type: "GET",
            success: function(response){
                if(response.status) {
                    $('#notification-data').html(response.html);
                }
            }
        })
    }

    $(document).on('click', '#addNotification', function() {
        $.ajax({
            url: "{{ route('notifications.create') }}",
            type: "GET",
            success: function(response) {
                if(response.status){
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('notificationModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    });

    $(document).on('click', '.edit-btn', function() {
        let notification_id = $(this).data('id');

        let url = "{{ route('notifications.edit', ':id') }}";
        url = url.replace(':id', notification_id);

        $.ajax({
            url: url,
            type: "GET",
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('notificationModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    })

    $(document).on('submit', '#AddNotificationForm', function(e) {
        e.preventDefault();

        let formData = new FormData($('#AddNotificationForm')[0]);

        $.ajax({
            url: "{{ route('notifications.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.status) {
                    getNotifications();

                    $('#notificationModal').modal('hide');
                }
            },
            error: function(error) {
                let errors = error.responseJSON.errors;

                $.each(errors, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }
        })
    });

    $(document).on('input change', '#AddNotificationForm input, #AddNotificationForm select', function() {
        let fieldName = $(this).attr('name');

        $('.' + fieldName + '_error').text('');
        $(this).removeClass('is_invalid');
    });

    $(document).on('click', '.delete-btn', function() {
        let notification_id = $(this).data('id');

        let url = "{{ route('notifications.destroy', ':id') }}";
        url = url.replace(':id', notification_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    alert(response.message);
                    getNotifications();
                }
            }
        });
    });

    $(document).on('click', '.view-btn', function() {
        let notification_id = $(this).data('id');

        let url = "{{ route('notifications.view', ':id') }}";
        url = url.replace(':id', notification_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('viewNotificationModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    });
</script>
