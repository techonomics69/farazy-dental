@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">CREATE NEW CHALLAN
                <a href="{{ route('wirehouse.chalans') }}" class="btn btn-sm btn-info flat pull-right"><i class="fa fa-arrow-circle-left"></i> ALL PURCHASE CHALLANS</a></h3>
            <p class="text-muted m-b-30">add new challan through purchase order</p>
            <hr/>
            <form action="{{ route('wirehouse.store-chalan') }}" method="post">
                {{ csrf_field() }}
                <div class="white-box m-b-15">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="select-purchase-order">PURCHASE ORDER<span class="text-danger">*</span></label>
                                <select name="purchase_order" id="select-purchase-order" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach($purchase_orders as $purchase_order)
                                        <option value="{{ $purchase_order->id }}">{{ $purchase_order->po_no_auto }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="po-auto">CHALLAN NO AUTO<span class="text-danger">*</span></label>
                                <input type="text" name="chalan_no" class="form-control" value="{{ $ch_auto }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="po-auto">CHALLAN NO MANUAL</label>
                                <input type="text" name="chalan_no_manual" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="po-auto">CHALLAN DATE<span class="text-danger">*</span></label>
                                <input type="text" name="chalan_date" class="form-control datepicker" required>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="white-box">
                <h4>PURCHASE ORDER ITEM DETAILS</h4>

                <create-chalan ref="getPurchaseOrderItem"></create-chalan>

                <div class="form-group text-right">
                    <button class="btn btn-success btn-sm flat" type="submit">SAVE</button>
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
                "startDate": new Date()
            });
        });

    </script>
@endsection
