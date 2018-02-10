@extends ('Layout.main')

@section('head')
    <link href="{{url('css/User/editUser.css')}}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet"/>
    <link href="{{url('css/form.css')}}" rel="stylesheet"/>
@endsection

@section('content')

    <!-- Errors Handling -->
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

    <!-- Form -->
    <div id="edit_user" class="row">
        <form id="msform" action="{{ route('users.update', ['id'=>Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{csrf_field()}}
            <fieldset>
                <h2 class="fs-title">Edit User</h2>
                <h3 class="fs-subtitle">Edit your informations</h3>
                <div class="form-group">
                    <img src="{{url($user->picture_path)}}" alt="">
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3" align="right">User Picture</label>
                    <input class="col-sm-6 col-md-6 col-lg-8" name="user_pic" type="file"
                            placeholder="Choose a new pic"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 col-md-3 col-lg-3" align="right">First Name</label>
                    <input class="col-sm-6 col-md-6 col-lg-8" name="first_name" type="text"
                            placeholder="{{ $user->first_name }}" value="{{ $user->first_name }}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-8 col-md-3 col-lg-3" align="right">Last Name</label>
                    <input class="col-sm-6 col-md-6 col-lg-8" name="last_name" type="text"
                            placeholder="{{ $user->last_name }}" value="{{ $user->last_name }}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-8 col-md-3 col-lg-3" align="right">Date</label>
                    <input class="col-sm-6 col-md-6 col-lg-8" name="dob" type="date"
                            placeholder="{{ $user->birth_date }}" value="{{ $user->birth_date}}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Role</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control"  id="roleDropdown" name="role" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($roleList as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Affiliation</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control"  id="affiliationDropdown" name="affiliation" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($affiliationList as $affiliation)
                            <option value="{{$affiliation->id}}">{{$affiliation->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Topics</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($topicList as $topic)
                                <option value="{{$topic->id}}">{{$topic->name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-8 col-md-3 col-lg-3" align="right">E-Mail</label>
                    <input class="col-sm-6 col-md-6 col-lg-8" name="email" type="email"
                            placeholder="{{$user->email}}" value="{{$user->email}}"/>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-md-3 col-lg-3" align="right">Personal Site</label>
                    <input class="col-sm-6 col-md-6 col-lg-8" name="url" type="url"
                            placeholder="{{ $user->reference_link }}" value="{{ $user->reference_link }}"/>
                </div>
                <div class="form-group">
                    <label class="col-sm-8 col-md-3 col-lg-3" align="right">Password</label>
                    <input class="col-sm-6 col-md-6 col-lg-8" name="password" type="password"
                            placeholder="Password"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-8 col-md-3 col-lg-3" align="right">Confirm password</label>
                    <input class="col-sm-6 col-md-6 col-lg-8" name="password_confirmation" type="password"
                            placeholder="Confirm Password"/>
                </div>

                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
        </div>
    </form>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/User/editUser.js') }}"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection
