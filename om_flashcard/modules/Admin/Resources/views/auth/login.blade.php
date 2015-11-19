@extends('admin::layouts.layout')

@section('title')
Login
@stop

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>Admin Login</h1>
     {!! Form::open(['url' => 'admin/login', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">Email</label>
            <div class="col-sm-4">
                {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('email', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">Password</label>
            <div class="col-sm-4">
                {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                {!! $errors->first('password', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </div>
    {!! Form::close() !!}
</div>
@stop