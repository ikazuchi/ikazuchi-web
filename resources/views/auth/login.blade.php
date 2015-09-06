@extends('auth.layout')

@section('css')
@stop

@section('content')
    {!! Form::open(['url' => '/auth/login', 'method' => 'post', 'class' => 'login-form' ]) !!}
    <h3 class="form-title">Sign In</h3>

    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>Enter your email and password. </span>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
        </div>
    @endif

    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}"/>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success uppercase">Login</button>
        <label class="rememberme check">
            <input type="checkbox" name="remember" value="1"/>Remember </label>
        <a href="/password/email" class="forget-password">Forgot Password?</a>
    </div>
    {!! Form::close() !!}
@stop

