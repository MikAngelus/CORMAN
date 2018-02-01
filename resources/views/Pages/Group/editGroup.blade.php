@extends('Layout.main')

@section('content')

<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('css/edit_forms.css') }}">
<script src="{{ url('js/bootstrap.bundle.js') }}"></script>
<script src="{{ url('js/about.js') }}"></script>

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
                        <label class="col-sm-12 col-md-3 col-lg-2">Invite Users</label>
                        <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="invite_users" type="text" placeholder=""/>
                        <a class="edit col-lg-1">Edit</a>
                        <a class="button save hidden col-lg-1">Save</a>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-md-3 col-lg-2">Profile Photo</label>
                        <input class="col-sm-12 col-md-9 col-lg-6 editable-field custom-file-input" id="upload" name="profile_photo" type="file" placeholder=""/>
                        <a class="edit col-lg-1">Edit</a>
                        <a class="button save hidden col-lg-1">Save</a>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-md-3 col-lg-2">Add Topics</label>
                        <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="topics" type="text" placeholder=""/>
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

<script>
    var disabledState = true;

    $('input.editable-field').prop('readonly', true)
    $('input.editable-field').addClass('disabled')
    $('input.button').val('Edit')

    $('a.edit').on('click', function(e){
        e.preventDefault(); // Prevent browser refresh
        // Check to see if input is disabled or not...
        $(this).hide();
        $(this).next('a.save').show();
        $(this).closest('.form-group').find('.editable-field').prop('readonly', false);
        $(this).closest('.form-group').find('.editable-field').removeClass('disabled');
        $(this).closest('.form-group').find('.editable-field').focus();  
    })

    $('a.save').on('click', function(e){
        e.preventDefault(); // Prevent browser refresh
        $(this).hide();
        $(this).prev('a.edit').show();
        $(this).closest('.form-group').find('.editable-field').prop('readonly', true);
        $(this).closest('.form-group').find('.editable-field').addClass('disabled');
        disabledState = true;
    })
</script>

@endsection