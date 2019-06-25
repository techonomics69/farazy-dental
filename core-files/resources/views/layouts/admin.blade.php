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
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"><img src="{{ asset($settings ? $settings->logo : '' ) }}" alt="Logo" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b><span class="caret"></span> </a>
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

                    @if(Auth::user()->user_type == 1)
                    <li>
                        <a href="{{ route('basic-settings') }}" class="waves-effect"><i class="ti-settings text-info fa-fw"></i><span class="hide-menu">BASIC SETTINGS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sliders') }}" class="waves-effect"><i class="ti-image text-info fa-fw"></i><span class="hide-menu">SLIDERS</span></a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}" class="waves-effect"><i class="fa fa-graduation-cap text-info fa-fw"></i><span class="hide-menu">USERS</span></a>
                    </li>
                    <li>
                        <a href="{{ route('designations') }}" class="waves-effect"><i class="fa fa-graduation-cap text-info fa-fw"></i><span class="hide-menu">DESIGNATION</span></a>
                    </li>
                    <li>
                        <a href="{{ route('departments') }}" class="waves-effect"><i class="fa fa-hospital-o text-info fa-fw"></i><span class="hide-menu">DEPARTMENT</span></a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}" class="waves-effect"><i class="fa fa-support text-info fa-fw"></i><span class="hide-menu">SERVICES</span></a>
                    </li>
                    <li>
                        <a href="{{ route('partners') }}" class="waves-effect"><i class="fa fa-coffee text-info fa-fw"></i><span class="hide-menu">CORPORATE PARTNERS</span></a>
                    </li>
                    <li>
                        <a href="{{ route('doctors') }}" class="waves-effect"><i class="fa fa-hospital-o text-info fa-fw"></i><span class="hide-menu">DOCTORS</span></a>
                    </li>

                    <li> <a href="#" class="waves-effect"><i class="fa fa-medium fa-fw" data-icon="v"></i> <span class="hide-menu"> WEBSITE SETUP <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{ route('section-about') }}"><i class=" fa-fw">1</i><span class="hide-menu">ABOUT SECTION</span></a> </li>
                            <li> <a href="{{ route('directors') }}"><i class=" fa-fw">2</i><span class="hide-menu">BOARD OF DIRECTOR</span></a> </li>
                            <li> <a href="{{ route('categories') }}"><i class=" fa-fw">3</i><span class="hide-menu">CATEGORY</span></a> </li>
                            <li> <a href="{{ route('posts') }}"><i class=" fa-fw">4</i><span class="hide-menu">DENTAL TIPS</span></a> </li>
                            <li> <a href="{{ route('events') }}"><i class=" fa-fw">5</i><span class="hide-menu">NEWS & EVENTS</span></a> </li>
                        </ul>
                    </li>
                    <li> <a href="#" class="waves-effect"><i class="fa fa-cogs fa-fw" data-icon="v"></i> <span class="hide-menu"> MEDICINE SETUP <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{ route('th-classes') }}"><i class=" fa-fw">1</i><span class="hide-menu">THERAPETRIC CLASS</span></a> </li>
                            <li> <a href="{{ route('item-types') }}"><i class=" fa-fw">2</i><span class="hide-menu">ITEM TYPE</span></a> </li>
                            <li> <a href="{{ route('groups') }}"><i class=" fa-fw">3</i><span class="hide-menu">GROUP</span></a> </li>
                            <li> <a href="{{ route('generic-names') }}"><i class=" fa-fw">4</i><span class="hide-menu">GENERIC NAME</span></a> </li>
                            <li> <a href="{{ route('parties') }}"><i class=" fa-fw">5</i><span class="hide-menu">MANUFACTURER</span></a> </li>
                            <li> <a href="{{ route('items') }}"><i class=" fa-fw">6</i><span class="hide-menu">ITEMS</span></a> </li>
                        </ul>
                    </li>
                    <li> <a href="#" class="waves-effect"><i class="fa fa-cogs fa-fw" data-icon="v"></i> <span class="hide-menu"> PRESCRIPTION SETUP <span class="fa arrow"></span> </span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{ route('symptoms') }}"><i class=" fa-fw">1</i><span class="hide-menu">SYMPTOMS</span></a> </li>
                            <li> <a href="{{ route('advices') }}"><i class=" fa-fw">2</i><span class="hide-menu">ADVICES</span></a> </li>
                            <li> <a href="{{ route('tests') }}"><i class=" fa-fw">3</i><span class="hide-menu">TESTS</span></a> </li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('appointments') }}" class="waves-effect"><i class="fa fa-file-text text-info fa-fw"></i><span class="hide-menu">APPOINTMENTS</span></a>
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
        <div class="modal fade in" id="create-account-modal" tabindex="-1" role="dialog" aria-labelledby="delete-content-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="#" id="create-doctor-account-form" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-sm flat"><i class="fa fa-plus-circle"></i> CREATE ACCOUNT</button>
                            </div>
                        </form>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click','.btn-delete',function(){
                var url = $(this).data('url');
                $("#delete-modal-btn").attr('href',url);
            });

            $(document).on('click','.btn-create-account',function(){
                var url = $(this).data('url');
                $("#create-doctor-account-form").attr('action',url);
            });
            //daysOfWeekDisabled: [0, 6]
        });

    </script>
    @yield('script')
</body>
</html>