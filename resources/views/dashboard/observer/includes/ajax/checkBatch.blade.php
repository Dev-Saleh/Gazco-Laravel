
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
                       $('.qtyRemaining').text(data.gazLog.qtyRemaining);
                 
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
             $('#spinner').toggleClass('hidden', 'flex');
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
                             console.log(data);// for Test
                            if (data.status == true) 
                            {     
                                sleep(3000).then(() => {
                                $('#spinner').toggleClass('hidden', 'flex'); 
                                newAlert(data.alertType,data.msg); 
                                });   
                               
                                    $('.offerRow'+data.gazLogId).remove();
                                    $('#lastBatchOpenBooking').prepend('<tr class="offerRow'+data.lastBatchOpenBooking.id+' bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                                    <td class="p-3 text-center">'+data.lastBatchOpenBooking.id+'</td>\
                                    <td class="p-3 text-center">'+data.lastBatchOpenBooking.created_at+'</td>\
                                    <td class="p-3 text-center">\
                                    <span class="bg-green-400 text-gray-50 rounded-md px-2">'+data.getStatusBatch+'</span>\
                                    </td>\
                                    <td class="p-3 grid items-center justify-center">\
                                    <a href="#" checkBatchId='+data.lastBatchOpenBooking.id+' class="checkBatchShow text-blue-600 hover:text-blue-400">\
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />\
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />\
                                        </svg>\
                                    </a>\
                                    </td>\
                                </tr>');
                            }
                            else if (data.status == false) {
                                sleep(3000).then(() => {$('#spinner').toggleClass('hidden', 'flex'); 
                                newAlert(data.alertType,data.msg); 
                        });
                                
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