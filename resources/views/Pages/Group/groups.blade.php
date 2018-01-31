@extends('Layout.main')

@section('content')
<div class="container">
    <div class="row">
        @foreach($group_list as $group)
            @include('Pages.Group.groupSingle', ['gro'=>$group])
        @endforeach
    </div>
</div>
<div class="container">
    <button id="btn-newgroup" class="btn-primary">New Group</button>
</div>
@endsection
