
<script>

  // ########################## ( Dirctorates SECTION ) ##############################


     //  Start fetch Last Directorate  
      function fetchLastDirectorate($lastDirectorate)
        {
              
            $('#fetchLastDirectorate').prepend('<tr class="offerRow'+$lastDirectorate.id+' bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                                    <td class="p-3">'+$lastDirectorate.id+'</td>\
                                    <td class="p-3 text-center">'+$lastDirectorate.dirName+'</td>\
                                    <td class="p-3 flex justify-evenly ">\
                                        <a href="#" dirId="'+$lastDirectorate.id+'" class="directorateDelete text-red-400  hover:text-red-600  ">\
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                            </svg>\
                                        </a>\
                                        <a href="#" dirId="'+$lastDirectorate.id +'" class="directorateEdit text-yellow-400 hover:text-yellow-600  ">\
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                            </svg>\
                                        </a>\
                                    </td>\
                                </tr>');
            $('#select_directorates').prepend('<option value='+$lastDirectorate.id+'>'+$lastDirectorate.dirName+'</option>');
      
        }

     //  End fetch Last Directorate 

    // Start Add Directorate By Ajax 
        $(document).on('click', '#saveDirectorate', function (e)
         {
                e.preventDefault();
                var formData = new FormData($('#dirForm')[0]);       
                $.ajax
                (
                  {
                        type: 'POST',
                        enctype: 'multipart/form-data',
                        url: "{{route('directorate.store')}}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function (data) 
                        {
                        console.log(data); // for Test
                        if (data.status == true) 
                            {
                                    $('#dirId').val('');
                                    $('#dirName').val('');
                                    newAlert(data.alertType, data.msg);
                                    fetchLastDirectorate(data.lastDirectorate);
                            }
                        else newAlert(data.alertType,data.msgError);      
                        
                        }, error: function (reject)
                        {
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                $("#" + key + "_error").text(val[0]);
                            }); 
                        }
                 }
                );
         }
        );
  
    // End Add Directorate By Ajax 

    //  Start Deleteing directorate By Ajax 
   
        $(document).on('click', '.directorateDelete', function (e) {
            e.preventDefault();
            var dirId = $(this).attr('dirId');
            if(confirm('هل تريد الحدف'))
            {        
                    $.ajax({
                        type: 'delete',
                        url:"{{route('directorate.destroy')}}",             
                        data: {
                            'dirId' :dirId, 
                        },
                        success: function (data) {
                            if (data.status == true) {
                            alert(data.msgSuccess,'success');
                            $('.offerRow'+data.dirId).remove();
                            }
                            else alert(data.msgError,'success');
                        }, error: function (reject) {
                        
                        }
                    }); 
            }
        });

    // End Deleting directorate By Ajax

    // Start edit directorate By Ajax
           
  
        $(document).on('click', '.directorateEdit', function (e)
         {
              e.preventDefault();
              var dirId = $(this).attr('dirId');
            $.ajax({
                type: 'post',
                url:"{{route('directorate.edit')}}",
                data: 
                {
                     'dirId' :dirId, 
                },
                success: function (data) {
                  
                     if (data.status == true) {
                        $('#dirId').val(data.directorate.id);
                        $('#dirName').val(data.directorate.dirName);
                        window.saveDirectorate.style.display="none";
                        window.updateDirectorate.style.display="inline-flex";
                    }
                    else alert(data.msgError,'success');
                 
                }, error: function (reject) {

                }
            });
        });
  

    //  End edit directorate By Ajax 

    //  Start Update directorate By Ajax 


        $(document).on('click', '#updateDirectorate', function (e) {
            e.preventDefault();
              var formData = new FormData($('#dirForm')[0]); 
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('directorate.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    if(data.status == true){
                        alert(data.msgSuccess,'success');
                        $('#dirId').val('');
                        $('#dirName').val('');
                        window.saveDirectorate.style.display="inline-flex";
                        window.updateDirectorate.style.display="none";
                        fetchNewDirectorate();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });
      



    //  End Update directorate By Ajax 


    

</script>

     