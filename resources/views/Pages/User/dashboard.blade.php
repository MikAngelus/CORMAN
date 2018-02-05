@extends ('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <center><h1>Last Publications</h1></center>
                <div class="btn-toolbar justify-content-between col-lg-12">
                    <a href="{{ route('publications.create')}}" id="btn-newgroup" class="btn btn-primary pull-left" role="button">New Publication</a>
                    <a href="{{ route('publications.index')}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">View All</a>
                </div>
                @foreach($publicationList as $publication)
                    @include('Pages.Publication.single', ['publication'=>$publication])
                @endforeach
            </div>
                
            <div class="col-lg-4 col-md-4">
                <center><h1>Last from Groups</h1></center>
                <div class="btn-toolbar justify-content-between col-lg-12">
                    <a href="{{ route('groups.create')}}" id="btn-newgroup" class="btn btn-primary pull-left" role="button">New Group</a>
                    <a href="{{ route('groups.index')}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">View All</a>
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
