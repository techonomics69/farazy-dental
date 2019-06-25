@extends('layouts.admin')

@section('title')
    <div>
        <div class="content-wraper">
            <div class="white-box">
                <div class="box-title m-b-20">UPDATE DIRECTOR</div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('update-director',['id' => $doctor->id]) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="control-label">Doctor Image</label>
                                                    <input type="file" name="image" class="form-control" onchange="previewFile()" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Doctor Name <span class="text-danger m-l-5">*</span></label>
                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $doctor->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Designation</label>
                                                    <select name="designation_id" id="designation_id" class="form-control">
                                                        <option value="">Select Designation</option>
                                                        @foreach($designations as $designation)
                                                            <option value="{{ $designation->id }}" {{ $doctor->designation_id == $designation->id ? 'selected' : '' }}>{{ $designation->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Description</label>
                                                    <textarea name="description" id="" cols="30" rows="10"
                                                              class="form-control">{{ $doctor->description }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
                                        </div>
                                    </div>

                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset($doctor->image) }}" class="img-responsive" id="uploadPreview" alt="">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        function previewFile() {
            var preview = document.querySelector('#uploadPreview');
            var file    = document.querySelector('input[name=photo]').files[0];
            var reader  = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('textarea').summernote({
                height: 200, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
        });

    </script>
@endsection
