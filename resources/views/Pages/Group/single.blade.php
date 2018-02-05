<!--
<div class="panel panel-primary col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="panel-heading">
        <div class="row">
        <i class="icon fa fa-users fa-2x pt-3 pl-0 col-lg-2 col-md-2 col-sm" aria-hidden="true"></i>
        <div class="mb-2 mt-3 title col-lg-10 col-md-8 col-sm-11">
            <h5>{{$group->name}}</h5>
        </div>
        </div>
    </div>
    <div class="panel-body">{{$group->description}}</div>
    <div class="panel-footer">
        <a href=""><i class="fa fa-eye fa-2x"></i></a>
        <a href="{{route('groups.edit', ['id'=>$group->id])}}"><i class="fa fa-pencil fa-2x"></i></a>
        <a href="{{route('groups.show', ['id'=>$group->id])}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">View More</a>
    </div>
</div>
-->
<div class="group_item">
<div class="card text-left">
    <img class="card-img-top" src="{{$group->picture_path}}" alt="Card image cap" height="100" width="100">
    <div class="card-block">
        <div id="title" class="card-title">{{$group->name}}</div>
        <div id="description" class="card-text">{{$group->description}}</div>
    </div>
    <div class="card-footer justify-content-between align-items-center">
        <a href=""><i class="fa fa-eye pull-left"></i></a>
        <a href="{{route('groups.edit', ['id'=>$group->id])}}"><i class="fa fa-pencil pull-left"></i></a>
        <a href="{{route('groups.show', ['id'=>$group->id])}}" id="btn-newgroup" class="btn btn-primary btn-sm pull-right" role="button">View More</a>
    </div>
</div>
</div>