@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">ALL MESSAGES TO ADMIN</h3>
            <p class="text-muted m-b-30"> List of all messages.</p>
            <hr/>
            <table class="table table-bordered" id="messageList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $k => $message)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->contact_no }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->message }}</td>
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
            $("#messageList").dataTable();
        });

    </script>
@endsection
