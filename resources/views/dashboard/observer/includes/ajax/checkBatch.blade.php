
@section('script')
<script>

    // ########################## ( checkBatch SECTION ) ##############################

   
    // Start show checkBatch By Ajax 
       
 
        $(document).on('click', '.checkBatchShow', function (e) {
            e.preventDefault();
             var checkBatchId = $(this).attr('checkBatchId');
            $.ajax({
                type: 'get',
                url:"{{route('checkBatch.show')}}",
                data: 
                {
                     'checkBatchId' :checkBatchId, 
                },
                success: function (data) {
                 console.log(data);
               
                     if (data.status == true) {
                       $('.agentName').text(data.gazLog.agent.agentName);
                       $('.created_at').text(data.gazLog.created_at);
                       $('.gazLogId').text(data.gazLog.id);
                       $('.staName').text(data.gazLog.station.staName);
                       $('.qty').text(data.gazLog.qty);
                 
                  }
                }, error: function (reject) {

                }
            });
        });
 

  // End show checkBatch By Ajax 
  // Start openAllowBooking checkBatch By Ajax 
       
 
        $(document).on('click', '.allowBooking', function (e)
         {
             e.preventDefault();
             var gazLogId=$('.gazLogId').text();
             var obsId=$('.obsId').val();   

            $.ajax(
                    {
                        type: 'post',
                        url:"{{route('checkBatch.allowBooking')}}",
                        data: 
                        {
                            'gazLogId' :gazLogId, 
                            'obsId':obsId,
                        },
                        success: function (data) 
                        {
                             console.log(data);
                            if (data.status == true) 
                            {
                                    $('.offerRow'+data.gazLogId).remove();
                            }
                        }
                        , error: function (reject) 
                        {

                        }
                    }
                );
        });
 

  // End openAllowBooking checkBatch By Ajax 
   
   
</script>
@stop