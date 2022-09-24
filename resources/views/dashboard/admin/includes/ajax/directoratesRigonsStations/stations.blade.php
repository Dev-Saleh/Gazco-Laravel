
<script>

    // ########################## ( Stations SECTION ) ##############################
    // Start fetch All Stations  
      function fetchLastStation($lastStation)
        {

                $('#fetchLastStation').prepend('<tr class="offerRow'+$lastStation.id+'bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                            <td class="p-3">'+$lastStation.id+'</td>\
                            <td class="p-3 text-center">'+$lastStation.staName+'</td>\
                            <td class="p-3 flex justify-evenly ">\
                            <a href="#" staId="'+$lastStation.id+'"  class="stationDelete text-red-400  hover:text-red-600  ">\
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"   d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                    </svg>\
                                </a>\
                                <a href="#" staId="'+$lastStation.id+'"  class="stationEdit text-yellow-400 hover:text-yellow-600  ">\
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                    </svg>\
                                </a>\
                            </td>\
                        </tr>');
        }

    // End fetch All Stations

    // Start Add Station By Ajax 
  
        $(document).on('click', '#saveStation', function (e) {
            e.preventDefault();
            var formData = new FormData($('#staForm')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('station.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                
                   if (data.status == true) 
                     {
                        $('#staId').val(''); 
                        $('#staName').val('');
                        newAlert(data.alertType, data.msg);
                        fetchLastStation(data.lastStation);
                      }
                    else newAlert(data.alertType,data.msgError); 
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add Station By Ajax 

    // Start Deleteing Station By Ajax 
  
        $(document).on('click', '.stationDelete', function (e) {
            e.preventDefault();
          var staId = $(this).attr('staId');
          if(confirm('هل تريد الحدف'))
           {
                    $.ajax({
                        type: 'delete',
                        url: "{{route('station.destroy')}}",
                        data: {
                            '_token': "{{csrf_token()}}",
                            'staId' :staId, 
                        },
                        success: function (data) {
                            if (data.status == true) {
                            alert(data.msg,'success');
                            }
                            $('.offerRow'+data.id).remove();
                        }, error: function (reject) {

                        }
                    });
          }
        });

    // End Deleting Station By Ajax    

    //  Start edit Station By Ajax 
       
 
        $(document).on('click', '.stationEdit', function (e) {
            e.preventDefault();
              var staId = $(this).attr('staId');
            $.ajax({
                type: 'get',
                url:"{{route('station.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'staId' :staId, 
                },
                success: function (data) {
                    
                     if (data.status == true) {
                        $('#staId').val(data.sta.id);
                        $('#staName').val(data.sta.staName);
                        window.saveStation.style.display="none";
                        window.updateStation.style.display="inline-flex";
                    }
                 
                }, error: function (reject) {

                }
            });
        });
  

    //  End edit Station By Ajax 

    //  Start Update Station By Ajax 
 

        $(document).on('click', '#updateStation', function (e) {
            e.preventDefault();
                var formData = new FormData($('#staForm')[0]); 
                         
             $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('station.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                console.log(data);
                    if(data.status == true){
                       alert(data.msg,'success');
                        $('#staId').val('');
                        $('#staName').val('');
                        window.saveStation.style.display="inline-flex";
                        window.updateStation.style.display="none";
                        fetch_All_Stations();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });  
            
            
        });

    // End Update Station By Ajax 

</script>
