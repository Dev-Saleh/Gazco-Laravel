@section('script')
<script>

 // ########################## ( Agents SECTION ) ##############################
 // Start fetch All Agent  
     
    // Start select gazLogs Rigon by Ajax 
 
        $(document).on('click', '#selectDirectorates', function (e) {
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
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#selectRigon').html("");
                        $.each(data.rigons, function (key , rigon)
                        {
                          $('#selectRigon').append('<option value='+rigon.id+'>'+rigon.rigName+'</option>');
                        }
                        );
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gazLogs Rigon by Ajax 
    // Start select gazLogs Agent by Ajax 
 
        $(document).on('click', '#selectRigon', function (e) {
            e.preventDefault();
            var rigId= window.selectRigon.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('batchReports.showAgents')}}",
              data: {
                     'rigId' :rigId, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#selectAgent').html("");
                        $.each(data.agents, function (key , agent) {
                        $('#selectAgent').append('<option value='+agent.id+'>'+agent.agentName+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
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
                success: function (data) {
                  //console.log(data.gazLogs);
                   if (data.status == true) 
                   {
                        $('#fetchLestGazLogs').html("");
                        $.each(data.gazLogs, function (key , gazLogs)
                         {
                            $('#fetchLestGazLogs').prepend
                            (
                                '<tr><td><img src="/assest/Dev-SL.jpeg">\
                                <p>'+gazLogs.agent.agentName+'</p></td>\
                                <td>'+gazLogs.created_at+'</td>\
                                <td><span class="status completed">تم الاستلام</span></td>\
                                </tr>'
                            );
                          }
                        );

                        $('#batchCount').text(data.batchCount);
                        $('#batchResult').text(data.batchResult);
                        $('#allowBookingCount').text(data.allowBookingCount);
                        $('#valueDateForm').val(data.dateForm);
                        $('#valueDateTo').val(data.dateTo);
                   }
                  
                }, error: function (reject)
                {   
                }
            });
        })
    // End show gazLogs By Ajax 
    </script>
    @stop