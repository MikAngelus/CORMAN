@extends('Layout.mainGuest')

@section('head')
    <base href="{{ URL::asset('/') }}" target="_blank">
    <link rel="stylesheet" href="{{ url('css/User/registration.css') }}">
@endsection

@section('content')
    <!-- Handling Form errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- MultiStep Form -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="msform" action="{{ route('register')}}" method="post" enctype="multipart/form-data">
                {{ method_field('POST') }}
                {{csrf_field()}}
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">Personal Info</li>
                    <li>Professional info</li>
                    <li>Publications</li>
                </ul>
                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">Personal info</h2>
                    <h3 class="fs-subtitle"></h3>
                    <input type="text" name="first_name" placeholder="First Name"/>
                    <input type="text" name="last_name" placeholder="Last Name"/>
                    <input type="date" name="birth_date" placeholder="Birth Date"/>
                    <input type="email" name="email" placeholder="Email"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password"/>
                    <input type="file" name="profilePic" placeholder="Profile Photo" />
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>

                <fieldset>
                    <h2 class="fs-title">Professional info</h2>
                    <h3 class="fs-subtitle"></h3>
                    <label for="role"> Role </label>
                    <select class="form-control" id="role" name="role">
                        @foreach($roles as $role)
                        <option>{{$role->name}}</option>
                        @endforeach
                    </select>
                    <select class="form-control" id="affiliationDropdown" name="affiliation">
                        <option value=""></option> <!-- needed for select2.js library don't remove!-->
                        @foreach($affiliations as $affiliation)
                        <option value="{{$affiliation->name}}">{{$affiliation->name}}</option>
                        @endforeach
                    </select>
                    <select class="form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($topicList as $topic)
                        <option value="{{$topic->name}}">{{$topic->name}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="personal_link" placeholder="Personal Link"/>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
                
                <fieldset>
                    <button type="button" id="selectAll" class="btn btn-primary"> <span class="sub"></span> Select</button>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryform.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
    <script src="{{ url('js/User/signUp.js') }}"></script>
@endsection
