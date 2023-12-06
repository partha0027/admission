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
                                                @foreach ($admissions as $key => $admission)
                                                    <tr class="text-center">

                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $admission->session }}</td>
                                                        <td>{{ $admission->status }}</td>
                                                        {{-- <td>{{ $admission->remarks }}</td> --}}
                                                        <td>{{ $admission->count }} Students</td>
                                                        <td>
                                                            @php
                                                                $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
                                                            @endphp
                                                            {{ $month[$admission->month-1] }}
                                                        </td>
                                                        <td>

                                                            <a href="{{ route('edit-old', $admission->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fa-solid fa-edit"></i> Edit
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                        {!! $admissions->render('pagination::bootstrap-5') !!}

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
