<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Dreamzone - Edit Admission</title>
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
                        <form action="{{ route('update-old', $admissions->id) }}" id="DepartmentForm" name="Form"
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

                                        <option value="2023" @if ($admissions->session == '2023') selected @endif>2023
                                        </option>
                                        <option value="2022" @if ($admissions->session == '2022') selected @endif>2022
                                        </option>
                                        <option value="2021" @if ($admissions->session == '2021') selected @endif>2021
                                        </option>
                                        <option value="2020" @if ($admissions->session == '2020') selected @endif>2020
                                        </option>



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
                                        class="form-select @error('status') is-invalid @enderror" value="">
                                        <option value="">--Select Status--</option>

                                        <option value="Yes" @if ($admissions->status == 'Yes') selected @endif>Yes
                                        </option>
                                        <option value="No" @if ($admissions->status == 'No') selected @endif>No
                                        </option>


                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="mb-2">
                                <label class="mb-2"><strong>Admission Count</strong></label>
                                <input type="text" class="form-control" id="amount" name="count" required
                                    placeholder="Enter Count" value="{{ $admissions->count }}"
                                    oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">

                            </div>
                            <div class="mb-2">
                                <label class="mb-2"><strong>Month</strong></label>


                                <select name="month" id="month" value = "{{ $admissions->month }}"
                                    class="form-select  @error('month') is-invalid @enderror"
                                    value="{{ old('month') }}">
                                    <option value='' selected>--Select Month--</option>
                                    <option value='0' @if ($admissions->month == '0') selected @endif>Janaury
                                    </option>
                                    <option value='1' @if ($admissions->month == '1') selected @endif>February
                                    </option>
                                    <option value='2' @if ($admissions->month == '2') selected @endif>March
                                    </option>
                                    <option value='3' @if ($admissions->month == '3') selected @endif>April
                                    </option>
                                    <option value='4' @if ($admissions->month == '4') selected @endif>May
                                    </option>
                                    <option value='5' @if ($admissions->month == '5') selected @endif>June
                                    </option>
                                    <option value='6' @if ($admissions->month == '6') selected @endif>July
                                    </option>
                                    <option value='7' @if ($admissions->month == '7') selected @endif>August
                                    </option>
                                    <option value='8' @if ($admissions->month == '8') selected @endif>September
                                    </option>
                                    <option value='9' @if ($admissions->month == '9') selected @endif>October
                                    </option>
                                    <option value='10' @if ($admissions->month == '10') selected @endif>November
                                    </option>
                                    <option value='11' @if ($admissions->month == '11') selected @endif>December
                                    </option>
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
