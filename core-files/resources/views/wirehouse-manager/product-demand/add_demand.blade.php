@extends('layouts.wirehouse-admin')

@section('content')
    <div class="content-wraper">
        <div class="white-box m-b-5">
            <h3 class="box-title m-b-0 text-success">
                Create Product Requisition
                <a href="{{ route('wirehouse.product-demands') }}" class="waves-effect pull-right btn btn-sm flat btn-info"><i class="fa fa-arrow-circle-left"></i>  All Product Requisitions</a>
            </h3>
            <p class="text-muted m-b-10">add new requisition</p>
        </div>
        <div class="white-box">
            <form action="{{ route('wirehouse.product-demand') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Requisition To<span class="text-danger">*</span></label>
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
                            <label class="control-label">Requisition Date<span class="text-danger">*</span></label>
                            <input type="text" class="form-control datepicker" name="requisition_date" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Requisition No Auto<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="req_no_auto" value="{{ $req_no }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Requisition No Manual</label>
                            <input type="text" class="form-control" name="req_no_manual">
                        </div>
                    </div>
                </div>

                <create-product-requisition :items="{products:{{ $product  }},units:{{ $unit }},productSets: {{ $product_sets }}}"></create-product-requisition>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success pull-right flat"> <i class="fa fa-check"></i> SAVE PRODUCT REQUISITION</button>
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