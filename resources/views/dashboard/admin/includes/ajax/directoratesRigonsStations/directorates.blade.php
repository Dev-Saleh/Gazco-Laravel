@section('script')
<script>


  // ########################## ( Dirctorates SECTION ) ##############################


     //  Start fetch New Directorate  
      function fetchNewDirectorate()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('directorate.fetchNewDirectorate')}}",
                    dataType:"json",
                    success: function (data) {   
                     // console.log(data);
                    $('#fetchAllDirectorates').html("");
                    $('#select_directorates').html("");
                      $.each(data.directorates, function (key , directorate) {
                        $('#fetchAllDirectorates').append('<tr  class="offerRow'+directorate.id+' bg-gray-100 hover:scale-95 transform transition-all ease-in">\
                                  <td class="p-3">'+directorate.id+'</td>\
                                  <td class="p-3 text-center">'+directorate.directorate_name+'</td>\
                                  <td class="p-3 flex justify-evenly ">\
                                    <a href="#"  directorateId="'+directorate.id+'" class="directorateDelete text-gray-400  hover:text-red-400  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                    <a href="#" directorateId="'+directorate.id+'"  class="directorateEdit text-gray-400 hover:text-yellow-100  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"   d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                  </td>\
                                </tr>');
                          $('#select_directorates').append('<option value='+directorate.id+'>'+directorate.directorate_name+'</option>');
                      });
                    
                    
                    }
                });
        }

    //  End fetch New Directorate 

    // Start Add Directorate By Ajax 
        $(document).on('click', '#saveDirectorate', function (e) {
            e.preventDefault();
            var formData = new FormData($('#directorateForm')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('directorate.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                   if (data.status == true) {
                     fetchNewDirectorate();
                      alert(data.msgSuccess,'success');
                        $('#directorateId').val('');
                        $('#directorateName').val('');
                        
                     }
                    else alert(data.msgError,'error');
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });
  
    // End Add Directorate By Ajax 

    //  Start Deleteing directorate By Ajax 
   
        $(document).on('click', '.directorateDelete', function (e) {
            e.preventDefault();
              var directorateId = $(this).attr('directorateId');
            $.ajax({
                type: 'delete',
                url:"{{route('directorate.destroy')}}",             
                data: {
                     'directorateId' :directorateId, 
                },
                success: function (data) {
                     if (data.status == true) {
                      alert(data.msgSuccess,'success');
                      $('.offerRow'+data.directorateId).remove();
                    }
                    else alert(data.msgError,'success');
                }, error: function (reject) {
                  
                }
            });
        });

    // End Deleting directorate By Ajax

    // Start edit directorate By Ajax
           
  
        $(document).on('click', '.directorateEdit', function (e) {
            e.preventDefault();
              var directorateId = $(this).attr('directorateId');
            $.ajax({
                type: 'post',
                url:"{{route('directorate.edit')}}",
                data: {
                     'directorateId' :directorateId, 
                },
                success: function (data) {
                  
                     if (data.status == true) {
                        $('#directorateId').val(data.directorate.id);
                        $('#directorateName').val(data.directorate.directorate_name);
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
              var formData = new FormData($('#directorateForm')[0]); 
              
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
                        $('#directorateId').val('');
                        $('#directorateName').val('');
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
@stop