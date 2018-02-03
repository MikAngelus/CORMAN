@extends('Layout.main')

@section('head')

@endsection

@section('content')
<div class="container">
    <div class="row">
    <a href="{{ route('groups.create')}}" id="btn-newgroup" class="btn btn-primary" role="button">New Group</a>
    </div>
    <div class="row">
        @foreach($groupList as $group)
            <div id="group-box" class="col-12 col-sm-12 col-md-6 col-lg-4">
                @include('Pages.Group.single', ['group'=>$group])
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')

@endsection