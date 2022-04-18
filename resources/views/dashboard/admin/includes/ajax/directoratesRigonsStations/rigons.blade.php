@section('script')
<script>


  // ########################## ( Rigon SECTION ) ##############################


    
    //  Start fetch All Rigon 

      function fetchrigon()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('rigon.show_all_Data')}}",
                    dataType:"json",

                    success: function (data) { 
                        
                    $('#fetch_Allrigon').html("");
                      $.each(data.rigons, function (key , rigon) {
                        $('#fetch_Allrigon').append('<tr  class="offerRow'+rigon.id+' bg-gray-100 hover:scale-95 transform transition-all ease-in">\
                                  <td class="p-3">'+rigon.id+'</td>\
                                  <td class="p-3 text-center">'+rigon.rigon_name+'</td>\
                                  <td class="p-3 flex justify-evenly ">\
                                    <a href="#"  rigon="'+rigon.id+'"  class="rigon_delete btn btn-danger" class="text-gray-400  hover:text-red-400  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                    <a href="#" rigon="'+rigon.id+'"  id="rigon_edit" class="text-gray-400 hover:text-yellow-100  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"   d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                  </td>\
                                </tr>');
                      });
                    }
                });
        }

    //  End fetch All Rigon 

    // Start Add Rigon By Ajax 

        $(document).on('click', '#save_rigon', function (e) {
            e.preventDefault();
            var formData = new FormData($('#rigonForm')[0]);        
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('rigon.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                      alert(data.msg,'success');
                        $('#rigon_id').val('');
                        $('#select_directorate').val('');
                        $('#rigon_name').val('');
                       fetchrigon();
                    }
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add Rigon By Ajax 

    //  Start Deleteing Rigon By Ajax 

        $(document).on('click', '.rigon_delete', function (e) {
            e.preventDefault();
              var rigon = $(this).attr('rigon');
            $.ajax({
                type: 'delete',
                url: "{{route('rigon.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :rigon, 
                },
                success: function (data) {
                     if (data.status == true) {
                     alert(data.msg,'success');
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });

   
    //  End Deleting Rigon By Ajax

    //  Start edit Rigon By Ajax 
       
        $(document).on('click', '#rigon_edit', function (e) {
            e.preventDefault();
              var rigon = $(this).attr('rigon');
            $.ajax({
                type: 'get',
                url:"{{route('rigon.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :rigon, 
                },
                success: function (data) {
                 
                     if (data.status == true) {
                        $('#rigon_id').val(data.rigon.id);
                        $('#select_directorate').text(data.dir.directorate_name);
                       // $('#select_directorate').val(data.dir.directorate_id);
                        $('#rigon_name').val(data.rigon.rigon_name);
                        window.save_rigon.style.display="none";
                        window.update_rigon.style.display="inline-flex";
                    }
                 
                }, error: function (reject) {

                }
            });
        });
     
    // End edit Rigon By Ajax 

    // Start Update Rigon By Ajax 
 

        $(document).on('click', '#update_rigon', function (e) {
            e.preventDefault();
              var formData = new FormData($('#rigonForm')[0]); 
              
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
                        $('#rigon_id').val('');
                        $('#select_directorate').text('');
                       // $('#select_directorate').val('');
                        $('#rigon_name').val('');
                        window.save_rigon.style.display="inline-flex";
                        window.update_rigon.style.display="none";
                        fetchrigon();
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
@stop