<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

    $(function() {
        $("#login_form").submit(function(e) {
            e.preventDefault();


            $('#login_btn').val('Please Wait...');

            $.ajax({
                url: "{{ route('auth.login') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(res) {
                    if (res.status == 400) {
                        showError('email', res.messages.email);
                        showError('password', res.messages.password);

                        $('#login_btn').val('Login');
                    } else if (res.status == 401) {
                        $("#login_alert").html(showMessage('danger', res.messages));
                        $('#login_btn').val('Login');
                    } else if (res.status == 200 && res.messages ==
                        'Logged in Successfully') {
                        window.location.href = "{{ route('index') }}";
                        console.log(res.messages);
                        alert(res.messages);

                    }
                }
            });

        });
    });
</script>







