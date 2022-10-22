
@section('script')
<script>

    // ########################## ( Citizen SECTION ) ##############################

    // Start fetch last citizen  
      function fetchLastCitizen($lastCitizenAdd)
        {
    
                $('#fetchLastCitizen').prepend('<tr class="offerRow'+$lastCitizenAdd.id+' bg-white hover:scale-95 transform transition-all ease-in">\
                                                <td class="p-3 text-center">'+$lastCitizenAdd.id+'</td>\
                                                <td class="p-3 text-center">'+$lastCitizenAdd.citName+'</td>\
                                                <td class="p-3 text-center">'+$lastCitizenAdd.identityNum+'</td>\
                                                <td class="p-3 text-center"> '+ ($lastCitizenAdd.checked == 'لا' ? '<span class="bg-red-400 text-red-50 rounded-md px-2">'+$lastCitizenAdd.checked+'</span>' : '<span class="bg-green-400 text-green-50 rounded-md px-2">'+resultSearch.checked+'</span>')+'</td>\
                                                <td class="p-3 text-center ">\
                                                    <div id="action-div" class="flex justify-center">\
                                                        <a onclick="deleteAlert();" href="#" citId="' + $lastCitizenAdd.id + '"  class="citizenDelete text-red-400  hover:text-red-600  ">\
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                                            </svg>\
                                                        </a>\
                                                        <a href="#"  citId="' + $lastCitizenAdd.id + '" class="citizenEdit text-yellow-400 hover:text-yellow-600 mx-2 ">\
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                                            </svg>\
                                                        </a>\
                                                        <a href="#" citId="' + $lastCitizenAdd.id + '"  class="citizenShowMembers text-blue-600 hover:text-blue-400">\
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />\
                                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />\
                                                            </svg>\
                                                        </a>\
                                                    </div>\
                                                </td>\
                                            </tr>');
                    
               
                    $('#selectCitizen').prepend('<option value='+$lastCitizenAdd.id+'>'+$lastCitizenAdd.citName+'</option>');
                   
            
        }

    // End fetch last citizen 
    // Start fetch last fm  
      function fetchLastfm($lastfm)
        {
             $('#showfamilyMember').prepend('<tr class="offerRow'+$lastfm.id+' bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                                    <td class="p-3 text-center">'+$lastfm.fmName+'</td>\
                                    <td class="p-3 text-center">'+$lastfm.sex['value']+'</td>\
                                    <td class="p-3 text-center">\
                                    <span class="bg-green-400 text-gray-50 rounded-md px-2">'+$lastfm.relationship['value']+'</span>\
                                    </td>\
                                    <td class="p-3 flex justify-center">\
                                        <a href="" fmId="' + $lastfm.id + '"  class="fmEdit mx-2 text-yellow-400  hover:text-yellow-600  ">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                                </svg>\
                                        </a>\
                                            <a  href="" fmId="' + $lastfm.id + '"   class="fmDelete text-red-400  hover:text-red-600  ">\
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                            </svg>\
                                        </a>\
                                    </td>\
                                </tr>');
        }

    // End fetch last fm 



     // Start Add citizen By Ajax 
    
        $(document).on('click', '#saveCitizen', function (e) {
            e.preventDefault();
            var formData = new FormData($('#citForm')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('citizes.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data)
                 {
                    

                    if (data.status == true)
                     {
                        newAlert(data.alertType,data.msg);
                        $('#citId').val('');
                        //$('#obsId').val(''); can not be null لاتفعل دا
                        $('#file-ip-1-preview').css('display', 'none');
                        $('#citName').val('');
                        $('#identityNum').val('');
                        $('#citPassword').val('');
                        $('#mobileNum').val('');
                        $('#select_Directorate').text('');
                        $('#select_Directorate').val('');
                        $('#select_Rigon').text('');
                        $('#selectCitizen').text(data.lastCitizenAdd.citName);
                        fetchLastCitizen(data.lastCitizenAdd);
                    
                    } 
                    else if(data.status == false)
                    $('#citName_error').text(data.foundAsMember);

                  
                }, error: function (reject) 
                {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add citizen By Ajax 
     
    // Start Deleteing citizen By Ajax 
           
        $(document).on('click', '.citizenDelete', function (e)
         {
              e.preventDefault();
              var citId = $(this).attr('value');           
             document.getElementById('deletionPoping').classList.replace('flex','hidden');
            $.ajax({
                    type: 'delete',
                    url: "{{route('citizen.destroy')}}",
                    data: 
                    {
                        'citId' :citId, 
                    },
                    success: function (data) 
                    {
                        if (data.status == true)  
                        {
                            $('.offerRow' + data.citId).addClass("animate-fadeInLeft");
                            newAlert(data.alertType,data.msg);
                        
                        sleep(400).then(() => {
                            $('.offerRow' +data.citId).remove();
                        });
                         }

                         else (data.status == false)
                             newAlert(data.alertType,data.msg);
                         


                    }, error: function (reject) {

                    }
                });
              

            
        });

   
  // End Deleting citizen sBy Ajax
  // Start edit citizen By Ajax 
       
 
        $(document).on('click', '.citizenEdit', function (e) 
        {
             e.preventDefault();
             var citId = $(this).attr('citId');

            $.ajax({
                        type: 'get',
                        url:"{{route('citizen.edit')}}",
                        data: 
                        {
                            'citId' :citId, 
                        },
                        success: function (data)
                        {
                          
                    
                            if (data.status == true) {
                            $('#citId').val(data.citizen.id);
                            $('#obsId').val(data.citizen.observer_id);
                            $('#citName').val(data.citizen.citName);
                            $('#identityNum').val(data.citizen.identityNum);
                            $('#citPassword').val(data.citizen.citPassword);
                            $('#mobileNum').val(data.citizen.mobileNum);
                            $('#select_Directorate').text(data.citizen.directorate.dirName);
                            $('#select_Directorate').val(data.citizen.dirId);
                            $('#select_Rigon').text(data.citizen.rigon.rigName);
                            var preview = document.getElementById("file-ip-1-preview");
                            preview.style.display = "block";
                            $('#file-ip-1-preview').attr('src', data.citizen.attachment['valsrc']);
                            
                                window.saveCitizen.style.display="none";
                                window.updateCitizen.style.display="inline-flex";  
                            
                        }
                        }, error: function (reject)
                        {

                        }
                });
        });
 

// End edit citizen By Ajax 
// Start Update Citizen By Ajax 
 

        $(document).on('click', '#updateCitizen', function (e) 
        {
               e.preventDefault();
               var formData = new FormData($('#citForm')[0]);    
              
            $.ajax(
                {
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('citizen.update')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data)
                   {
                        console.log(data);  // For Test
                        if(data.status == true)
                        {
                            $('#file-ip-1-preview').css('display', 'none');
                            
                             $('#citName_error').text('');
                             $('#identityNum_error').text('');
                             $('#citPassword_error').text('');
                             $('#mobileNum_error').text('');
                             $('#dirId_error').text('');
                             $('#rigId_error').text('');
                             $('#attachment_error').text('');

                             
                            $('#citId').val('');
                            //  $('#observer_Id').val(''); can not be null لاتفعل دا
                            $('#citName').val('');
                            $('#identityNum').val('');
                            $('#citPassword').val('');
                            $('#mobileNum').val('');
                        
                           

                            $('.offerRow'+data.citId).remove(); // This Command must execute Befor Function  *fetchLastCitizen*
                            fetchLastCitizen(data.lastCitizenUpdate);
                            window.saveCitizen.style.display="inline-flex";
                            window.updateCitizen.style.display="none";  
                            newAlert(data.alertType,data.msg);
   
                        }
                    }
                    ,error: function (reject) 
                      {
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                $("#" + key + "_error").text(val[0]);
                            }); 
                      }
            });
            
        });
  // End Update Citizen By Ajax 
        // Start Add familyMember By Ajax 
    
        $(document).on('click', '#fmSave', function (e)
         {
             e.preventDefault();
            var formData = new FormData($('#fmForm')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('fmailyMember.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data)
                 {
                      console.log(data);

                    if (data.status == true)
                     {

                        $('#Fm-preview').css('display', 'none');
                        newAlert(data.alertType,data.msg);
                        $('#fmName').val('');
                        $('#identityNumber').val('');
                        $('#age').val('');

                     } 
                    else if (data.status == false)
                    newAlert(data.alertType,data.msg);
                  
                 }, error: function (reject) 
                 {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function (key, val) 
                        {
                            $("#" + key + "_fmerror").text(val[0]);
                        });   
                 }
            });
        });


    // End Add familyMember By Ajax
    // Start edit citizen By Ajax 
       
 
        $(document).on('click', '.citizenShowMembers', function (e) 
        {
             e.preventDefault();
             var citId = $(this).attr('citId');

            $.ajax({
                        type: 'get',
                        url:"{{route('fmailyMember.show')}}",
                        data: 
                        {
                            'citId' :citId, 
                        },
                        success: function (data)
                        {
                          
                            if (data.status == true)
                              {
                                    $('#showfamilyMember').html("");
                                    $.each(data.familyMembers, function(key, familyMember) {
                                         /*if(familyMember.relationship=='1')  
                                            return relationship='أب';
                                         if(familyMember.relationship=='2') 
                                            return relationship='أخ';
                                         if(familyMember.relationship=='3') 
                                            return relationship='أخت';
                                         if(familyMember.relationship=='4') 
                                             return relationship='أم';*/
                                     $('#showfamilyMember').prepend('<tr class="offerRow'+familyMember.id+' bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                                    <td class="p-3 text-center">'+familyMember.fmName+'</td>\
                                    <td class="p-3 text-center">'+familyMember.sex['value']+'</td>\
                                    <td class="p-3 text-center">\
                                    <span class="bg-green-400 text-gray-50 rounded-md px-2">'+familyMember.relationship['value']+'</span>\
                                    </td>\
                                    <td class="p-3 flex justify-center">\
                                        <a href="" fmId="' + familyMember.id + '"  class="fmEdit mx-2 text-yellow-400  hover:text-yellow-600  ">\
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                                </svg>\
                                        </a>\
                                            <a  href="" fmId="' + familyMember.id + '"   class="fmDelete text-red-400  hover:text-red-600  ">\
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                            </svg>\
                                        </a>\
                                    </td>\
                                </tr>');
                                });

                              }
                        }
                        , error: function (reject)
                        {

                        }
                });
        });
    // Start Deleteing Fm By Ajax 

        $(document).on('click', '.fmDelete', function (e)
         {
              e.preventDefault();
              var fmId = $(this).attr('fmId');

            $.ajax({
                    type: 'delete',
                    url: "{{route('fm.destroy')}}",
                    data: 
                    {
                        'fmId' :fmId, 
                    },
                    success: function (data) 
                    {
                        if (data.status == true)
                        {
                            $('.offerRow' + data.fmId).addClass("animate-fadeInLeft");
                            newAlert(data.alertType,data.msg);
                            sleep(400).then(() =>
                            {
                                $('.offerRow' +data.fmId).remove();
                            });
                        }

                    }, error: function (reject) {

                    }
                });
        });

   
  // End Deleting Fm By Ajax
  // Start edit Fm By Ajax 
       
 
        $(document).on('click', '.fmEdit', function (e) 
        {
             e.preventDefault();
             var fmId = $(this).attr('fmId');

            $.ajax({
                        type: 'get',
                        url:"{{route('fm.edit')}}",
                        data: 
                        {
                            'fmId' :fmId, 
                        },
                        success: function (data)
                        {
                          
                          if (data.status == true) 
                            {
                                $('#familyMemberId').val(data.fm.id);
                                $('#selectCitizen').val(data.fm.citId).change();
                                $('#fmName').val(data.fm.fmName);
                                $('#identityNumber').val(data.fm.identityNum);
                                $('#age').val(data.fm.age);
                                $('#selectSex').val(data.fm.sex['index']).change();
                                $('#selectRelationship').val(data.fm.relationship['index']).change();
                                var preview = document.getElementById("Fm-preview");
                                preview.style.display = "block";
                                $('#Fm-preview').attr('src', data.fm.attachment['valsrc']);
                               
                                    window.fmSave.style.display="none";
                                    window.fmUpdate.style.display="inline-flex";  
                                
                            }
                        }, error: function (reject)
                        {

                        }
                });
        });
 

// End edit Fm By Ajax
// Start Update fm By Ajax 
 

        $(document).on('click', '#fmUpdate', function (e) 
        {

            e.preventDefault();
            var formData = new FormData($('#fmForm')[0]);     
              
            $.ajax(
                {
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('fm.update')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data)
                   {
                        console.log(data);  // For Test
                        if(data.status == true)
                        {
                            
                            window.fmSave.style.display="inline-flex";
                            window.fmUpdate.style.display="none";  
                            $('#fmName').val('');
                            $('#identityNumber').val('');
                            $('#age').val('');
                            $('#Fm-preview').css('display', 'none');
                            $('.offerRow' +data.fmId).remove();
                            fetchLastfm(data.lastfmUpdate);
                            newAlert(data.alertType,data.msg);
                        }
                    }
                    ,error: function (reject) 
                      {
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                $("#" + key + "_error").text(val[0]);
                            }); 
                      }
            });
            
        });
