@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">PRODUCT REQUISITION CHALAN LISTS <a href="{{ route('wirehouse.requisition-create-chalan') }}" class="btn btn-xs btn-info flat pull-right"><i class="fa fa-fw fa-plus-circle"></i>Create Requisition Chalan</a></h3>
            <p class="text-muted m-b-30">list of all requisition challan.</p>
            <hr/>
            <table class="table table-bordered table-striped" id="chalanListTable">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>CH No Auto/Manual</th>
                    <th>Wirehouse</th>
                    <th>Product Req</th>
                    <th>Chalan Date</th>
                    <th>Status</th>
                    <th><i class="fa-fw ti-eye"></i></th>
                </tr>
                </thead>

                <tbody>
                @foreach($chalans as $k => $chalan)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td><a href="{{ route('wirehouse.requisition-get-chalan',['id' => $chalan->id]) }}">{{ $chalan->ch_no_auto }} / {{ $chalan->ch_no_manual }}</a></td>
                        <td>{{ $chalan->wireHouse->name }}</td>
                        <td>{{ $chalan->demand->req_no_auto }} / {{ $chalan->demand->req_no_manual }}</td>
                        <td>{{ $chalan->ch_date }}</td>
                        <td>
                            @if(!$chalan->status)
                                <span class="badge badge-warning">Created</span>
                            @else
                                <span class="badge badge-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('wirehouse.requisition-get-chalan',['id' => $chalan->id]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-original-title="view"><i class="fa fa-fw ti-eye"></i>Details</a>
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
