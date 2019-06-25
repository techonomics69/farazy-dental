@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title m-b-0">Product Return List <a href="{{ route('wirehouse.create-product-return') }}" class="btn pull-right btn-info btn-xs"><i class="fa-fw fa fa-plus-circle"></i>Create Product Return</a></h3>
            <p class="text-muted m-b-30">list of all product returns.</p>
            <hr>
            <table class="table table-bordered table-striped" id="productDemands">
                <thead>
                <tr>
                    <th >SL</th>
                    <th >Return To</th>
                    <th >Return No</th>
                    <th >Date</th>
                    <th >Status</th>
                    <th class="text-right">Action</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($return_products as $k => $return_product)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $return_product->toWireHouse ? $return_product->toWireHouse->name : "" }}</td>
                        <td>{{ $return_product->ret_no_auto }} / {{ $return_product->ret_no_manual }}</td>
                        <td>{{ $return_product->return_date }}</td>
                        <td>@if ($return_product->status == 0)
                                Created
                            @elseif ($return_product->status == 1)
                                Approved
                            @endif
                        </td>
                        <td class="text-right">
                            @if ($return_product->status == 0)
                                <a href="{{ route('wirehouse.edit-demand',['id' => $return_product->id ]) }}" type="button" class="btn btn-warning btn-xs flat"
                                     data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                            @endif

                                <a href="{{ route('wirehouse.show-product-return',['id' => $return_product->id]) }}" class="btn btn-info flat btn-xs"><i class="fa-fw ti-eye"></i>View</a>

                        </td>
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
            $("#productDemands").dataTable();
        });

    </script>
@endsection

