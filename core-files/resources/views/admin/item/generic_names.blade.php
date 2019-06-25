@extends('layouts.admin')

@section('title')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box m-b-0">
                <h4 class="page-title">
                    GENERIC NAMES
                    <button data-url="{{ route('create-generic-name') }}" type="button" class="btn btn-info pull-right flat create-generic-name" data-toggle="modal" data-target="#generic-name-modal" data-whatever="@fat">CREATE</button>
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
                    <th>NAME</th>
                    <th>THERAPETRIC CLASS</th>
                    <th class="text-right">ACTION</th>
                    </thead>
                    <tbody>
                    @foreach($generic_names as $generic_name)
                        <tr>
                            <td>{{ $generic_name->item_generic_name }}</td>
                            <td>{{ $generic_name->therapetricClass->th_class_name }}</td>
                            <td class="text-right">
                                <button class="btn btn-edit btn-info flat" data-url="{{ route('generic-name',['id' => $generic_name->id]) }}" data-toggle="modal" data-target="#generic-name-modal">EDIT</button>
                                <a href="{{ route('delete-generic-name',['id' => $generic_name->id]) }}" class="btn btn-danger flat">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="generic-name-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post" id="generic-name-form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">GENERIC NAME FORM</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">NAME *</label>
                            <input type="text" class="form-control" id="name" name="item_generic_name" required>
                        </div>
                        <div class="form-group">
                            <label for="th_class_id">THERAPETRIC CLASS</label>
                            <select name="th_class_id" id="th_class_id" class="form-control" required>
                                <option value="">Select Therapetric Class</option>
                                @foreach($item_th_classes as $item_th_class)
                                    <option value="{{ $item_th_class->id }}">{{ $item_th_class->th_class_name }}</option>
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

            $(document).on('click','.create-generic-name',function () {
                $("#generic-name-form")[0].reset();
                $("#generic-name-form").attr('action',$(this).data('url'));
            });

            $(document).on('click','.btn-edit',function () {
                var url = $(this).data('url');

                $.ajax({url: url, success: function(result){
                    $("#generic-name-form").attr('action',url);
                    $("#generic-name-form input[name='item_generic_name']").val(result.item_generic_name);
                    $("#generic-name-form select[name='th_class_id']").val(result.th_class_id);
                }});

            });

        });
    </script>

@endsection
