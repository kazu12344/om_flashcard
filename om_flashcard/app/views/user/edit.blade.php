@extends('...layout')

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>Users Edit</h1>
    {{ Form::open(['url' => 'users/edit', 'class' => 'form-horizontal']) }}
        <div class="form-group">
            <label class="col-sm-2 control-label">User Name</label>
            <div class="col-sm-3">
                {{ Form::text('username', null, ['class' => 'form-control'] ) }}
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop