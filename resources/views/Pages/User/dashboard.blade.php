@extends ('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
    <link rel="stylesheet" href="{{ url('css/Group/groups.css') }}">
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-7 col-lg-8 col-xl-9">
                <div id="titlePubblDash">Last publication</div>
                <div class="btn-toolbar justify-content-between col-lg-12">
                    <a href="{{ route('publications.create')}}" id="btn-newgroup" class="btn btn-primary btn-sm pull-left" role="button">New Publication</a>
                    <a href="{{ route('publications.index')}}" id="btn-newgroup" class="btn btn-primary btn-sm pull-right" role="button">View All</a>
                </div>
                @foreach($publicationList as $publication)
                    @include('Pages.Publication.single', ['publication'=>$publication])
                @endforeach
            </div>

            <div class="col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3">
                <div id="titleGroupDash">Last from groups</div>
                <div class="btn-toolbar justify-content-between col-lg-12">
                    <a href="{{ route('groups.create')}}" id="btn-newgroup" class="btn btn-primary btn-sm pull-left" role="button">New Group</a>
                    <a href="{{ route('groups.index')}}" id="btn-newgroup" class="btn btn-primary btn-sm pull-right" role="button">View All</a>
                </div>
                @foreach($groupList as $group)
                    @include('Pages.Group.single', ['group'=>$group])
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
