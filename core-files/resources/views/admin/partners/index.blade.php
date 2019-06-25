@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">PARTNERS <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#partner"><i class="fa fa-plus-circle"></i> CREATE NEW</button></h3>
            <p class="text-muted m-b-30"> List of all corporate partners.</p>
            <hr/>
            <table class="table table-bordered" id="sliderList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Order</th>
                    <th class="text-right" style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partners as $k => $partner)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td style="width: 250px">
                            @if($partner->partner_image)
                                <img class="img-responsive" src="{{ asset($partner->partner_image) }}" alt="IMG">
                            @endif
                        </td>
                        <td>{{ $partner->title }}</td>
                        <td>{{ $partner->slide_order }}</td>
                        <td style="width:150px" class="text-right">
                            <button data-id="{{ $partner->id }}" class="btn btn-warning btn-xs flat btn-edit" data-toggle="modal" data-target="#edit-partner"><i class="fa fa-edit" ></i>Edit</button>
                            <button data-url="{{ route('delete-slider',['id' => $partner->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="modal fade in" id="partner" tabindex="-1" role="dialog" aria-labelledby="partner">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('create-partner') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE CORPORATE PARTNER</h4>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="name" class="control-label">TITLE *</label>
                                   <input type="text" class="form-control" id="title" name="title" required>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="slide_order" class="control-label">ORDER </label>
                                   <input type="text" class="form-control" id="slide_order" name="slide_order">
                               </div>
                           </div>
                       </div>
                        <div class="form-group">
                            <label>PARTNER IMAGE</label>
                            <input type="file" name="partner_image" class="form-control">
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
    <div class="modal fade in" id="edit-partner" tabindex="-1" role="dialog" aria-labelledby="edit-partner">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="#" id="edit-partner-form" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">UPDATE CORPORATE PARTNER</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">TITLE *</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slide_order" class="control-label">ORDER </label>
                                        <input type="text" class="form-control" id="slide_order" name="slide_order">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>PARTNER IMAGE</label>
                                <input type="file" name="partner_image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
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
            var url = "{{ route('edit-partner',['id' => '']) }}/";

            $(document).on('click','.btn-edit',function () {
                var id = $(this).data('id');
                var api_url = url +id;

                $.ajax({url: api_url, success: function(result){
                        $("#edit-partner-form").attr('action',api_url);
                        $("#edit-partner-form input[name='title']").val(result.title);
                        $("#edit-partner-form input[name='slide_order']").val(result.slide_order);
                    }});
            });


            $("#sliderList").dataTable();
        });

    </script>
@endsection
