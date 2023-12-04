@extends('admin.layout.master')
@section('title')
    All Enquiries
@endsection



@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Enquiry</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Enquiry</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Enquiries</a></li>
                    </ol>
                </div>
            </div>
            <div id="alertContainer"></div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4 class="card-title">All Enquiries </h4>
                                    <a href="{{ route('enquiry') }}" class="btn btn-primary"><i
                                            class="fa-solid fa-plus"></i> Add Enquiry</a>

                                </div>

                                <div class="card-body">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-condensed data-table table-hover"
                                            id="ajax-crud-datatable">
                                            <thead class="text-center">
                                                <tr>

                                                    <th width="10px">Sl No</th>
                                                    <th width="100px">Phone No</th>
                                                    <th width="100px">Full Name</th>
                                                    <th width="100px">Address</th>
                                                    <th width="10px">Course Title</th>
                                                    <th width="10px">Source</th>


                                                    <th width="10px">Follow-Up</th>
                                                    <th width="10px">Status</th>
                                                    <th width="10px">Enquiry Date</th>
                                                    <th width="10px">Comment</th>
                                                    <th width="10px">Action</th>

                                                </tr>
                                            </thead>

                                            <tbody class="text-center">
                                                @foreach ($enquiries as $key => $enquiry)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $enquiry->phone_no }}</td>
                                                        <td>{{ $enquiry->full_name }}</td>
                                                        <td>{{ $enquiry->address }}</td>
                                                        <td>{{ $enquiry->course_title }}</td>
                                                        <td>{{ $enquiry->source }}</td>


                                                        <td>{{ $enquiry->follow_up }} Follow-up</td>
                                                        <td>
                                                            @if ($enquiry->status == 'b')
                                                                At Booking
                                                            @elseif($enquiry->status == 'a')
                                                                Admission Confirm
                                                            @else
                                                                Initial
                                                            @endif
                                                        </td>
                                                        <td>{{ $enquiry->enquiry_at }}</td>
                                                        <td>{{ $enquiry->comment }}</td>
                                                        <td>
                                                            <a href="{{ route('follow-up', $enquiry->id) }}">
                                                                <button class="btn btn-primary btn-sm mt-1"
                                                                    onclick="return confirm('Are you sure ?');">
                                                                    Follow-Up
                                                                </button>
                                                            </a>
                                                            @if ($enquiry->status == 'i')
                                                                <a href="{{ route('addmission', $enquiry->id) }}">
                                                                    <button class="btn btn-primary btn-sm mt-1">Admission
                                                                    </button>
                                                                </a>
                                                            @endif
                                                            @if ($enquiry->status == 'i')
                                                                <a href="{{ route('booking', $enquiry->id) }}">
                                                                    <button
                                                                        class="btn btn-primary btn-sm mt-1">Booking</button>
                                                                </a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                        {{-- {{ $enquiries->links() }} --}}
                                        {!! $enquiries->render('pagination::bootstrap-5') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="course-modal" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary rounded-0">
                                        <h5 class="modal-title text-white">Department</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">
                                            <i class="fa-solid fa-circle-xmark"></i></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="javascript:void(0)" id="DepartmentForm" name="Form"
                                            class="form-horizontal" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <strong class="error_success_msg_container my-3 text-center"></strong>
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-6 control-label">Department Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control rounded-0"
                                                        id="department_name" name="department_name"
                                                        placeholder="Enter Department Name" maxlength="50" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-6 control-label">Department Code</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control rounded-0"
                                                        id="department_code" name="department_code"
                                                        placeholder="Enter Department Code" maxlength="50" required="">
                                                </div>
                                            </div>

                                            <div class="col-sm-offset-2 col-sm-10"><br />
                                                <button type="submit" class="btn btn-primary" id="btn-save"><i
                                                        class="fa-regular fa-bookmark"></i> Save changes
                                                </button>
                                                <button type="button" class="btn btn-secondary" id="btn_cncl"
                                                    data-bs-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
