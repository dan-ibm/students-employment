<!DOCTYPE html>

<html>
<head>
    <title>Laravel7 CRUD @fahmidasclassroom.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
<script>
    $(document).ready(function () {

        /* When click New customer button */
        $('#new-customer').click(function () {
            $('#btn-save').val("create-customer");
            $('#customer').trigger("reset");
            $('#customerCrudModal').html("Add New Employer");
            $('#crud-modal').modal('show');
        });

        /* Edit customer */
        $('body').on('click', '#edit-customer', function () {
            var emp_id = $(this).data('id');
            $.get('employers/'+emp_id+'/edit', function (data) {
                $('#customerCrudModal').html("Edit employer");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled',false);
                $('#crud-modal').modal('show');
                $('#employer_id').val(data.id);
                $('#org_name').val(data.org_name);
                $('#position').val(data.position);
                $('#title').val(data.title);
                $('#requirements').val(data.requirements);
                $('#category').val(data.category);
                $('#min_salary').val(data.min_salary);
                $('#max_salary').val(data.max_salary);
            })
        });
        /* Show customer */
        $('body').on('click', '#show-customer', function () {
            $('#customerCrudModal-show').html("Employer Details");
            $('#crud-modal-show').modal('show');
        });

        /* Delete customer */
        $('body').on('click', '#delete-customer', function () {
            var customer_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "http://localhost:8000/StudentsEmployment/public/employers/"+emp_id,
                data: {
                    "id": emp_id,
                    "_token": token,
                },
                success: function (data) {
                    $('#msg').html('Customer entry deleted successfully');
                    $("#employer_id_" + employer_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });

</script>
</html>
