<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Enquiry;
use App\Models\OldAdmission;

class AddmisionController extends Controller
{
    public function addmission($id)
    {
        $enquiry = Enquiry::where('id', $id)->first();
        $amount = Booking::where('enquiry_id', $id)->first();
        return view('admin.addmission.addmission-form', compact('enquiry', 'amount'));
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
        $admissions = Admission::get();

        $enquiry->enquiry_id = $request->enquiry_id;
        $enquiry->status = $request->status;
        $enquiry->remarks = $request->remarks;
        $enquiry->amount = $request->amount;
        $enquiry->addmission_at = $request->addmission_at;


        $enquiry->save();

        $en = Enquiry::where('id', $request->enquiry_id)->first();
        $en->status = 'a';
        $en->update();

        $b = Booking::where('enquiry_id', $request->enquiry_id)->first();
        if ($b != NULL) {
            $b->status = 'c';
            $b->update();

            // return redirect()->route('booking-view');
            return redirect()->route('booking-view')->with('success', 'Admission done successfully.');
        }


        // return redirect()->back()->with('success', 'Form submitted successfully.');

        // return view("admin.index");

        return redirect()->route('view-add')->with('success', 'Admission done successfully');
        // return redirect()->route('addmission-view')->with('success', 'Form submitted successfully.');





    }

    public function getAdd()
    {
        // $admissions = Admission::all();
        $admissions = Admission::paginate(10);
        return view('admin.addmission.addmission-view', compact('admissions'));
    }


    //OLD ADMISSION


    public function admitStoreOld(Request $request)
    {
        $request->validate([
            'session' => 'required',
            'status' => 'required',

            'count' => 'required',
            'month' => 'required',
        ]);

        $enquiry = new OldAdmission();


        $enquiry->session = $request->session;
        $enquiry->status = $request->status;
        $enquiry->count = $request->count;
        $enquiry->month = $request->month;
        $enquiry->admission_at = $request->session.'-'.$request->month.'-01';


        $enquiry->save();

        return redirect()->route('view-add-old')->with('success', 'Old Admission data submitted successfully');
    }



    public function addmissionViewOld()
    {

        return view('admin.admission-old.addmission-form');
    }


    public function getAddOld()
    {
        // $admissions = Admission::all();
        $admissions = OldAdmission::paginate(10);
        return view('admin.admission-old.addmission-view', compact('admissions'));
    }


    public function EditOld($id)
    {
        $admissions = OldAdmission::findOrFail($id);
        return view('admin.admission-old.addmission-edit', compact('admissions'));
    }

    public function UpdateOld(Request $request, $id)
    {

        $admissions = OldAdmission::findOrFail($id);
        $admissions->session = $request->session;
        $admissions->status = $request->status;
        $admissions->count = $request->count;
        $admissions->month = $request->month;
        $admissions->admission_at = $request->session.'-'.$request->month.'-01';

        $admissions->save();

        return redirect()->route('view-add-old')->with('success', 'Old Admission data updated successfully');
    }
}
