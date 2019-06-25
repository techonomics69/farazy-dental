@extends('layouts.front-end',['title' => 'Service'])

@section('content')
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts single-post">
                        <article class="post clearfix mb-0">
                            <div class="entry-content">
                                <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a href="{{ route('service-details',['id' => $service_detail->id]) }}">{{ $service_detail->title }}</a></h3>
                                {!! $service_detail->description !!}
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar sidebar-left mt-sm-30">
                        <div class="widget">
                            <h4 class="widget-title">Other Services</h4>
                            <div class="latest-posts">
                                @foreach($services as $service)
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <h5 class="post-title mt-0"><a href="{{ route('service-details',['id' => $service_detail->id]) }}">{{ $service->title }}</a></h5>
                                        <div>
                                            {!! str_limit(strip_tags($service->description), $limit = 70, $end = '...') !!}
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection