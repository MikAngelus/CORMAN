@extends('Layout.main')

@section('head')
    <link href="{{ url('css/Group/createGroup.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/Group/groups.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/form.css') }}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div id="formContainer" class="col-lg-10 col-md-10 col-sm-12">
        <form id="msform">
            <!-- fieldsets -->
            <fieldset class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="fs-title">Edit Group</h2>
                <h3 class="fs-subtitle">Edit informations of the group</h3>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Group Name</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="group_name" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Description</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" rows="4" name="description" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Edit Members</label>
                    <select class="form-control" id="usersDropdown" name="users[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($userList as $user)
                                <option value="{{$user->first_name}}">{{$user->last_name}} {{$user->first_name}}</option>
                            @endforeach
                    </select>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Edit Topics</label>
                    <select class="form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($topicList as $topic)
                                <option value="{{$topic->name}}">{{$topic->name}}</option>
                            @endforeach
                    </select>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                
                <div id="radioGroup" class="btn-group col-lg-12" data-toggle="group-privacy">
                    <label id="visibilityLabel" for="visibility" class="col-form-label col-lg-3">Visibility</label>  
                    <div class="col-lg-3">
                        <label id="visibilityRadio" class="btn btn-default active col-lg-12">
                            <input type="radio" id="#" name="privacy-btn" value="public" checked="checked"/> Public
                        </label>
                        <label id="visibilityRadio" class="btn btn-default col-lg-12">
                            <input type="radio" id="#" name="privacy-btn" value="private"/> Private
                        </label>
                    </div>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Back"/>
                <input type="button" name="next" class="next action-button" value="Create"/>
            </fieldset>
        </form>
    </div>
</div>

@section('script')
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryform.js') }}"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/Group/editGroup.js') }}"></script>
@endsection