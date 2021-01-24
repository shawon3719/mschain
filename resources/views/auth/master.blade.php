<!DOCTYPE html>
<html>
<head>
 @include('auth.partials.links')
</head>
<body class="hold-transition login-page">

<div class="login-box" style="margin-top: -100px">
    <div class="login-logo">
        @yield('title')
    </div>
    <!-- /.login-logo -->
    @yield('content')
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>