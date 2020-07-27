<div class="container mt-5">
    <h1>{{ $order->customer->user->userProfile->name }}</h1>
    <h4>Contact #: {{ $order->customer->user->userProfile->phone_number }}</h4>
    <hr>
    <p><strong>Mode of Transportation :</strong> {{ $order->transportation }}</p>
    <p><strong>Pick-up Location :</strong> {{ $order->pickup_location }}</p>
    <p><strong>Drop-In Location :</strong> {{ $order->dropin_location }}</p>
    <p><strong>Total Kilo :</strong> {{ $order->kilo }}</p>
    <p><strong>Pick-up or Arrival Date:</strong> {{ $order->pickupdate }}</p>
    <a href="{{ url()->previous() }}">back</a>
</div>