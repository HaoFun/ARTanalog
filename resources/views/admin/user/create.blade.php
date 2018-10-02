@extends('layouts.app')

@section('title', 'Create user page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Create User</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('admin.user.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2">
                                    Name
                                </label>
                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-2">
                                    Email
                                </label>
                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-2">
                                    Password
                                </label>
                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2">
                                    Password Confirm
                                </label>
                                <div class="col-md-10">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Password Confirm" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-2">
                                    Action
                                </label>
                                <div class="col-md-10">
                                    <div class="col-md-2">
                                        <input type="radio" name="is_action" id="is_action_1" value="1" checked="checked">
                                        <label for="is_action_1">
                                            On
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="is_action" id="is_action_2" value="0">
                                        <label for="is_action_2">
                                            Off
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
