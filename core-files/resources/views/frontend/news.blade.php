@extends('layouts.front-end',['title' => 'News & Events'])

@section('content')
    @if(count($newses))
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @foreach($newses as $news)
                        <div class="upcoming-events media maxwidth400 bg-light mb-20">
                            <div class="row equal-height">
                                <div class="col-sm-4 pr-0 pr-sm-15">
                                    <div class="thumb p-15">
                                        <img class="img-fullwidth" src="{{ asset($news->image) }}" alt="...">
                                    </div>
                                </div>
                                <div class="col-sm-5 border-right pl-0 pl-sm-15">
                                    <div class="event-details p-15 mt-20 text-justify">
                                        <h4 class="media-heading text-uppercase font-weight-500">{{ $news->title }}</h4>
                                        {!! str_limit(strip_tags($news->description), $limit = 250, $end = '...') !!}
                                        <p>
                                            <a href="{{ route('event-details',['id' => $news->id]) }}" class="btn btn-flat btn-dark btn-theme-colored btn-sm">Details <i class="fa fa-angle-double-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="event-count p-15 mt-15">
                                        <ul class="event-date list-inline font-16 text-uppercase mt-10 mb-20">
                                            <li class="p-15 mr-5 bg-lightest">{{ \Carbon\Carbon::parse($news->created_at)->format('F') }}</li>
                                            <li class="p-15 pl-20 pr-20 mr-5 bg-lightest"> {{ \Carbon\Carbon::parse($news->created_at)->format('d') }}</li>
                                            <li class="p-15 bg-lightest">{{ \Carbon\Carbon::parse($news->created_at)->format('Y') }}</li>
                                        </ul>
                                        <ul>
                                            <li class="text-theme-colored"><i class="fa fa-map-marker mr-5"></i>{{ $news->location }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {{ $newses->links() }}
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection