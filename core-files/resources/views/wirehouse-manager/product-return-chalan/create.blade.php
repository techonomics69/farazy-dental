@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title">CREATE PRODUCT RETURN CHALAN</h3>
        </div>

        <form action="{{ route('wirehouse.return-store-chalan') }}" method="post">
            {{ csrf_field() }}
            <div class="white-box m-b-15">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="select-purchase-order">PRODUCT RETURN LIST</label>
                            <select name="product_return_id" id="select-product-requisition" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($product_returns as $product_return)
                                    <option value="{{ $product_return->id }}">RET NO  #  {{ $product_return->ret_no_auto }} / {{ $product_return->ret_no_manual }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="po-auto">CHALAN NO AUTO</label>
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
                            <label for="po-auto">CHALAN DATE</label>
                            <input type="text" name="ch_date" class="form-control datepicker" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="white-box">
                <h4>PRODUCT RETURN ITEM DETAILS</h4>

                <create-return-chalan ref="getProductRequisitionItem"></create-return-chalan>

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
                "startDate": new Date(),
            });
        });

    </script>
@endsection
