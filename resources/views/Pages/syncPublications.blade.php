@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/User/jtable.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token()}}">
@endsection

@section('content')

    <h2>Hi {{$user->first_name}} {{$user->last_name}} </h2>
    <h4>We found some of your publications, maybe you would add these to CORMAN</h4>

    <div id="PublicationsTableContainer"></div>
@endsection

@section('script')
    <script src="js/jquery-ui.js"></script>
    <script src="js/User/jquery.jtable.min.js" type="text/javascript"></script>
    <script src="js/User/sync.js"></script>
@endsection
