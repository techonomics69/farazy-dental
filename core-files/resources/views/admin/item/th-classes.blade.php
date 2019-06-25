@extends('layouts.admin')

@section('title')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box m-b-0">
                <h4 class="page-title">
                    LIST OF TERAPRTRIC CLASS
                    <button data-url="{{ route('create-th-class') }}" type="button" class="btn btn-info pull-right flat create-th-class" data-toggle="modal" data-target="#th-class-modal" data-whatever="@fat">CREATE</button>
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
                    <th class="text-right">ACTION</th>
                    </thead>
                    <tbody>
                    @foreach($item_th_classes as $item_th_class)
                        <tr>
                            <td>{{ $item_th_class->th_class_name }}</td>
                            <td class="text-right">
                                <button class="btn btn-edit btn-info flat" data-url="{{ route('th-class',['id' => $item_th_class->id]) }}" data-toggle="modal" data-target="#th-class-modal">EDIT</button>
                                <a href="{{ route('delete-th-class',['id' => $item_th_class->id]) }}" class="btn btn-danger flat">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="th-class-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="#" method="post" id="th-class-form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">THERAPETRIC CLASS FORM</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">TH CLASS*</label>
                            <input type="text" class="form-control" id="name" name="th_class_name" required>
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

            $(document).on('click','.create-th-class',function () {
                $("#th-class-form")[0].reset();
                $("#th-class-form").attr('action',$(this).data('url'));
            });

            $(document).on('click','.btn-edit',function () {
                var url = $(this).data('url');

                $.ajax({url: url, success: function(result){
                    $("#th-class-form").attr('action',url);
                    $("#th-class-form input[name='th_class_name']").val(result.th_class_name);
                    console.log(result);
                }});

            });

        });
    </script>

@endsection
