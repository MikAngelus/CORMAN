@extends ('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/User/editUser.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet"/>
    <link href="{{url('css/form.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid col-lg-8" id="box">
    <div class="row">
        <div class="col-lg-4" id="profilePhoto">
            <a href="#" id="editPhoto" class="fa fa-pencil-square-o" aria-hidden="true"></a>
        </div>
        <div class="row col-lg-8">
            <div class="form-group">
                <input class="col-lg-12 editable-field" name="first_name" type="text" placeholder="First Name"/>
                <a class="edit col-lg-1">Edit</a>
                <a class="button save hidden col-lg-1">Save</a>
            </div>
            <div class="form-group">
                <input class="col-lg-12 editable-field" name="last_name" type="text" placeholder="Last Name"/>
                <a class="edit col-lg-1">Edit</a>
                <a class="button save hidden col-lg-1">Save</a>
            </div>
        </div>
    </div>
    <div class="col-lg-8 offset-lg ml-lg-5" id="info">
    <div class="h5">Role, Uni
        <a href="#" class="fa fa-pencil-square-o" aria-hidden="true"></a>
    </div>
    <div class="h5">email@example.com
        <a href="#" class="fa fa-pencil-square-o" aria-hidden="true"></a>
    </div>
    <div class="h5">personalsite.com
        <a href="#" class="fa fa-pencil-square-o" aria-hidden="true"></a>
    </div>
    <div class="form-inline col-lg-12">
        <label for="exampleInputPassword1" class="col-lg-3 col-md-3 col-sm-3">Password</label>
        <input type="password" class="form-control col-lg-8 col-md-8 col-sm-8" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-inline mt-3">
        <label for="exampleInputPassword1" class="col-lg-3 col-md-3 col-sm-3">Confirm Password</label>
        <input type="password" class="form-control col-lg-8 col-md-8 col-sm-8" id="exampleInputPassword1" placeholder="Password">
    </div>
</div>
@endsection

@section('script')
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryform.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection