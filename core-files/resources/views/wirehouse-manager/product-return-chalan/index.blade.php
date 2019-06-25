@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title">PRODUCT RETURN CHALAN LISTS <a href="{{ route('wirehouse.return-create-chalan') }}" class="btn btn-sm btn-info flat pull-right"><i class="fa fa-fw fa-plus-circle"></i>Create Product Return Chalan</a></h3>
        </div>

        <div class="white-box">

            <table class="table table-bordered table-striped" id="chalanListTable">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>CH No Auto</th>
                    <th>CH No Manual</th>
                    <th>Wirehouse</th>
                    <th>Product Ret</th>
                    <th>Chalan Date</th>
                    <th>Status</th>
                    <th><i class="fa-fw ti-eye"></i></th>
                </tr>
                </thead>

                <tbody>
                @foreach($chalans as $k => $chalan)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td><a href="{{ route('wirehouse.requisition-get-chalan',['id' => $chalan->id]) }}">{{ $chalan->ch_no_auto }}</a></td>
                        <td>{{ $chalan->ch_no_manual }}</td>
                        <td>{{ $chalan->wireHouse->name }}</td>
                        <td>{{ $chalan->productReturn->ret_no_auto }} / {{ $chalan->productReturn->ret_no_manual }}</td>
                        <td>{{ $chalan->ch_date }}</td>
                        <td>
                            @if(!$chalan->status)
                                <span class="badge badge-warning">Pending</span>
                            @else
                                <span class="badge badge-success">Approved</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('wirehouse.return-get-chalan',['id' => $chalan->id]) }}" class="btn btn-primary btn-circle text-center" data-toggle="tooltip" data-original-title="view"><i class="ti-eye"></i></a>
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
