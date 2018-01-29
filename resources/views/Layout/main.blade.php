<!DOCTYPE html>
<html lang="en">
<head>
    @include('Layout.head')
</head>
<body>
    <div class="container-fluid">
        @include('Layout.header')
        @yield('content')
        @include('Layout.footer')
    </div>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryform.js') }}"></script>
</body>
</html>