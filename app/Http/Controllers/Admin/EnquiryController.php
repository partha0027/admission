<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\FollowUp;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function enquiry()
    {
        return view("admin.Enquiry.enquiry-form");
    }

    public function enquiryStore(Request $request)
    {
        $request->validate([
            'phone_no' => 'required',
            'full_name' => 'required',
            'course_title' => 'required',
            'source' => 'required',
            'enquiry_at' => 'required',
            'address' => 'required',
        ]);

        $enquiry = new Enquiry();

        $enquiry->phone_no = $request->phone_no;
        $enquiry->full_name = $request->full_name;
        $enquiry->course_title = $request->course_title;
        $enquiry->source = $request->source;
        $enquiry->enquiry_at = $request->enquiry_at;
        $enquiry->comment = $request->comment;
        $enquiry->address = $request->address;
        $enquiry->save();

        // return redirect()->back()->with('success', 'Form submitted successfully');

        // return redirect()->route('view-enquiry');
        return redirect()->route('view-enquiry')->with('success', 'Enquiry submitted successfully.');
    }

    public function getEnquiry()
    {
        $enquiries = Enquiry::paginate(10);
        return view('admin.Enquiry.enquiry-view', compact('enquiries'));
    }

    public function followUp(Request $request)
    {
        $data = Enquiry::where('id', $request->id)->first();
        $followUp = $data->follow_up + 1;
        $data->follow_up = $followUp;
        $data->update();

        $follow = new FollowUp();
        $follow->e_id = $data->id;
        $follow->followUp = $followUp;
        $follow->message = $request->message;
        $follow->save();
        return redirect()->back()->with('success', 'Follow-Up add.');
    }

}
