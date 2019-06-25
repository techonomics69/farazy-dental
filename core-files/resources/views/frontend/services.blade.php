@extends('layouts.front-end',['title' => 'Services'])

@section('content')
    <!-- Section: Services -->
    @if(count($services))
        <section class="bg-lighter">
            <div class="container pb-10">
                <div class="section-title mb-30">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-uppercase text-theme-colored title-border m-0">Services</h4>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row features-style1 mt-20">
                        @foreach($services as $service)
                            <div class="col-sm-6 com-md-4">
                                <div class="service-icon-box">
                                    <a href="#" class="pull-left mr-20"><img src="{{ $service->icon_image }}" /></a>
                                    <div class="mt-5">
                                        <h6 class="mt-5">{{ $service->title }}</h6>
                                        <div class="font-11 text-justify"><em>{!! str_limit(strip_tags($service->description), $limit = 250, $end = '...') !!}</em></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($departments))
        <section>
            <div class="container pb-50">
                <div class="section-title mb-30">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-uppercase text-theme-colored title-border m-0">Departments</h4>
                        </div>
                    </div>
                </div>
                <div class="section-centent">
                    <div class="row">
                        @foreach($departments as $department)
                            <div class="col-sm-6 col-md-4">
                                <div class="border-1px mb-30">
                                    <div class="thumb">
                                        <img class="img-fullwidth" src="{{ asset($department->featured_image) }}" alt="">
                                    </div>
                                    <div class="content bg-lightest p-15 pb-20">
                                        <h3 class="title text-theme-colored mt-0">{{ $department->title }}</h3>
                                        {!! $department->description !!}
                                        <p class="text-right"><a href="#" class="btn btn-sm btn-theme-colored btn-flat"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection