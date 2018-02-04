@extends('Layout.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ url('css/edit_forms.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/Group/groups.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/form.css') }}" rel="stylesheet"/>
@endsection

@section('content')
<div class="row">
    <div id="formContainer" class="col-lg-10 col-md-10 col-sm-12">

        <form id="msform" action="{{ route('groups.update', ['id'=>$group->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <!-- fieldsets HEAD-->
            <fieldset class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="fs-title">Edit Group</h2>
                <h3 class="fs-subtitle">Edit informations of the group</h3>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Group Name</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="group_name" type="text" placeholder="{{$group->name}}" value="{{$group->name}}"/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Description</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" rows="4" name="description" type="text" placeholder="{{$group->description}}" value="{{$group->description}}"/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Invite Users</label>

                    <select class="col-sm-12 col-md-9 col-lg-6 form-control" id="usersDropdown" name="users[]" multiple>
                        @foreach($userList as $user)
                            <option value="{{$user->first_name}}">{{$user->last_name}} {{$user->first_name}}</option>
                        @endforeach
                    </select>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Profile Photo</label>
                    <div class="form-group">
                        <img src="{{url($group->picture_path)}}" alt="">
                    </div>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field custom-file-input" id="upload" name="profile_photo" type="file" placeholder="{{$group->picture_path}}" value="{{$group->picture_path}}"/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Edit Topics</label>
                    <select class="col-sm-12 col-md-9 col-lg-6 form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($topicList as $topic)
                                <option value="{{$topic->name}}">{{$topic->name}}</option>
                            @endforeach
                    </select>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Visibility</label>
                    <select class="col-sm-12 col-md-9 col-lg-6 form-control" id="visibility" name="visibility">
                        <option selected value="public" >Public</option>
                        <option value="private" >Private</option>
                    </select> 
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>  
                <input type="submit" name="submit" class="next action-button" value="Update"/>
            </fieldset>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/Group/editGroup.js') }}"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection