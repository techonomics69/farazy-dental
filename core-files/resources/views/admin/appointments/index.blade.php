@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">DOCTORS APPOINTMENT</h3>
            <p class="text-muted m-b-30"> List of all appointments.</p>
            <hr/>
            <appointment-list :items="{doctors: {{ $doctors }},appointments: {{ $appointments }}}"></appointment-list>
        </div>

    </div>


@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // $("#appointmentList").dataTable();
            $('.datepicker').datepicker({
                "format": 'yyyy-mm-dd',
                "todayHighlight": true,
                "autoclose": true,
            });

            $('.datepicker').datepicker("setDate", new Date());
        });

    </script>
@endsection
