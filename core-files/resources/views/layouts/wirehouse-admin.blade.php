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
    <title>Milestone Wirehouse</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/admin/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('public/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('public/admin/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('public/admin/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('public/admin/plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="{{ asset('public/admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/admin/plugins/bower_components/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ asset('public/admin/css/animate.css') }}" rel="stylesheet">
    <!-- filter table-->
    <link type="text/css" rel="stylesheet" href="{{ asset('public/admin/plugins/bower_components/jsgrid/dist/jsgrid.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('public/admin/plugins/bower_components/jsgrid/dist/jsgrid-theme.min.css') }}" />
    <!-- Custom CSS -->
    <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet">
    <!-- custome links ashik---->
    <link href="{{ asset('public/admin/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/multi-select.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/bootstrap-select.min.css') }}" rel="stylesheet">

    <link href="{{ asset('public/admin/plugins/bower_components/summernote/dist/summernote.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('public/admin/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('public/css/bootstrap-datetimepicker.min.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" id="theme" rel="stylesheet">



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
                <a class="logo" href="{{ url('/') }}" style="font-size: 15px">
                    <b><strong class="dark-logo text-white text-blue">W</strong><strong class="light-logo text-white text-blue">W</strong></b>
                    <span class="hidden-xs text-white text-blue">
                           <span class="dark-logo"> Warehouse Control Panel </span>
                            <span class="light-logo"> Warehouse Control Panel</span>
                        </span>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ asset('public/admin/plugins/images/users/avatar5.png') }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b><span class="caret"></span> </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-img"></div>
                                <div class="u-text">
                                    <h4>{{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                        </li>
                        {{-- <li role="separator" class="divider"></li> --}}
                        {{-- <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="#"><i class="ti-email"></i> Inbox</a></li> --}}
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('wirehouse.my-profile') }}"><i class="fa fa-user"></i>  User Profile</a></li>
                        <li><a href="{{ route('user-logout') }}"><i class="fa fa-power-off"></i>  Logout</a></li>
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
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                      
                    </div>
                </div>
           
            <ul class="nav" id="side-menu">

                <li>
                    <a href="{{ route('wirehouse.wirehouse') }}" class="waves-effect"><i class="fa-fw ti-star"></i><span class="hide-menu">Warehouse Info</span></a>
                </li>

                <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-home fa-fw"></i> <span class="hide-menu"> Initial Quantity <i class="ti-plus arrow"></i> </span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="{{ route('wirehouse.products') }}"><i class="fa-fw">P</i><span class="hide-menu">Initial Products</span></a> </li>
                        <li> <a href="{{ route('wirehouse.product-sets')}}"><i class="fa-fw">PS</i><span class="hide-menu">Initial Product Set</span></a> </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('wirehouse.add_students') }}"><i class="fa-fw ti-stats-up"></i><span class="hide-menu">Student strength</span></a> </li>
                </li>
                <li>
                    <a href="{{ route('wirehouse.purchase-orders') }}"><i class="fa-fw ti-stats-up"></i><span class="hide-menu">Purchase Orders <span class="badge-danger badge pull-right">5</span></span></a> </li>
                </li>
                <li>
                    <a href="{{ route('wirehouse.product-demands') }}"><i class="fa-fw ti-stats-down"></i><span class="hide-menu">Product Requisition</span></a>
                </li>
                <li>
                    <a href="{{ route('wirehouse.product-returns') }}"><i class="fa-fw ti-stats-down"></i><span class="hide-menu">Product Return</span></a>
                </li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-content-copy"></i> <span class="hide-menu"> Chalan <i class="ti-plus arrow"></i><span class="badge-info badge pull-right">New</span> </span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('wirehouse.chalans') }}"><i class="fa-fw">PO</i><span class="hide-menu">Purchase Chalan<span class="badge-danger badge pull-right">5</span></span></a> </li></li>
                        <li><a href="{{ route('wirehouse.requisition-chalans') }}"><i class="fa-fw">PR</i><span class="hide-menu">Requisition Chalan<span class="badge-danger badge pull-right">5</span></span></a> </li></li>
                        <li><a href="{{ route('wirehouse.return-chalans') }}"><i class="fa-fw">RC</i><span class="hide-menu">Return Chalan<span class="badge-danger badge pull-right">5</span></span></a> </li></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('wirehouse.product-demands') }}"><i class="fa-fw ti-stats-down"></i><span class="hide-menu">Product Return</span></a> </li>
                </li>
                <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-content-copy"></i> <span class="hide-menu"> Report <i class="ti-plus arrow"></i> </span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#"><i class="fa-fw">PO</i><span class="hide-menu">Current Stock Balance</span></a> </li></li>
                        <li><a href="#"><i class="fa-fw">PR</i><span class="hide-menu">Yearly Stock Balance</span></a> </li></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
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
    @yield('content')
    <!-- /.container-fluid -->
        <footer class="footer text-center"> 2018 &copy; Milestone School & College </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('public/admin/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/js/moment.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('public/admin/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('public/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('public/admin/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('public/admin/js/waves.js') }}"></script>
<!--Counter js -->
<script src="{{ asset('public/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
<script src="{{ asset('public/admin/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>

<!-- chartist chart -->
<script src="{{ asset('public/admin/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<!-- Sparkline chart JavaScript -->
<script src="{{ asset('public/admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jsgrid components-->
<script type="text/javascript" src="{{ asset('public/admin/plugins/bower_components/jsgrid/dist/jsgrid.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jsgrid-init.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('public/admin/js/custom.min.js') }}"></script>
<!-----for templateing ashik---->
<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('public/admin/js/bootstrap-select.min.js') }}"></script>

<script src="{{ asset('public/admin/plugins/bower_components/summernote/dist/summernote.min.js') }}"></script>

<script src="{{ asset('public/admin/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
<!--Style Switcher -->
<script src="{{ asset('public/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
<script src="{{ asset('public/admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('public/js/app.js') }}"></script>
@yield('script')
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Aug 2017 13:45:35 GMT -->
</html>