@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success m-b-0">Requisition List <a href="{{ route('wirehouse.add-demand') }}" class="btn pull-right btn-info btn-sm"><i class="fa fa-plus-circle"></i> CREATE Product Requisition</a></h3>
            <p class="text-muted m-b-30">list of all product requisitions</p>
            <hr/>
            <table class="table table-bordered table-striped" id="productDemands">
                <thead>
                <tr>
                    <th >Requisition To</th>
                    <th >Requisition no. Auto</th>
                    <th >Requisition no Manual</th>
                    <th >Requisition Date</th>
                    <th >Status</th>
                    <th class="text-right">Action</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($demands as $k => $data)
                    <tr>
                        <td>{{ $data->toWireHouse ? $data->toWireHouse->name : "" }}</td>
                        <td>{{ $data->req_no_auto }}</td>
                        <td>{{ $data->req_no_manual }}</td>
                        <td>{{ $data->requisition_date }}</td>

                        <td>@if ($data->status == 0)
                                Created
                            @elseif ($data->status == 1)
                                Approved
                            @elseif ($data->status == 2)
                                Completed
                            @endif
                        </td>
                        <td class="text-right">
                            @if ($data->status == 0)
                                <a href="{{ route('wirehouse.edit-demand',['id' => $data->id ]) }}" type="button" class="btn btn-warning btn-xs flat"
                                     data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i> Update</a>
                            @endif

                                <a href="{{ route('wirehouse.show-product-demand',['id' => $data->id]) }}" class="btn btn-info flat btn-xs"><i class="fa-fw ti-eye"></i>Details</a>

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

