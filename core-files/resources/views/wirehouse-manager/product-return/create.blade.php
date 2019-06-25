@extends('layouts.wirehouse-admin')

@section('content')
    <div class="content-wraper">
        <div class="white-box m-b-5">
            <h3 class="box-title m-b-0">
                Product Return
                <a href="{{ route('wirehouse.product-returns') }}" class="waves-effect pull-right btn btn-xs flat btn-info"><i class="fa fa-arrow-circle-left"></i> All Returns</a>
            </h3>
            <p class="text-muted m-b-10">Create new product return.</p>
        </div>
        <div class="white-box">
            <form action="{{ route('wirehouse.store-product-return') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Return To</label>
                            @foreach($wh as $data)
                                @if($data->is_main)
                                    <input type="hidden" name="towirehouse" value="{{ $data->id }}">
                                    <input type="text" class="form-control" value="{{ $data->name }}" readonly>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Return Date</label>
                            <input type="text" class="form-control datepicker" name="return_date" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Return No Auto</label>
                            <input type="text" class="form-control" name="ret_no_auto" value="{{ $ret_no }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Return No Manual</label>
                            <input type="text" class="form-control" name="ret_no_manual">
                        </div>
                    </div>
                </div>

                <create-product-requisition :items="{products:{{ $product  }},units:{{ $unit }},productSets: {{ $product_sets }}}"></create-product-requisition>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success flat"> <i class="fa fa-check"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function(){

            $('.datepicker').datepicker({
                "format": 'yyyy-mm-dd',
                "todayHighlight": true,
                "autoclose": true
            });

            $("input[name=requisition_date]").datepicker( "setDate" , new Date() );

        });

    </script>


@endsection