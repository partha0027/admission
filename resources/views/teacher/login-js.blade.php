<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>






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



<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ajax-crud-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admin/course') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'course_name',
                    name: 'course_name'
                },
                {
                    data: 'course_id',
                    name: 'course_id'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: true
                },
            ],
            order: [
                [0, 'asc']
            ]
        });
    });

    function add() {
        $('#EmployeeForm').trigger("reset");
        $('#EmployeeModal').html("Add Employee");
        $('#course-modal').modal('show');
        $('#id').val('');
        $('#btn-save').show();
    }


    function editFunc(id) {
        $.ajax({
            type: "POST",
            url: "{{ url('admin/course-edit') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('#EmployeeModal').html("Edit Employee");
                $('#course-modal').modal('show');
                $('#id').val(res.id);
                $('#course_name').val(res.course_name);
                $('#course_id').val(res.course_id);



                $('#btn-save').show();
                console.log(res);
            }
        });
    }

    function deleteFunc(id) {
        if (confirm("Delete Record?") == true) {
            var id = id;
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('admin/delete') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    var oTable = $('#ajax-crud-datatable').dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }

    function viewFunc(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('admin/course-view') }}/" + id,
            dataType: 'json',
            success: function(res) {
                $('#EmployeeModal').html("View Employee");
                $('#course-modal').modal('show');
                $('#id').val(res.id);
                $('#course_name').val(res.course_name);
                $('#course_id').val(res.course_id);

                $('#btn-save').hide();
                $('#btn_cncl').hide();




            }
        });
    }




    $('#EmployeeForm').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('admin/course-store') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#course-modal').modal('hide');
                var oTable = $('#ajax-crud-datatable').dataTable();
                oTable.fnDraw(false);

                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);

            },
            error: function(data) {
                console.log(data);

            }
        });
    });
</script>
