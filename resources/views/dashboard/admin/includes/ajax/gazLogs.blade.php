@section('script')
<script>

 // ########################## ( Agents SECTION ) ##############################
 // Start fetch All Agent  
      function fetchLestGazLog($lastGazLog)
        { 
                  $('#fetchLestGazLog').prepend('<tr class="offerRow'+$lastGazLog.id+' bg-gray-50 hover:scale-95 transform transition-all ease-in ">\
                  <td class="p-3 text-center">'+$lastGazLog.id+'</td>\
                  <td class="p-3 text-center">'+$lastGazLog.station.staName+'</td>\
                  <td class="p-3 text-center">'+$lastGazLog.directorate.dirName+'</td>\
                  <td class="p-3 text-center">'+$lastGazLog.rigon.rigName+'</td>\
                  <td class="p-3 text-center">\
                    <span class="bg-green-400 text-gray-50 rounded-md px-2">'+$lastGazLog.agent.agentName+'</span>\
                  </td>\
                  <td class="p-1 transition-all ease-in duration-150 flex  justify-center">\
                    <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">\
                      <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>\
                      <button class="bg-red-200 w-14 hover:bg-red-400">N</button>\
                    </div>\
                    <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">\
                      <a onclick="deleteAlert();" href="#" gazLogId="'+$lastGazLog.id+'"  class="gazLogDelete text-red-400  hover:text-red-600 float-left ">\
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                        </svg>\
                      </a>\
                      <a href="#" gazLogId="'+$lastGazLog.id+'"  class="gazLogEdit" class="text-yellow-400 hover:text-yellow-600  mx-4">\
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                        </svg>\
                      </a>\
                    </div>\
                  </td>\
                </tr>');
        }

    // End fetch All Agent 

    // Start select gazLogs Rigon by Ajax 
 
        $(document).on('click', '#select_Directorates', function (e) {
            e.preventDefault();
            var dirId= window.select_Directorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('gazLogs.showRigons')}}",
              data: {
                     'dirId' :dirId, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#select_Rigons').html("");
                        $.each(data.rigons, function (key , rigon) {
                        $('#select_Rigons').append('<option value='+rigon.id+'>'+rigon.rigName+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gazLogs Rigon by Ajax 
    // Start select gazLogs Agent by Ajax 
 
        $(document).on('click', '#select_Rigons', function (e) {
            e.preventDefault();
            var rigId= window.select_Rigons.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('gazLogs.showAgents')}}",
              data: {
                     'rigId' :rigId, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#select_Agents').html("");
                        $.each(data.agents, function (key , agent) {
                        $('#select_Agents').append('<option value='+agent.id+'>'+agent.agentName+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gazLogs Agent by Ajax
      // Start Add gazLogs By Ajax 

        $(document).on('click', '#saveGazLogs', function (e) {
            e.preventDefault();
            var formData = new FormData($('#gazLogsForm')[0]);        
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('gazLogs.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                        alert(data.msg,'success');
                        $('#qty').val('');
                        $('#created_at').val('');
                        $('#notice').val('');
                        $('#staId_error').text('');
                        $('#qty_error').text('');
                        $('#created_at_error').text('');
                        $('#dirId_error').text('');
                        $('#rigId_error').text('');
                        $('#agentId_error').text('');
                        $('#notice_error').text('');
                    
                        fetchLestGazLog(data.lastGazLog); 
                    }
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add gazLogs By Ajax 
     // Start Deleteing gazLogs By Ajax 

        $(document).on('click', '.gazLogDelete', function (e) {
            e.preventDefault();
              var gazLogId = $(this).attr('gazLogId');
            $.ajax({
                type: 'delete',
                url: "{{route('gazLogs.destroy')}}",
                data:
                {
                     'gazLogId' :gazLogId, 
                },
                success: function (data) 
                {
                   if (data.status == true) 
                    {
                        alert(data.msg,'success');
                    }

                    $('.offerRow'+data.id).remove();

                }, error: function (reject) 
                {

                }
            });
        });

   
  // End Deleting gazLog sBy Ajax
  // Start edit gazLog By Ajax 
       
 
        $(document).on('click', '.gazLogEdit', function (e) {
            e.preventDefault();
             var gazLogId = $(this).attr('gazLogId');
            $.ajax({
                type: 'get',
                url:"{{route('gazLogs.edit')}}",
                data:
                {
                      'gazLogId' :gazLogId, 
                },
                success: function (data) 
                {
                 
                  console.log(data);
                     if (data.status == true) 
                     {
                        $('#gazLogId').val(data.gazLog.id);
                        $('#select_Station').text(data.gazLog.station.staName);
                        $('#qty').val(data.gazLog.qty);
                        $('#created_at').text(data.gazLog.created_at);
                        $('#select_Directorate').text(data.gazLog.directorate.dirName);
                        $('#select_Rigon').text(data.gazLog.rigon.rigName);
                        $('#select_Agent').text(data.gazLog.agent.agentName);
                        $('#notice').val(data.gazLog.notice);
                        $('#staId_error').text('');
                        $('#qty_error').text('');
                        $('#created_at_error').text('');
                        $('#dirId_error').text('');
                        $('#rigId_error').text('');
                        $('#agentId_error').text('');
                        $('#notice_error').text('');
                          window.saveGazLogs.style.display="none";
                          window.updateGazLogs.style.display="inline-flex";  
                     }
                 
                }, error: function (reject) 
                {

                }
            });
        });
 

// End edit gazLog By Ajax 
// Start Update Agent By Ajax 
 

        $(document).on('click', '#updateGazLogs', function (e) {
            e.preventDefault();
               var formData = new FormData($('#gazLogsForm')[0]);    
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('gazLogs.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                console.log(data);
                    if(data.status == true){
                       alert(data.msg,'success');
                       $('#gazLogId').val('');
                       $('#select_Stations').text('');
                       $('#select_Station').text('');
                       $('#qty').val('');
                       $('#created_at').text('');
                       $('#select_Directorates').text('');
                       $('#select_Rigons').text('');
                       $('#select_Agents').text('');
                       $('#notice').val('');

                        window.saveGazLogs.style.display="inline-flex";
                        window.updateGazLogs.style.display="none";  
                       fetchLestGazLog(data.lastGazLogUpdate); 
                        
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
    // Start Search gazLogs By Ajax 

        $(document).on('keyup', '#textGazLogssearch', function(e) 
        {
            e.preventDefault();
            var formData = new FormData($('#formGazLogsSearch')[0]);
            $.ajax({
                  type: 'Post',
                  enctype: 'multipart/form-data',
                  url: "{{ route('gazLogs.search') }}",
                  data: formData,
                  processData: false,
                  contentType: false,
                  cache: false,
                  success: function(data) 
                  {
                     console.log(data.resultSearch);
                    if (data.status == true)
                    {
                        $('#fetchLestGazLog').html("");
                        $.each(data.resultSearch, function (key , resultSearch)
                         {
                            $('#fetchLestGazLog').prepend('<tr class="offerRow'+resultSearch.id+' bg-gray-50 hover:scale-95 transform transition-all ease-in ">\
                            <td class="p-3 text-center">'+resultSearch.id+'</td>\
                            <td class="p-3 text-center">'+resultSearch.station.staName+'</td>\
                            <td class="p-3 text-center">'+resultSearch.directorate.dirName+'</td>\
                            <td class="p-3 text-center">'+resultSearch.rigon.rigName+'</td>\
                            <td class="p-3 text-center">\
                              <span class="bg-green-400 text-gray-50 rounded-md px-2">'+resultSearch.agent.agentName+'</span>\
                            </td>\
                            <td class="p-1 transition-all ease-in duration-150 flex  justify-center">\
                              <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">\
                                <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>\
                                <button class="bg-red-200 w-14 hover:bg-red-400">N</button>\
                              </div>\
                              <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">\
                                <a onclick="deleteAlert();" href="#" gazLogId="'+resultSearch.id+'"  class="gazLogDelete text-red-400  hover:text-red-600 float-left ">\
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                  </svg>\
                                </a>\
                                <a href="#" gazLogId="'+resultSearch.id+'"  class="gazLogEdit text-yellow-400 hover:text-yellow-600  mx-2">\
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
                error: function(reject) {
                    console.log(data);
                   
                }
            });
        });


        // End Search gazLogs By Ajax

    </script>
    @stop