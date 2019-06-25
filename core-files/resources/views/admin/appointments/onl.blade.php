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