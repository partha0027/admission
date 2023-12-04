<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admission;
use App\Models\Booking;
use App\Models\Enquiry;

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
        return view("admin.index", compact('totalAdmissions', 'totalBooking', 'enquiry', 'totalFees'));
    }
}
