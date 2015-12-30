@extends('admin::common.layout')

@section('title')
user index
@stop

@section('content')

<div class="container" style="padding: 20px 0">
    <h1>Admin List</h1>
    @if (session('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    </div>
    @endif
    {!! Html::link("admin/admin_user/create", 'create', ['class' => 'btn btn-success']) !!}<br />
    <table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    </thead>
    @foreach($admin_users as $admin_user)
    <tbody>
    <tr>
        <td>{!! Html::link("admin/admin_user/edit/{$admin_user->id}", $admin_user->name) !!}</td>
        <td>{{ $admin_user->email }}</td>
        <td>{{ $admin_user->created_at }}</td>
        <td>{{ $admin_user->updated_at }}</td>
    </tr>
    <tbody>
    @endforeach　
    </table>
    {!! $admin_users->render() !!}
</div>
@stop