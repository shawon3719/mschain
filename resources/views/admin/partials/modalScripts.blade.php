
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('lugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- jquery-validation -->
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
{{--<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>--}}
<script>
    // /**
    //  * Created by Shawon on 15-Sep-20.
    //  */
    $(document).ready(function () {
        $('.img_input').each(function () {
            $(this).rules("add", {
                required: true
            });
        });
        $('.img_prio_input').each(function () {
            $(this).rules("add", {
                required: true
            });
        });
        $('#myForm').validate({
            rules: {
                category_id: {
                    required: true,
                },
                title: {
                    required: true,
                },
                name: {
                    required: true,
                },
                event_id: {
                    required: true,
                },
                code: {
                    required: true,
                },
                description: {
                    required: true,
                },
                main_image: {
                    required: true,
                } ,
                end_latest_date: {
                    required: true,
                } ,
                priority: {
                    required: true,
                },
                "product_image[]": {
                    required: true,
                },
                "image_priority[]": {
                    required: true,
                },
                "product_image[0]": {
                    required: true,
                },
                "image_priority[0]": {
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
                category_id: {
                    required: "Please Enter some value."
                },
                title: {
                    required: "Please Enter some value."
                },
                code: {
                    required: "Please Enter some value."
                },
                description: {
                    required: "Please Enter some value."
                },
                main_image: {
                    required: "Please Enter some value."
                },
                end_latest_date: {
                    required: "Please Enter some value."
                },
                priority: {
                    required: "Please Enter some value."
                },
                "product_image[]": {
                    required: "Please Enter some value."
                },
                add_type: {
                    required: "Please Enter some value."
                },
                add_1: {
                    required: "Please Enter some value."
                },
                "image_priority[]": {
                    required: "Please Enter some value."
                },


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
<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#outputMain1').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#outputMain2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#outputMain3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>