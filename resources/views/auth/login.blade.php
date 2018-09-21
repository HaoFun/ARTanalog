@extends('layouts.app')

@section('title', 'Login page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Login</h5>
                    </div>
                    <div class="panel-body">
                        <form class="m-t" role="form" method="POST" action="{{ route('admin.login.action') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Name or Email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <a href="{{ route('admin.password.request') }}">
                                <h3>Forgot password?</h3>
                            </a>

                            <div class="form-group col-md-6 col-md-offset-3">
                                <p class="text-muted text-center">
                                    <small>Do not have an account?</small>
                                </p>
                                <a class="btn btn-sm btn-danger btn-block" href="{{ route('admin.register') }}">Create an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection