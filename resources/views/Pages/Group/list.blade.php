@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/Group/groups.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="btn-toolbar justify-content-between col-lg-12">
            <a href="{{route('groups.create')}}" id="btn-newgroup" class="btn btn-primary pull-left" role="button">New Group</a>
            <i class="fa fa-filter fa-2x pull-right" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="@include('Pages.filter')"></i>
        </div>
        <div id="list_container" class="row">
            @foreach($groupList as $group)
                <div id="group_item" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                    @include('Pages.Group.single', ['group'=>$group])
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle=popover]').popover();
        })
    </script>
@endsection
