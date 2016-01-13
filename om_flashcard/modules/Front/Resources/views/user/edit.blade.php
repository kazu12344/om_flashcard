@extends('front::common.layout')

@section('title')
user edit
@stop

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>{{ trans('front::pagetitle.user.edit') }}</h1>
    @include('common.flash_message')
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
        <div class="languages-select-container">
            <div class="language-select-boxes">
                @include('common.language_select_box', [
                    'select_box_data' => $language_selectbox_data,
                    'element_name' => 'native_languages',
                    'default_data' => $native_languages,
                ])
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4 text-right add-languages-btn" data-lang-add-btn-name="native_languages">
                    <button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="languages-select-container">
            <div class="language-select-boxes">
                @include('common.language_select_box', [
                    'select_box_data' => $language_selectbox_data,
                    'element_name' => 'practicing_languages',
                    'default_data' => $practicing_languages,
                ])
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4 text-right add-languages-btn" data-lang-add-btn-name="practicing_languages">
                    <button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
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
<script>
$(function(){
    $('.add-languages-btn').on('click', function(e){
        e.preventDefault();
        var lang_add_btn_name = $(this).data('lang-add-btn-name');
        var $add_languages_btn = $(this);
        $.ajax({
            url: '<?php echo url('user/ajax-add-select-box'); ?>',
            dataType: 'html',
            method: 'POST',
            data: {
                'element_name': lang_add_btn_name,
                '_token':$('input[name=_token]').val()
            },
            success: function(data) {
                $add_languages_btn.closest('.languages-select-container').find('.language-select-boxes').append(data);
            }
        });
    });
    $('.languages-select-container').on('click', '.remove-language-btn', function(e){
        e.preventDefault();
        console.log(':)');
        $(this).closest('.form-group').remove();
    });
});
</script>
@stop