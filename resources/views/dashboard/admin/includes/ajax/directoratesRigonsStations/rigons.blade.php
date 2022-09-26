
<script>


   // ########################## ( RIGON SECTION ) ##############################


    //  Start fetch All Rigon 

      function fetchLastRigon($lastRigon)
        {       
            $('#fetchLastRigon').prepend('<tr class="offerRow'+$lastRigon.id+' bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                        <td class="p-3">'+$lastRigon.id+'</td>\
                        <td class="p-3 text-center">'+$lastRigon.rigName+'</td>\
                        <td class="p-3 flex justify-evenly ">\
                            <a href="#" rigId="'+$lastRigon.id+'" class="rigonDelete text-red-400  hover:text-red-600  ">\
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                </svg>\
                            </a>\
                            <a href="#" rigId="'+$lastRigon.id+'" class="rigonEdit text-yellow-400 hover:text-yellow-600  ">\
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"   fill="currentColor">\
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                </svg>\
                            </a>\
                        </td>\
                    </tr>');
        }

    //  End fetch All Rigon 

    // Start Add Rigon By Ajax 

        $(document).on('click', '#saveRigon', function (e) 
        {
            e.preventDefault();
            var formData = new FormData($('#rigForm')[0]);        
            $.ajax
            (
             {
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    url: "{{route('rigon.store')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                    console.log(data);
                    if (data.status == true) 
                            {
                                    $('#rigId').val('');
                                    $('#rigName').val('');
                                    $('#select_directorate').val('');
                                    newAlert(data.alertType, data.msg);
                                    fetchLastRigon(data.lastRigon);
                            }
                        else newAlert(data.alertType,data.msgError);     
                              
                    }, error: function (reject) {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function (key, val) {
                            $("#" + key + "_error").text(val[0]);
                        }); 
                    }
              }
            );
        });

    // End Add Rigon By Ajax 

    //  Start Deleteing Rigon By Ajax 

        $(document).on('click', '.rigonDelete', function (e) {
            e.preventDefault();
            var rigId = $(this).attr('rigId');
            if(confirm('هل تريد الحدف'))
            {
                    $.ajax({
                        type: 'delete',
                        url: "{{route('rigon.destroy')}}",
                        data: {
                            '_token': "{{csrf_token()}}",
                            'rigId' :rigId, 
                        },
                        success: function (data) {
                            if (data.status == true) {
                            alert(data.msg,'success');
                            }
                            $('.offerRow'+data.id).remove();
                        }, error: function (reject) {
                        var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                $("#" + key + "_error").text(val[0]);
                            }); 
                        }
                    });
            }
        });

   
    //  End Deleting Rigon By Ajax

    //  Start edit Rigon By Ajax 
       
        $(document).on('click', '.rigonEdit', function (e) {
            e.preventDefault();
              var rigId = $(this).attr('rigId');
            $.ajax({
                type: 'get',
                url:"{{route('rigon.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'rigId' :rigId, 
                },
                success: function (data) {
                 console.log(data);
                     if (data.status == true) {
                        $('#rigId').val(data.rig.id);
                        $('#select_directorate').text(data.rig.directorate.dirName);
                       // $('#select_directorate').val(data.dir.directorate_id);
                        $('#rigName').val(data.rig.rigName);


                        window.saveRigon.style.display="none";
                        window.updateRigon.style.display="inline-flex";
                    }
                 
                }, error: function (reject) {
                     var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 

                }
            });
        });
     
    // End edit Rigon By Ajax 

    // Start Update Rigon By Ajax 
 

        $(document).on('click', '#updateRigon', function (e) {
            e.preventDefault();
              var formData = new FormData($('#rigForm')[0]); 
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('rigon.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    if(data.status == true){
                       alert(data.msg,'success');
                        $('#rigId').val('');
                        $('#select_directorate').text('');
                       // $('#select_directorate').val('');
                        $('#rigName').val('');
                        window.saveRigon.style.display="inline-flex";
                        window.updateRigon.style.display="none";
                        fetchRigon();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });
      

    // End Update Rigon By Ajax  


</script>
