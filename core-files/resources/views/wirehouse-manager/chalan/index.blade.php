@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">PURCHASE ORDER CHALAN LISTS 
                <a href="{{ route('wirehouse.create-chalan') }}" class="btn btn-sm btn-info flat pull-right"><i class="fa fa-fw fa-plus-circle"></i>Create Purchase Chalan</a>
            </h3>
            <p class="text-muted m-b-30">list of all product chalans</p>
        </div>

        <div class="white-box">

            <table class="table table-bordered table-striped" id="chalanListTable">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>CH No Auto/Manual</th>
                    <th>Wirehouse</th>
                    <th>PO No Auto/Manual</th>
                    <th>Chalan Date</th>
                    <th>Status</th>
                    <th><i class="fa-fw ti-eye"></i></th>
                </tr>
                </thead>

                <tbody>
                @foreach($chalans as $k => $chalan)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td><a href="{{ route('wirehouse.get-chalan',['id' => $chalan->id]) }}">{{ $chalan->chalan_no }} / {{ $chalan->chalan_no_manual }}</a></td>
                        <td>{{ $chalan->wireHouse->name }}</td>
                        <td>{{ $chalan->purchaseOrder->po_no_auto }} / {{ $chalan->purchaseOrder->po_no_namual }}</td>
                        <td>{{Carbon\Carbon::parse( $chalan->chalan_date)->format('d F Y') }}</td>
                        <td>
                            @if(!$chalan->status)
                                <span class="badge badge-danger">Pending</span>
                            @elseif($chalan->status == 1)
                                <span class="badge badge-warning">Approved</span>
                            @elseif($chalan->status == 2)
                                <span class="badge badge-primary">Partially Paid</span>
                            @elseif($chalan->status == 3)
                                <span class="badge badge-success">Paid</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('wirehouse.get-chalan',['id' => $chalan->id]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-original-title="view"><i class="fa-fw ti-eye"></i>View</a>
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
            $("#chalanListTable").dataTable();
        });

    </script>
@endsection
