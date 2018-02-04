$(document).ready(function() {
   
    // Initialize selct2 components
    $('#authorsDropdown').select2({
        data:data,
        placeholder: "tag the authors",
        maximumSelectionLength: 10,
        tags:true,
        tokenSeparators: [',']
    });

    $('#topicsDropdown').select2({
        placeholder: "add topics to your publication",
        maximumSelectionLength: 5,
        tokenSeparators: [','],
        tags:true
    });
});