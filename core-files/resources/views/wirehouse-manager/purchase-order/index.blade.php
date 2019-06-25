@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">Purchase Orders</h3>
            <hr/>
            <table class="table table-bordered table-striped" id="purchaseOrders">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>PO No Auto/Manual</th>
                    <th>VENDOR</th>
                    <th>ITEMS</th>
                    <th>PO DATE</th>
                    <th>STATUS</th>
                    <th><i class="ti-eye"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($purchase_orders as $k => $purchase_order)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td><a href="{{ route('wirehouse.purchase-order',['id' => $purchase_order->id]) }}">{{ $purchase_order->po_no_auto }} / {{ $purchase_order->po_no_manual }}</a></td>
                        <td>{{ $purchase_order->vendor->name }}</td>
                        <td>
                            @foreach($purchase_order->purchaseOrderDetails as $k => $od)
                                @if($k==0)
                                    <ul>
                                        @endif
                                        <li>{{ $od->item->name  }}</li>
                                        @if($k+1 == count($purchase_order->purchaseOrderDetails))
                                    </ul>
                                @endif
                            @endforeach
                        </td>
                        <td>{{ \Carbon\Carbon::parse($purchase_order->po_date)->format('d F Y') }}</td>
                        <td>
                            @if($purchase_order->status == 0)
                                <span class="badge badge-info">Created</span>
                            @elseif($purchase_order->status == 1)
                                <span class="badge badge-warning">Partially Received</span>
                            @elseif($purchase_order->status == 2)
                                <span class="badge badge-success">Received</span>
                            @endif
                        </td>
                        <td><a href="{{ route('wirehouse.purchase-order',['id' => $purchase_order->id]) }}" class="btn btn-primary btn-circle text-center" data-toggle="tooltip" data-original-title="view"><i class="ti-eye"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#purchaseOrders").dataTable();
        });

    </script>
@endsection
