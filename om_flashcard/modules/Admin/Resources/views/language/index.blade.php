@extends('admin::common.layout')

@section('title')
    {{ trans('admin::pagetitle.language.index') }}
@stop

@section('content')

<div class="container" style="padding: 20px 0">
    <h1>{{ trans('admin::pagetitle.language.index') }}</h1>
    @if (session('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    </div>
    @endif
    {!! Html::link("admin/language/create", 'create', ['class' => 'btn btn-success']) !!}<br />
    <table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>{{ trans('language.id') }}</th>
        <th>{{ trans('language.code') }}</th>
        <th>{{ trans('language.string') }}</th>
        <th>{{ trans('common.updated_at') }}</th>
        <th>{{ trans('common.updated_at') }}</th>
    </tr>
    </thead>
    @foreach($languages as $language)
    <tbody>
    <tr>
        <td>{!! Html::link("admin/language/edit/{$language->id}", $language->id) !!}</td>
        <td>{{ $language->code }}</td>
        <td>{{ $language->string }}</td>
        <td>{{ $language->created_at }}</td>
        <td>{{ $language->updated_at }}</td>
    </tr>
    <tbody>
    @endforeach　
    </table>
    {!! $languages->render() !!}
</div>
@stop