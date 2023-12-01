<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="fw-bold text-secondary text-center">Register</h2>
                    </div>
                    <div class="card-body p-5">
                        <form action="#" method="POST" id="register_form">
                            <div id="show-success-alert">

                            </div>
                            @csrf
                            <div class="mb-3">
                                <input type="name" name="name" id="name" class="form-control rounded-0"
                                    placeholder="Full Name">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="email" class="form-control rounded-0"
                                    placeholder="E-mail">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone" id="phone" class="form-control rounded-0"
                                    placeholder="Phone">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" class="form-control rounded-0"
                                    placeholder="Password">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="cpassword" id="cpassword" class="form-control rounded-0"
                                    placeholder="Confirm Password">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-3 d-grid">
                                <input type="submit" value="Register" class="btn btn-primary rounded-0" id="register_btn">
                            </div>
                            <div class="text-center text-secondary">
                                <div>Already have an account? <a href="/login" class="text-decoration-none">Login
                                        Here</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/function.js') }}"></script>
    <script>
        $(function() {
            $('#register_form').submit(function(e) {
                e.preventDefault();

                $('#register_btn').val('Please Wait...');

                $.ajax({
                    url: "{{ route('auth.register') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(res) {
                        if (res.status == 400) {
                            showError('name', res.messages.name);
                            showError('email', res.messages.email);
                            showError('phone', res.messages.phone);
                            showError('password', res.messages.password);
                            showError('cpassword', res.messages.cpassword);
                            $('#register_btn').val('Register');
                        } else if (res.status == 200) {
                            $('#show-success-alert').html(showMessage('success', res.messages));
                            $('#register_form')[0].reset();
                            removeValidationClasses('#register_form');
                            $('#register_btn').val('Register');
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
