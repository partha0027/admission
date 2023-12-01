@extends('admin.layout.master')
@section('title')
    All Departments
@endsection



@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Addmissions</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Addmissions</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Addmissions</a></li>
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
                                    <h4 class="card-title">All Addmissions </h4>
                                 
                                </div>
                               
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-condensed data-table table-hover"
                                            id="ajax-crud-datatable">
                                            <thead class="text-center">
                                                <tr>

                                                    <th width="100px">Enquiry ID</th>
                                                    <th width="100px">Status</th>
                                                    <th width="10px">Remarks</th>
                                                    <th width="10px">Amount</th>
                                                    <th width="10px">Addmission At</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($admissions as $admission)
                                                    <tr>
                                                     
                                                        <td>{{ $admission->enquiry_id }}</td>
                                                        <td>{{ $admission->status }}</td>
                                                        <td>{{ $admission->remarks }}</td>
                                                        <td>{{ $admission->amount }}</td>
                                                        <td>{{ $admission->addmission_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>















                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="course-modal" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary rounded-0">
                                        <h5 class="modal-title text-white">Department</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true"><i
                                                class="fa-solid fa-circle-xmark"></i></button>
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
                                                <button type="submit" class="btn btn-primary" id="btn-save"> <i
                                                        class="fa-regular fa-bookmark"></i> Save changes</button>
                                                <button type="button" class="btn btn-secondary" id="btn_cncl"
                                                    data-bs-dismiss="modal">Close</button>
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
