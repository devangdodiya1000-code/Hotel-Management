@if ($invoiceData->count() > 0)
    @foreach ($invoiceData as $invoice)
        <tr>
            <td>{{ $invoice->room->name }}</td>
            <td>{{ $invoice->customer_name }}</td>
            <td>{{ $invoice->payment_status }}</td>
            <td>{{ $invoice->amount }}</td>
            <td>{{ $invoice->check_in }}</td>
            <td>{{ $invoice->check_out }}</td>
        </tr>
    @endforeach
@else
    <tr colspan="6">
        <td>No data found</td>
    </tr>
@endif
