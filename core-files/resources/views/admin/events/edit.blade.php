@extends('layouts.admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-20">
            <h3 class="box-title text-success">DENTAL TIPS</h3>
            <p class="text-muted m-b-30"> Update dental tips.</p>
            <hr/>
            <form action="{{ route('update-dental-tip',['id' => $dental_tip->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="control-label">TITLE *</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $dental_tip->title }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CATEGORY</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Select Category--</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $dental_tip->category_id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
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
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $dental_tip->description }}</textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>

        </div>

    </div>



@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#dental-tipList").dataTable();
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });

            $('textarea').summernote({
                height: 200, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
        });

    </script>
@endsection
