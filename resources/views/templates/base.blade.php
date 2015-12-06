<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    @yield('head')
</head>
<body>
    <header class="site-header">
        @yield('header')
    </header>
    <div class="container">
        <div class="col-sm-3">
            @include('partials/sidebar')
        </div>
        <div class="col-sm-9" id="formBuilderApp">
            @yield('content')
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('js/vue.js') }}"></script>
    <script  src="{{ URL::asset('js/main.js') }}"></script>
    @yield('footer')

</body>
</html>