@extends('layouts.admin')

@section('title')
    <div>
        <div class="content-wraper">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="box-title">
                            @if($settings && $settings->logo)
                                <img src="{{ asset('public/'.$settings->image) }}" alt="" class="dashboard-logo" width="35px">
                            @endif
                            {{ $settings ? $settings->app_name : 'App Name' }}
                        </h4>
                        Email: {{ $settings ? $settings->email : ''}} <br/>
                        Phone: {{ $settings ? $settings->phone : ''}} <br/>
                        Address: {{ $settings ? $settings->address : ''}} <br/>
                    </div>
                </div>


            </div>

        </div>
        <div class="content-wraper">

        </div>
    </div>

@endsection
