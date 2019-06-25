@extends('layouts.front-end',['title' => 'Dental Tips'])

@section('content')
    @if(count($posts))
        <section>
            <div class="container pb-50">
                <div class="section-content">
                    <div class="row multi-row-clearfix">
                        <div class="blog-posts">
                            @foreach($posts as $post)
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <article class="post style1 clearfix maxwidth500">
                                        <div class="col-md-12 p-0">
                                            <div class="entry-header">
                                                <div class="post-thumb">
                                                    <img src="{{ asset($post->image) }}" alt="" class="img-responsive img-fullwidth">
                                                </div>
                                                <div class="entry-date entry-date-absolute">
                                                    <span>{{ \Carbon\Carbon::parse($post->created_at)->format('d F') }}</span>
                                                    <span>{{ \Carbon\Carbon::parse($post->created_at)->format('Y') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 p-0">
                                            <div class="entry-content pl-50 p-20 pt-30 pr-20 text-justify">
                                                <h5 class="entry-title pt-0"><a href="#">{{ $post->title }}</a></h5>
                                                {!! str_limit(strip_tags($post->description), $limit = 250, $end = '...') !!}

                                                <a class="text-theme-colored mt-10 mb-0 pull-right flip" href="{{ route('tips-details',['id' => $post->id]) }}">Read more <i class="fa fa-angle-double-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    @endif
@endsection