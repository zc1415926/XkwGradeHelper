<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/patch.css" rel="stylesheet">
    <link href="../css/docs.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.partials.nav')
    @yield('doc-header')
    <div class="container bs-docs-container">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('flash_message') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    @yield('javascript')

</body>
</html>