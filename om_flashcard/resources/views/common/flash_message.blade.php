@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@elseif (session('error_message'))
    <div class="alert alert-danger">
        {{ session('error_message') }}
    </div>
@endif
