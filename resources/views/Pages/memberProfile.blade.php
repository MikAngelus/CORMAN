@extends ('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/Group/groups.css') }}">
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-10">
                <div class="row">
                    <div class="col-lg-2">
                        <img class="card-img-top" src="{{$user->picture_path}}" alt="Card image cap" height="150" width="150">
                    </div>
                    <div class="col-lg-7">
                        <h1>{{$user->first_name}}</h1>
                        <p>{{$user->last_name}}</p>
                        <!-- aggiungere altre info riguardo l'utente (ruolo, affiliazione, ecc) -->
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <a href="#" id="btn-newgroup" class="btn btn-primary" role="button">Add Publication</a>
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
                    <div class="col-lg-12">
                        @include('Pages.Group.single', ['group'=>$group])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle=popover]').popover();
        })
    </script>
@endsection