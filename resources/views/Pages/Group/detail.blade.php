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
            
            <!-- Group Info & Publications -->
            <div class="col-9 col-sm-9 col-md-10 col-lg-9 col-xl-9">
                <div id="groupInfo" class="row">
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <img class="card-img-top" src="{{url($theGroup->picture_path)}}" alt="Card image cap" height="150" width="150">
                    </div>
                    <div class="col-7 col-sm-7 col-md-7 col-lg-8 col-xl-8">
                        <div id="titleDetail">{{$theGroup->name}}</div>
                        <hr>
                        <div id="descriptionDetail">{{$theGroup->description}}</div>
                        <hr>
                        <div id="membersDetail">
                            <h6>MEMBERS:</h6>
                            <ul class="list-inline">    
                                @foreach(($theGroup->members) as $members)
                                    <li class="list-inline-item">{{$members->first_name}} {{$members->last_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1">
                        @if($theGroup->public === "public")
                            <a href="#"><i class="ion-eye col" align="right"></i></a>
                        @else
                            <a href="#"><i class="ion-eye-disabled col" align="right"></i></a>
                        @endif 
                        <a href="{{route('groups.edit', ['id'=>$theGroup->id])}}"><i class="ion-edit col" align="right"></i></a>
                        <i class="ion-android-exit col"></i>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-10">
                        <a href="#" id="btn-newgroup" class="btn btn-primary" role="button" data-toggle="modal" data-target="#addPublication">Add Publication</a>
                    </div>
                    <div class="col-lg-2">
                        <i class="fa fa-filter fa-2x pull-right" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="@include('Pages.filter')"></i>
                    </div>
                </div>
                <div class="row">
                    @foreach($sharesList as $share)
                        @include('Pages.Publication.singleInGroup', ['share'=>$share])
                    @endforeach
                </div>
            </div>

            <!-- Group List -->
            <div class="col-3 col-sm-3 col-md-2 col-lg-3 col-xl-3">
                @foreach($groupList as $group)
                    @include('Pages.Group.single', ['group'=>$group])
                @endforeach          
            </div>
        </div>

        <!-- Modal Add Publications in Group -->
        <div class="modal fade" id="addPublication" tabindex="-1" role="dialog" aria-labelledby="addPublication" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="addPublication">Add Publications in this Group</h6>
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
