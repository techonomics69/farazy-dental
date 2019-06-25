@extends('layouts.admin')

@section('title')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box m-b-0">
                <h4 class="page-title">
                    ITEM TYPE LIST
                    <button data-url="{{ route('create-item-type') }}" type="button" class="btn btn-info pull-right flat create-item-type" data-toggle="modal" data-target="#item-type-modal" data-whatever="@fat">CREATE</button>
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
                    <th>TYPE</th>
                    <th class="text-right">ACTION</th>
                    </thead>
                    <tbody>
                    @foreach($item_types as $item_type)
                        <tr>
                            <td>{{ $item_type->item_type_name }}</td>
                            <td class="text-right">
                                <button class="btn btn-edit btn-info flat" data-url="{{ route('item-type',['id' => $item_type->id]) }}" data-toggle="modal" data-target="#item-type-modal">EDIT</button>
                                <a href="{{ route('delete-item-type',['id' => $item_type->id]) }}" class="btn btn-danger flat">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="item-type-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post" id="item-type-form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">ITEM TYPE FORM</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">NAME *</label>
                            <input type="text" class="form-control" id="name" name="item_type_name" required>
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

            $(document).on('click','.create-item-type',function () {
                $("#item-type-form")[0].reset();
                $("#item-type-form").attr('action',$(this).data('url'));
            });

            $(document).on('click','.btn-edit',function () {
                var url = $(this).data('url');

                $.ajax({url: url, success: function(result){
                    $("#item-type-form").attr('action',url);
                    $("#item-type-form input[name='item_type_name']").val(result.item_type_name);
                }});

            });

        });
    </script>

@endsection
