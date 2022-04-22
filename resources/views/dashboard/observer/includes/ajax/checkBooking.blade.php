@section('script')
<script>
    
    // Start   By Ajax 
        $(document).on('click', '.gazLogId', function (e) {
            e.preventDefault();
              var gazLogId = $(this).attr('gazLogId');
            $.ajax({
                type: 'get',
                url: "{{route('checkBooking.show')}}",
                data: {
                     'gazLogId' :gazLogId, 
                     },
                success: function (data) {
                //  console.log(data);
                     if (data.status == true) {
                      $('#showLogBookingsCitizen').html("");
                      $.each(data.showLogBookingsCitizen,function (key , BookingCitizen){
                        $('#showLogBookingsCitizen').append('<tr>\
                          <td class="text-center px-4 py-2 whitespace-nowrap">\
                          <div class="text-sm text-gray-700">'+BookingCitizen.citizen.citizen_name+'</div>\
                          </td>\
                        <td class="text-center px-4 py-2 whitespace-nowrap">\
                          <input type="checkbox" name="status_booking" logBookingId='+BookingCitizen.id+'  class="confirm">\
                        </td>\
                        <td class="text-center px-4 py-2 whitespace-nowrap">\
                          <input type="checkbox"  class="sms">\
                        </td>\
                      </tr>');
                      });
                    }
                    
                }, error: function (reject) {

                }
            });
        });

   
    // End  By Ajax 
    // Start  By Ajax 
         $(document).on('change','.confirm', function (e) {
            e.preventDefault();
              var logBookingId = $(this).attr('logBookingId');
            $.ajax({
                type: 'post',
                url: "{{route('checkBooking.update')}}",
                 data: {
                     'logBookingId' :logBookingId, 
                },
                success: function (data) {
                     // console.log(data);
                     if (data.status == true) {
                       window.saveReciving.style.color='yellow';
                       // صلوحي شغلك شكل اعمل الدي تشتي
                    }
                    
                }, error: function (reject) {

                }
            });
        }); 

   
    // End  By Ajax 
</script>
@stop