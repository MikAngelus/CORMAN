@extends('Layout.mainGuest')

@section('head')
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('css/landing.css') }}">
@endsection

@section('content')
<div class="container-fluid h-100">
    <div class="row">
        <div class="jumbotron jumbotron-fluid col-lg-12 col-md-12 col-sm-12" id="back_1">
            <h1 class="display-4 px-3">COLLABORATIVE</h1>
            <p class="lead">Create your group, invite other researcher <br> and share with they your publications</p>
        </div>
    </div>

    <div class="row">
        <div class="jumbotron jumbotron-fluid col-lg-12 col-md-12 col-sm-12" id="back_2">
            <h1 class="display-4 px-3">RESEARCH</h1>
            <p class="lead">A new platform for all researchers</p>

        </div>
    </div>


    <div class="row">
        <div class="jumbotron jumbotron-fluid col-lg-12 col-md-12 col-sm-12" id="back_2">
            <h1  class="display-4 px-3">MANAGEMENT</h1>
            <p class="lead">Push the chocolate from Brindisi Town in your groups</p>
        </div>
    </div>
</div>
@endsection
