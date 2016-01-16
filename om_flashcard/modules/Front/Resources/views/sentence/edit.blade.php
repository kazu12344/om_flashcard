@extends('front::common.layout')

@section('title')
    {{ trans("front::pagetitle.sentence.create") }}
@stop

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>{{ trans("front::pagetitle.sentence.create") }}</h1>
    <div class="row">
        <?php // Native Language ?>
        {!! Form::model($native_language_sentence, ['class' => 'form-horizontal']) !!}
        <div class="col-sm-6">
            <h3>{{ trans("front::pagetitle.sentence.native_language_sentence") }}</h3>
            @if (!empty($native_language_sentence->id))
                {!! Form::hidden('id', $native_language_sentence->id) !!}
            @endif
            @if (!empty($sentence_group_id))
                {!! Form::hidden('sentence_group_id', $sentence_group_id) !!}
            @endif
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class=" control-label col-sm-2">{{ trans('front::sentence.title') }}</label>
                <div class="col-sm-10">
                    {!! Form::input('text', 'title', null, ['class' => 'form-control'] ) !!}
                    {!! $errors->first('title', '<span class="control-label">:message</span>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('language_id') ? 'has-error' : '' }}">
                <label class="control-label col-sm-2">{{ trans("language.languages") }}</label>
                <div class="col-sm-6">
                    {!! Form::select("language_id", $native_languages, null, ['class' => 'form-control'] ) !!}
                    {!! $errors->first('language_id', '<span class="control-label">:message</span>') !!}
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
        </div>
        {!! Form::close() !!}

        <?php // Practicing Language ?>
        {!! Form::model($practicing_language_sentence, ['class' => 'form-horizontal']) !!}
        <div class="col-sm-6">
            <h3>{{ trans("front::pagetitle.sentence.practicing_language_sentence") }}</h3>
            @if (!empty($practicing_language_sentence->id))
                {!! Form::hidden('id', $practicing_language_sentence->id) !!}
            @endif
            @if (!empty($sentence_group_id))
                {!! Form::hidden('sentence_group_id', $sentence_group_id) !!}
            @endif
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label class=" control-label col-sm-2">{{ trans('front::sentence.title') }}</label>
                <div class="col-sm-10">
                    {!! Form::input('text', 'title', null, ['class' => 'form-control'] ) !!}
                    {!! $errors->first('title', '<span class="control-label">:message</span>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('language_id') ? 'has-error' : '' }}">
                <label class="control-label col-sm-2">{{ trans("language.languages") }}</label>
                <div class="col-sm-6">
                    {!! Form::select("language_id", $practicing_languages, null, ['class' => 'form-control'] ) !!}
                    {!! $errors->first('language_id', '<span class="control-label">:message</span>') !!}
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
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop