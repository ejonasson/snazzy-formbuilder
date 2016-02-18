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
    <header class="site-header">
        @yield('header')
    </header>
    
    
    <div class="body-background public-body">
        <div class="container body-container">
            <div class="col-sm-8 col-sm-offset-2 form-content" id="formBuilderApp">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('js/vue.js') }}"></script>
    <script src="{{ URL::asset('js/public.js') }}"></script>
    @yield('footer')

</body>
</html>