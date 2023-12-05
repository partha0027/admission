<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Dreamzone - Addmission Enquiry</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/dz.png') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card shadow-sm mt-3">
                    <div class="card-header">
                        <h4 class="fw-bold  text-center">Enquiry </h4>
                        {{-- <h4 class="fw-bold  text-center">Login </h4> --}}
                    </div>
                    <div class="card-body">
                        <div id="login_alert">
                            @if (Session::get('error'))
                                <div class="alert alert-danger fw-bold" role="alert">
                                    {{ Session::get('error') }}

                                </div>
                            @endif
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('enquiry-store') }}" id="DepartmentForm" name="Form"
                            class="form-horizontal" method="POST" enctype="multipart/form-data" method="POST">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @csrf

                            <input type="hidden" name="id" id="id">
                            <div class="row">

                            </div>

                            <div class="mb-2">
                                <label class=""><strong>Enter Phone Number</strong></label>
                                <input type="text" class="form-control @error('phone_no') is-invalid @enderror"
                                    id="phone_no" name="phone_no" placeholder="Enter Phone Number" maxlength="10"
                                    minlength="10" value="{{ old('phone_no') }}"
                                    oninput="this.value = this.value.replace(/[^0-9 ]/g, '').replace(/(\..*)\./g, '$1');">
                                @error('phone_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-2">
                                <label class=""><strong>Enter Full Name</strong></label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                    id="full_name" name="full_name" placeholder="Enter Full Name" maxlength="50"
                                    value="{{ old('full_name') }}">
                                @error('full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label class=""><strong>Enter Addresse</strong></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address"
                                    value="{{ old('address') }}"></textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="mb-2">
                                <label class=""><strong>Enter Course Name</strong></label>
                                <select name="course_title" id="course_title"
                                    class="form-select  @error('course_title') is-invalid @enderror"
                                    aria-label="Default select example">
                                    <option value="">--Select Course --</option>
                                    <option value="Master Diploma in Interior Architecture Design">Master Diploma in
                                        Interior Architecture Design</option>
                                    <option value="Master Diploma in Interior Architecture and Design Sketchup">Master
                                        Diploma in Interior Architecture and Design Sketchup</option>
                                    <option value="Professional in IAD Grafx">Professional in IAD Grafx</option>
                                    <option value="Diploma in Interior Architecture Design">Diploma in Interior
                                        Architecture Design</option>
                                    <option value="Diploma in IAD Grafx">Diploma in IAD Grafx</option>
                                    <option value="CAD fro Creative Design">CAD fro Creative Design</option>
                                    <option value="Design Visusalization">Design Visusalization</option>
                                    <option value="Certificate Course on Design Visusalization(Sketchup)">Certificate
                                        Course on Design Visusalization(Sketchup)</option>
                                    <option value="Certificate Course on Advanced Rendering(V-Ray)">Certificate
                                        Course on Advanced Rendering(V-Ray)</option>
                                    <option
                                        value="Advanced Certificate Course on Design Visualization(Sketchup & V-Ray)">
                                        Advanced Certificate
                                        Course on Design Visualization(Sketchup & V-Ray)</option>
                                    <option
                                        value="Advanced Certificate Course on Design Visualization(3ds Max & V-Ray)">
                                        Advanced Certificate
                                        Course on Design Visualization(3ds Max & V-Ray)</option>



                                    <option value="Master Diploma in Fashion Design">Master Diploma in Fashion Design
                                    </option>
                                    <option value="Professional in Fashion Design">Professional in Fashion Design
                                    </option>
                                    <option value="Certificate course on Manual Pattern Making">Certificate course on
                                        Manual Pattern Making</option>


                                    <option value="PG Diploma in Graphics & Animation (Pre &AFE ) Max">PG Diploma in
                                        Graphics & Animation (Pre &AFE ) Max</option>
                                    <option value="Master diploma in 2d Graphics & web Design">Master diploma in 2d
                                        Graphics & web Design
                                    </option>
                                    <option value="Professional in 2d Graphics & Web design">Professional in 2d Graphics
                                        & Web design
                                    </option>
                                    <option value="Diploma in Graphic Design">Diploma in Graphic Design</option>
                                    <option value="Certiificate Course on Image Editing">Certiificate Course on Image
                                        Editing</option>
                                    <option value="Certificate Course on Digital Illustration">Certificate Course on
                                        Digital Illustration</option>
                                    <option value="Certificate Course on Digital draw and Design">Certificate Course on
                                        Digital draw and Design</option>

                                    <option value="Certificate Course on Print and Publishing Designs">Certificate
                                        Course on Print and Publishing Designs</option>
                                    <option value="Cerificate Course on Web Graphics">Cerificate Course on Web Graphics
                                    </option>
                                    <option value="Master Diploma in Web Design & Development">Master Diploma in Web
                                        Design & Development</option>


                                    <option value="Master Diploma in 3D Modelling & Animation Maya">Master Diploma in
                                        3D
                                        Modelling & Animation Maya</option>
                                    <option value="Diploma in Movie Editing & Compositing ">Diploma in Movie Editing &
                                        Compositing </option>
                                    <option value="Certificate Course on Editing">Certificate Course on Editing
                                    </option>
                                </select>
                                @error('course_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="mb-2">
                                <label class=""><strong>Source</strong></label>
                                <input type="text" class="form-control @error('source') is-invalid @enderror"
                                    id="source" name="source" placeholder="Enter Source " maxlength="50"
                                    required="" value="{{ old('source') }}">
                                @error('source')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-2">
                                <label class=""><strong>Comment</strong></label>
                                <div class="col-sm-12">
                                    <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror"
                                        value="{{ old('comment') }}"></textarea>

                                    @error('comment')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="mb-2">
                                <label class=""><strong>Enquiry At</strong></label>
                                <input type="date" class="form-control @error('enquiry_at') is-invalid @enderror"
                                    id="enquiry_at" name="enquiry_at" placeholder="Enter Joining Date"
                                    value="{{ old('enquiry_at') }}">
                                @error('enquiry_at')
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        <
        script
        src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity = "sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    </script>

</body>

</html>
