@extends ('Layout.main')

@section('head')

@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <center><h1>Last Publications</h1></center>
            <div class="row">
                <div>
                    <a href="{{ route('publications.create')}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">New Publication</a>
                </div>
                <div>
                    <a href="{{ route('publications.index')}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">View All</a>
                </div>
            </div>
            <br>
            @foreach($publicationList as $publication)
                @include('Pages.Publication.single', ['publication'=>$publication])
            @endforeach
        </div>
        <div class="col-lg-4 col-md-4">
        <center><h1>Last from Groups</h1></center>
        <div class="row">
            <div>
                <a href="{{ route('groups.create')}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">New Group</a>
            </div>
            <div>
                <a href="{{ route('groups.index')}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">View All</a>
            </div>
        </div>
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

@endsection
