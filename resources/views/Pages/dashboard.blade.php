@extends('Layout.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <p>last publications</p>

        </div>
        <div class="col-sm-5">
            <p>last from groups</p>
            @include('Pages.Group.groups')
        </div>
    </div>
</div>

@endsection
