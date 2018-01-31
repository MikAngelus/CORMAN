$(document).ready(function() {
    $('#affiliationDropdown').select2({
        placeholder: "type in your affiliation",
        tags:true
    });

    $('#topicsDropdown').select2({
        placeholder: "type in your research areas",
        maximumSelectionLength: 5,
        tags:true
    });  
});