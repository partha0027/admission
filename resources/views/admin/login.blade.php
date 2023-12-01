<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>Edumin - Bootstrap Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="fw-bold  text-center">Login </h4>
                    {{-- <h4 class="fw-bold  text-center">Login </h4> --}}
                </div>
                <div class="card-body p-5">
                    <div id="login_alert">
                        @if (Session::get('error'))
                            <div class="alert alert-danger fw-bold" role="alert">
                                {{ Session::get('error') }}
                              
                            </div>

                        @endif
                    </div>
                    <form action="{{route('login')}}" method="POST">

                        @csrf
                        <div class="mb-3">
                            <label><strong>Email</strong></label>
                            <input type="email" name="email" id="email" class="form-control rounded-0 mt-2"
                                   placeholder="E-mail" required>
                              
                           
                        </div>
                        <div class="mb-3">
                            <label><strong>Password</strong></label>
                            <input type="password" name="password" id="password"
                                   class="form-control rounded-0 mt-2" placeholder="Password" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="mb-3">
                            <a href="/forgot" class="text-decoration-none">Forgot Pasowrd?</a>
                        </div>
                        <div class="mb-3 d-grid">
                            <input type="submit" value="Login" class="btn btn-primary btn-block rounded-0"
                                   id="login_btn">
                        </div>
                        <div class="text-center text-secondary">
                            <div>Don't have an account? <a href="/register" class="text-decoration-none">Register
                                    Here</a></div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->

<script src="{{ asset('js/function.js') }}"></script>
@include('admin.login-js')


</body>

</html>
