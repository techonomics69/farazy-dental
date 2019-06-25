@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">DOCTORS <a href="{{ route('create-doctor') }}" class="btn pull-right btn-sm flat btn-info" ><i class="fa fa-plus-circle"></i> CREATE NEW</a></h3>
            <p class="text-muted m-b-30"> List of all doctors.</p>
            <hr/>
            <table class="table table-bordered" id="doctorList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $k => $doctor)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>
                            @if($doctor->photo)
                                <img class="img-responsive img-60" src="{{ asset($doctor->photo) }}" alt="IMG">
                            @endif
                        </td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->designation ? $doctor->designation->title : '' }}</td>
                        <td>{{ $doctor->department ? $doctor->department->title : '' }}</td>
                        <td  class="text-right">
                            <a href="{{ route('show-doctor',['id' => $doctor->id]) }}" class="btn btn-info btn-xs flat btn-edit"><i class="fa fa-vi" ></i>View</a>
                            <a href="{{ route('edit-doctor',['id' => $doctor->id]) }}" class="btn btn-warning btn-xs flat btn-edit"><i class="fa fa-edit" ></i>Edit</a>
                            @if(!$doctor->user)
                                <button data-url="{{ route('create-doctor-account',['id' => $doctor->id]) }}" class="btn btn-primary btn-xs flat btn-create-account" data-toggle="modal" data-target="#create-account-modal"><i class="fa fa-plus-circle"></i>Create Account</button>
                            @endif
                            <button data-url="{{ route('delete-doctor',['id' => $doctor->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
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
            $("#doctorList").dataTable();
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });

    </script>
@endsection
