$(document).ready(function(){
    // Syncronize publications
    var firstName = "giuseppe";
    var lastName = "desolda";
    var queryString = "first_name="+firstName+"&"+"last_name="+lastName;
    var requestURL = "syncDBLP?"+ queryString;
    console.log(requestURL);
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.getJSON(requestURL, function(data,status){

        console.log(data);
        alert("Data: " + data + "\nStatus: " + status);

    });

});
