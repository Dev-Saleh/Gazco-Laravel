
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
                data: {
                    '_token': "{{csrf_token()}}",
                     'checkBatchId' :checkBatchId, 
                },
                success: function (data) {
                 console.log(data);
               
                     if (data.status == true) {
                       $('.agentName').text(data.gaz_Log.agent.Agent_name);
                       $('.createdAt').text(data.gaz_Log.created_at);
                       $('.gazLogId').text(data.gaz_Log.id);
                       $('.stationName').text(data.gaz_Log.station.Station_name);
                       $('.qty').text(data.gaz_Log.qty);
                       $('.validOfSellId').text(data.gaz_Log.id);  
                  }
                }, error: function (reject) {

                }
            });
        });
 

  // End show checkBatch By Ajax 
  // Start openAllowBooking checkBatch By Ajax 
       
 
        $(document).on('click', '.allowBooking', function (e) {
            e.preventDefault();
             var gazLogId =   $('.gazLogId').text();
             var observerId=  $('.observer_Id').val();        
            $.ajax({
                type: 'post',
                url:"{{route('checkBatch.allowBooking')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'gazLogId' :gazLogId, 
                     'observerId':observerId,
                },
                success: function (data) {
                 console.log(data);
                     if (data.status == true) {
                  }
                }, error: function (reject) {

                }
            });
        });
 

  // End openAllowBooking checkBatch By Ajax 
   
   
</script>
@stop