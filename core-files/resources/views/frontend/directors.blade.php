@extends('layouts.front-end',['title' => 'Board Of Director'])

@section('content')
    @if(count($directors))
        <section>
            <div class="container pb-80">
                <div class="row">
                    @foreach($directors as $director)
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
                            <div class="doctor-thumb">
                                <img class="img-fullwidth" src="{{ asset($director->image) }}" alt="IMAGE">
                            </div>
                            <div class="p-30 p-sm-10" style="border: 10px solid #f1f1f1;">
                                <h4 class="title text-uppercase text-theme-colored mt-0 mb-0"><a href="{{ route('show-director-detail',['id' => $director->id]) }}">{{ $director->name }}</a></h4>
                                <div class="opening-hourse text-left">
                                    <ul class="list-unstyled">
                                        <li class="clearfix"> {{ $director->designation ? $director->designation->name : '' }}</li>
                                    </ul>
                                </div>
                                <div>{!! str_limit(strip_tags($director->description), $limit = 250, $end = '...') !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection