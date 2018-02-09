@extends('Layout.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ url('css/Group/groups.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/form.css') }}" rel="stylesheet"/>
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

    <!-- Form -->
    <div class="row">
        <form id="msform" action="{{ route('groups.update', ['id'=>$group->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <!-- fieldsets HEAD-->
            <fieldset class="edit_group">
                <h2 class="fs-title">Edit Group</h2>
                <h3 class="fs-subtitle">Edit informations of the group</h3>
                
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right" >Group Name</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="group_name" type="text" placeholder="{{$group->name}}" value="{{$group->name}}"/>
                </div>
                
                <div class="form-group row align-items-center">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Description</label>
                    <textarea class="col-sm-12 col-md-9 col-lg-8" rows="4" name="description" placeholder="{{$group->description}}" value="{{$group->description}}"></textarea>
                </div>

                <div class="form-group">
                    <img src="{{url($group->picture_path)}}" alt="">
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Profile Photo</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" id="upload" name="profile_photo" type="file" placeholder="{{$group->picture_path}}" value="{{$group->picture_path}}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Invite Users</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="usersDropdown" name="users[]" multiple>
                        @foreach($userList as $user)
                            <option value="{{$user->id}}">{{$user->last_name}} {{$user->first_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Edit Topics</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($topicList as $topic)
                                <option value="{{$topic->id}}">{{$topic->name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group row align-items-center">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Visibility</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="visibility" name="visibility">
                        @if($group->public === "public")
                            <option selected value="public" >Public</option>
                            <option value="private" >Private</option>
                        @else
                            <option value="public" >Public</option>
                            <option selected value="private" >Private</option> 
                        @endif
                    </select>
                </div>
                <!-- inserire if per bottone visibile solo da admin -->
                <hr>
                <a href="#" id="btn-newgroup" class="btn btn-danger btn-sm" role="button">Delete Group</a>
                <hr>
                
                <input type="submit" name="submit" class="next action-button" value="Update"/>
            </fieldset>
        </form>
    </div>  
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/Group/editGroup.js') }}"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection
