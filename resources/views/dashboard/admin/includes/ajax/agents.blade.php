@section('script')
<script>

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
  
    // End select rigon by Ajax 
    // Start fetch All Agent  
      function fetchagent()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('agent.show_All')}}",
                    dataType:"json",

                    success: function (data) {     
                      console.log(data) ;
                    $('#fetch_Allagent').html("");
                      $.each(data.agents, function (key , agent) {
                        $('#fetch_Allagent').append('<tr class="offerRow'+agent.id+' class="bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                        <td class="p-3 text-center">'+agent.id+'</td>\
                        <td class="p-3 text-center">'+agent.Agent_name+'</td>\
                        <td class="p-3 text-right">\
                          <img class="rounded-full h-12 w-12  object-cover" src="{{asset('assets/images/agents')}}/'+agent.photo+'" alt="unsplash image">\
                        </td>\
                        <td class="p-3 text-center">\
                          <span class="bg-green-400 text-gray-50 rounded-md px-2">'+agent.directorate.directorate_name+'</span>\
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

    // End fetch All Agent 
    // Start Add Agent By Ajax 
    
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
                       alert(data.msg,'success')
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

    // End Add Agent By Ajax 
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
                  console.log(data);
                     if (data.status == true) {
                      alert(data.msg,'success');
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
                        //$('#file-ip-1-preview').attr('src','des');
                        $('#select_directorates').focus();
                        $('#select_rigons').focus();
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
                      alert(data.msg,'success');
                       {{-- 
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
      



    // End Update Agent By Ajax
  
</script>
@stop