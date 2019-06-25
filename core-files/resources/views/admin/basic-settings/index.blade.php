@extends('layouts.admin')

@section('title')
    <div>
        <div class="content-wraper">
            <div class="white-box">
                <div class="box-title m-b-20">BASIC SETTINGS</div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('update-basic-settings') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="control-label">Application/Website Logo</label>
                                                    <input type="file" name="logo" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Organization Name <span class="text-danger m-l-5">*</span></label>
                                                    <input type="text" id="firstName" name="app_name" class="form-control" value="{{ $settings ? $settings->app_name : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone <span class="text-danger m-l-5">*</span></label>
                                                    <input type="text" id="firstName" name="phone" class="form-control" value="{{ $settings ? $settings->phone : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email  <span class="text-danger m-l-5">*</span></label>
                                                    <input type="text" id="firstName" name="email" class="form-control" value="{{ $settings ? $settings->email : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input type="text" name="facebook" class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile No.  <span class="text-danger m-l-5">*</span></label>
                                                    <input type="text" id="firstName" name="mobile" class="form-control" value="{{ $settings ? $settings->mobile : '' }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-4 text-center">
                                        @if($settings)
                                            <img style="max-width: 100%" src="{{ asset($settings->logo) }}"/>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Short Description</label>
                                            <textarea class="form-control" name="description" rows="6">{{ $settings ? $settings->description : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <textarea class="form-control" name="address" rows="6">{{ $settings ? $settings->address : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Youtube</label>
                                            <input type="text" name="youtube" class="form-control" value="{{ $settings ? $settings->youtube : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" class="form-control" value="{{ $settings ? $settings->facebook : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter" class="form-control" value="{{ $settings ? $settings->twitter : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Google Plus</label>
                                            <input type="text" name="google_plus" class="form-control" value="{{ $settings ? $settings->google_plus : '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Linkedin</label>
                                            <input type="text" name="skype" class="form-control" value="{{ $settings ? $settings->linkedin : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
