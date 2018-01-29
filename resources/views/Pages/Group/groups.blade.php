@extends ('Layout.main')

@section('content')
<div class="container">
    <div class="row">
     @foreach ($groups as $groupName)
    
        <div id="group-box" class="col-md-4 col-md-6 col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                    <h2>{{$groupName}}</h2>
                </div>
                <div class="panel-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 
                Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. 
                Nulla consequat massa quis enim.</div>
                <div class="panel-footer">
                    <button class="btn-primary pull-right">View More</button>
                </div>
            </div>
        </div>
   @endforeach
    </div>
</div>
 <div class="container">
     <button id="btn-newgroup" class="btn-primary">New Group</button>
 </div>
@endsection