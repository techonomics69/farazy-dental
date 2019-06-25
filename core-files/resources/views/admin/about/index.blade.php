@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">ABOUT SECTION <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#section-about"><i class="fa fa-plus-circle"></i> CREATE/UPDATE</button></h3>
            <p class="text-muted m-b-30"> List of all corporate section-abouts.</p>
            <hr/>
            <h5>{{ $about ? $about->title : '' }}</h5>
            @if($about)
                <figure>
                    <img src="{{ asset($about->image) }}" alt="">
                </figure>
            @endif
            <div class="content">
                {!! $about ? $about->description : '' !!}
            </div>


        </div>

    </div>

    <div class="modal fade in" id="section-about" tabindex="-1" role="dialog" aria-labelledby="section-about">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('create-section-about') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">ABOUT SECTION</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="control-label">TITLE *</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $about ? $about->title : '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-label">DESCRIPTION</label>
                            <textarea name="description" cols="30" rows="10" class="form-control">{{ $about ? $about->description : '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>FEATURED IMAGE</label>
                            <input type="file" name="image" class="form-control">
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


        });

    </script>
@endsection
