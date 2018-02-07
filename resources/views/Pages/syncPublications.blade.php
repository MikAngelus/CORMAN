@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/User/jtable.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
    <meta name="csrf-token" content="{{ csrf_token()}}">
@endsection

@section('content')

    <h2>Hi</h2>
    <h2 id="first_name">{{$user->first_name}}</h2>
    <h2 id="last_name">{{$user->last_name}}</h2>
    <h4>We found some publications nell'internet may related to you, maybe you would add these to Corman! don't worry you can always modify later</h4>

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
