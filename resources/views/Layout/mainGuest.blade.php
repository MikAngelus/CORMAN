<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Corman</title>
        <link rel="stylesheet" href="{{ url('css/footer.css') }}">
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        @yield('head')
    </head>
    <body>
        <div class="container-fluid">
            @include('Layout.headerGuest')
            @yield('content')
            @include('Layout.footer')
        </div>

        <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/popper.min.js') }}"></script>
        @yield('script')

    </body>
</html>
