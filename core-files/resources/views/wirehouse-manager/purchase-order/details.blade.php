@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title">Purchase Order Details <a href="{{ route('wirehouse.purchase-orders') }}" class="btn btn-info btn-sm pull-right"><i class="fa-fw ti-view-list"></i>Purchase Orders</a></h3>
            @if($purchase_order)
                <p>
                    <span class="text-success"><strong>PO No:</strong> {{ $purchase_order->po_no_auto }}</span>
                    <span class="text-info">| <strong>Wirehouse:</strong> {{ $purchase_order->wireHouse->name }}</span>
                    <span class="text-warning">| <strong>Vendor name</strong>: {{ $purchase_order->vendor->name }}</span>
                    <span class="text-primary">| <strong>Date:</strong> {{ $purchase_order->po_date }}</span>
                </p>
            @endif
        </div>

        <div class="white-box mb-20">
            @if(!empty($purchase_order))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Received Qty</th>
                        <th>Returned Qty</th>
                        <th>Unit Price</th>
                        <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purchase_order->purchaseOrderDetails as $od)
                        <tr>
                            <td>{{ $od->item->name  }}</td>
                            <td>{{ $od->quantity }}</td>
                            <td>{{ $od->chalanDetails ? $od->chalanDetails->sum('received_qty') : 0 }}</td>
                            <td>{{ $od->returned_quantity }}</td>
                            <td>{{ $od->unit_price }}</td>
                            <td>{{ $od->sub_total }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5">Grand Total</td>
                        <td>{{ $purchase_order->total_amount }}</td>
                    </tr>

                    </tbody>
                </table>
            @else
                <p class="text-danger"><strong>Sorry! No purchase order found.</strong></p>
            @endif
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

        });

    </script>
@endsection
