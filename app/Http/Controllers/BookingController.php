<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function booking(){
        
        return view('booking');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'booking_date' => 'required',
            'booking_type' => 'required',
            'booking_slot' => 'required',
            'booking_from' => 'required',
            'booking_to' => 'required',
        ]);
    
        $bookingDate = $request->input('booking_date');
        $bookingFrom = $request->input('booking_from');
        $bookingTo = $request->input('booking_to');
    

        $bookingFromDateTime = Carbon::parse($bookingDate . ' ' . $bookingFrom);
        $bookingToDateTime = Carbon::parse($bookingDate . ' ' . $bookingTo);
    
        $booking = Booking::create([
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'booking_date' => $request->input('booking_date'),
            'booking_type' => $request->input('booking_type'),
            'booking_slot' => $request->input('booking_slot'),
            'booking_from' => $bookingFromDateTime,
            'booking_to' => $bookingToDateTime,
        ]);
    
        return redirect('home');
    }
    

}
