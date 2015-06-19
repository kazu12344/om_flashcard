@extends('  layout')

@section('content')
<div class="container" style="padding: 20px 0">
    <h1>User Edit</h1>
    {{ Form::open(['url' => 'users/edit', 'class' => 'form-horizontal']) }}
        <div class="form-group">
            <label class=" control-label col-sm-2">User Name</label>
            <div class="col-sm-4">
                {{ Form::text('username', null, ['class' => 'form-control'] ) }}
            </div>
        </div>
        <div class="form-group">
            <label class=" control-label col-sm-2">Email</label>
            <div class="col-sm-4">
                {{ Form::text('email', null, ['class' => 'form-control'] ) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop