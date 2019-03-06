{{--@extends('adminlte::login')--}}


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/AdminLTE.min.css">

    <!-- DataTables with bootstrap 3 style -->
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">

    <link rel="stylesheet" href="/vendor/adminlte/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="/vendor/adminlte/css/auth.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="/admin"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="form-group has-feedback ">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                       placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback ">
                <input type="password" name="password" class="form-control"
                       placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Запомнить меня
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit"
                            class="btn btn-primary btn-block btn-flat">Войти</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        {{--<div class="auth-links">--}}
            {{--<a href="/password/reset"--}}
               {{--class="text-center"--}}
            {{-->I forgot my password</a>--}}
            {{--<br>--}}
            {{--<a href="/register"--}}
               {{--class="text-center"--}}
            {{-->Register a new membership</a>--}}
        {{--</div>--}}
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

<script src="/vendor/adminlte/vendor/jquery/dist/jquery.min.js"></script>
<script src="/vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js"></script>
<script src="/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

      <!-- Select2 -->
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

      <!-- DataTables with bootstrap 3 renderer -->
<script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>

      <!-- ChartJS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>

<script src="/vendor/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

</body>
</html>
