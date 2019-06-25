@extends('layouts.front-end',['title' => 'Blog'])

@section('meta')
<meta property="og:url"           content="{{ route('tips-details',['id' => $post_detail->id ]) }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{ $post_detail->title }}" />
  <meta property="og:description"   content="{!! str_limit(strip_tags($post_detail->description), $limit = 70, $end = '...') !!}" />
  <meta property="og:image"         content="{{ asset($post_detail->image) }}" />
@endsection

@section('content')
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts single-post">
                        <article class="post clearfix mb-0">
                            <div class="entry-header">
                                <div class="post-thumb thumb"> <img src="{{ asset($post_detail->image) }}" alt="" class="img-responsive img-fullwidth"> </div>
                            </div>
                            <div class="entry-content">
                                <div class="entry-meta media no-bg no-border mt-15 pb-20">
                                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                        <ul>
                                            <li class="font-16 text-white font-weight-600">{{ \Carbon\Carbon::parse($post_detail->created_at)->format('d F') }}</li>
                                            <li class="font-12 text-white text-uppercase">{{ \Carbon\Carbon::parse($post_detail->created_at)->format('Y') }}</li>
                                        </ul>
                                    </div>
                                    <div class="media-body pl-15">
                                        <div class="event-content pull-left flip">
                                            <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a href="blog-single-right-sidebar.html">{{ $post_detail->title }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                                {!! $post_detail->description !!}
                                <div class="mt-30 mb-0">
                                    <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
                                    <div class="fb-share-button" 
    data-href="{{ route('tips-details',['id' => $post_detail->id ]) }}" 
    data-layout="button_count">
  </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar sidebar-left mt-sm-30">
                        <div class="widget">
                            <h4 class="widget-title">Latest Dental Tips</h4>
                            <div class="latest-posts">
                                @foreach($posts as $post)
                                    <article class="post media-post clearfix pb-0 mb-10">
                                        <a class="post-thumb" href="#"><img src="https://placehold.it/75x75" alt=""></a>
                                        <div class="post-right">
                                            <h5 class="post-title mt-0"><a href="#">{{ $post->title }}</a></h5>
                                            <div>
                                                {!! str_limit(strip_tags($post->description), $limit = 70, $end = '...') !!}
                                            </div>
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