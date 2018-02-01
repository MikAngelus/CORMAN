@extends('Layout.main')

@section('content')

<div class="container">
    <div class="row">

            @foreach($group_list as $group)
            <div id="group-box" class="col-12 col-sm-12 col-md-6 col-lg-4">
                @include('Pages.Group.groupSingle', ['gro'=>$group])
            </div>
        @endforeach
    </div>
</div>
<div class="container">
    <a href="/createGroup" id="btn-newgroup" class="btn-primary" role="button">New Group</a>
</div>



@endsection
