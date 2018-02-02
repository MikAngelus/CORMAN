<div class="panel panel-primary col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="panel-heading">
        <i class="icon fa fa-users fa-2x pt-3 pl-0 col-lg-2 col-md-2 col-sm" aria-hidden="true"></i>
        <div class="mb-2 mt-3 title col-lg-10 col-md-8 col-sm-11">
            <h3>{{$group->name}}</h3>
        </div>
    </div>
    <div class="panel-body">{{$group->description}}</div>
    <div class="panel-footer">
        <a href=""><i class="fa fa-eye fa-2x"></i></a>
        <a href="/editGroup"><i class="fa fa-pencil fa-2x"></i></a>
        <a href="/groupDetail" id="btn-newgroup" class="btn btn-primary pull-right" role="button">View More</a>
    </div>
</div>
