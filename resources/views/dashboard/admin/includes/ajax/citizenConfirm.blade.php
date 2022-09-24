@section('script')
<script>

 // ########################## ( citizenConfirm SECTION ) ##############################
 
    // Start Deleteing citizenConfirm By Ajax 
        $(document).on('click', '.citizenConfirmDelete', function (e) 
        {
              e.preventDefault();
              var citId = $(this).attr('citId');

            $.ajax({
                type: 'delete',
                url: "{{route('citizenConfirm.destroy')}}",
                data: 
                {
                     'citId' :citId, 
                },
                success: function (data) 
                {
                   console.log(data); //for Test

                   $('.offerRow' + data.citId).addClass("animate-fadeInLeft");
                  if (data.status == true)
                    {
                        newAlert(data.alertType,data.msg);
                    }
                    sleep(400).then(() => {
                        $('.offerRow'+data.citId).remove();
                        });
                  
                }, error: function (reject) 
                {

                }
            });
        });

   
    // End Deleting citizenConfirm By Ajax 
   // Start show citizenConfirm By Ajax 
       
 
        $(document).on('click', '.citizenConfirmShow', function (e) 
        {
             e.preventDefault();
             var citId = $(this).attr('citId');

            $.ajax({
                type: 'get',
                url:"{{route('citizenConfirm.show')}}",
                data:
                 {
                     'citId' :citId, 
                 },
                success: function (data) 
                {
                     console.log(data); //for Test
               
                     if (data.status == true) 
                     {
                         
                       $('#attachment').attr('src', data.citizen.attachment['valsrc']);
                       $('.citName').text(data.citizen.citName);
                       $('.identityNum').text(data.citizen.identityNum);
                       $('#citId').text(data.citizen.id);
                       $('.obsName').text(data.citizen.observer.obsName);
                       $('.dateAdd').text(data.citizen.created_at);
                       $('.dirName').text(data.citizen.directorate.dirName);
                       $('.rigName').text(data.citizen.rigon.rigName);
                       $('.agentName').text(data.citizen.observer.agent.agentName);

                     
                    }
                }, error: function (reject) 
                {

                }
            });
        });
 

  // End show citizenConfirm By Ajax 
   // Start update citizenConfirm By Ajax 
       
 
        $(document).on('change', '#checkbox', function (e)
         {
            
             e.preventDefault();
             var citId =  $('#citId').text();
             var checkbox= window.checkbox.checked;

            $.ajax({
                type: 'post',
                url:"{{route('citizenConfirm.update')}}",
                data: 
                {
                     'citId' :citId, 
                     'checkbox'  :checkbox,
                },
                success: function (data) 
                {
                     console.log(data);
               
                     if (data.status == true) 
                     {
                        $('.offerRow' + data.citId).addClass("animate-fadeInLeft");
                        newAlert(data.alertType,data.msg);

                        sleep(400).then(() => {
                        $('.offerRow'+data.citId).remove();
                        });
                     
                     }
                }, error: function (reject) 
                {

                }
            });
        });
 

  // End update citizenConfirm By Ajax 
  // Start Search citizenConfirm By Ajax 

        $(document).on('keyup', '#textCitConfirmSearch', function(e) 
        {
            e.preventDefault();
            var formData = new FormData($('#formCitConfirmSearch')[0]);
            $.ajax({
                  type: 'Post',
                  enctype: 'multipart/form-data',
                  url: "{{ route('citizenConfirm.search') }}",
                  data: formData,
                  processData: false,
                  contentType: false,
                  cache: false,
                  success: function(data) 
                  {
                        console.log(data.resultSearch);
                        if (data.status == true)
                        {
                           $('#fetchAllCitizenConfirm').html("");
                           $.each(data.resultSearch, function (key , resultSearch)
                             {
                                $('#fetchAllCitizenConfirm').prepend('<tr class="offerRow'+resultSearch.id+' animate-fadeInRight bg-white hover:scale-95 transform transition-all ease-in">\
                                <td class="p-3 text-center">'+resultSearch.id+'</td>\
                                <td class="p-1 text-base text-center">'+resultSearch.citName+'</td>\
                                <td class="p-3 text-center">'+resultSearch.identityNum+'</td>\
                                <td class="p-3 text-center whitespace-nowrap"><span class="bg-red-400 text-gray-50 rounded-md px-2">'+resultSearch.checked+'</span></td>\
                                <td class="p-5 flex space-x-2">\
                                <a href="#" citId='+resultSearch.id+' class="citizenConfirmDelete text-red-400  hover:text-red-600 float-left ">\
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                    </svg>\
                                </a>\
                                <a href="#" citId='+resultSearch.id+' class="citizenConfirmShow text-blue-400 hover:text-blue-600  ml-2">\
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />\
                                    <path fill-rule="evenodd"  d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />\
                                    </svg>\
                                </a>\
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


        // End Search citizenConfirm By Ajax

   
   
</script>
@stop