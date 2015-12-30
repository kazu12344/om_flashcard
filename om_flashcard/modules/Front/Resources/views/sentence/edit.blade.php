@extends('front::common.layout')

@section('title')
    {{ trans("front::pagetitle.sentence.create") }}
@stop

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>{{ trans("front::pagetitle.sentence.create") }}</h1>
    {!! Form::model($sentence, ['class' => 'form-horizontal']) !!}
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('front::sentence.title') }}</label>
            <div class="col-sm-4">
                {!! Form::input('text', 'title', null, ['class' => 'form-control'] ) !!}
                {!! $errors->first('title', '<span class="control-label">:message</span>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
            <label class=" control-label col-sm-2">{{ trans('front::sentence.text') }}</label>
            <div class="col-sm-10">
                {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
                {!! $errors->first('text', '<span class="control-label">:message</span>') !!}
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