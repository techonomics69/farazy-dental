@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title">PRODUCT SET LISTS</h3>
            <table id="myTable" class="table table-bordered dataTable no-footer">
                <thead>
                <tr>
                    <th>SL </th>
                    <th >Warehouse</th>
                    <th >Product Set Name </th>
                    <th >Product Set Details </th>
                    <th >Initial Quantity</th>

                </tr>
                </thead>
                <tbody>
                @foreach($product_sets as $k => $detail)

                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $detail->warehouse->name }}</td>
                        <td >{{ $detail->productSet->name }}</td>
                        <td >
                            @foreach($detail->productSet->productSetDetails as $k => $product_set_detail)
                                @if($k==0)
                                    <ul>
                                        @endif
                                        <li>{{ $product_set_detail->product->name  }} [ {{ $product_set_detail->quantity }} {{ $product_set_detail->unit ? $product_set_detail->unit->name : '' }} ]</li>
                                        @if($k+1 == count($detail->productSet->productSetDetails))
                                    </ul>
                                @endif
                            @endforeach
                        </td>
                        <td >{{ $detail->initial_quantity }}</td>
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
            $("#myTable").dataTable();
        });

    </script>
@endsection
