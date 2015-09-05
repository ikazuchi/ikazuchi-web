@extends('auth.layout')

@section('content')
    {!! Form::open(['url' => '/password/email', 'method' => 'post', 'class' => 'login-form' ]) !!}
    <h3 class="form-title">Password Reset</h3>

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
    <div class="form-actions">
        <a type="button" href="{{ url() }}" class="btn btn-default">Back</a>
        <button type="submit" class="btn btn-success uppercase pull-right">Send Password Reset Link</button>
    </div>
    {!! Form::close() !!}
@stop
