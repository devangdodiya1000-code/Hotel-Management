<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Room</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                            <th>Amount</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                        </thead>
                        <tbody id="invoice-data">

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
        getInvoice();
    });

    function getInvoice() {
        $.ajax({
            url: "{{ route('invoice.get') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#invoice-data').html(response.html);
                }
            }
        });
    }
</script>
