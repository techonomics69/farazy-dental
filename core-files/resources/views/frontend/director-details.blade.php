@extends('layouts.front-end',['title' => 'Board Of Director'])

@section('content')
    <section class="">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 pull-right pl-60 pl-sm-15">
                        <div class="mt-30">
                            {!! $director->description !!}

                        </div>
                    </div>
                    <div class="col-sx-12 col-sm-4 col-md-4 sidebar pull-left">
                        <div class="doctor-thumb">
                            <img class="img-fullwidth" src="{{ asset($director->image) }}" alt="">
                        </div>
                        <div class="p-30 p-sm-10" style="border: 10px solid #f1f1f1;">
                            <h5>{{ $director->name }}</h5>
                            <p><strong>{{ $director->designation ? $director->designation->name : '' }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection