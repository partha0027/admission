@extends('admin.layout.master')
@section('title')
    All Old Admissions
@endsection



@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Old Admissions</h4>
                    </div>
                </div>
                {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Admissions</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Admissions</a></li>
                    </ol>
                </div> --}}
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class="card-title">All Admissions </h4>
                                    <a href="{{ route('addmission-view-old') }}" class="btn btn-primary">
                                        <i class="fa-solid fa-plus"></i> Add New
                                    </a>


                                </div>

                                <div class="card-body">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ Session::get('success') }}</strong>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <span style="font-size: 20px">Session : 2023</span>
                                        <table class="table table-bordered table-condensed data-table table-hover"
                                               id="ajax-crud-datatable">
                                            <thead class="text-center">
                                            <tr>

                                                <th>Sl No.</th>
                                                <th>Session</th>
                                                <th>Admission Status</th>
                                                {{-- <th width="10px">Remarks</th> --}}
                                                <th>Admission Count</th>
                                                <th>Month</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($admissions23 as $key => $admission23)
                                                <tr class="text-center">

                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $admission23->session }}</td>
                                                    <td>{{ $admission23->status }}</td>
                                                    {{-- <td>{{ $admission->remarks }}</td> --}}
                                                    <td>{{ $admission23->count }} Students</td>
                                                    <td>
                                                        @php
                                                            $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
                                                        @endphp
                                                        {{ $month[$admission23->month-1] }}
                                                    </td>
                                                    <td>

                                                        <a href="{{ route('edit-old', $admission23->id) }}"
                                                           class="btn btn-sm btn-primary">
                                                            <i class="fa-solid fa-edit"></i> Edit
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                        {!! $admissions23->render('pagination::bootstrap-5') !!}

                                    </div>
                                    <div class="table-responsive">
                                        <br>
                                        <span style="font-size: 20px">Session : 2022</span>
                                        <table class="table table-bordered table-condensed data-table table-hover"
                                               id="ajax-crud-datatable">
                                            <thead class="text-center">
                                            <tr>

                                                <th>Sl No.</th>
                                                <th>Session</th>
                                                <th>Admission Status</th>
                                                {{-- <th width="10px">Remarks</th> --}}
                                                <th>Admission Count</th>
                                                <th>Month</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($admissions22 as $key => $admission22)
                                                <tr class="text-center">

                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $admission22->session }}</td>
                                                    <td>{{ $admission22->status }}</td>
                                                    {{-- <td>{{ $admission->remarks }}</td> --}}
                                                    <td>{{ $admission22->count }} Students</td>
                                                    <td>
                                                        @php
                                                            $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
                                                        @endphp
                                                        {{ $month[$admission22->month-1] }}
                                                    </td>
                                                    <td>

                                                        <a href="{{ route('edit-old', $admission22->id) }}"
                                                           class="btn btn-sm btn-primary">
                                                            <i class="fa-solid fa-edit"></i> Edit
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                        {!! $admissions22->render('pagination::bootstrap-5') !!}

                                    </div>
                                    <div class="table-responsive"><br>
                                        <span style="font-size: 20px">Session : 2021</span>
                                        <table class="table table-bordered table-condensed data-table table-hover"
                                               id="ajax-crud-datatable">
                                            <thead class="text-center">
                                            <tr>

                                                <th>Sl No.</th>
                                                <th>Session</th>
                                                <th>Admission Status</th>
                                                {{-- <th width="10px">Remarks</th> --}}
                                                <th>Admission Count</th>
                                                <th>Month</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($admissions21 as $key => $admission21)
                                                <tr class="text-center">

                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $admission21->session }}</td>
                                                    <td>{{ $admission21->status }}</td>
                                                    {{-- <td>{{ $admission->remarks }}</td> --}}
                                                    <td>{{ $admission21->count }} Students</td>
                                                    <td>
                                                        @php
                                                            $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
                                                        @endphp
                                                        {{ $month[$admission21->month-1] }}
                                                    </td>
                                                    <td>

                                                        <a href="{{ route('edit-old', $admission21->id) }}"
                                                           class="btn btn-sm btn-primary">
                                                            <i class="fa-solid fa-edit"></i> Edit
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                        {!! $admissions21->render('pagination::bootstrap-5') !!}

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
