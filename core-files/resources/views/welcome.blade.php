<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Farazy - Dental & Research Center" />
    <meta name="keywords" content="farazy,dental,hospital,research,center,appointment,online" />
    <meta name="author" content="Farazy Dental Hospital & Research Center" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Farazy Dental') }}</title>

    <!-- Favicon and Touch Icons -->
    <link href="{{ asset('images/favicon/favicon-32x32.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset('images/favicon/android-icon-144x144.png') }}" rel="android-icon">
    <link href="{{ asset('images/favicon/android-icon-72x72.png') }}" rel="android-icon">
    <link href="{{ asset('images/favicon/android-icon-36x36.png') }}" rel="android-icon">
    <link href="{{ asset('images/favicon/apple-icon-72x72.png') }}" rel="apple-icon" sizes="72x72">
    <link href="{{ asset('images/favicon/apple-icon-114x114.png') }}" rel="apple-icon" sizes="114x114">
    <link href="{{ asset('images/favicon/apple-icon-144x144.png') }}" rel="apple-icon" sizes="144x144">

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

    <!-- Revolution Slider 5.x CSS settings -->
    <link  href="{{ asset('frontend/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
    <link  href="{{ asset('frontend/js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
    <link  href="{{ asset('frontend/js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- CSS | Theme Color -->
    <link href="{{ asset('frontend/css/colors/theme-skin-blue.css') }}" rel="stylesheet" type="text/css">

    <!-- external javascripts -->
    <script src="{{ asset('frontend/js/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="{{ asset('frontend/js/jquery-plugin-collection.js') }}"></script>

    <script src="{{ asset('frontend/js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
<div class="body-overlay"></div>
<audio class="welcome-tune" src="{{ asset('music/welcome-tune.mp3') }}" controls autoplay></audio>
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
    <div class="main-content">
        <!-- Section: home -->
        <section id="home" class="divider">
            <div class="container-fluid p-0">

                <div class="rev_slider_wrapper">
                    <div class="rev_slider" data-version="5.0">
                        <ul>
                            @foreach($sliders as $k => $slider)
                                <li data-index="rs-{{ $k }}" data-transition="random" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="1000"  data-thumb="{{ asset($slider->slider_image) }}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-description="">
                                    <img src="{{ asset($slider->slider_image) }}"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end .rev_slider -->
                </div>

            </div>
        </section>
        <!-- Section: Services -->
        @if(count($services))
        <section>
                <div class="container pb-10">
                    <div class="section-title mb-30">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-uppercase text-theme-colored title-border m-0">Services</h4>
                            </div>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="row features-style1 text-center mt-20">
                            @foreach($services as $service)
                                <div class="col-sm-6 col-md-4">
                                    <a href="{{ route('service-details',['id' => $service->id]) }}">
                                        <div class="service-icon-box">
                                            @if($service->icon_image)
                                                <img src="{{ $service->icon_image }}" class="icon pull-left mr-20" />
                                            @endif
                                            <div class="mt-5">
                                                <h6 class="mt-5">{{ $service->title }}</h6>
                                                <div class="font-11 text-justify"><em>{!! str_limit(strip_tags($service->description), $limit = 250, $end = '...') !!}</em></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if(count($doctors))
        <section>
            <div class="container pt-0 pb-80">
                <div class="section-title mb-30">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-uppercase text-theme-colored title-border m-0">Our Doctors</h4>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row multi-row-clearfix">
                        <div class="col-md-12">
                            <div class="team-carousel-4col">
                                @foreach($doctors as $doctor)
                                <div class="item">
                                    <div class="team border-1px sm-text-center maxwidth400">
                                        <div class="thumb"><img class="img-fullwidth" src="{{ asset($doctor->photo) }}" alt=""></div>
                                        <div class="content p-15 bg-white-light">
                                            <h4 class="name mb-0 mt-0"><a class="text-theme-colored" href="#">{{ $doctor->name }}</a></h4>
                                            <h6 class="title mt-0">{{ $doctor->department ? $doctor->department->title : '' }}</h6>
                                            <h6 class="title mt-0">{{ $doctor->designation ? $doctor->designation->name : '' }}</h6>
                                            <h6 class="title mt-0"><strong>{{ $doctor->specialization }}</strong></h6>
                                            <a class="btn btn-theme-colored btn-sm pull-right flip" href="{{ route('get-appointment',['id' => $doctor->id]) }}">Get Appointment</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @if(count($corporate_partners))
        <section>
            <div class="container pb-0">
                <div class="section-title mb-30">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-uppercase text-theme-colored title-border m-0">Our Corporate Partners</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel-5col" data-dots="true" data-nav="true">
                            @foreach($corporate_partners as $corporate_partner)
                            <div class="item"><img src="{{ $corporate_partner->partner_image }}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
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
                            <a href="https://winskit.com/" target="_blank">Winskit Int</a></strong></p>
                </div>
            </div>
        </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<script>
    $(document).ready(function(e) {
        var revapi = $(".rev_slider").revolution({
            sliderType:"standard",
            sliderLayout: "auto",
            dottedOverlay: "none",
            delay: 5000,
            navigation: {
                keyboardNavigation: "on",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                onHoverStop: "off",
                touch: {
                    touchenabled: "on",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: "horizontal",
                    drag_block_vertical: false
                },
                arrows: {
                    style: "gyges",
                    enable: true,
                    hide_onmobile: false,
                    hide_onleave: true,
                    hide_delay: 200,
                    hide_delay_mobile: 1200,
                    tmp: '',
                    left: {
                        h_align: "left",
                        v_align: "center",
                        h_offset: 0,
                        v_offset: 0
                    },
                    right: {
                        h_align: "right",
                        v_align: "center",
                        h_offset: 0,
                        v_offset: 0
                    }
                },
                bullets: {
                    enable: false,
                    hide_onmobile: true,
                    hide_under: 800,
                    style: "hebe",
                    hide_onleave: false,
                    direction: "horizontal",
                    h_align: "center",
                    v_align: "bottom",
                    h_offset: 0,
                    v_offset: 30,
                    space: 5,
                    tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                }
            },
            responsiveLevels: [1240, 1024, 778],
            visibilityLevels: [1240, 1024, 778],
            gridwidth: [1170, 1024, 778, 480],
            gridheight: [585, 768, 960, 720],
            lazyType: "none",
            parallax: {
                origo: "slidercenter",
                speed: 1000,
                levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                type: "scroll"
            },
            shadow: 0,
            spinner: "off",
            stopLoop: "on",
            stopAfterLoops: 0,
            stopAtSlide: -1,
            shuffle: "off",
            autoHeight: "off",
            fullScreenAutoWidth: "off",
            fullScreenAlignForce: "off",
            fullScreenOffsetContainer: "",
            fullScreenOffset: "0",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false,
            }
        });
    });
</script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>


</body>
</html>