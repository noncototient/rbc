@extends('layouts.app')

@section('content')

<div id="login">
    <div class="columns">
        <div class="column is-one-third is-offset-one-third">
            <div class="box">
                <p class="title">Register</p>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <label class="label">Your Name</label>
                    <p class="control has-icon">
                        <input id="name" type="text" class="input is-medium" name="name" value="{{ old('name') }}" required autofocus>
                        <i class="fa fa-user"></i>
                        @if ($errors->has('name'))
                            <div class="notification is-danger">
                               {{ $errors->first('name') }}
                            </div>
                        @endif
                    </p>

                    <label class="label">Your Email</label>
                    <p class="control has-icon">
                        <input id="email" type="email" class="input is-medium" name="email" value="{{ old('email') }}" required>
                        <i class="fa fa-envelope"></i>
                        @if ($errors->has('email'))
                            <div class="notification is-danger">
                               {{ $errors->first('email') }}
                            </div>
                        @endif
                    </p>

                    <label class="label">Your Password</label>
                    <p class="control has-icon">
                        <input id="password" type="password" class="input is-medium" name="password" value="{{ old('password') }}" required>
                        <i class="fa fa-lock"></i>
                        @if ($errors->has('password'))
                            <div class="notification is-danger">
                               {{ $errors->first('password') }}
                            </div>
                        @endif
                    </p>

                    <label class="label">Confirm Password</label>
                    <p class="control has-icon">
                        <input id="password-confirm" type="password" class="input is-medium" name="password_confirmation" required>
                        <i class="fa fa-lock"></i>
                    </p>

                    <p class="control">
                    <button type="submit" class="button is-primary is-medium is-fullwidth">
                        Register
                        <span class="icon">
                            <i class="fa fa-lock"></i>
                        </span>
                    </button>

                    <p class="control">
                    <a href="/login" type="submit" class="button is-link is-medium is-fullwidth">
                        Have an account? Log in.
                        <span class="icon">
                            <i class="fa fa-sign-in"></i>
                        </span>
                    </a>
                </p>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
