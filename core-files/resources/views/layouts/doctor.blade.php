<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url('/') }}" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>{{ config('app.name', 'Farazy Dental Hospital & Research Center') }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('admin/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('admin/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('admin/plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="{{ asset('admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/bower_components/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <!-- custome links ashik---->
    <link href="{{ asset('admin/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/css/multi-select.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-select.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/plugins/bower_components/summernote/dist/summernote.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('admin/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="{{ route('dashboard') }}" style="font-size: 15px">
                    <b><strong class="dark-logo text-white text-blue">M</strong><strong class="light-logo text-white text-blue">M</strong></b>
                    <span class="hidden-xs text-white text-blue">
                            <span class="dark-logo">{{ $settings ? $settings->app_name : 'App Name' }}</span>
                            <span class="light-logo">{{ $settings ? $settings->app_name : 'App Name' }}</span>
                        </span>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"><img src="{{ asset('admin/plugins/images/users/avatar5.png') }}" alt="user-img" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b><span class="caret"></span> </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-text">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p></div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
            </div>
            <div class="user-profile">
                <div class="dropdown user-pro-body">

                </div>
            </div>
            <ul class="nav" id="side-menu">

                <li>
                    <a href="{{ route('doctor-appointments',['id' => Auth::user()->type_ref ]) }}" class="waves-effect"><i class="ti-image text-info fa-fw"></i><span class="hide-menu">APPOINTMENTS</span></a>
                </li>
                <li>
                    <a href="{{ route('prescriptions') }}" class="waves-effect"><i class="fa fa-graduation-cap text-info fa-fw"></i><span class="hide-menu">PRESCRIPTIONS</span></a>
                </li>
                <li>
                    <a href="{{ route('get-create-prescription') }}" class="waves-effect"><i class="fa fa-graduation-cap text-info fa-fw"></i><span class="hide-menu">NEW PRESCRIPTION</span></a>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-graduation-cap text-info fa-fw"></i><span class="hide-menu">MY LEAVE</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar --> H*Gx0=IscpA2 - farazydental_latest
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
        @if (session('message'))
            <div class="m-l-15 m-r-15">
                @include('../partials.alert')
            </div>
    @endif
    @yield('title')
    <div id="app">
        @yield('content')
    </div>
    <!-- /.container-fluid -->
        <footer class="footer text-center"> 2018 &copy; App Name </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->

    <div class="modal fade in" id="delete-content-modal" tabindex="-1" role="dialog" aria-labelledby="delete-content-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <h3>Do you want to delete this content.</h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                    <a href="#" id="delete-modal-btn" class="btn btn-danger">YES</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('admin/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('admin/js/waves.js') }}"></script>
<!--Counter js -->
<script src="{{ asset('admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
<script src="{{ asset('admin/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>

<!-- chartist chart -->
<script src="{{ asset('admin/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<!-- Sparkline chart JavaScript -->
<script src="{{ asset('admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('admin/js/custom.min.js') }}"></script>
<!-----for templateing ashik---->
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('admin/plugins/bower_components/summernote/dist/summernote.min.js') }}"></script>

<script src="{{ asset('admin/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
<!--Style Switcher -->
<script src="{{ asset('admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
<script src="{{ asset('admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script src="{{ asset('core-files/public/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click','.btn-delete',function(){
            var url = $(this).data('url');
            $("#delete-modal-btn").attr('href',url);
        });
        //daysOfWeekDisabled: [0, 6]
    });

</script>
@yield('script')
</body>
</html>

