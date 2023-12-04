@extends('admin.layout.master')
@section('title', 'Admin Panel')


@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-6 col-xxl-6 col-sm-12">
                    <div class="row">
                        <div class="col-xl-6 col-xxl-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Enquiry</h4>
                                    <h3>{{ $enquiry }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-primary" style="width: 10%">
                                        </div>
                                    </div>
                                    <small>80% Increase in 20 Days</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Bookings</h4>
                                    <h3>{{ $totalBooking }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-warning" style="width: 50%">
                                        </div>
                                    </div>
                                    <small>50% Increase in 25 Days</small>
                                </div>
                            </div>
                        </div>
                
                        <div class="col-xl-6 col-xxl-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Admissions</h4>
                                    <h3>{{ $totalAdmissions }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-success" style="width: 30%">
                                        </div>
                                    </div>
                                    <small>30% Increase in 30 Days</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-6 col-sm-6">
                            <div class="widget-stat card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Fees</h4>
                                    <h3>{{  $totalFees }}</h3>
                                    <div class="progress mb-2">
                                        <div class="progress-bar progress-animated bg-success" style="width: 30%">
                                        </div>
                                    </div>
                                    <small>30% Increase in 30 Days</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Income/Expense Report</h3>
                        </div>
                        <div class="card-body">
                            <div id="morris_bar_2" class="morris_chart_height"></div>
                        </div>
                    </div>
                </div>
            
        
            </div>
        </div>
    </div>
@endsection
