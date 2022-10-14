@section('script')
<script>

  // ########################## ( Stations SECTION ) ##############################
       // Start fetch All observer 
        function fetchLastObserver($lastObserver)
          {
            
              $('#fetchLastObserver').prepend('<tr class="offerRow'+$lastObserver.id+'animate-fadeInRight bg-white hover:scale-95 transform transition-all ease-in">\
              <td class="p-3 text-center">'+$lastObserver.id+'</td>\
              <td class="p-3 text-center">'+$lastObserver.obsName+'</td>\
              <td class="p-3 text-center">'+$lastObserver.directorate.dirName+'</td>\
              <td class="p-3 text-center">'+$lastObserver.rigon.rigName+'</td>\
              <td class="p-3 text-center">\
              <span class="bg-green-400 text-gray-50 rounded-md px-2">'+$lastObserver.agent.agentName+'</span>\
              </td>\
              <td class="p-1 transition-all ease-in duration-150">\
              <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">\
                <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>\
                <button class="bg-red-200 w-14 hover:bg-red-400">N</button>\
              </div>\
              <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">\
                <a onclick="deleteAlert();" href="#" obsId="'+$lastObserver.id+'"  class="observerDelete btn btn-danger" class="text-gray-400  hover:text-red-400 float-left ">\
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                  </svg>\
                </a>\
                <a href="#" obsId="'+$lastObserver.id+'"   class="observerEdit text-gray-400 hover:text-yellow-400  mx-2">\
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                  </svg>\
                </a>\
                <a href="#" class="text-blue-600 hover:text-blue-400  ml-2">\
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />\
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />\
                  </svg>\
                </a>\
              </div>\
            </td>\
            </tr>');
        }
      // End fetch All observer  
      // Start select rigon by Ajax 
 
        $(document).on('change', '#select_directorates', function (e) {
            e.preventDefault();
            var dirId= window.select_directorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('observer.Show_rigons')}}",
              data: {
                     'dirId' :dirId, 
                    },
                success: function (data) {
                  
                   if (data.status == true) {
                       $('#select_rigons').html("");
                        $.each(data.rigons, function (key , rigon) {
                        $('#select_rigons').append('<option value='+rigon.id+'>'+rigon.rigName+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
      // End select rigon by Ajax 
        // Start select gaz_Logs Agent by Ajax 
 
        $(document).on('click', '#select_rigons', function (e) {
            e.preventDefault();
            var rigId= window.select_rigons.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('observer.show_Agents')}}",
              data: {
                     'rigId' :rigId, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#select_agents').html("");
                        $.each(data.agents, function (key , agent) {
                        $('#select_agents').append('<option value='+agent.id+'>'+agent.agentName+'</option>');
                        });
                    }
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gaz_Logs Agent by Ajax

     // Start Add observer By Ajax 

        $(document).on('click', '#saveObserver', function (e) {
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
                        newAlert(data.alertType,data.msg);
                        $('#obsId').val('');
                        $('#obsName').val(''); 
                        $('#obsUserName').val('');
                        $('#obsPassword').val('');
                        fetchLastObserver(data.lastObserver);
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
   // Start Deleteing observer By Ajax 

        $(document).on('click', '.observerDelete', function (e) {
            e.preventDefault();
            document.getElementById('deletionPoping').classList.replace('flex','hidden');
              var obsId = $(this).attr('value');
            $.ajax({
                type: 'delete',
                url: "{{route('observer.destroy')}}",
                data: {
                   
                     'obsId' :obsId, 
                },
                success: function (data) {
                  $('.offerRow' + data.obsId).addClass("animate-fadeInLeft");
                     if (data.status == true) {
                      newAlert(data.alertType,data.msg);
                    }
                    sleep(400).then(() => {
                      $('.offerRow'+data.obsId).remove();
                        });
                   
                }, error: function (reject) {

                }
            });
        });

   
  // End Deleting observer By Ajax 
 // Start edit observer By Ajax 
       
        $(document).on('click', '.observerEdit', function (e) {
            e.preventDefault();
              var obsId = $(this).attr('obsId');
            $.ajax({
                type: 'get',
                url:"{{route('observer.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'obsId' :obsId, 
                },
                success: function (data) {
                  console.log(data);
                     if (data.status == true) {
                        $('#obsId').val(data.obs.id);
                        $('#obsName').val(data.obs.obsName); 
                        $('#obsUserName').val(data.obs.obsUserName);
                        $('#obsPassword').val(data.obs.obsPassword);
                        $('#select_directorates').val(data.obs.dirId);
                        $('#select_directorate').text(data.obs.directorate.dirName);
                        $('#select_rigons').val(data.obs.rigId);
                        $('#select_rigon').text(data.obs.rigon.rigName);
                        $('#select_agents').val(data.obs.agentId);
                        $('#select_agent').text(data.obs.agent.agentName); 
                        window.saveObserver.style.display="none";
                        window.updateObserver.style.display="inline-flex";
                    }
                 
                }, error: function (reject) {

                }
            });
        });
 

// End edit observer By Ajax 
// Start Update observer By Ajax 
 

        $(document).on('click', '#updateObserver', function (e) {
            e.preventDefault();
               var formData = new FormData($('#observerForm')[0]);    
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('observer.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
            
                    if(data.status == true){
                      newAlert(data.alertType,data.msg);
                       
                        window.saveObserver.style.display="inline-flex";
                        window.updateObserver.style.display="none";  
                         $('.offerRow' + data.obsId).remove(); // حدف الحقل السابق الدي قبل التعديل 
                        fetchLastObserver(data.lastobserverUpdate); 
                        
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });
      



    // End Update observer By Ajax
     // Start Search observer By Ajax 

        $(document).on('keyup', '#textObsSearch', function(e) {
            e.preventDefault();
            var formData = new FormData($('#formObsSearch')[0]);
      
            $.ajax({
                type: 'Post',
                enctype: 'multipart/form-data',
                url: "{{ route('observer.search') }}",
                data:formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) 
                {
        
                 
                    if (data.status == true)
                    {
                        $('#fetchLastObserver').html("");
                        $.each(data.resultSearch, function (key , resultSearch) 
                        {
                          $('#fetchLastObserver').prepend('<tr class="offerRow'+resultSearch.id+'animate-fadeInRight bg-white hover:scale-95 transform transition-all ease-in">\
                          <td class="p-3 text-center">'+resultSearch.id+'</td>\
                          <td class="p-3 text-center">'+resultSearch.obsName+'</td>\
                          <td class="p-3 text-center">'+resultSearch.directorate.dirName+'</td>\
                          <td class="p-3 text-center">'+resultSearch.rigon.rigName+'</td>\
                          <td class="p-3 text-center">\
                          <span class="bg-green-400 text-gray-50 rounded-md px-2">'+resultSearch.agent.agentName+'</span>\
                          </td>\
                          <td class="p-1 transition-all ease-in duration-150">\
                          <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">\
                            <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>\
                            <button class="bg-red-200 w-14 hover:bg-red-400">N</button>\
                          </div>\
                          <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">\
                            <a onclick="deleteAlert();" href="#" obsId="'+resultSearch.id+'"  class="observerDelete btn btn-danger text-red-400  hover:text-red-600 float-left ">\
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                              </svg>\
                            </a>\
                            <a href="#" obsId="'+resultSearch.id+'"   class="observerEdit text-yellow-400 hover:text-yellow-600  mx-4">\
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                              </svg>\
                            </a>\
                           </div>\
                        </td>\
                        </tr>');
                    }); 
                    
                    }

                },
                error: function(reject) 
                {
                    console.log(data);
                   
                }
            });
        });

        // End Search observer By Ajax
</script>
@stop