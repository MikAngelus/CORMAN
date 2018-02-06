$(document).ready(function () {
    var disabledState = true;

    $('input.editable-field').prop('readonly', true)
    $('input.editable-field').addClass('disabled')

    $('input.button').val('Edit')

    $('a.edit').on('click', function (e) {
        e.preventDefault(); // Prevent browser refresh
        // Check to see if input is disabled or not...
        $(this).hide();
        $(this).next('a.save').show();
        $(this).closest('.form-group').find('.editable-field').prop('readonly', false);
        $(this).closest('.form-group').find('.editable-field').removeClass('disabled');
        $(this).closest('.form-group').find('.editable-field').focus();

    })

    $('a.save').on('click', function (e) {
        e.preventDefault(); // Prevent browser refresh
        $(this).hide();
        $(this).prev('a.edit').show();
        $(this).closest('.form-group').find('.editable-field').prop('readonly', true);
        $(this).closest('.form-group').find('.editable-field').addClass('disabled');
        disabledState = true;

    })

    $('#roleDropdown').select2({
        placeholder: "Modify the role",
        maximumSelectionLength: 1,
        tags: true
    });

    $('#affiliationDropdown').select2({
        placeholder: "Modify the affiliation",
        maximumSelectionLength: 1,
        tags: true
    });

    $('#topicsDropdown').select2({
        placeholder: "Modify your areas of interests",
        maximumSelectionLength: 5,
        tokenSeparators: [','],
        tags:true
    });
});
