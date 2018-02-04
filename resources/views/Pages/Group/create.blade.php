@extends('Layout.main')

@section('head')
    <link href="{{ url('css/Group/createGroup.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/Group/groups.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/form.css') }}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div id="formContainer" class=" col-xl-6 col-lg-7 col-md-9 col-sm-10 col-12">
            <form id="msform" action="{{ route('groups.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">Create Group</h2>
                    <h3 class="fs-subtitle">Insert some informations about the group</h3>

                    <input type="text" name="name" placeholder="Group Name"/>
                    
                    <textarea rows="4" name="description" placeholder="Description" ></textarea>
                    
                    <select class="form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($topicList as $topic)
                            <option value="{{$topic->name}}">{{$topic->name}}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="usersDropdown" name="users[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($userList as $user)
                            <option value="{{$user->first_name}}">{{$user->last_name}} {{$user->first_name}}</option>
                        @endforeach
                    </select>

                    <input type="file" class="group_picture" id="upload" name="picture">
                    
                    <div class="col-lg-12">
                        <label class="col-sm-12 col-md-3 col-lg-3" id="visibilityRadio" class="btn btn-default active">
                            <input type="radio" id="is_public" name="privacy-btn" checked="checked"/>Public
                        </label>
                        <label class="col-sm-12 col-md-3 col-lg-3" id="visibilityRadio" class="btn btn-default">
                            <input type="radio" id="is_public" name="privacy-btn"/>Private
                        </label>
                    </div>
                    
                    <input type="button" name="previous" class="previous action-button-previous" value="Back"/>
                    <input type="submit" name="next" class="next action-button" value="Create"/>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryform.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/Group/createGroup.js') }}"></script>
@endsection