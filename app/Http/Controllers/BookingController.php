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
        $en = Enquiry::where('id', $id)->first();
        return view('admin.booking.booking-form', compact('en'));
    }

    public function bookingView()
    {
        $booking = Booking::paginate(10);

        return view('admin.booking.booking-view', compact('booking'));
    }

    public function bookingStore(Request $request)
    {
        $request->validate([
            'enquiry_id' => 'required',
            'amount' => 'required',
            'comment' => 'required'
        ]);

        $enquiry = new Booking();

        $enquiry->enquiry_id = $request->enquiry_id;

        $enquiry->amount = $request->amount;
        $enquiry->comment = $request->comment;
        $enquiry->save();

        $en = Enquiry::where('id', $request->enquiry_id)->first();
        $en->status = 'b';
        $en->update();

        return redirect()->route('view-enquiry')->with('success', 'Booking submitted successfully.');
    }
}


// Remarks 