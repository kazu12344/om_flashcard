@extends('admin::common.layout')

@section('title')
{{ trans('admin::pagetitle.language.create')  }}
@stop

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>{{ trans('admin::pagetitle.language.create')  }}</h1>
    {!! Form::model($language, ['class' => 'form-horizontal']) !!}
        <div class="form-group {{ $errors->has('lang_code') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('admin::language.lang_code') }}</label>
            <div class="col-sm-2">
                {!! Form::text('lang_code', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('lang_code', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('lang_string') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('admin::language.lang_string') }}</label>
            <div class="col-sm-4">
                {!! Form::text('lang_string', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('lang_string', '<span class="control-label">:message</span>') !!}
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