@extends('layout')

@section('content')
    <h1>Users List</h1>
    <table class="table">
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
        <td>{{ $user->email  }}</td>
        <td>{{ $user->created_at  }}</td>
        <td>{{ $user->updated_at  }}</td>
    </tr>
    <tbody>
    @endforeach
    </table>

@stop