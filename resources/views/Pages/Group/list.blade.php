@extends('Layout.main')

@section('head')

@endsection

@section('content')
<div class="container">
    <div class="row">
        @foreach($groupList as $group)
            <div id="group-box" class="col-12 col-sm-12 col-md-6 col-lg-4">
                @include('Pages.Group.single', ['group'=>$group])
            </div>
        @endforeach
    </div>
</div>
<div class="container">
    <a href="/createGroup" id="btn-newgroup" class="btn-primary" role="button">New Group</a>
</div>
@endsection

@section('script')

@endsection