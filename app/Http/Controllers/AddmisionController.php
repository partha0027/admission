<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Enquiry;

class AddmisionController extends Controller
{
    public function addmission()
    {
        $enquiry = Enquiry::get();
        return view('admin.addmission.all-addmission', compact('enquiry'));
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

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function getAdd()


    {
        // $admissions = Admission::all();
        $admissions = Admission::paginate(10);
        return view('admin.addmission.addmission-view', compact('admissions'));
    }
}
