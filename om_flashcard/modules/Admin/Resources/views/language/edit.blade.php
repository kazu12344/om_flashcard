@extends('admin::common.layout')

@section('title')
{{ trans('admin::pagetitle.language.create')  }}
@stop

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>{{ trans('admin::pagetitle.language.create')  }}</h1>
    {!! Form::model($language, ['class' => 'form-horizontal']) !!}
        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('language.code') }}</label>
            <div class="col-sm-2">
                {!! Form::text('code', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('code', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('string') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('language.string') }}</label>
            <div class="col-sm-4">
                {!! Form::text('string', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('string', '<span class="control-label">:message</span>') !!}
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