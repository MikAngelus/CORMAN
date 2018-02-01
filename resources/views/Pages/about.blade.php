
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('css/about.css') }}">
<script src="{{ url('js/bootstrap.bundle.js') }}"></script>
<script src="{{ url('js/about.js') }}"></script>

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