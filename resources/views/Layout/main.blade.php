<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Corman</title>
    <link rel="stylesheet" href="{{ public_path('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ public_path('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    @yield('head')
</head>
<body>
    <div class="container-fluid">
        @include('Layout.header')
        @yield('content')
        @include('Layout.footer')
    </div>

    <script src="{{ public_path('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ public_path('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ public_path('js/bootstrap.min.js') }}"></script>
    <script src="{{ public_path('js/popper.min.js') }}"></script>
    @yield('script')

    
                        
</body>
</html>