<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل پشتیبانی پایانه های بانکی موسسه ملل </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
    <!-- persian-datepicker.min.css -->
    <link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/css/adminlte.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap-rtl.min.css')}}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">


    @yield('css')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/RequestServices" class="nav-link"><img src="/images/SVG/Two color_Home 2 (1).svg" alt=""></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar">
        <!-- Brand Logo -->
        <a href="" class="brand-link" style="text-decoration: none ; margin-right: 0.8rem">
            <img src="/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle">
            <span class="brand-text font-weight-bold">پنل @if(auth()->user()->role == 'bank')<span>شعبه</span> @elseif(auth()->user()->role == 'user') <span>فناوری</span>@endif</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr; margin-right: 0.8rem">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                            <img src="/images/avatar5.png" class="img-circle" alt="User Image">

                    </div>
                    <div class="info">
{{--                        @if(Session::has("user"))--}}
{{--                            <h6>{{Session::get('firstName')." ".Session::get('lastName')}}</h6>--}}
{{--                        @endif--}}
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="width: 105%">


                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link ">
                                <img src="/images/SVG/Two color_ Menu.svg" alt="dashboard" class="pl-2">
                                <p>
                                    مدیریت خدمات
                                    <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('index')}}" class="nav-link @if(URL::current() == route('index')) active @endif ">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p class="nav-p">لیست درخواست ها</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    @if(auth()->user()->role == 'user')
                                    <a href="{{route('listSendStats')}}" class="nav-link @if(URL::current() == route('listSendStats')) active @endif ">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p class="nav-p"> درخواست های ثبت شده</p>
                                    </a>
                                </li>
                                @endif()
                                <li class="nav-item">
                                    @if(auth()->user()->role == 'bank')
                                    <a href="{{route('RequestServices')}}" class="nav-link @if(URL::current() == route('RequestServices')) active @endif">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>درخواست خدمات</p>
                                    </a>
                                </li>
                                @endif()
                            </ul>
                        </li>

                        @if(auth()->user()->role !== 'bank')
                        <li class="nav-item">
                            <a href="{{route('report')}}" class="nav-link @if(URL::current() == route('report')) active @endif">
                                <i class="nav-icon fa fa-edit pl-2"></i>
                                <p>
                                    گزارشات
                                </p>
                            </a>
                        </li>
                        @endif()

                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">
                                <img src="/images/SVG/Two color_ Logout (1).svg" alt="settings" class="pl-2">
                                <p>
                                    خروج
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>
    @yield('content')

    <footer class="main-footer">
        <strong>Fam Co FinTech 2020</strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/adminlte.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/persian-date.min.js')}}"></script>
<script src="{{asset('js/persian-datepicker.min.js')}}"></script>
<script src="{{asset('js/TreeView.js')}}"></script>
<script src="{{asset('js/Widget.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
{{--<script src="../https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>--}}
{{--<script src="{{asset('plugins/morris/morris.min.js')}}"></script>--}}
<!-- Sparkline -->
<script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/ac.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
@yield('script')
</body>
</html>
