@section('script')
<script>

  // ########################## ( Stations SECTION ) ##############################
       // Start fetch All observer 
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
      // End fetch All observer  

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
   // Start Deleteing observer By Ajax 

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

   
  // End Deleting observer By Ajax 
 // Start edit observer By Ajax 
       
 
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
 

// End edit observer By Ajax 
</script>
@stop