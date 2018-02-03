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
            <form id="msform">
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

                    <input type="text" name="members[]" placeholder="Invite Users"/>

                    </select>


                    <input type="file" class="group_picture" id="upload">

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
@endsection