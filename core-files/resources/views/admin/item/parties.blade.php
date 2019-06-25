@extends('layouts.admin')

@section('title')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box m-b-0">
                <h4 class="page-title">
                    LIST  MANUFACTURERS
                    <button data-url="{{ route('create-party') }}" type="button" class="btn btn-info pull-right flat create-party" data-toggle="modal" data-target="#party-modal" data-whatever="@fat">CREATE</button>
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
                    <th>MANUFACTURER NAME</th>
                    <th class="text-right">ACTION</th>
                    </thead>
                    <tbody>
                    @foreach($parties as $party)
                        <tr>
                            <td>{{ $party->party_name }}</td>
                            <td class="text-right">
                                <button class="btn btn-edit btn-info flat" data-url="{{ route('party',['id' => $party->id]) }}" data-toggle="modal" data-target="#party-modal">EDIT</button>
                                <a href="{{ route('delete-party',['id' => $party->id]) }}" class="btn btn-danger flat">DELETE</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade in flat" id="party-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="#" method="post" id="party-form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">MANUFACTURER CREATION FORM</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="control-label">NAME *</label>
                                    <input type="text" class="form-control" id="name" name="party_name" required>
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

            $(document).on('click','.create-party',function () {
                $("#party-form")[0].reset();
                $("#party-form").attr('action',$(this).data('url'));
            });

            $(document).on('click','.btn-edit',function () {
                var url = $(this).data('url');

                $.ajax({url: url, success: function(result){
                    $("#party-form").attr('action',url);
                    $("#party-form input[name='party_name']").val(result.party_name);
                }});

            });

        });
    </script>

@endsection
