@extends('Layout.main')

@section('content')

        <div class="row">
    <div id="formContainer" class="col-lg-6 col-md-10 col-sm-12">
        <form id="msform">
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Create Group</h2>
                <h3 class="fs-subtitle">Insert some informations about the group</h3>
                <input type="text" name="group-name" placeholder="Group Name"/>
                <textarea rows="4" placeholder="Group Description"></textarea>
                <input type="text" name="invite-users" placeholder="Invite Users"/>
                <input type="file" class="custom-file-input" id="upload">
                <input type="text" name="topics" placeholder="Add Topics"/>
                <div id="radioGroup" class="btn-group" data-toggle="group-privacy">
                   <label id="visibilityLabel" for="visibility" class="col-form-label col-lg-4">Visibility Group</label>
                    <label id="visibilityRadio" class="btn btn-default active col-lg-8">
                        <input type="radio" id="" name="privacy-btn" value="public" checked="checked"/> Public
                    </label>
                    <label id="visibilityRadio" class="btn btn-default col-lg-8">
                        <input type="radio" id="" name="privacy-btn" value="private" /> Private
                    </label>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Back"/>
                <input type="button" name="next" class="next action-button" value="Create"/>
            </fieldset>
        </form>
    </div>
    </div>
@endsection
