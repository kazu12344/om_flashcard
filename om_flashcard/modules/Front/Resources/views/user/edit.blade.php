@extends('front::common.layout')

@section('title')
user edit
@stop

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>{{ trans('front::pagetitle.user.edit') }}</h1>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    {!! Form::model($user, ['class' => 'form-horizontal']) !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('user.name') }}</label>
            <div class="col-sm-4">
                {!! Form::text('name', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('name', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('user.email') }}</label>
            <div class="col-sm-4">
                {!! Form::text('email', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('email', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('native_language') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('user.native_language') }}</label>
            <div class="col-sm-4">
                {!! Form::select('native_language', $language_selectbox_data, null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('native_language', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('paracticing_language') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('user.paracticing_language') }}</label>
            <div class="col-sm-4">
                {!! Form::select('paracticing_language', $language_selectbox_data, null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('paracticing_language', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('user.password') }}</label>
            <div class="col-sm-4">
                {!! Form::input('password', 'password', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('password', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('user.password_confirmation') }}</label>
            <div class="col-sm-4">
                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('password_confirmation', '<span class="control-label">:message</span>') !!}
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