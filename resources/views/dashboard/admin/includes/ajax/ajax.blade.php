@section('script')
<script>


  // ########################## ( Dirctorates SECTION ) ##############################


     //  Start fetch All directorate  
      function fetchdirectorate()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('directorate.fetch_all_Data')}}",
                    dataType:"json",

                    success: function (data) {      
                    $('#fetch_Alldir').html("");
                    $('#select_directorates').html("");
                      $.each(data.directorates, function (key , directorate) {
                        $('#fetch_Alldir').append('<tr class="offerRow'+directorate.id+' class="bg-gray-100 hover:scale-95 transform transition-all ease-in">\
                                  <td class="p-3">'+directorate.id+'</td>\
                                  <td class="p-3 text-center">'+directorate.directorate_name+'</td>\
                                  <td class="p-3 flex justify-evenly ">\
                                    <a href="#"  directorate="'+directorate.id+'"  class="directorate_delete btn btn-danger" class="text-gray-400  hover:text-red-400  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                    <a href="#" directorate="'+directorate.id+'"  id="directorate_edit" class="text-gray-400 hover:text-yellow-100  ">\
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

    //  End fetch All directorate 

    // Start Add Directorate By Ajax 
        $(document).on('click', '#save_directorate', function (e) {
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
                      alert.show(data.msg,'success')
                        $('#directorate_id').val('');
                        $('#directorate_name').val('');
                       fetchdirectorate();
                    }
                  
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
   
        $(document).on('click', '.directorate_delete', function (e) {
            e.preventDefault();
              var directorate = $(this).attr('directorate');
            $.ajax({
                type: 'delete',
                url: "{{route('directorate.destroy','.directorate.')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :directorate, 
                },
                success: function (data) {
                     if (data.status == true) {
                      alert.show(data.msg,'success');
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });

    // End Deleting directorate By Ajax

    // Start edit directorate By Ajax
           
  
        $(document).on('click', '#directorate_edit', function (e) {
            e.preventDefault();
              var directorate = $(this).attr('directorate');
            $.ajax({
                type: 'post',
                url:"{{route('directorate.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :directorate, 
                },
                success: function (data) {
                  
                     if (data.status == true) {
                        
                       //  window.directorate_id.value=data.directorate.id;
                       //  window.directorate_name.value=data.directorate.directorate_name;
                        $('#directorate_id').val(data.directorate.id);
                        $('#directorate_name').val(data.directorate.directorate_name);
                      
                        window.save_directorate.style.display="none";
                        window.update_directorate.style.display="inline-flex";
                    }
                 
                }, error: function (reject) {

                }
            });
        });
  

    //  End edit directorate By Ajax 

    //  Start Update directorate By Ajax 


        $(document).on('click', '#update_directorate', function (e) {
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

                        $('#directorate_id').val('');
                        $('#directorate_name').val('');
                        window.save_directorate.style.display="inline-flex";
                        window.update_directorate.style.display="none";
                        fetchdirectorate();
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
                        $('#fetch_Allrigon').append('<tr class="offerRow'+rigon.id+' class="bg-gray-100 hover:scale-95 transform transition-all ease-in">\
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
                      alert.show(data.msg,'success');
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
                     // alert.show(data.msg,'success');
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
                       alert.show(data.msg,'success');
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
                      alert.show(data.msg,'success')
                        $('#station_id').val('');
                        $('#station_name').val('');
                       fetchstation();
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
                     // alert.show(data.msg,'success');
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
                       alert.show(data.msg,'success');
                        $('#station_id').val('');
                        $('#station_name').val('');
                        window.save_station.style.display="inline-flex";
                        window.update_station.style.display="none";
                        fetchstation();
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



    // ########################## ( Agents SECTION ) ##############################

    // Start select rigon by Ajax 
 
        $(document).on('change', '#select_directorates', function (e) {
            e.preventDefault();
            var directorate_id= window.select_directorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('agent.Show_rigons')}}",
              data: {
                     'directorate_id' :directorate_id, 
                    },
                success: function (data) {
                  
                   if (data.status == true) {
                       $('#select_rigons').html("");
                        $.each(data.rigons, function (key , rigon) {
                        $('#select_rigons').append('<option value='+rigon.id+'>'+rigon.rigon_name+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
<!-- End select rigon by Ajax -->
<!-- Start fetch All Agent  -->
  function fetchagent()
    {
        $.ajax({
                type: 'get',
                url: "{{route('agent.show_All')}}",
                dataType:"json",

                success: function (data) {     
                  console.log(data.agents) ;
                 $('#fetch_Allagent').html("");
                  $.each(data.agents, function (key , agent) {
                    $('#fetch_Allagent').append('<tr class="offerRow'+agent.id+' class="bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                    <td class="p-3 text-center">'+agent.id+'</td>\
                    <td class="p-3 text-center">'+agent.Agent_name+'</td>\
                    <td class="p-3 text-right">\
                      <img class="rounded-full h-12 w-12  object-cover" src="{{asset('assets/images/agents')}}/'+agent.photo+'" alt="unsplash image">\
                    </td>\
                    <td class="p-3 text-center">\
                      <span class="bg-green-400 text-gray-50 rounded-md px-2">'+agent.Agent_name+'</span>\
                    </td>\
                    <td class="p-5 flex space-x-2">\
                      <a href="#"  agent="'+agent.id+'"  class="agent_delete btn btn-danger" class="text-gray-400  hover:text-red-400 float-left ">\
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                        </svg>\
                      </a>\
                      <a href="#" agent="'+agent.id+'"  id="agent_edit" class="text-gray-400 hover:text-yellow-400  mx-2">\
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                        </svg>\
                      </a>\
                    </td>\
                  </tr>');
                
                  });
                 
                
                }
            });
    }

<!-- End fetch All Agent --> 
<!--Start Add Agent By Ajax -->
    
        $(document).on('click', '#save_agent', function (e) {
            e.preventDefault();
            var formData = new FormData($('#agentForm')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('agent.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                     // alert.show(data.msg,'success')
                        $('#file-ip-1').val('');
                        $('#select_directorates').val('');
                        $('#select_rigons').val('');
                        $('#agent_name').val('');
                         fetchagent();
                    } 
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    //End Add Agent By Ajax 


    // Start Deleteing Agent By Ajax 

        $(document).on('click', '.agent_delete', function (e) {
            e.preventDefault();
              var agent = $(this).attr('agent');
            $.ajax({
                type: 'delete',
                url: "{{route('agent.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :agent, 
                },
                success: function (data) {
                     if (data.status == true) {
                     // alert.show(data.msg,'success');
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });

   
    // End Deleting Agent By Ajax 


    // Start edit Agent By Ajax 
       
 
        $(document).on('click', '#agent_edit', function (e) {
            e.preventDefault();
              var agent = $(this).attr('agent');
            $.ajax({
                type: 'get',
                url:"{{route('agent.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :agent, 
                },
                success: function (data) {
                  console.log(data);
                     if (data.status == true) {
                        $('#agent_id').val(data.agent.id);
                        $('#select_directorate').text(data.directorate_name);
                        $('#select_rigon').text(data.rigon_name);
                        //أسئل صلوح 
                         //$('#select_directorates').val(data.agent.directorate_id);
                        //$('#select_rigons').val(data.agent.rigon_id);
                        $('#agent_name').val(data.agent.Agent_name);
                        $('#photo').val(data.photo);
                       // $('#select_directorates').val('');
                        window.save_agent.style.display="none";
                        window.update_agent.style.display="inline-flex";
                    }
                 
                }, error: function (reject) {

                }
            });
        });
 

    // End edit Agent By Ajax 


    // Start Update Agent By Ajax 
 

        $(document).on('click', '#update_agent', function (e) {
            e.preventDefault();
              var formData = new FormData($('#agentForm')[0]); 
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('agent.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                console.log(data);
                    if(data.status == true){
                       {{-- alert.show(data.msg,'success');
                        $('#rigon_id').val('');
                        $('#select_directorate').text('');
                       // $('#select_directorate').val('');
                        $('#rigon_name').val('');
                        window.save_rigon.style.display="inline-flex";
                        window.update_rigon.style.display="none";
                        fetchagent(); --}}
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });
      



<!-- End Update Agent By Ajax --> 
<!-- Start fetch All observer  -->
  function fetchobserver()
    {
        $.ajax({
                type: 'get',
                url: "{{route('observer.show_All')}}",
                dataType:"json",

                success: function (data) {     
               //   console.log(data.observers) ;
                 $('#fetch_Allobserver').html("");
                  $.each(data.observers, function (key , observer) {
                    $('#fetch_Allobserver').append('<tr class="offerRow'+observer.id+' class="bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                    <td class="p-3 text-center">'+observer.id+'</td>\
                    <td class="p-3 text-center">'+observer.observer_name+'</td>\
                    <td class="p-3 text-center">'+observer.directorate.directorate_name+'</td>\
                    <td class="p-3 text-center">'+observer.rigon.rigon_name+'</td>\
                    <td class="p-3 text-center">\
                     <span class="bg-green-400 text-gray-50 rounded-md px-2">'+observer.agent.Agent_name+'</span>\
                    </td>\
                   <td class="p-1 transition-all ease-in duration-150">\
                    <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">\
                      <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>\
                      <button class="bg-red-200 w-14 hover:bg-red-400">N</button>\
                    </div>\
                    <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">\
                      <a onclick="deleteAlert();" href="#" observer="'+observer.id+'"  class="observer_delete btn btn-danger" class="text-gray-400  hover:text-red-400 float-left ">\
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                        </svg>\
                      </a>\
                      <a href="#" observer="'+observer.id+'"  id="observer_edit" class="text-gray-400 hover:text-yellow-400  mx-2">\
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                        </svg>\
                      </a>\
                      <a href="#" class="text-gray-400 hover:text-blue-400  ml-2">\
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                          <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />\
                          <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />\
                        </svg>\
                      </a>\
                    </div>\
                   </td>\
                  </tr>');
                  });
                }
            });
    }
<!-- End fetch All observer --> 

// Start Add observer By Ajax 

        $(document).on('click', '#save_observer', function (e) {
            e.preventDefault();
            var formData = new FormData($('#observerForm')[0]);        
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('observer.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       alert.show(data.msg,'success');
                        {{-- $('#observer_id').val('');
                        $('#observer_name').val(''); 
                        $('#observer_username').val('');
                        $('#observer_password').val('');
                        $('#select_directorates').val('');
                        $('#select_directorates').text('');
                        $('#select_rigons').val('');
                        $('#select_rigons').text('');
                        $('#select_agents').val('');
                        $('#select_agents').text(''); --}}
                        fetchobserver(); 
                    }
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add observer By Ajax 
<!-- Start Deleteing observer By Ajax -->

        $(document).on('click', '.observer_delete', function (e) {
            e.preventDefault();
              var observer = $(this).attr('observer');
            $.ajax({
                type: 'delete',
                url: "{{route('observer.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :observer, 
                },
                success: function (data) {
                     if (data.status == true) {
                     // alert.show(data.msg,'success');
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });

   
<!-- End Deleting observer By Ajax -->
<!-- Start edit observer By Ajax -->
       
 
        $(document).on('click', '#observer_edit', function (e) {
            e.preventDefault();
              var observer = $(this).attr('observer');
            $.ajax({
                type: 'get',
                url:"{{route('observer.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :observer, 
                },
                success: function (data) {
                  console.log(data);
                     if (data.status == true) {
                        {{-- $('#agent_id').val(data.agent.id);
                        $('#select_directorate').text(data.directorate_name);
                        $('#select_rigon').text(data.rigon_name);
                        //أسئل صلوح 
                         //$('#select_directorates').val(data.agent.directorate_id);
                        //$('#select_rigons').val(data.agent.rigon_id);
                        $('#agent_name').val(data.agent.Agent_name);
                        $('#photo').val(data.photo);
                       // $('#select_directorates').val('');
                        window.save_agent.style.display="none";
                        window.update_agent.style.display="inline-flex"; --}}
                    }
                 
                }, error: function (reject) {

                }
            });
        });
 

<!-- End edit observer By Ajax -->


</script>
@stop