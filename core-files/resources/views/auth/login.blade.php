@extends('layouts.auth')

@section('content')
    <div class="white-box">



        <form class="form-horizontal new-lg-form" id="loginform" action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            <h2 class="text-success m-b-0">Farazy Dental Hospital Ltd</h2>
            <hr/>
            <div class="form-group  m-t-20 {{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <label>Username</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Username" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-xs-12">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-info pull-left p-t-0">
                        <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="checkbox-signup"> Remember me </label>
                    </div>
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                </div>
            </div>
        </form>
    </div>
@endsection