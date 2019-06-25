@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box">
            <div class="row">
                    <div class="col-lg-6">
                     <h4 class="box-title">
                        <img src="{{ asset('public/'.$settings->image) }}" alt="" class="dashboard-logo" width="35px">
                        {{ $settings ? $settings->name : 'MILESTONE SCHOOL AND COLLEGE' }}
                     </h4>
                     <hr/>
                     {{ $settings->email}} <br/>
                     {{ $settings->phone}} <br/>
                     {{ $settings->address}} <br/>

                    </div>
                    <div class="col-lg-6">
                        <p class="text-info box-title">Warehouse information</p><hr/>
                         {{ Auth::user()->warehouse->name }} <br/>
                        Email: {{ Auth::user()->warehouse->email }} <br/>
                        Phone: {{ Auth::user()->warehouse->phone }} <br/>
                        Address: {{ Auth::user()->warehouse->address }} <br/>
                    </div>
                </div>
        </div>
    </div>
    <div class="content-wraper">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h5><a href="{{ route('wirehouse.products') }}"><i class="dashboard-icon fa-fw ti-clipboard text-info"></i>PRODUCT</a></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h5><a href="{{ route('wirehouse.product-sets') }}"><i class="dashboard-icon fa-fw ti-server text-info"></i>PRODUCT SET</a></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h5><a href="{{ route('wirehouse.product-demands') }}"><i class="dashboard-icon fa-fw ti-home text-info"></i>PRODUCT DEMAND</a></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h5><a href="{{ route('wirehouse.purchase-orders') }}"><i class="dashboard-icon fa-fw ti-stats-up text-info"></i>PURCHASE ORDER</a></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h5><a href="{{ route('product_demand') }}"><i class="dashboard-icon fa-fw ti-stats-down text-info"></i>PRODUCT REQUISITION</a></h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h5><a href="{{ route('wirehouse.chalans') }}"><i class="dashboard-icon fa-fw ti-files text-info"></i>CHALAN</a></h5>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

        });

    </script>
@endsection
