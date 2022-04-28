
@section('script')
<script>

    // ########################## ( Citizen SECTION ) ##############################

    // Start fetch All Agent  
      function fetch_All_Citizens()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('citizen.show_All')}}",
                    dataType:"json",

                    success: function (data) {     
                      console.log(data) ;
                    if(data.status == true) {
                     $('#fetch_All_Citizens').html("");
                      $.each(data.citizens, function (key , citizen) {
                        $('#fetch_All_Citizens').append('<tr  class="offerRow'+citizen.id+'" class="bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                            <td class="p-3 text-center">'+citizen.id+'</td>\
                            <td class="p-3 text-center">'+citizen.citizen_name+'</td>\
                            <td class="p-3 text-center">'+citizen.directorate.dirName+'</td>\
                            <td class="p-3 text-center">'+citizen.rigon.rigName+'</td>\
                            <td class="p-3 text-center">\
                            <span class="bg-green-400 text-gray-50 rounded-md px-2">'+citizen.observer.agent.Agent_name+'</span>\
                            </td>\
                            <td class="p-3 text-center ">\
                                <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden hidden">\
                                    <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>\
                                    <button class="bg-red-200 w-14 hover:bg-red-400">N</button>\
                                </div>\
                                <div id="action-div" class="flex justify-center">\
                                    <a onclick="deleteAlert();" href="#" citizen_Id="'+citizen.id+'"  class="citizen_Delete" class="text-red-500  hover:text-red-400  ">\
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                        </svg>\
                                    </a>\
                                    <a href="#"  citizen_Id="'+citizen.id+'"  class="citizen_Edit" class="text-yellow-500 hover:text-yellow-400 mx-2 ">\
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                        </svg>\
                                    </a>\
                                </div>\
                            </td>\
                        </tr>');
                     }); 
                    }
                    }
                });
        }

    // End fetch All Agent 


     // Start Add citizen By Ajax 
    
        $(document).on('click', '#save_Citizen', function (e) {
            e.preventDefault();
            var formData = new FormData($('#citize_Form')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('citizes.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                       $('#citizen_Id').val('');
                     //  $('#observer_Id').val(''); can not be null لاتفعل دا
                       $('#citizen_name').val('');
                       $('#identity_num').val('');
                       $('#citizen_password').val('');
                       $('#mobile_num').val('');
                       $('#select_Directorate').text('');
                       $('#select_Directorate').val('');
                       $('#select_Rigon').text('');
                        fetch_All_Citizens(); 
                        
                    
                    } 
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add citizen By Ajax 
    // Start Deleteing citizen By Ajax 

        $(document).on('click', '.citizen_Delete', function (e) {
            e.preventDefault();
              var citizen_Id = $(this).attr('citizen_Id');
            $.ajax({
                type: 'delete',
                url: "{{route('citizen.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'citizen_Id' :citizen_Id, 
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

   
  // End Deleting citizen sBy Ajax
  // Start edit citizen By Ajax 
       
 
        $(document).on('click', '.citizen_Edit', function (e) {
            e.preventDefault();
             var citizen_Id = $(this).attr('citizen_Id');
            $.ajax({
                type: 'get',
                url:"{{route('citizen.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'citizen_Id' :citizen_Id, 
                },
                success: function (data) {
                 // console.log(data);
               
                     if (data.status == true) {
                       $('#citizen_Id').val(data.citizen.id);
                       $('#observer_Id').val(data.citizen.observer_id);
                       $('#citizen_name').val(data.citizen.citizen_name);
                       $('#identity_num').val(data.citizen.identity_num);
                       $('#citizen_password').val(data.citizen.citizen_password);
                       $('#mobile_num').val(data.citizen.mobile_num);
                       $('#select_Directorate').text(data.citizen.directorate.dirName);
                       $('#select_Directorate').val(data.citizen.directorate_id);
                       $('#select_Rigon').text(data.citizen.rigon.rigName);
                      // $('#file-ip-1').src('assets/images/citizens/'.data.citizen.attachment);
                      
                        window.save_Citizen.style.display="none";
                        window.update_Citizen.style.display="inline-flex";  
                    
                  }
                }, error: function (reject) {

                }
            });
        });
 

// End edit citizen By Ajax 
// Start Update Agent By Ajax 
 

        $(document).on('click', '#update_Citizen', function (e) {
            e.preventDefault();
               var formData = new FormData($('#citize_Form')[0]);    
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('citizen.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                console.log(data);
                    if(data.status == true){
                        alert.show(data.msg,'success');
                       $('#citizen_Id').val('');
                       //  $('#observer_Id').val(''); can not be null لاتفعل دا
                       $('#citizen_name').val('');
                       $('#identity_num').val('');
                       $('#citizen_password').val('');
                       $('#mobile_num').val('');
                       $('#select_Directorate').text('');
                       $('#select_Directorate').val('');
                       $('#select_Rigon').text('');
                        window.save_Citizen.style.display="inline-flex";
                        window.update_Citizen.style.display="none"; 
                        fetch_All_Citizens(); 
                        
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });

   
</script>
@stop