@extends('front::common.layout')
@section('title')
{{ trans('front::pagetitle.sentence.index') }}
@stop

@section('content')
<div class="container">
    <h1>{{ trans('front::pagetitle.sentence.index') }}</h1>
    @include('common.flash_message')
    {!! Html::link("sentence/create", trans('common.create'), ['class' => 'btn btn-success btn-create']) !!}<br />
    <table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>{{ trans('sentence.title') }}</th>
        <th>{{ trans('language.languages') }}</th>
        <th>{{ trans('common.created_at') }}</th>
        <th>{{ trans('common.updated_at') }}</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($sentences as $sentence_group_id => $sentence_group)
            <?php $td_class = (count($sentence_group) >= 2) ? 'table-same-language-group' : ''; ?>
            @foreach ($sentence_group as $sentence)
            <tr>
                <td class="{{ $td_class }}">{!! Html::link("sentence/edit/{$sentence->sentence_group_id}", $sentence->title) !!}</td>
                <td class="{{ $td_class }}">{{ $sentence->language }}</td>
                <td class="{{ $td_class }}">{{ $sentence->created_at }}</td>
                <td class="{{ $td_class }}">{{ $sentence->updated_at }}</td>
            </tr>
            @endforeach
        @endforeach
    <tbody>
    </table>
    {!! $sentence_groups->render() !!}
</div>
@stop