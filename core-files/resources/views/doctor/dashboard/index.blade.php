@extends('layouts.doctor')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">

            <h3 class="box-title text-success">YOUR PROFILE</h3>
            <hr/>
            <table class="table table-bordered" id="doctorList">
                <tbody>
                <tr>
                    <td>Name</td>
                    <td>{{ $doctor->name }}</td>
                    <td rowspan="4" style="width: 250px;">
                        <img src="{{ asset($doctor->photo) }}" class="img-responsive" alt="">
                    </td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td>{{ $doctor->designation ? $doctor->designation->title : '' }}</td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td>{{ $doctor->department ? $doctor->department->title : '' }}</td>
                </tr>
                <tr>
                    <td>Specialization</td>
                    <td>{{ $doctor->specialization }}</td>
                </tr>
                </tbody>
            </table>

        </div>

        <div class="white-box">
            <h3 class="box-title">OPENING HOUR <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#create-opening"><i class="fa fa-plus-circle"></i> CREATE NEW</button></h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>DAY</th>
                    <th>START TIME</th>
                    <th>END TIME</th>
                    <th>MAX APPOINTMENT</th>
                    <th class="text-right">ACTION</th>
                </tr>
                </thead>
                <tdody>
                    @foreach($doctor->openings as $k => $opening)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $opening->opening_day }}</td>
                            <td>{{ $opening->start_time }}</td>
                            <td>{{ $opening->end_time }}</td>
                            <td>{{ $opening->max_appointment }}</td>
                            <td style="width:150px" class="text-right">
                                <button data-id="{{ $opening->id }}" class="btn btn-warning btn-xs flat btn-edit" data-toggle="modal" data-target="#edit-opening"><i class="fa fa-edit" ></i>Edit</button>
                                <button data-url="{{ route('delete-opening',['id' => $opening->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tdody>
            </table>
        </div>

    </div>

    <div class="modal fade in" id="create-opening" tabindex="-1" role="dialog" aria-labelledby="designation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('create-opening') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE DOCTOR OPENING</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="opening_day_id" class="control-label">SELECT DAY *</label>
                            <select name="opening_day_id" id="opening_day_id" class="form-control">
                                <option value="">Select Day</option>
                                <option value="0">Sunday</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class='input-group date timePicker'>
                                <input type='text' class="form-control" name="start_time" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='input-group date timePicker' >
                                <input type='text' class="form-control" name="end_time" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="max_appointment">MAXIMUM APPOINTMENT</label>
                            <input type="number" name="max_appointment" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">CREATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="edit-opening" tabindex="-1" role="dialog" aria-labelledby="edit-designation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post" id="edit-opening-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE DOCTOR OPENING</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="opening_day_id" class="control-label">SELECT DAY *</label>
                            <select name="opening_day_id" id="opening_day_id" class="form-control">
                                <option value="">Select Day</option>
                                <option value="0">Sunday</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class='input-group date timePicker'>
                                <input type='text' class="form-control" name="start_time" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class='input-group date timePicker' >
                                <input type='text' class="form-control" name="end_time" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="max_appointment">MAXIMUM APPOINTMENT</label>
                            <input type="number" name="max_appointment" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">CREATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var url = "{{ route('edit-opening',['id' => '']) }}/";

            $(document).on('click','.btn-edit',function () {
                var id = $(this).data('id');
                var api_url = url +id;

                $.ajax({url: api_url, success: function(result){
                        $("#edit-opening-form").attr('action',api_url);
                        $("#edit-opening-form input[name='start_time']").val(result.start_time);
                        $("#edit-opening-form input[name='end_time']").val(result.end_time);
                        $("#edit-opening-form select[name='opening_day_id']").val(result.opening_day_id);
                        $("#edit-opening-form input[name='max_appointment']").val(result.max_appointment);
                    }});
            });

            $('.timePicker').datetimepicker({
                format: 'LT'
            });
        });

    </script>
@endsection
