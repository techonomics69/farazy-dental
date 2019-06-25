@extends('layouts.admin')

@section('title')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box m-b-0">
                <h4 class="page-title">
                    LIST OF MEDICINE GROUP
                    <button data-url="{{ route('create-group') }}" type="button" class="btn btn-info pull-right flat create-group" data-toggle="modal" data-target="#group-modal" data-whatever="@fat">CREATE</button>
                </h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <table class="table table-bordered table-stripped">
                    <thead>
                    <th>GROUP NAME</th>
                    <th>PARENT</th>
                    <th class="text-right">ACTION</th>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->item_group_name }}</td>
                            <td>{{ $group->parent ? $group->parent->item_group_name : '' }}</td>
                            <td class="text-right">
                                <button class="btn btn-edit btn-info flat" data-url="{{ route('group',['id' => $group->id]) }}" data-toggle="modal" data-target="#group-modal">EDIT</button>
                                <a href="{{ route('delete-group',['id' => $group->id]) }}" class="btn btn-danger flat">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="group-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post" id="group-form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">GROUP CREATION FORM</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">GROUP NAME *</label>
                            <input type="text" class="form-control" id="name" name="item_group_name" required>
                        </div>
                        <div class="form-group">
                            <label for="parent_id" class="control-label">PARENT *</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">Select Parent</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default flat" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary flat">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('click','.create-group',function () {
                $("#group-form")[0].reset();
                $("#group-form").attr('action',$(this).data('url'));
            });

            $(document).on('click','.btn-edit',function () {
                var url = $(this).data('url');

                $.ajax({url: url, success: function(result){
                    $("#group-form").attr('action',url);
                    $("#group-form input[name='item_group_name']").val(result.item_group_name);
                    $("#group-form select[name='parent_id']").val(result.parent_id);
                }});

            });

        });
    </script>

@endsection
