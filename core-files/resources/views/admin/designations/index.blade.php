@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">DESIGNATIONS <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#designation"><i class="fa fa-plus-circle"></i> CREATE NEW</button></h3>
            <p class="text-muted m-b-30"> List of all designations.</p>
            <hr/>
            <table class="table table-bordered" id="designationList">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Designation Name</th>

                    <th class="text-right">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($designations as $k => $designation)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>{{ $designation->title }}</td>
                        <td style="width:150px" class="text-right">
                            <button data-id="{{ $designation->id }}" class="btn btn-warning btn-xs flat btn-edit" data-toggle="modal" data-target="#edit-designation"><i class="fa fa-edit" ></i>Edit</button>
                            <button data-url="{{ route('delete-designation',['id' => $designation->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="modal fade in" id="designation" tabindex="-1" role="dialog" aria-labelledby="designation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('create-designation') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE DESIGNATION</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">Designation Name *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
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
    <div class="modal fade in" id="edit-designation" tabindex="-1" role="dialog" aria-labelledby="edit-designation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" id="edit-designation-form" method="post">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">UPDATE DESIGNATION</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">Designation Name *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var url = "{{ route('edit-designation',['id' => '']) }}/";

            $(document).on('click','.btn-edit',function () {
                var id = $(this).data('id');
                var api_url = url +id;

                $.ajax({url: api_url, success: function(result){
                        $("#edit-designation-form").attr('action',api_url);
                        $("#edit-designation-form input[name='title']").val(result.title);
                    }});
            });

            $(document).on('click','.btn-delete',function(){
                var url = $(this).data('url');
                $("#delete-modal-btn").attr('href',url);
            });

            $("#designationList").dataTable();
        });

    </script>
@endsection
