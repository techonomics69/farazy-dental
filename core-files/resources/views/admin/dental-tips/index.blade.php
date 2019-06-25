@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">DENTAL TIPS <button class="btn pull-right btn-sm flat btn-info" data-toggle="modal" data-target="#create-dental-tips"><i class="fa fa-plus-circle"></i> CREATE NEW</button></h3>
            <p class="text-muted m-b-30"> List of all dental tips.</p>
            <hr/>
            <table class="table table-bordered" id="dental-tipList">
                <thead>
                <tr>
                    <th style="width: 50px">SL</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th class="text-right" style="width: 150px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $k => $post)
                    <tr>
                        <td>{{ $k+1 }}</td>
                        <td>
                            @if($post->image)
                                <img class="img-responsive img-60" src="{{ asset($post->image) }}" alt="IMG">
                            @endif
                        </td>
                        <td>{{ $post->category ? $post->category->name : '' }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{!! str_limit(strip_tags($post->description), $limit = 250, $end = '...') !!}</td>
                        <td style="width:150px" class="text-right">
                            <a href="{{ route('edit-dental-tip',['id' => $post->id]) }}" class="btn btn-warning btn-xs flat btn-edit"><i class="fa fa-edit" ></i>Edit</a>
                            <button data-url="{{ route('delete-dental-tip',['id' => $post->id]) }}" class="btn btn-danger btn-xs flat btn-delete" data-toggle="modal" data-target="#delete-content-modal"><i class="fa fa-trash-o"></i>Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="modal fade in" id="create-dental-tips" tabindex="-1" role="dialog" aria-labelledby="partner">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('create-post') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">CREATE DENTAL TIPS</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="control-label">TITLE *</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CATEGORY</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">-- Select Category--</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>IMAGE</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>DESCRIPTION</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
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
            $("#dental-tipList").dataTable();

            $('.datepicked').datepicker();

            $('textarea').summernote({
                height: 200, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
        });

    </script>
@endsection
