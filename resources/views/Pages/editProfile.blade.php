@extends('Layout.main')

@section('content')

<div id="box" class="container-fluid col-lg-6 col-md-10 col-sm-12 mt-5">
    <div class="container p-0 pt-3 ml-1" id="personalInfo">
        <div class="col-lg-4" id="profilePhoto">
            <a href="#" id="editPhoto" class="fa fa-pencil-square-o" aria-hidden="true"></a>
            </div>
        <div class="col-lg-8 offset-lg ml-lg-5" id="info">
            <div class="h1">Name Surname
                <a href="#" class="fa fa-pencil-square-o" aria-hidden="true"></a>
            </div>
            <div class="h5">Role, Uni
                <a href="#" class="fa fa-pencil-square-o" aria-hidden="true"></a>
            </div>
            <div class="h5">email@example.com
                <a href="#" class="fa fa-pencil-square-o" aria-hidden="true"></a>
            </div>
            <div class="h5">personalsite.com
                <a href="#"class="fa fa-pencil-square-o" aria-hidden="true"></a>
            </div>
        </div>
    </div>
    <div class="form-inline col-lg-12">
        <label for="exampleInputPassword1" class="col-lg-3 col-md-3 col-sm-3">Password</label>
        <input type="password" class="form-control col-lg-8 col-md-8 col-sm-8" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-inline mt-3">
        <label for="exampleInputPassword1" class="col-lg-3 col-md-3 col-sm-3">Confirm Password</label>
        <input type="password" class="form-control col-lg-8 col-md-8 col-sm-8" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="container"><button id="save" class="btn btn-primary btn-lg pull-right lg-3">Save</button>
    </div>

<q></q>
@endsection
