@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">TESTS <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#category"><i class="fa fa-plus-circle"></i> CREATE NEW</button></h3>
            <p class="text-muted m-b-30"> List of all test.</p>
            <hr/>
            <table class="table table-bordered" id="categoryList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Name</th>
                    <th class="text-right" style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $k => $test)
                    <tr>
                        <td>{{ $k+1 }}</td>

                        <td>{{ $test->name }}</td>
                        <td style="width:150px" class="text-right">
                            <button data-id="{{ $test->id }}" class="btn btn-warning btn-xs flat btn-edit" data-toggle="modal" data-target="#edit-text"><i class="fa fa-edit" ></i>Edit</button>
                            <button data-url="{{ route('delete-test',['id' => $test->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="modal fade in" id="category" tabindex="-1" role="dialog" aria-labelledby="category">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('test') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE TEST</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">Test Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
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
    <div class="modal fade in" id="edit-text" tabindex="-1" role="dialog" aria-labelledby="edit-text">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" id="edit-test-form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">UPDATE TEST</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="control-label">Test Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
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
            var url = "{{ route('get-test',['id' => '']) }}/";

            $(document).on('click','.btn-edit',function () {
                var id = $(this).data('id');
                var api_url = url +id;

                $.ajax({url: api_url, success: function(result){
                        $("#edit-test-form").attr('action',api_url);
                        $("#edit-test-form input[name='name']").val(result.name);
                    }});
            });


            $("#categoryList").dataTable();
        });

    </script>
@endsection
