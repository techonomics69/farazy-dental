@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title">PRODUCT LISTS</h3>
        </div>

        <div class="white-box">
            <table class="table table-bordered table-striped" id="product-table">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Warehouse</th>
                    <th>Name</th>
                    <th>Initial Quantity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $k => $product)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $product->warehouse->name }}</td>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->initial_quantity }}</td>
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
            $("#product-table").dataTable();
        });

    </script>
@endsection
