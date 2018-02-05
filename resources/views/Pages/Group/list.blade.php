@extends('Layout.main')

@section('head')

@endsection

@section('content')
    <div class="container-fluid">
        <div id="navbar" class="row col-lg-12">
            <div class="col-lg-11">
                <a href="{{route('groups.create')}}" id="btn-newgroup" class="btn btn-primary pull-left" role="button">New Group</a>
            </div>    
            <div class="col-lg-1">
            <i class="fa fa-filter fa-2x pull-right" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="@include('Pages.filter')"></i>
                </div>
            </div>
        </div>
        <div id="list_container" class="row col-lg-12">
            @foreach($groupList as $group)
                <div id="group-box" class="col-12 col-sm-12 col-md-6 col-lg-4">
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