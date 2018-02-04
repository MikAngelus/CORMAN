@extends ('Layout.main')

@section('head')

@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9 col-md-10">
            <div class="row">
                <div class="col-lg-2">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-lg-7">
                    <h1>{{$group->name}}</h1>
                    <p>{{$group->description}}</p>
                </div>
                <div class="col-lg-3">
                    <i class="fa fa-eye fa-2x col-lg-3"></i>
                    <a href="{{route('groups.edit', ['id'=>$group->id])}}"><i class="fa fa-pencil fa-2x col-lg-3"></i></a>
                    <i class="fa fa-angle-double-right fa-2x col-lg-3"></i>    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <a href="#" id="btn-newgroup" class="btn btn-primary" role="button">New Publication</a>
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
            @foreach($groupList as $groupSingle)
                <div class="col-lg-12">
                    @include('Pages.Group.single', ['groupSingle'=>$groupSingle])
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