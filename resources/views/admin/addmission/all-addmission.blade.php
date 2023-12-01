<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Edumin - Bootstrap Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="fw-bold  text-center">Addmission </h4>
                        {{-- <h4 class="fw-bold  text-center">Login </h4> --}}
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('addmission-store') }}" id="DepartmentForm" name="Form"
                            class="form-horizontal" method="POST" enctype="multipart/form-data" method="POST">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @csrf
                            <div class="mb-2">
                                <label class="mb-2"><strong>Enquiry ID</strong></label>

                                <select name="enquiry_id" id="enquiry_id" class="form-select rounded-0">

                                    <option value="">-- Select Enquiry ID --</option>
                                    @foreach ($enquiry as $data)
                                        <option value="   {{ $data->id }}">
                                            {{ $data->id }}
                                        </option>
                                    @endforeach

                                </select>


                            </div>
                            <div class="mb-2">
                                <label class="mb-2"><strong>Statuss</strong></label>
                                <div class="form-group">
                                    <select name="status" id="status" class="form-select rounded-0">
                                        <option value="">--Select Status--</option>

                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="Pending">Pending</option>

                                    </select>

                                </div>

                            </div>
                            <div class="mb-2">
                                <label class="mb-2"><strong>Remarks</strong></label>
                                <textarea name="remarks" id="remarks" class="form-control"></textarea>
                            </div>
                            <div class="mb-2">
                                <label class="mb-2"><strong>Amount</strong></label>
                                <input type="text" class="form-control" id="amount" name="amount"
                                    placeholder="Enter Amount">

                            </div>
                            <div class="mb-2">
                                <label class="mb-2"><strong>Addmission at</strong></label>
                                <input type="date" class="form-control" id="addmission_at" name="addmission_at"
                                    placeholder="Enter Addmission Date">

                            </div>





                            <div class="mt-3 d-grid">
                                <input type="submit" value="Submit" class="btn btn-primary btn-block rounded-0"
                                    id="login_btn">
                            </div>



                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        < script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    </script>

</body>

{{-- addmissio - amount --}}
{{-- enquiry source --}}

</html>
