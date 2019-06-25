@extends('layouts.wirehouse-admin')

@section('content')
    <div class="content-wraper">
        <div class="white-box m-b-5">
            <h3 class="box-title m-b-0">
                Product Return Details
                <a href="{{ route('wirehouse.product-returns') }}" class="waves-effect pull-right btn btn-xs flat btn-info"><i class="fa fa-fw fa-arrow-circle-left"></i> All Product Returns</a>
            </h3>
            <p class="text-muted m-b-10">Product return details</p>
            <hr>
            <p><span class="text-info"><strong>Return No # </strong>{{ $product_return->ret_no_auto }} / {{ $product_return->ret_no_manual }}</span>,<span class="text-danger"><strong>Date : </strong>{{ \Carbon\Carbon::parse($product_return->requisition_date)->format('d F Y') }}</span></p>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Qty</th>
                    <th>Unit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product_return->productReturnDetails as $detail)
                    <tr>
                        <td>
                            {{ $detail->item->name }}
                            @if($detail->item_type == 2)
                                <div class="set-products">
                                    @foreach($detail->item->productSetDetails as $k => $product_set_detail)
                                        @if($k==0)
                                            <ul>
                                                @endif
                                                <li>{{ $product_set_detail->product->name  }} [ {{ $product_set_detail->quantity }} {{ $product_set_detail->unit ? $product_set_detail->unit->name : '' }} ]</li>
                                                @if($k+1 == count($detail->item->ProductSetDetails))
                                            </ul>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td>{{ $detail->item_type == 1 ? 'Product' : 'SET' }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->unit->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function(){

        });

    </script>


@endsection