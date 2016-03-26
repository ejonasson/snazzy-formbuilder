<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
        <script src="{{ URL::asset('js/vue.js') }}"></script>
        <script  src="{{ URL::asset('js/admin.js') }}"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


        @yield('footer')
        @if ( Config::get('app.debug') )
        <script type="text/javascript">
      document.write('<script src="//localhost:35729/livereload.js?snipver=1" type="text/javascript"><\/script>')
      </script>
        @endif
    </div>
</body>
</html>
