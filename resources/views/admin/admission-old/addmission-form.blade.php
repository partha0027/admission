<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Dreamzone - Old Admission</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/dz.png') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="fw-bold  text-center">Admission </h4>
                        {{-- <h4 class="fw-bold  text-center">Login </h4> --}}
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('addmission-store-old') }}" id="DepartmentForm" name="Form"
                            class="form-horizontal" method="POST" enctype="multipart/form-data" method="POST">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (Session::get('error'))
                                <div class="alert alert-danger fw-bold" role="alert">
                                    {{ Session::get('error') }}

                                </div>
                            @endif
                            @csrf
                            <div class="mb-2">




                            </div>
                            <div class="mb-2">
                                <label class="mb-2"><strong>Admission Session</strong></label>
                                <div class="form-group">
                                    <select name="session" id="session" value="{{ old('session') }}"
                                        class="form-select @error('session') is-invalid @enderror">
                                        <option value="">--Select Session--</option>

                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>



                                    </select>
                                    @error('session')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>



                            <div class="mb-2">
                                <label class="mb-2"><strong>Admission Status</strong></label>
                                <div class="form-group">
                                    <select name="status" id="status" value="{{ old('status') }}"
                                        class="form-select @error('status') is-invalid @enderror">
                                        <option value="">--Select Status--</option>

                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>


                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="mb-2">
                                <label class="mb-2"><strong>Admission Count</strong></label>
                                <input type="text" class="form-control" id="amount" name="count" required
                                    placeholder="Enter Count"
                                    oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">

                            </div>
                            <div class="mb-2">
                                <label class="mb-2"><strong>Month</strong></label>


                                <select name="month" id="month"
                                    class="form-select  @error('month') is-invalid @enderror"
                                    value="{{ old('month') }}">
                                    <option value='' selected>--Select Month--</option>
                                    @if (!in_array('1', $month))
                                        <option value='1'>Janaury</option>
                                    @endif
                                    @if (!in_array('2', $month))
                                        <option value='2'>February</option>
                                    @endif


                                    {{-- <option value='2'>February</option> --}}
                                    @if (!in_array('3', $month))
                                        <option value='3'>March</option>
                                    @endif

                                    @if (!in_array('4', $month))
                                        <option value='4'>April</option>
                                    @endif

                                    @if (!in_array('5', $month))
                                        <option value='5'>May</option>
                                    @endif

                                    @if (!in_array('6', $month))
                                        <option value='6'>June</option>
                                    @endif

                                    @if (!in_array('7', $month))
                                        <option value='7'>July</option>
                                    @endif


                                    @if (!in_array('8', $month))
                                        <option value='8'>August</option>
                                    @endif


                                    @if (!in_array('9', $month))
                                        <option value='9'>September</option>
                                    @endif

                                    @if (!in_array('10', $month))
                                        <option value='10'>October</option>
                                    @endif

                                    @if (!in_array('11', $month))
                                        <option value='11'>November</option>
                                    @endif

                                    @if (!in_array('12', $month))
                                        <option value='12'>December</option>
                                    @endif

                                </select>

                                @error('month')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

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
