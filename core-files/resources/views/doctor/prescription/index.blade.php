@extends('layouts.doctor')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">PRESCRIPTION LIST</h3>
            <p class="text-muted m-b-30"> List of all prescriptions.</p>
            <hr/>
            <table class="table table-bordered" id="prescriptionList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th style="width: 50px">Prescription ID</th>
                    <th>Patient Name</th>
                    <th>Patient Contact</th>
                    <th>Age</th>
                    <th>Date</th>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($prescriptions as $k => $prescription)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $prescription->prescription_id }}</td>
                        <td>{{ $prescription->patient_name }}</td>
                        <td>{{ $prescription->contact_no }}</td>
                        <td>{{ $prescription->age }}</td>
                        <td>{{ \Carbon\Carbon::parse($prescription->created_at)->format('d F Y') }}</td>
                        <td>
                            <a href="{{ route('doctor-prescription-detail',['id' => $prescription->id]) }}" class="btn btn-xs btn-info flat">View</a>
                            <a href="{{ route('get-edit-prescription',['id' => $prescription->id]) }}" class="btn btn-xs btn-warning flat">Edit</a>
                            <button data-url="{{ route('get-delete-prescription',['id' => $prescription->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
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
            $("#prescriptionList").dataTable();
        });

    </script>
@endsection
