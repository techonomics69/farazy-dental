<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Farazy Hospital Ltb" />
    <meta name="keywords" content="hospital,diogostic,appointment,doctors,farazy,farazy hospital" />
    <meta name="author" content="Farazy Hospital" />
    @yield('meta')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="{{ url('/') }}" name="base-url">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon and Touch Icons -->
    <link href="{{ asset('frontend/images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset('frontend/images/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('frontend/images/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ asset('frontend/images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ asset('frontend/images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/css-plugin-collections.css') }}" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="{{ asset('frontend/css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="{{ asset('frontend/css/style-main.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="{{ asset('frontend/css/preloader.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{ asset('frontend/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS | Theme Color -->
    <link href="{{ asset('frontend/css/colors/theme-skin-blue.css') }}" rel="stylesheet" type="text/css">

@yield('script')



<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
<div class="body-overlay"></div>
{{--<audio class="welcome-tune" src="{{ asset('music/welcome-tune.mp3') }}" controls autoplay loop></audio>--}}
<div id="wrapper" class="clearfix">
    <!-- Header -->
    <header id="header" class="header">
        <div class="header-middle p-0 xs-text-center">
            <div class="container pt-0 pb-0">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="widget no-border m-0">
                            <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="javascript:void(0)">
                                @if($settings)
                                    @if($settings->logo)
                                        <img src="{{ asset($settings->logo) }}" alt="">
                                    @else
                                        {{ $settings->app_name }}
                                    @endif
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
                            <table>
                                <tr>
                                    <td class="p-r-20 text-green"><strong>DOCTOR SERIAL</strong></td>
                                    <td>01934-999555</td>
                                </tr>
                                <tr>
                                    <td class="p-r-20 text-green"><strong>MANAGER</strong></td>
                                    <td>01945-999555</td>
                                </tr>
                                <tr>
                                    <td class="p-r-20 text-green"><strong>HELPLINE</strong></td>
                                    <td>01920-221122</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <div class="header-nav-wrapper navbar-scrolltofixed bg-green">
                <div class="container">
                    <nav id="menuzord" class="menuzord bg-green">
                        {{--<a class="menuzord-brand pull-left flip" href="javascript:void(0)">--}}
                        {{--@if($settings)--}}
                        {{--@if($settings->logo)--}}
                        {{--<img src="{{ asset($settings->logo) }}" alt="">--}}
                        {{--@else--}}
                        {{--{{ $settings->app_name }}--}}
                        {{--@endif--}}
                        {{--@endif--}}
                        {{--</a>--}}
                        <ul class="menuzord-menu">
                            <li class="{{ Request::is('/') ? 'active' : null }}"><a href="{{ url('/') }}">Home</a></li>
                            <li><a class="bg-red" href="{{ route('appointment') }}">Make an Appointment</a></li>
                            <li><a href="#">About</a>
                                <ul class="dropdown">
                                    <li class="{{ Request::is('about') ? 'active' : null }}"><a href="{{ route('about') }}">About</a></li>
                                    <li class="{{ Request::is('board-of-director') ? 'active' : null }}"><a href="{{ route('board-of-director') }}">Board Of Director</a></li>
                                </ul>
                            </li>

                            <li class="{{ Request::is('our-services') ? 'active' : null }}"><a href="{{ route('our-services') }}">Services</a></li>
                            <li class="{{ Request::is('specialist') ? 'active' : null }}"><a href="{{ route('specialist') }}">Specialist</a></li>
                            <li class="{{ Request::is('dental-tips') ? 'active' : null }}"><a href="{{ route('dental-tips') }}">Dental Tips</a></li>
                            <li class="{{ Request::is('news-events') ? 'active' : null }}"><a href="{{ route('news-events') }}">News & Event</a></li>
                            <li {{ Request::is('contact') ? 'active' : null }}><a href="{{ route('contact') }}">Location & Contact</a></li>
                            {{--<li><a class="bg-light text-theme-colored" href="{{ route('patient-prescription') }}">Prescription</a></li>--}}
                        </ul>
                        <ul class="pull-right social-icons icon-sm icon-bordered icon-circled clearfix mt-20">
                            <li><a target="_blank" href="{{ $settings ? $settings->facebook : '' }}" class="facebook-link"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="{{ $settings ? $settings->google_plus : '' }}" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a target="_blank" href="{{ $settings ? $settings->twitter : '' }}" class="twitter-link"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="{{ $settings ? $settings->linkedin : '' }}" class="linkedin-link"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Start main-content -->
    <div class="main-content" id="app">
        <!-- Section: inner-header -->
        <section class="inner-header divider layer-overlay overlay-deep" data-bg-img="{{ asset('frontend/images/bg/bg5.jpg') }}">
            <div class="container pt-90 pb-50">
                <!-- Section Content -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 xs-text-center">
                            <h3 class="font-28">Appointment</h3>
                            <ol class="breadcrumb white mt-10">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Appointment</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-sx-12 col-sm-4 col-md-4 sidebar">
                            <div class="doctor-thumb">
                                <img class="img-fullwidth" src="{{ asset($doctor->photo) }}" alt="">
                            </div>
                            <div class="p-30 p-sm-10" style="border: 10px solid #f1f1f1;">
                                <h5><i class="fa fa-clock-o text-theme-colored"></i> Availability</h5>
                                <div class="opening-hourse text-left">
                                    <ul class="list-unstyled">
                                        @foreach($doctor->openings as $opening)
                                            <li class="clearfix"> <span> {{ $opening->opening_day }} </span>
                                                <div class="value"> {{ $opening->start_time }} - {{ $opening->end_time }} </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 pl-60 pl-sm-15">
                            <div>
                                <h3>{{ $doctor->name }}</h3>
                                <h5 class="text-theme-colored">{{ $doctor->speciality }}</h5>
                            </div>
                            <div class="mt-30">
                                <dl class="dl-horizontal doctor-info">
                                    <dt>Department</dt>
                                    <dd>
                                        <ul class="list theme-colored angle-double-right m-0">
                                            <li class="mt-0">{{ $doctor->department ? $doctor->department->title : '' }}</li>
                                        </ul>
                                    </dd>
                                    <hr>
                                </dl>

                                <div class="appointment-form">
                                    <form action="{{ route('post-appointment',['id' => $doctor->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="doctor_id" name="doctor_id" value="{{ $doctor->id }}">
                                        <appointment :disabled_days="{{ $dates }}"></appointment>

                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                                        </div>

                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->

    <!-- Footer -->
    <footer id="footer" class="footer pb-0 bg-black-111">
        <div class="container pb-20">
            <div class="row multi-row-clearfix">
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <a href="#" class="btn-block">
                            <img src="{{ asset('images/play-store.png') }}" alt="">
                        </a>
                        <a href="#" class="btn-block">
                            <img src="{{ asset('images/app-store.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">About Us</h5>
                        {!! $settings ? $settings->description : '' !!}
                        <div class="row pt-30">
                            <div class="col-xs-6">
                                <a class="btn btn-block btn-theme-colored text-white" href="http://www.farazyhospitalltd.com" target="_blank">Farazy Hospital Ltd</a>
                            </div>
                            <div class="col-xs-6">
                                <a class="btn btn-theme-colored btn-block text-white" href="http://www.farazyhospitalnatunbazar.com" target="_blank">Faray  Diagnostic & Hospital Ltd</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h5 class="widget-title line-bottom">Quick Contact</h5>
                        <ul class="list list-border">
                            <li><a href="#">{{ $settings ? $settings->mobile : '' }}</a></li>
                            <li><a href="#">{{ $settings ? $settings->email : '' }}</a></li>
                            <li><a href="#" class="lineheight-20">{{ $settings ? $settings->address : '' }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-nav bg-black-222 p-20">
            <div class="row text-center">
                <div class="col-md-12">
                    <p class="text-white font-11 m-0">Copyright &copy;2018 {{ $settings ? $settings->app_name : 'Winskit' }}. All Rights Reserved <strong>Developed By
                            <a href="www.winskit.com" target="_blank">Winskit Int</a></strong></p>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<script src="{{ asset('admin/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('core-files/public/js/app.js') }}"></script>
</body>
</html>