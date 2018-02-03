$(document).ready(function() {
    // Initialize selct2 components
    $('#authorsDropdown').select2({
        placeholder: "tag the authors",
        maximumSelectionLength: 10,
        tags:true
    });

    $('#topicsDropdown').select2({
        placeholder: "add topics to your publication",
        maximumSelectionLength: 5,
        tags:true
    });
});