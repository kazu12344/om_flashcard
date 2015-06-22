@extends('...layout')

@section('title')
user index
@stop

@section('content')

<div class="container" style="padding: 20px 0">
    <h1>Users List</h1>
    <table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
    <tr>
        <td>{{ $user->name  }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
    </tr>
    <tbody>
    @endforeach　
    </table>
</div>
@stop