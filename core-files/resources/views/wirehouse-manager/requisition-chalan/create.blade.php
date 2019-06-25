@extends('layouts.wirehouse-admin')

@section('content')
<form action="{{ route('wirehouse.requisition-store-chalan') }}" method="post">{{ csrf_field() }}
    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">CREATE REQUISITION CHALLAN
                <a href="{{ route('wirehouse.requisition-chalans') }}" class="waves-effect pull-right btn btn-sm flat btn-info"><i class="fa fa-arrow-circle-left"></i>  All Requisitions Challan</a>
            </h3>
            <p class="text-muted m-b-30">add new requisition challan</p>
            <hr/>
        
            
            <div class="white-box m-b-15">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="select-purchase-order">PRODUCT REQUISITION<span class="text-danger">*</span></label>
                            <select name="demand_id" id="select-product-requisition" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($demands as $demand)
                                    <option value="{{ $demand->id }}">REQ NO  #  {{ $demand->req_no_auto }} / {{ $demand->req_no_manual }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="po-auto">CHALAN NO AUTO<span class="text-danger">*</span></label>
                            <input type="text" name="ch_no_auto" class="form-control" value="{{ $ch_auto }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="po-auto">CHALAN NO MANUAL</label>
                            <input type="text" name="ch_no_manual" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="po-auto">CHALAN DATE<span class="text-danger">*</span></label>
                            <input type="text" name="ch_date" class="form-control datepicker" placeholder="YYYY-MM-DD" required >

                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="white-box">
                <h4>PURCHASE ORDER ITEM DETAILS</h4>

                <create-pr-chalan ref="getProductRequisitionItem"></create-pr-chalan>

                <div class="form-group text-right">
                    <button class="btn btn-success btn-sm flat" type="submit"><i class="fa fa-check"></i> SAVE REQUISITION CHALLAN INFORMATION</button>
                </div>

            </div>


        </form>

    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepicker').datepicker({
                "format": 'yyyy-mm-dd',
                "todayHighlight": true,
                "autoclose": true,
                "startDate": new Date(),
            });
        });

    </script>
@endsection
