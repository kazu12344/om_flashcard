<!DOCTYPE html>
<html lnag="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    {!! Html::style('asset/css/bootstrap.css') !!}
</head>
<body>

    @if (Auth::admin()->check())
        @include('admin::common.navibar')
    @endif
    @yield('content')

    {!! Html::script('asset/js/jquery-2.1.4.min.js') !!}
    {!! Html::script('asset/js/bootstrap.min.js') !!}
</body>
</html>