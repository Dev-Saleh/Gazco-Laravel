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


    // ########################## ( RIGON SECTION ) ##############################


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


    // ########################## ( Stations SECTION ) ##############################
    // Start fetch All Stations  
      function fetch_All_Stations()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('station.show_All')}}",
                    dataType:"json",

                    success: function (data) {     
                      console.log(data) ;
                    $('#fetch_All_Stations').html("");
                      $.each(data.stations, function (key , station) {
                        $('#fetch_All_Stations').append('<tr class="offerRow'+station.id+' bg-gray-100 hover:scale-95 transform transition-all ease-in">\
                                  <td class="p-3">'+station.id+'</td>\
                                  <td class="p-3 text-center">'+station.Station_name+'</td>\
                                  <td class="p-3 flex justify-evenly ">\
                                    <a href="#" station="'+station.id+'"  class="station_delete btn btn-danger" class="text-gray-400  hover:text-red-400  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                    <a href="#" station="'+station.id+'"  id="station_edit" class="text-gray-400 hover:text-yellow-100  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                  </td>\
                                </tr>'); 
                       });
                    }
                });
        }

    // End fetch All Stations

    // Start Add Station By Ajax 
  
        $(document).on('click', '#save_station', function (e) {
            e.preventDefault();
            var formData = new FormData($('#stationForm')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('station.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                      alert(data.msg,'success')
                        $('#station_id').val('');
                        $('#station_name').val('');
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

    // End Add Station By Ajax 

    // Start Deleteing Station By Ajax 
  
        $(document).on('click', '.station_delete', function (e) {
            e.preventDefault();
              var station = $(this).attr('station');
            $.ajax({
                type: 'delete',
                url: "{{route('station.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :station, 
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

    // End Deleting Station By Ajax 

     

    //  Start edit Station By Ajax 
       
 
        $(document).on('click', '#station_edit', function (e) {
            e.preventDefault();
              var station = $(this).attr('station');
            $.ajax({
                type: 'get',
                url:"{{route('station.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :station, 
                },
                success: function (data) {
              
                     if (data.status == true) {
                        $('#station_id').val(data.station.id);
                        $('#station_name').val(data.station.Station_name);
                        window.save_station.style.display="none";
                        window.update_station.style.display="inline-flex";
                    }
                 
                }, error: function (reject) {

                }
            });
        });
  

    //  End edit Station By Ajax 


    //  Start Update Station By Ajax 
 

        $(document).on('click', '#update_station', function (e) {
            e.preventDefault();
              var formData = new FormData($('#stationForm')[0]); 
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('station.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    if(data.status == true){
                       alert(data.msg,'success');
                        $('#station_id').val('');
                        $('#station_name').val('');
                        window.save_station.style.display="inline-flex";
                        window.update_station.style.display="none";
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
@stop