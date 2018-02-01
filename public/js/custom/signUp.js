$(document).ready(function() {
    // Initialize selct2 components
    $('#affiliationDropdown').select2({
        placeholder: "type in your affiliation",
        tags:true
    });

    $('#topicsDropdown').select2({
        placeholder: "type in your research areas",
        maximumSelectionLength: 5,
        tags:true
    });

    // Validate Form
    
});

var constraints = {
    first_name: {
        presence: true,
    },

    password: {
        presence:true,
        length: {
            minimum: 6
        }
    }
};