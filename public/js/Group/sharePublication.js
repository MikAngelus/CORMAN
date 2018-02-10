$(document).ready(function(){
    
    $("#btn-share").click(function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var requestURL = "/ajaxGetPublications";
        var table = $("#PublicationsTableContainer");
        table.bootstrapTable({
            striped: true,
            search: true,
            showToggle: true,
            idField: "id",
            detailFilter: true,
            clickToSelect: true,
           
            
            url: requestURL,
            columns: [{
                field: 'selected',
                checkbox: true,
            }, {
                field: 'title',
                title: 'Title',
                width: '90%',
            }],
        });
    
        //send to corman 
        $('#addTo').click ( function(){
            
            var shareData = {
                publicationList: table.bootstrapTable('getSelections') , 
                groupId: window.location.href.split("/")[4] // hack to get group id
            }
            console.log(shareData);
            
            $.ajax({
                type: "POST",
                url: "/share",
                data: JSON.stringify(shareData),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data, status){
                    alert(data.message);
                    window.location.href = data.redirectTo;
                                       
                }
            });
        });
    
    });
});
