<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Booking;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking($id)
    {
//        $booking = Booking::where('id',$id)->first();dd($booking);
        $en = Enquiry::where('id',$id)->first();
        return view('admin.booking.booking-view', compact('en'));
    }

    public function bookingView()
    {
        $booking = Booking::get();
        return view('admin.booking.all-booking', compact('booking'));
    }

    public function bookingStore(Request $request)
    {
        $request->validate([
            'enquiry_id' => 'required',
            'amount' => 'required'
        ]);

        $enquiry = new Booking();

        $enquiry->enquiry_id = $request->enquiry_id;

        $enquiry->amount = $request->amount;
        $enquiry->save();

        $en = Enquiry::where('id',$request->enquiry_id)->first();
        $en->status = 'b';
        $en->update();

        return redirect()->route('view-enquiry')->with('success', 'Booking submitted successfully.');
    }
}
