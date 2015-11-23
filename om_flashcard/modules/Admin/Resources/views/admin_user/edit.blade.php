@extends('admin::common.layout')

@section('title')
user edit
@stop

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>User Edit</h1>
    {!! Form::model($admin_user, ['class' => 'form-horizontal']) !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">User Name</label>
            <div class="col-sm-4">
                {!! Form::text('name', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('name', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">Email</label>
            <div class="col-sm-4">
                {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('email', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">Password</label>
            <div class="col-sm-4">
                {!! Form::password('password', ['class' => 'form-control'] ) !!}
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