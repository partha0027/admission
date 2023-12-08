<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Booking;
use App\Models\Enquiry;
use App\Models\OldAdmission;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
            $monthCount[] = count($values);
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

        // for 2023

        $data3 = OldAdmission::select('id', 'session', 'admission_at', 'count')->where('session', '2023')->get()->groupBy(function ($data3) {
            return Carbon::parse($data3->admission_at)->format('M');
        });

        $months3 = [];
        $monthCount3 = [];

        foreach ($data3 as $month3 => $values3) {
            $count = '';
            foreach ($values3 as $er) {
                $count3 = $er->count;
            }

            $months3[] = $month3;
            $monthCount3[] = $count3;
        }

        //for 2021
        $data4 = OldAdmission::select('id', 'session', 'admission_at', 'count')->where('session', '2021')->get()->groupBy(function ($data4) {
            return Carbon::parse($data4->admission_at)->format('M');
        });

        $months4 = [];
        $monthCount4 = [];

        foreach ($data4 as $month4 => $values4) {
            $count = '';
            foreach ($values4 as $er) {
                $count4 = $er->count;
            }

            $months4[] = $month4;
            $monthCount4[] = $count4;
        }

        return view("admin.index", compact(
            ['totalAdmissions',
                'totalBooking',
                'enquiry',
                'totalFees',
                'data',
                'months',
                'monthCount',
                'data2',
                'months2',
                'monthCount2',
                'months3',
                'monthCount3',
                'months4',
                'monthCount4',

            ]

        ));
    }
}
