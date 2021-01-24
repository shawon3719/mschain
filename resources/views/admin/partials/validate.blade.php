

<script>
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                title: {
                    required: true,
                },
                description: {
                    required: true,
                },
                image: {
                    required: true,
                } ,
                priority: {
                    required: true,
                },
                add_type: {
                    required: true,
                },
                add_1: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: "Please Enter some value."
                },
                description: {
                    required: "Please Enter some value."
                },
                image: {
                    required: "Please Enter some value."
                },
                priority: {
                    required: "Please Enter some value."
                },
                add_type: {
                    required: "Please Enter some value."
                },
                add_1: {
                    required: "Please Enter some value."
                }


            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
