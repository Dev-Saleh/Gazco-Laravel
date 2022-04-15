@section('script')
<script>

 // ########################## ( Agents SECTION ) ##############################
 // Start fetch All Agent  
      function fetch_All_Gaz_Logs()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('gaz_Logs.show_All')}}",
                    dataType:"json",

                    success: function (data) {     
                      console.log(data) ;
                     $('#fetch_All_Gaz_Logs').html("");
                      $.each(data.gaz_Logs, function (key , gaz_Log) {
                        $('#fetch_All_Gaz_Logs').append('<tr class="offerRow'+gaz_Log.id+'" class="bg-gray-50 hover:scale-95 transform transition-all ease-in ">\
                  <td class="p-3 text-center">'+gaz_Log.id+'</td>\
                  <td class="p-3 text-center">'+gaz_Log.station.Station_name+'</td>\
                  <td class="p-3 text-center">'+gaz_Log.directorate.directorate_name+'</td>\
                  <td class="p-3 text-center">'+gaz_Log.rigon.rigon_name+'</td>\
                  <td class="p-3 text-center">\
                    <span class="bg-green-400 text-gray-50 rounded-md px-2">'+gaz_Log.agent.Agent_name+'</span>\
                  </td>\
                  <td class="p-1 transition-all ease-in duration-150 flex  justify-center">\
                    <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">\
                      <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>\
                      <button class="bg-red-200 w-14 hover:bg-red-400">N</button>\
                    </div>\
                    <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">\
                      <a onclick="deleteAlert();" href="#" gaz_Log_Id="'+gaz_Log.id+'"  class="gaz_Log_Delete" class="text-gray-400  hover:text-red-400 float-left ">\
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                        </svg>\
                      </a>\
                      <a href="#" gaz_Log_Id="'+gaz_Log.id+'"  class="gaz_Log_Edit" class="text-gray-400 hover:text-yellow-400  mx-2">\
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

    // End fetch All Agent 

    // Start select gaz_Logs Rigon by Ajax 
 
        $(document).on('click', '#select_Directorates', function (e) {
            e.preventDefault();
            var directorate_Id= window.select_Directorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('gaz_Logs.show_Rigons')}}",
              data: {
                     'directorate_Id' :directorate_Id, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#select_Rigons').html("");
                        $.each(data.rigons, function (key , rigon) {
                        $('#select_Rigons').append('<option value='+rigon.id+'>'+rigon.rigon_name+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gaz_Logs Rigon by Ajax 
    // Start select gaz_Logs Agent by Ajax 
 
        $(document).on('click', '#select_Rigons', function (e) {
            e.preventDefault();
            var rigons_Id= window.select_Rigons.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('gaz_Logs.show_Agents')}}",
              data: {
                     'rigons_Id' :rigons_Id, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#select_Agents').html("");
                        $.each(data.agents, function (key , agent) {
                        $('#select_Agents').append('<option value='+agent.id+'>'+agent.Agent_name+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gaz_Logs Agent by Ajax
      // Start Add gaz_Logs By Ajax 

        $(document).on('click', '#save_Gaz_Logs', function (e) {
            e.preventDefault();
            var formData = new FormData($('#gaz_Logs_Form')[0]);        
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('gaz_Logs.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       alert.show(data.msg,'success');
                        $('#select_Stations').text('');
                        $('#qty').val('');
                        $('#created_at').val('');
                        $('#select_Directorates').text('');
                        $('#select_Rigons').text('');
                        $('#select_Agents').text(''); 
                        $('#notice').val('');
                       fetch_All_Gaz_Logs(); 
                    }
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add gaz_Logs By Ajax 
     // Start Deleteing gaz_Logs By Ajax 

        $(document).on('click', '.gaz_Log_Delete', function (e) {
            e.preventDefault();
              var gaz_Log_Id = $(this).attr('gaz_Log_Id');
            $.ajax({
                type: 'delete',
                url: "{{route('gaz_Logs.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'gaz_Log_Id' :gaz_Log_Id, 
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

   
  // End Deleting gaz_Log sBy Ajax
  // Start edit gaz_Log By Ajax 
       
 
        $(document).on('click', '.gaz_Log_Edit', function (e) {
            e.preventDefault();
             var gaz_Log_Id = $(this).attr('gaz_Log_Id');
            $.ajax({
                type: 'get',
                url:"{{route('gaz_Logs.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'gaz_Log_Id' :gaz_Log_Id, 
                },
                success: function (data) {
                 
                  console.log(data);
                     if (data.status == true) {
                       $('#gaz_Logs_Id').val(data.gaz_Log.id);
                       $('#select_Station').text(data.gaz_Log.station.Station_name);
                      // $('#select_Stations').val(data.gaz_Log.stations_id);
                       $('#qty').val(data.gaz_Log.qty);
                       $('#created_at').text(data.gaz_Log.created_at);
                       $('#select_Directorate').text(data.gaz_Log.directorate.directorate_name);
                      // $('#select_Directorate').val(data.gaz_Log.directorate_id);
                       $('#select_Rigon').text(data.gaz_Log.rigon.rigon_name);
                       $('#select_Agent').text(data.gaz_Log.agent.Agent_name);
                       $('#notice').val(data.gaz_Log.notice);
                        window.save_Gaz_Logs.style.display="none";
                        window.update_Gaz_Logs.style.display="inline-flex";  
                    }
                 
                }, error: function (reject) {

                }
            });
        });
 

// End edit gaz_Log By Ajax 
// Start Update Agent By Ajax 
 

        $(document).on('click', '#update_Gaz_Logs', function (e) {
            e.preventDefault();
               var formData = new FormData($('#gaz_Logs_Form')[0]);    
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('gaz_Logs.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                console.log(data);
                    if(data.status == true){
                       alert.show(data.msg,'success');
                       $('#gaz_Logs_Id').val('');
                       $('#select_Stations').text('');
                       $('#select_Station').text('');
                       $('#qty').val('');
                       $('#created_at').text('');
                       $('#select_Directorates').text('');
                      // $('#select_Directorate').val('');
                       $('#select_Rigons').text('');
                       $('#select_Agents').text('');
                       $('#notice').val('');
                        window.save_Gaz_Logs.style.display="inline-flex";
                        window.update_Gaz_Logs.style.display="none";  
                      fetch_All_Gaz_Logs(); 
                        
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });
      



    // End Update Agent By Ajax

    </script>
    @stop