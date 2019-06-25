@extends('layouts.wirehouse-admin')

@section('content')

    <div class="content-wraper">
        <div class="white-box mb-10">
            <h3 class="box-title text-info">YOUR PROFILE</h3>
            <hr/>
            <table class="table table-bordered">
                <tr>
                    <td><strong>Name</strong></td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td><strong>Username</strong></td>
                    <td>{{ Auth::user()->username }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <td><strong>Warehouse Information</strong></td>
                    <td>Name: {{ Auth::user()->warehouse->name }} <br/> 
                        Phone: {{ Auth::user()->warehouse->phone }} <br/>
                        Email: {{ Auth::user()->warehouse->email }} <br/>
                        Mobile: {{ Auth::user()->warehouse->mobile }} <br/>
                        Address: {{ Auth::user()->warehouse->address }} <br/>


                     </td>
                </tr>
            </table>

            <h3 class="m-t-20">Changer Your Password</h3>
            <hr>


            <h3 class="box-title text-info">Changer Your Password</h3>
            <hr/>
            <form action="{{ route('wirehouse.change-password') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info flat" style="margin-top: 25px"><i class="fa fa-fw fa-check-circle"></i>CHANGE PASSWORD</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

        });

    </script>
@endsection
