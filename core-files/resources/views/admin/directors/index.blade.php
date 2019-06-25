@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">BOARD OF DIRECTOR <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#director"><i class="fa fa-plus-circle"></i> CREATE NEW</button></h3>
            <p class="text-muted m-b-30"> List of all corporate directors.</p>
            <hr/>
            <table class="table table-bordered" id="sliderList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Show Home</th>
                    <th class="text-right" style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($directors as $k => $director)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td style="width: 250px">
                            @if($director->image)
                                <img class="img-responsive" src="{{ asset($director->image) }}" alt="IMG">
                            @endif
                        </td>
                        <td>{{ $director->name }}</td>
                        <td>{{ $director->designation ? $director->designation->title : '' }}</td>
                        <td>{{ $director->in_home ? 'YES' : 'NO' }}</td>
                        <td style="width:150px" class="text-right">
                            <a href="{{ route('edit-director',['id' => $director->id]) }}" class="btn btn-warning btn-xs flat btn-edit" ><i class="fa fa-edit" ></i>Edit</a>
                            <button data-url="{{ route('delete-director',['id' => $director->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="modal fade in" id="director" tabindex="-1" role="dialog" aria-labelledby="director">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('create-director') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE BOARD OF DIRECTOR</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sl_no" class="control-label">SERIAL </label>
                                    <input type="text" class="form-control" id="sl_no" name="sl_no">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Designation</label>
                                    <select name="designation_id" id="designation_id" class="form-control">
                                        <option value="">Select Designation</option>
                                        @foreach($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-info pull-left m-t-30">
                                    <input id="checkbox-signup" type="checkbox" name="in_home" value="1">
                                    <label for="checkbox-signup"> Show In Home Page </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>IMAGE</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea name="description" id="" cols="30" rows="10"
                                      class="form-control"></textarea>
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
            var url = "{{ route('edit-director',['id' => '']) }}/";

            $(document).on('click','.btn-edit',function () {
                var id = $(this).data('id');
                var api_url = url +id;

                $.ajax({url: api_url, success: function(result){
                        $("#edit-director-form").attr('action',api_url);
                        $("#edit-director-form input[name='name']").val(result.name);
                        $("#edit-director-form input[name='sl_no']").val(result.sl_no);
                        $("#edit-director-form select[name='designation_id']").val(result.designation_id);
                    }});
            });


            $("#sliderList").dataTable();

        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('textarea').summernote({
                height: 200, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
        });

    </script>
@endsection
