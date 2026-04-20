<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-end">
                        <button type="button" id="addContact" class="btn btn-primary">
                            Add Contact
                        </button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>Message</th>
                                <th style="width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="contact-data">

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
        getContacts();
    });

    function getContacts() {
        $.ajax({
            url: "{{ route('contacts.get') }}",
            type: "GET",
            success: function(response) {
                $('#contact-data').html(response.html);
            }
        });
    }

    $(document).on('click', '#addContact', function() {
        $.ajax({
            url: "{{ route('contacts.create') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('addContactModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        })
    })

    $(document).on('click', '.edit-btn', function() {
        let contact_id = $(this).data('id');

        let url = "{{ route('contacts.edit', ':id') }}";
        url = url.replace(':id', contact_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('addContactModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        })
    });

    $(document).on('submit', '#addContactForm', function(e) {
        e.preventDefault();

        let formData = new FormData($('#addContactForm')[0]);

        $.ajax({
            url: "{{ route('contacts.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.status) {
                    getContacts();
                    $('#addContactModal').modal('hide');
                }
            },
            error: function(error) {
                if(error.status == 422) {
                    let errors = error.responseJSON.errors

                    $.each(errors, function(key, value) {
                        $('.' + key + '_error').text(value[0]);
                    });
                }
            }
        });
    });

    $(document).on('input change', '#addContactForm input, #addContactForm textarea', function() {
        let fields = $(this).attr('name');

        $('.' + fields + '_error').text('');
        $(this).removeClass('is_invalid');
    });

    $(document).on('click', '.delete-btn', function() {
        let contact_id = $(this).data('id');

        let url = "{{ route('contacts.destroy', ':id') }}";
        url = url.replace(':id', contact_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                alert(response.message);
                getContacts();
            }
        })
    });

    $(document).on('click', '.view-btn', function() {
        let contact_id = $(this).data('id');

        let url = "{{ route('contacts.view', ':id') }}";
        url = url.replace(':id', contact_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('viewcontactModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    })
</script>
