@extends('layouts.doctor')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">
                Details
                <a href="{{ route('download-prescription',['id' => $prescription->id]) }}" class="btn pull-right btn-sm flat btn-info" target="_blank">Download</a>
            </h3>
            <hr/>

            <div class="row">
                <div class="col-md-4">
                    <p><strong class="text-info">Prescription ID: </strong>{{ $prescription->prescription_id }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong class="text-info">Patient Name: </strong>{{ $prescription->patient_name }}</p>
                </div>
                <div class="col-md-3">
                    <p><strong class="text-info">Age: </strong>{{ $prescription->age }}</p>
                </div>
            </div>

            {{ $prescription->rx }}

            <table class="table table-bordered mb-15 m-t-20">
                <thead>
                <tr>
                    <th colspan="5">Medication</th>
                </tr>
                <tr>
                    <th>Medicine Name</th>
                    <th>Doses</th>
                    <th>Duration</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prescription->medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->medicine->item_name }}</td>
                        <td>{{ $medicine->doses }} {{ $medicine->before_eat ? '[ Before Eat]' : '' }}</td>
                        <td>{{ $medicine->duration }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table table-bordered mb-15">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Necessary Test</th>
                    <th>Comment</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prescription->tests as $k => $test)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $test->test->name }}</td>
                        <td>{{ $test->comment }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table table-bordered mb-15">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Advices</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prescription->advices as $k => $advice)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $advice->advice->name }}</td>
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

        });

    </script>
@endsection
