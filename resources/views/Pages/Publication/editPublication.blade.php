@extends('Layout.main')

@section('content')

<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('css/about.css') }}">
<script src="{{ url('js/bootstrap.bundle.js') }}"></script>
<script src="{{ url('js/about.js') }}"></script>

    <div class="row">
        <div id="formContainer" class="col-lg-6 col-md-10 col-sm-12">
            <form id="msform">
                <!-- fieldsets -->
                <fieldset>
                    <h2 class="fs-title">Edit Publication</h2>
                    <h3 class="fs-subtitle">Insert some informations about the group</h3>
                    
                    <textarea rows="4" placeholder="Group Description"></textarea>
                    <input type="text" name="invite-users" placeholder="Invite Users"/>
                    <input type="file" class="custom-file-input" id="upload">
                    <input type="text" name="topics" placeholder="Add Topics"/>
                    <div id="radioGroup" class="btn-group" data-toggle="group-privacy">
                    <label id="visibilityLabel" for="visibility" class="col-form-label col-lg-4">Visibility Group</label>
                        <label id="visibilityRadio" class="btn btn-default active col-lg-12">
                            <input type="radio" id="#" name="privacy-btn" value="public" checked="checked"/> Public
                        </label>
                        <label id="visibilityRadio" class="btn btn-default col-lg-12">
                            <input type="radio" id="#" name="privacy-btn" value="private"/> Private
                        </label>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Back"/>
                    <input type="button" name="next" class="next action-button" value="Create"/>
                </fieldset>
            </form>
        </div>
    </div>

    <form>
  <div class="form-group">
    <input class="editable-field" type="text" placeholder="Enter name" />
    <a class="button edit">Edit</a>
    <a class="button save hidden">Save</a>
  </div>

  <div class="form-group">
    <input class="editable-field" type="text" placeholder="Enter phone number" />
    <a class="edit">Edit</a>
    <a class="button save hidden">Save</a>
  </div>
  
  <div class="form-group">
      <input class="editable-field" type="text" placeholder="Enter email" />
      <a class="edit">Edit</a>
      <a class="button save hidden">Save</a>
  </div>
  
</form>

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