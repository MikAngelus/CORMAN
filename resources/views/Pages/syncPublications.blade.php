@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/User/jtable.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
    <meta name="csrf-token" content="{{ csrf_token()}}">
@endsection

@section('content')

    <h2>Hi {{$user->first_name}} {{$user->last_name}} </h2>
    <h4>We found some of your publications, maybe you would add these to CORMAN</h4>

    <table id="table"></table>

    <div id="PublicationsTableContainer"></div>
    <br>
    <input type="button" value="Add to my CORMAN publications" id="addTo">
@endsection

@section('script')
    <script src="js/jquery-ui.js"></script>
    <script src="js/User/jquery.jtable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-en-US.min.js"></script>
    <script src="js/User/sync.js"></script>
@endsection
