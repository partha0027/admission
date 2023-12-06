<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admission;
use App\Models\Booking;
use App\Models\Enquiry;
use App\Models\OldAdmission;
use Carbon\Carbon;

class DashBoardController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
    public function dashboard()
    {
        $totalAdmissions = Admission::count();
        $totalBooking = Booking::count();
        $enquiry = Enquiry::count();
        $admissions = Admission::all();
        $totalFees = $admissions->sum('amount');

        $data = Admission::select('id', 'addmission_at')->where('addmission_at', 'like', '%2023%')->get()->groupBy(function ($data) {
            return Carbon::parse($data->addmission_at)->format('M');
        });


        $months = [];
        $monthCount = [];

        foreach ($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);;
        }

        //for 2022


        $data2 = OldAdmission::select('id', 'session', 'admission_at', 'count')->where('session', '2022')->get()->groupBy(function ($data2) {
            return Carbon::parse($data2->admission_at)->format('M');
        });

        $months2 = [];
        $monthCount2 = [];

        foreach ($data2 as $month2 => $values2) {
            $count = '';
            foreach ($values2 as $er) {
                $count = $er->count;
            }


            $months2[] = $month2;
            $monthCount2[] = $count;
        }


        return view("admin.index", compact(
            'totalAdmissions',
            'totalBooking',
            'enquiry',
            'totalFees',
            'data',
            'months',
            'monthCount',
            'data2',
            'months2',
            'monthCount2'

        ));
    }
}
