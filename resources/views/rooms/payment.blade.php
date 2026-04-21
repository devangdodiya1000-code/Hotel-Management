<form action="{{ route('room.payment.process') }}" method="POST">
    @csrf

    <input type="hidden" name="amount" value="{{ $room->price }}">

    <script
        src="https://checkout.stripe.com/checkout.js"
        class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-amount="{{ $room->price * 100 }}"
        data-name="Room Booking"
        data-description="Payment for {{ $room->name }}"
        data-currency="inr">
    </script>
</form>
