@extends('layouts.front-end',['title' => 'About'])

@section('content')
    <section>
        <div class="container pt-0 pb-0">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="border-left-2px border-theme-colored mt-60 pl-15">
                            <p class="text-uppercase text-gray font-24 m-0">Welcome To Our</p>
                            <h2 class="text-theme-colored font-36 mt-0">{{ $about ? $about->title : '' }}</h2>
                        </div>
                        <div class="about-description text-justify">
                            {!! $about ? $about->description : '' !!}
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        @if($about)
                            <img class="img-fullwidth mt-60" alt="" src="{{ asset($about->image) }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.services')

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
                                                <h6 class="title mt-0">{{ $doctor->designation ? $doctor->designation->name: '' }}</h6>
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
@endsection