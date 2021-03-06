@extends('layouts.app')

@section('content')
<div id="login">
    <div class="columns">
        <div class="column is-one-third is-offset-one-third">
            <div class="box">
                <p class="title">Login</p>
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <label class="label">Your Email</label>
                    <p class="control has-icon">
                        <input id="email" type="email" class="input is-medium" name="email" value="{{ old('email') }}" required autofocus>
                        <i class="fa fa-envelope"></i>
                    </p>
                  @if ($errors->has('email'))
                  <div class="notification is-danger">
                    {{ $errors->first('email') }}
                </div>        
                @endif

                <label class="label">Password</label>
                <p class="control has-icon">
                    <input id="password" type="password" class="input is-medium" name="password" required>
                    <i class="fa fa-lock"></i>
                </p>
                    @if ($errors->has('password'))
                    <div class="notification is-danger">
                        {{ $errors->first('password') }}
                    </div>        
                    @endif

                    <p class="control">
                      <label class="checkbox">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>
                </p>

                <p class="control">
                    <button type="submit" class="button is-primary is-medium is-fullwidth">
                        Login
                        <span class="icon">
                            <i class="fa fa-sign-in"></i>
                        </span>
                    </button>
                </p>
                <p class="control">
                    <a href="/register" type="submit" class="button is-light is-medium is-fullwidth">
                        Register
                        <span class="icon">
                            <i class="fa fa-lock"></i>
                        </span>
                    </a>
                </p>
                {{-- <p class="control">
                    <a class="button is-link is-medium is-fullwidth" href="{{ url('/password/reset') }}">
                        Forgot Your Password?
                    </a>
                </p> --}}
            </form>
        </div>
    </div>
</div>
</div>
@endsection
