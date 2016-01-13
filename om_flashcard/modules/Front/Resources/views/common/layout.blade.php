<!DOCTYPE html>
<html lnag="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{!! asset('asset/img/favicon.png') !!}">

    <!-- CSS -->
    {!! Html::style('asset/css/stylesheets/reset.css') !!}
    {!! Html::style('asset/css/bootstrap.css') !!}
    {!! Html::style('asset/css/stylesheets/screen.css') !!}

    <!-- Javascript -->
    {!! Html::script('asset/js/jquery-2.1.4.min.js') !!}
    {!! Html::script('asset/js/bootstrap.min.js') !!}
</head>
<body>
    @if (Auth::front()->check())
        @include('front::common.navibar')
    @endif
    @yield('content')

</body>
</html>