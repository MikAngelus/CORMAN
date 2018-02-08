@extends ('Layout.main')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <link rel="stylesheet" href="{{ url('css/Group/groups.css') }}">
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-10">
                <div id="groupInfo" class="row">
                    <div class="col-lg-3">
                        <img class="card-img-top" src="{{url($theGroup->picture_path)}}" alt="Card image cap" height="150" width="150">
                    </div>
                    <div class="col-lg-8">
                        <h3>{{$theGroup->name}}</h3>
                        <hr>
                        <p id="description">{{$theGroup->description}}</p>
                        <hr>
                        <div id="members">
                            <h6>MEMBERS:</h6>
                            <ul class="list-inline">    
                                @foreach(($theGroup->users) as $members)
                                    <li class="list-inline-item">{{$members->first_name}} {{$members->last_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <i class="ion-eye col"></i>
                        <a href="{{route('groups.edit', ['id'=>$theGroup->id])}}"><i class="ion-edit col"></i></a>
                        <i class="ion-android-exit col"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <a href="#" id="btn-newgroup" class="btn btn-primary" role="button" data-toggle="modal" data-target="#addPublication">Add Publication</a>
                    </div>
                    <div class="col-lg-2">
                        <i class="fa fa-filter fa-2x pull-right" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="@include('Pages.filter')"></i>
                    </div>
                </div>
                <div class="row">
                    @foreach($publicationList as $publication)
                        @include('Pages.Publication.single', ['publication'=>$publication])
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3 col-md-2">

            @foreach($groupList as $group)
                    @include('Pages.Group.single', ['group'=>$group])
                @endforeach          
            </div>
        </div>
    </div>

    <!-- Modal Add Publications in Group -->
    <div class="modal fade" id="addPublication" tabindex="-1" role="dialog" aria-labelledby="addPublication" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addPublication">Add Publication</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('Pages.Group.modalAddPublication')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-en-US.min.js"></script>
    <script src="{{ url('js/Group/sharePublication.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle=popover]').popover();
        })
    </script>
@endsection
