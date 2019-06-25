@extends('layouts.admin')

@section('title')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box m-b-0">
                <h4 class="page-title">
                    LIST OF ALL ITEM
                    <button data-url="{{ route('create-item') }}" type="button" class="btn btn-info pull-right flat create-item" data-toggle="modal" data-target="#item-modal" data-whatever="@fat">CREATE</button>
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
                    <th>STRENGTH</th>
                    <th>GENERIC</th>
                    <th>GROUP</th>
                    <th>TYPE</th>
                    <th>MANUFACTURER</th>
                    <th class="text-right">ACTION</th>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->item_strength }}</td>
                            <td>{{ $item->generic ? $item->generic->item_generic_name : '' }}</td>
                            <td>{{ $item->itemGroup ? $item->itemGroup->item_group_name : '' }}</td>
                            <td>{{ $item->type ? $item->type->item_type_name : '' }}</td>
                            <td>{{ $item->manufacturer ? $item->manufacturer->party_name : '' }}</td>
                            <td class="text-right">
                                <button class="btn btn-edit btn-info flat" data-url="{{ route('item',['id' => $item->id]) }}" data-toggle="modal" data-target="#item-modal">EDIT</button>
                                <a href="{{ route('delete-item',['id' => $item->id]) }}" class="btn btn-danger flat">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade in flat" id="item-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg flat" role="document">
            <div class="modal-content">
                <form action="#" method="post" id="item-form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">ITEM CREATION FORM</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">NAME *</label>
                                    <input type="text" class="form-control" id="name" name="item_name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="item_type" class="control-label">TYPE *</label>
                                    <select name="item_type_id" id="item_type" class="form-control">
                                        <option value="">Select Type</option>
                                        @foreach($item_types as $item_type)
                                            <option value="{{ $item_type->id }}">{{ $item_type->item_type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="item_group_id" class="control-label">GROUP *</label>
                                    <select name="item_group_id" id="item_group_id" class="form-control">
                                        <option value="">Select Group</option>
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->item_group_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="item_generic_id" class="control-label">GENERIC *</label>
                                    <select name="item_generic_id" id="item_generic_id" class="form-control">
                                        <option value="">Select Generic</option>
                                        @foreach($item_generics as $item_generic)
                                            <option value="{{ $item_generic->id }}">{{ $item_generic->item_generic_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="item_party_id" class="control-label">MANUFACTURER *</label>
                                    <select name="item_party_id" id="item_party_id" class="form-control">
                                        <option value="">Select Vendor</option>
                                        @foreach($parties as $party)
                                            <option value="{{ $party->id }}">{{ $party->party_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="item_strength" class="control-label">STRENGTH</label>
                                    <input type="text" class="form-control" id="item_strength" name="item_strength">
                                </div>
                            </div>
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

            $(document).on('click','.create-item',function () {
                $("#item-form")[0].reset();
                $("#item-form").attr('action',$(this).data('url'));
            });

            $(document).on('click','.btn-edit',function () {
                var url = $(this).data('url');

                $.ajax({url: url, success: function(result){
                    $("#item-form").attr('action',url);
                    $("#item-form input[name='item_name']").val(result.item_name);
                    $("#item-form select[name='item_type_id']").val(result.item_type_id);
                    $("#item-form select[name='item_group_id']").val(result.item_group_id);
                    $("#item-form select[name='item_generic_id']").val(result.item_generic_id);
                    $("#item-form select[name='item_party_id']").val(result.item_party_id);
                    $("#item-form select[name='item_unit_id']").val(result.item_unit_id);
                    $("#item-form input[name='item_mrp']").val(result.item_mrp);
                    $("#item-form input[name='item_unit_mrp']").val(result.item_unit_mrp);
                    $("#item-form input[name='item_reorder_value']").val(result.item_reorder_value);
                    $("#item-form input[name='item_strength']").val(result.item_strength);
                    $("#item-form input[name='item_pack_size']").val(result.item_pack_size);
                }});

            });

        });
    </script>

@endsection
