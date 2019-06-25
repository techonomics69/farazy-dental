@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">DEPARTMENTS <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#department"><i class="fa fa-plus-circle"></i> CREATE NEW</button></h3>
            <p class="text-muted m-b-30"> List of all departments.</p>
            <hr/>
            <table class="table table-bordered" id="departmentList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Description</th>
                    <th class="text-right" style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $k => $department)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>
                            @if($department->featured_image)
                                <img class="img-responsive" src="{{ asset($department->featured_image) }}" alt="IMG">
                            @endif
                        </td>
                        <td>{{ $department->title }}</td>
                        <td><i class="fa {{ $department->icon }}"></i></td>
                        <td>{{ $department->description }}</td>
                        <td style="width:150px" class="text-right">
                            <button data-id="{{ $department->id }}" class="btn btn-warning btn-xs flat btn-edit" data-toggle="modal" data-target="#edit-department"><i class="fa fa-edit" ></i>Edit</button>
                            <button data-url="{{ route('delete-department',['id' => $department->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="modal fade in" id="department" tabindex="-1" role="dialog" aria-labelledby="department">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('create-department') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE DEPARTMENT</h4>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="name" class="control-label">Department Name *</label>
                                   <input type="text" class="form-control" id="title" name="title" required>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="icon" class="control-label">ICON </label>
                                   <input type="text" class="form-control" id="icon" name="icon">
                               </div>
                           </div>
                       </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Featured Image</label>
                            <input type="file" name="featured_image" class="form-control">
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
    <div class="modal fade in" id="edit-department" tabindex="-1" role="dialog" aria-labelledby="edit-department">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="#" id="edit-department-form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">UPDATE department</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Department Name *</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon" class="control-label">ICON </label>
                                        <input type="text" class="form-control" id="icon" name="icon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Featured Image</label>
                                <input type="file" name="featured_image" class="form-control">
                            </div>
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
            var url = "{{ route('edit-department',['id' => '']) }}/";

            $(document).on('click','.btn-edit',function () {
                var id = $(this).data('id');
                var api_url = url +id;

                $.ajax({url: api_url, success: function(result){
                        $("#edit-department-form").attr('action',api_url);
                        $("#edit-department-form input[name='title']").val(result.title);
                        $("#edit-department-form input[name='icon']").val(result.icon);
                        $("#edit-department-form textarea[name='description']").val(result.description);
                    }});
            });


            $("#departmentList").dataTable();
        });

    </script>
@endsection
