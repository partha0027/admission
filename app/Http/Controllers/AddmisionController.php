<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Enquiry;

class AddmisionController extends Controller
{
    public function addmission($id)
    {
        $enquiry = Enquiry::where('id', $id)->first();
        return view('admin.addmission.all-addmission', compact('enquiry'));
    }

    public function addmissionView()
    {
        $enquiry = Enquiry::get();
        return view('admin.addmission.addmission-view', compact('enquiry'));
    }


    public function admitStore(Request $request)
    {
        $request->validate([
            'enquiry_id' => 'required',
            'status' => 'required',
            'remarks' => 'required',
            'amount' => 'required',
            'addmission_at' => 'required',
        ]);

        $enquiry = new Admission();

        $enquiry->enquiry_id = $request->enquiry_id;
        $enquiry->status = $request->status;
        $enquiry->remarks = $request->remarks;
        $enquiry->amount = $request->amount;
        $enquiry->addmission_at = $request->addmission_at;


        $enquiry->save();

        $en = Enquiry::where('id', $request->enquiry_id)->first();
        $en->status = 'a';
        $en->update();

        $b = Booking::where('enquiry_id',$request->enquiry_id)->first();
        $b->status = 'c';
        $b->update();

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function getAdd()


    {
        // $admissions = Admission::all();
        $admissions = Admission::paginate(10);
        return view('admin.addmission.addmission-view', compact('admissions'));
    }
}
