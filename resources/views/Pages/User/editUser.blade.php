@extends ('Layout.main')

@section('head')
    <link href="{{url('css/User/editUser.css')}}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet"/>
    <link href="{{url('css/form.css')}}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="row" id="formErrors">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form id="msform" action="{{ route('users.update', ['id'=>Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{csrf_field()}}

        <div class="container-fluid col-lg-8" id="box">
            <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            <div class="row">
                <div class="col-lg-9">
                    <div class="form-group">
                        <img src="{{url($user->picture_path)}}" alt="">
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3">User Picture</label>
                        <input class="col-sm-6 col-md-6 col-lg-6 editable-field" name="user_pic" type="file"
                               placeholder="Choose a new pic"/>
                        <a class="edit col-sm-1 col-md-1 col-lg-1">Edit</a>
                        <a class="button save hidden col-sm-1 col-md-1 col-lg-1">Save</a>
                        <a href=""><i class="fa fa-user fa-7x"></i></a>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-3">First Name</label>
                        <input class="col-sm-6 col-md-6 col-lg-6 editable-field" name="first_name" type="text"
                               placeholder="{{ $user->first_name }}" value="{{ $user->first_name }}"/>
                        <a class="edit col-sm-1 col-md-1 col-lg-1">Edit</a>
                        <a class="button save hidden col-sm-1 col-md-1 col-lg-1">Save</a>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-8 col-md-3 col-lg-3">Last Name</label>
                        <input class="col-sm-6 col-md-6 col-lg-6 editable-field" name="last_name" type="text"
                               placeholder="{{ $user->last_name }}" value="{{ $user->last_name }}"/>
                        <a class="edit col-sm-1 col-md-1 col-lg-1">Edit</a>
                        <a class="button save hidden col-sm-1 col-md-1 col-lg-1">Save</a>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-8 col-md-3 col-lg-3">Date</label>
                        <input class="col-sm-6 col-md-6 col-lg-6 editable-field" name="dob" type="date"
                               placeholder="{{ $user->birth_date }}" value="{{ $user->birth_date}}"/>
                        <a class="edit col-sm-1 col-md-1 col-lg-1">Edit</a>
                        <a class="button save hidden col-sm-1 col-md-1 col-lg-1">Save</a>
                    </div>
                    <div class="form-group">
                        <select class="form-control"  id="roleDropdown" name="role[]" multiple>
                            <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($roleList as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <select class="form-control"  id="affiliationDropdown" name="affiliation[]" multiple>
                            <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($affiliationList as $affiliation)
                                <option value="{{$affiliation->name}}">{{$affiliation->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-8 col-md-3 col-lg-3">E-Mail</label>
                        <input class="col-sm-6 col-md-6 col-lg-6 editable-field" name="email" type="email"
                               placeholder="{{$user->email}}" value="{{$user->email}}"/>
                        <a class="edit col-sm-1 col-md-1 col-lg-1">Edit</a>
                        <a class="button save hidden col-sm-1 col-md-1 col-lg-1">Save</a>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-8 col-md-3 col-lg-3">Personal Site</label>
                        <input class="col-sm-6 col-md-6 col-lg-6 editable-field" name="url" type="url"
                               placeholder="{{ $user->reference_link }}" value="{{ $user->reference_link }}"/>
                        <a class="edit col-sm-1 col-md-1 col-lg-1">Edit</a>
                        <a class="button save hidden col-sm-1 col-md-1 col-lg-1">Save</a>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-8 col-md-3 col-lg-3">Password</label>
                        <input class="col-sm-6 col-md-6 col-lg-6 editable-field" name="password" type="password"
                               placeholder="Password"/>
                        <a class="edit col-sm-1 col-md-1 col-lg-1">Edit</a>
                        <a class="button save hidden col-sm-1 col-md-1 col-lg-1">Save</a>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-8 col-md-3 col-lg-3">Confirm password</label>
                        <input class="col-sm-6 col-md-6 col-lg-6 editable-field" name="password_confirmation" type="password"
                               placeholder="Confirm Password"/>
                        <a class="edit col-sm-1 col-md-1 col-lg-1">Edit</a>
                        <a class="button save hidden col-sm-1 col-md-1 col-lg-1">Save</a>
                    </div>

                </div>
            </div>

        </div>



    </form>
        @endsection

        @section('script')
            <script src="{{ url('js/jquery-ui.js') }}"></script>
            <script src="{{ url('js/jqueryform.js') }}"></script>
            <script src="{{ url('js/User/editUser.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection