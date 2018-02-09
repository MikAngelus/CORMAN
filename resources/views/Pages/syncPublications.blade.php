@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/User/jtable.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sync.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
    <meta name="csrf-token" content="{{ csrf_token()}}">
@endsection

@section('content')
    <div class="row">
        <div id="message_info" class="col-11 col-sm-11 col-md-8 col-lg-6 col-xl-6" align="center">
            <p>Hi</p> 
            <div id="first_name">{{$user->first_name}}</div><div id="last_name">{{$user->last_name}}</div>
            <p>We found some publications nell'internet may related to you, maybe you would add these to Corman! don't worry you can always modify later</p>
        </div>
    </div>    
    <div class="row">    
        <div class="col-lg-11" align="center">
            
            <table id="table">
                <input class="btn btn-primary btn-sm" type="button" value="Add to my CORMAN publications" id="addTo">
            </table>
            <div id="PublicationsTableContainer"></div>
            
        </div>
    </div>
@endsection

@section('script')
    <script src="js/jquery-ui.js"></script>
    <script src="js/User/jquery.jtable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-en-US.min.js"></script>
    <script src="js/User/sync.js"></script>
@endsection