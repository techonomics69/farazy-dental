@extends('layouts.doctor')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">DOCTORS APPOINTMENTS</h3>
            <p class="text-muted m-b-30"> List of all appointments.</p>
            <hr/>
            <table class="table table-bordered" id="appointmentList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Doctor Name</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>SL</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $k => $appointment)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->sl_no }}</td>
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
            $("#appointmentList").dataTable();
        });

    </script>
@endsection
