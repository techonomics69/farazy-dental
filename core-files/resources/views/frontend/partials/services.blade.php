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
                        <div class="col-sm-4">
                            <div class="icon-box left media p-0"> <a href="#" class="media-left pull-left"><i class="fa {{ $service->icon }} text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="media-heading heading services-heading">{{ $service->title }}</h5>
                                    <div class="services-content text-justify">
                                        {!! str_limit(strip_tags($service->description), $limit = 250, $end = '...') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif