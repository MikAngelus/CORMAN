@extends ('Layout.main')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8 col-md-10">
            <div class="row">
                <div class="col-lg-3">
                    <i class="fa-7x fa-users"></i>
                </div>
                <div class="col-lg-6">
                    <h1>{{$group->name}}</h1>
                    <p>{{$group->description}}</p>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                @foreach($publicationList as $publication)
                    @include('Pages.Publication.single', ['publication'=>$publication])
                @endforeach
            </div>
        </div>
        
        <div class="col-lg-4 col-md-2">
            @foreach($groupList as $groupSingle)
                <div class="col-lg-12">
                    @include('Pages.Group.single', ['groupSingle'=>$groupSingle])
                </div>
            @endforeach
        </div>
    
    </div>
</div>

@endsection
