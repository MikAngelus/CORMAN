<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutorial</title>
    <base href="{{ URL::asset('/') }}" target="_blank">
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/landing.css') }}">
</head>
<body>
    <div class="container">
        <div class="container-fluid">
        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="Vivamus
sagittis lacus vel augue laoreet rutrum faucibus.">Click
        </button>
    </div>
</div>






<script src="{{ url('js/bootstrap.bundle.js') }}"></script>
    <script>
    $(function () {
  $('[data-toggle=popover]').popover();
})
</script>
</body>
</html>
