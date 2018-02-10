@extends('Layout.main')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/User/jtable.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sync.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
    <meta name="csrf-token" content="{{ csrf_token()}}">
@endsection

@section('content')
    <!-- info row -->
    <div class="col-lg-12" align="center">
        <div id="message_info" class="col-11 col-sm-11 col-md-8 col-lg-8 col-xl-8" align="center">
            <div>Hi</div> 
            <div id="first_name">{{$user->first_name}}</div><div id="last_name">{{$user->last_name}}</div>
            <div>We found some publications nell'internet may related to you, maybe you would add these to Corman! don't worry you can always modify later</div>
        </div>
    </div>
    
    <!-- loading bar row -->
    <div id="progBar" class="col-lg-12 pull-center">
        <div class="progress col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8" align="center">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span>Please wait<span class="dotdotdot"></span></span>
            </div>
        </div>
    </div>

    <!-- table row -->
    <div class="col-lg-12">
        <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11" align="center"> 
            <table id="table">
                </a><input id="addTo" class="btn btn-primary btn-sm" type="button" value="Add to my CORMAN publications">
            </table>
            <div id="PublicationsTableContainer"></div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Confirm Syncronize</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">Publications Added</div>
                        <a href="{{route('users.index')}}"><input id="confirmAdd" class="btn btn-primary btn-sm" type="button" value="OK"></a>
                    </div>
                </div>
            </div>
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