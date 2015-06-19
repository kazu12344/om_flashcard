<!DOCTYPE html>
<html lnag="en">

<head>
    <meta charset="utf-8">
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.css'); }}
</head>
<body>
    @yield('content')

    {{ HTML::script('js/jquery-2.1.4.min.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
</body>
</html>