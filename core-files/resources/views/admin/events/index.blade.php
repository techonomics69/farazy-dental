@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">NES & EVENT <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#create-event"><i class="fa fa-plus-circle"></i> CREATE NEW</button></h3>
            <p class="text-muted m-b-30"> List of all new and events.</p>
            <hr/>
            <table class="table table-bordered" id="eventList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th class="text-right" style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $k => $event)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>
                            @if($event->image)
                                <img class="img-responsive img-60" src="{{ asset($event->image) }}" alt="IMG">
                            @endif
                        </td>
                        <td>{{ $event->title }}</td>
                        <td>{!! str_limit(strip_tags($event->description), $limit = 250, $end = '...') !!}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->location }}</td>
                        <td style="width:150px" class="text-right">
                            <a href="{{ route('edit-event',['id' => $event->id]) }}" class="btn btn-warning btn-xs flat btn-edit"><i class="fa fa-edit" ></i>Edit</a>
                            <button data-url="{{ route('delete-event',['id' => $event->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="modal fade in" id="create-event" tabindex="-1" role="dialog" aria-labelledby="partner">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('create-event') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE DENTAL TIPS</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">TITLE *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date" class="control-label">EVENT DATE *</label>
                                    <input type="text" class="form-control datepicker" id="date" name="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location" class="control-label">Location *</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>IMAGE</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>DESCRIPTION</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
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
            $("#eventList").dataTable();
            $('.datepicker').datepicker({
                "format": 'yyyy-mm-dd',
                "todayHighlight": true,
                "autoclose": true
            });

            $('textarea').summernote({
                height: 200, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
        });

    </script>
@endsection
