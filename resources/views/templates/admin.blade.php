<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    @yield('head')
</head>
<body>
    <div class="admin-body" id="admin">
         
        <header class="site-header admin-header">
            @yield('header')
            @include('partials/header-nav')
        </header> 
    
        <div class="container admin-container">
            <div class="col-sm-12" id="formBuilderApp">
                @yield('content')
            </div>
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="{{ URL::asset('js/vue.js') }}"></script>
        <script  src="{{ URL::asset('js/main.js') }}"></script>
        @yield('footer')
        
    </div>
</body>
</html>