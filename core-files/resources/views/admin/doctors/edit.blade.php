@extends('layouts.admin')

@section('title')
    <div>
        <div class="content-wraper">
            <div class="white-box">
                <div class="box-title m-b-20">UPDATE DOCTOR</div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('update-doctor',['id' => $doctor->id]) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="control-label">Doctor Image</label>
                                                    <input type="file" name="photo" class="form-control" onchange="previewFile()" />
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
                                                            <option value="{{ $designation->id }}" {{ $designation->id == $doctor->designation_id ? 'selected="selected"' : '' }}>{{ $designation->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Department</label>
                                                    <select name="department_id" id="department_id" class="form-control">
                                                        <option value="">Select Designation</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->id }}" {{ $department->id == $doctor->department_id ? 'selected="selected"' : '' }}>{{ $department->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Specialization </label>
                                                    <input type="text" id="specialization" name="specialization" class="form-control" value="{{ $doctor->specialization  }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email  <span class="text-danger m-l-5">*</span></label>
                                                    <input type="text" id="email" name="email" class="form-control" value="{{ $doctor->email  }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile No.  <span class="text-danger m-l-5">*</span></label>
                                                    <input type="text" id="firstName" name="mobile" class="form-control" value="{{ $doctor ? $doctor->mobile : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Appointment Time  <span class="text-danger m-l-5">*</span></label>
                                                    <input type="number" id="appoint_time" name="appoint_time" class="form-control" value="{{ $doctor->appoint_time }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Confirm Password</label>
                                                    <input type="password" id="password" name="password" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
                                        </div>
                                    </div>

                                    <div class="col-md-4 text-center">
                                        <img src="{{ asset($doctor->photo) }}" class="img-responsive" id="uploadPreview" alt="">
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
@endsection