//end fm update fm By Ajax 

  // Start Search Citizen Agent By Ajax 

        $(document).on('keyup', '#search-dropdown', function(e) {
            e.preventDefault();
            var formData = new FormData($('#citizenSearch')[0]);
            $.ajax({
                        type: 'Post',
                        enctype: 'multipart/form-data',
                        url: "{{ route('citizen.search') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) 
                        {
                            console.log(data); // for Test
                            if (data.status == true) 
                            {
                                    $('#fetchLastCitizen').html("");
                                    $.each(data.resultSearch, function(key, resultSearch)
                                    {
                                                $('#fetchLastCitizen').prepend('<tr class="offerRow'+resultSearch.id+' animate-fadeInRight bg-white hover:scale-95 transform transition-all ease-in">\
                                                <td class="p-3 text-center">'+resultSearch.id+'</td>\
                                                <td class="p-3 text-center">'+resultSearch.citName+'</td>\
                                                <td class="p-3 text-center">'+resultSearch.identityNum+'</td>\
                                                <td class="p-3 text-center"> '+ (resultSearch.checked == 'لا' ? '<span class="bg-red-400 text-red-50 rounded-md px-2">'+resultSearch.checked+'</span>' : '<span class="bg-green-400 text-green-50 rounded-md px-2">'+resultSearch.checked+'</span>')+'</td>\
                                                <td class="p-3 text-center ">\
                                                    <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden hidden">\
                                                        <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>\
                                                        <button class="bg-red-200 w-14 hover:bg-red-400">N</button>\
                                                    </div>\
                                                    <div id="action-div" class="flex justify-center">\
                                                        <a onclick="deleteAlert();" href="#" citId="' + resultSearch.id + '"  class="citizenDelete text-red-400  hover:text-red-600  ">\
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                                            </svg>\
                                                        </a>\
                                                        <a href="#"  citId="' + resultSearch.id + '" class="citizenEdit text-yellow-400 hover:text-yellow-600 mx-2 ">\
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                                            </svg>\
                                                        </a>\
                                                        <a href="#" citId="' + resultSearch.id + '"  class="citizenShowMembers text-blue-600 hover:text-blue-400">\
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
                        },
                error: function(reject) 
                {
                    console.log(data);

                }
            });
        });

  // End Search Citizen By Ajax 
 

   
</script>
@stop