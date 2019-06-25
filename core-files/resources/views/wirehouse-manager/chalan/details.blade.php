@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title">Chalan Details</h3>
            @if($chalan)
                <p>
                    <span class="text-success"><strong>CH No Auto:</strong> {{ $chalan->chalan_no }}</span>
                    <span class="text-info">| <strong>CH No Manual:</strong> {{ $chalan->chalan_no_manual }}</span>
                    <span class="text-warning">| <strong>PO No Auto</strong>: {{ $chalan->purchaseOrder->po_no_auto  }}</span>
                    <span class="text-primary">| <strong>Date:</strong> {{ $chalan->chalan_date }}</span>
                    <span class="text-success">| <strong>Status:</strong> {{ $chalan->statue ? 'Approved' : 'Not Approved' }}</span>
                </p>
            @endif
        </div>

        <div class="white-box mb-20">
            @if(!empty($chalan))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($chalan->chalanDetails as $chalan_detail)
                        <tr>
                            <td>{{ $chalan_detail->item->name  }}</td>
                            <td>{{ $chalan_detail->received_qty }}</td>
                            <td>{{ $chalan_detail->item->base_unit ? $chalan_detail->item->unit->name : 'SET' }}</td>
                        </tr>
                    @endforeach

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
