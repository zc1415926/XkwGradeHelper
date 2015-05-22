<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/patch.css" rel="stylesheet">
    <link href="../css/docs.min.css" rel="stylesheet">
    <link href="../css/xkw-grade-helper.css" rel="stylesheet">
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

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    @yield('javascript')

</body>
</html>