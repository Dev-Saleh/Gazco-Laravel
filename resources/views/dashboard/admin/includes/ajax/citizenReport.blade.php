@section('script')
<script>

 // ########################## ( Agents SECTION ) ##############################
 // Start fetch All Agent  
     
    // Start select gazLogs Rigon by Ajax 
 
        $(document).on('change', '#citSelectDirectorates', function (e) {
            e.preventDefault();
            var dirId= window.citSelectDirectorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('citizenReports.showRigons')}}",
              data:
                {
                        'dirId' :dirId, 
                },
              success: function (data) 
              {
                   console.log(data);
                   if (data.status == true)
                    {
                       
                        $('#citSelectRigon').html("");
                        $groupOption='<option selected disabled >المربع</option>';
           
                        $.each(data.rigons, function (key , rigon)
                        {
                          $groupOption +='<option value='+rigon.id+'>'+rigon.rigName+'</option>';
                        });
                        
                         $('#citSelectRigon').append($groupOption);
                        $('#citSelectAgent').html("");
                        $groupOptionAgent='<option selected disabled >الموزع</option>';
           
                        $.each(data.agents, function (key , agent)
                        {
                           $groupOptionAgent+='<option value='+agent.id+'>'+agent.agentName+'</option>';
                        });

                        $('#citSelectAgent').append($groupOptionAgent);
                       
                    }
                  
                }, error: function (reject) 
                {
                   
                }
            });
        });
  
    // End select gazLogs Rigon by Ajax 
    // Start select gazLogs Agent by Ajax 
 
        $(document).on('change', '#citSelectRigon', function (e)
        {
            e.preventDefault();
            var rigId= window.citSelectRigon.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('citizenReports.showAgents')}}",
              data: {
                     'rigId' :rigId, 
                    },
                success: function (data)
                 {
                    console.log(data);
                   if (data.status == true) 
                   {
                        $('#citSelectAgent').html("");
                        $groupOption='<option selected disabled >الموزع</option>';
           
                        $.each(data.agents, function (key , agent)
                        {
                           $groupOption+='<option value='+agent.id+'>'+agent.agentName+'</option>';
                        });

                        $('#citSelectAgent').append($groupOption);
                    }
                  
                }, error: function (reject) 
                {   
                }
            });
        });
  
    // End select gazLogs Agent by Ajax
    // Start show gazLogs By Ajax 

        $(document).on('click', '#btnShowCitizenReports', function (e) {
            e.preventDefault();
               var formData = new FormData($('#citizenReportForm')[0]); 
             $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('citizenReports.show')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) 
                {
                   if (data.status == true) 
                   {

                        console.log(data);
                        $('#fetchLestCitizen').html("");
                            $.each(data.citizen, function (key , citizen)
                            {
                                $('#fetchLestCitizen').prepend
                                ('<tr class="offerRow'+citizen.id+' animate-fadeInRight bg-white hover:scale-95 transform transition-all ease-in">\
                                <td class="p-3 text-center">'+citizen.id+'</td>\
                                <td class="p-1 text-base text-center">'+citizen.citName+'</td>\
                                <td class="p-3 text-center">'+citizen.identityNum+'</td>\
                                <td class="p-3 text-center">'+citizen.mobileNum+'</td>\
                                <td class="p-3 text-center whitespace-nowrap"><span class="bg-red-400 text-gray-50 rounded-md px-2">'+citizen.checked+'</span></td>\
                                <td class="p-3 text-center">'+citizen.observer.obsName+'</td>\
                                </tr>'
                                );
                            });
                            $('#agentId').val(data.agentId);
                            $('#citizenCount').text(data.citizenCount);
                            $('#bookingCount').text(data.bookingCount);
                            $('#citCheckedFalse').text(data.citCheckedFalse);
                            $('#citCheckedTrue').text(data.citCheckedTrue);
                   }
                }, error: function (reject)
                {   
                }
            });
        });
    // End show gazLogs By Ajax 
    </script>
    @stop