@section('script')
<script>

 // ########################## ( Agents SECTION ) ##############################
 // Start fetch All Agent  
     
    // Start select gazLogs Rigon by Ajax 
 
        $(document).on('change', '#selectDirectorates', function (e) {
            e.preventDefault();
            var dirId= window.selectDirectorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('batchReports.showRigons')}}",
              data:
                {
                        'dirId' :dirId, 
                },
              success: function (data) 
              {
                   console.log(data);
                   if (data.status == true)
                    {
                       
                        $('#selectRigon').html("");
                        $groupOption='<option selected disabled >المربع</option>';
           
                        $.each(data.rigons, function (key , rigon)
                        {
                          $groupOption +='<option value='+rigon.id+'>'+rigon.rigName+'</option>';
                        });
                        
                         $('#selectRigon').append($groupOption);
                        $('#selectAgent').html("");
                        $groupOptionAgent='<option selected disabled >الوكيل</option>';
           
                        $.each(data.agents, function (key , agent)
                        {
                           $groupOptionAgent+='<option value='+agent.id+'>'+agent.agentName+'</option>';
                        });

                        $('#selectAgent').append($groupOptionAgent);
                       
                    }
                  
                }, error: function (reject) 
                {
                   
                }
            });
        });
  
    // End select gazLogs Rigon by Ajax 
    // Start select gazLogs Agent by Ajax 
 
        $(document).on('change', '#selectRigon', function (e)
        {
            e.preventDefault();
            var rigId= window.selectRigon.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('batchReports.showAgents')}}",
              data: {
                     'rigId' :rigId, 
                    },
                success: function (data)
                 {
                    console.log(data);
                   if (data.status == true) 
                   {
                        $('#selectAgent').html("");
                        $groupOption='<option selected disabled >الوكيل</option>';
           
                        $.each(data.agents, function (key , agent)
                        {
                           $groupOption+='<option value='+agent.id+'>'+agent.agentName+'</option>';
                        });

                        $('#selectAgent').append($groupOption);
                    }
                  
                }, error: function (reject) 
                {   
                }
            });
        });
  
    // End select gazLogs Agent by Ajax
    // Start show gazLogs By Ajax 

        $(document).on('click', '#btnShowBatchReports', function (e) {
            e.preventDefault();
               var formData = new FormData($('#batchReportForm')[0]); 
             $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('batchReport.show')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) 
                {
                   console.log(data);
                   if (data.status == true) 
                   {
                        $('#fetchLestGazLogs').html("");
                        $.each(data.gazLogs, function (key , gazLogs)
                         {
                            $('#fetchLestGazLogs').prepend
                            (
                               '<tr class="animate-fadeInRight bg-white hover:scale-95 transform transition-all ease-in" >\
                                <td class="p-3 text-center">'+gazLogs.agent.agentName+'</td>\
                                <td class="p-3 text-center">'+gazLogs.station.staName+'</td>\
                                <td class="p-3 text-center">'+gazLogs.directorate.dirName+'</td>\
                                <td class="p-3 text-center">'+gazLogs.rigon.rigName+'</td>\
                                <td class="p-3 text-center">'+gazLogs.created_at+'</td>\
                                <td class="p-3 text-center">'+gazLogs.qty+'</td>\
                                </tr>'
                            );
                          }
                        );

                        $('#batchCount').text(data.batchCount);
                        $('#batchResult').text(data.batchResult);
                        $('#allowBookingCount').text(data.allowBookingCount);
                        $('#notallowBookingCount').text(data.notallowBookingCount);
                        $('#valueDateForm').val(data.dateForm);
                        $('#valueDateTo').val(data.dateTo);
                        $('#valueAgentId').val(data.agentId);
                   }
                  
                }, error: function (reject)
                {   
                }
            });
        })
    // End show gazLogs By Ajax 
    </script>
    @stop