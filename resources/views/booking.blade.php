@extends('layouts.app')
@section('content')
   
<div class="container">
<h1>Booking Form</h1>
    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf

        <label for="customer_name">Customer Name:</label><br>
        <input type="text" id="customer_name" name="customer_name" required><br>

        <label for="customer_email">Customer Email:</label><br>
        <input type="email" id="customer_email" name="customer_email" required><br>

        <label for="booking_date">Booking Date:</label><br>
        <input type="date" id="booking_date" name="booking_date" required><br>

        <label for="booking_type">Booking Type:</label><br>
        <select id="booking_type" name="booking_type" required>
            <option value="Full Day">Full Day</option>
            <option value="Half Day">Half Day</option>
            <option value="Custom">Custom</option>
        </select><br>

        <label for="booking_slot">Booking Slot:</label><br>
        <select id="booking_slot" name="booking_slot" required>
            <option value="First Half">First Half</option>
            <option value="Secound Half">Secound Half</option>
        </select><br>

        <label for="booking_from">Booking From:</label><br>
        <input type="time" id="booking_from" name="booking_from" required><br>

        <label for="booking_to">Booking To:</label><br>
        <input type="time" id="booking_to" name="booking_to" required><br><br>

        <button type="submit">Submit</button>
    </form>
    </div>
@endsection
