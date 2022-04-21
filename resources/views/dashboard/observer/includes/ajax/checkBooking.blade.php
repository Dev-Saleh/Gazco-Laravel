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
                      <input type="checkbox"  class="confirm">\
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
        {{-- $(document).on('onchange', '#status_booking', function (e) {
            e.preventDefault();
              var gazLogId = $(this).attr('gazLogId');
            $.ajax({
                type: 'get',
                url: "{{route('checkBooking.show')}}",
                data: {
                     'gazLogId' :gazLogId, 
                     },
                success: function (data) {
                
                     if (data.status == true) {
                      $('#showLogBookingsCitizen').html("");
                      $.each(data.showLogBookingsCitizen,function (key , BookingCitizen){
                         
                        $('#showLogBookingsCitizen').append('<tr>\
                      <td class="text-center px-4 py-2 whitespace-nowrap">\
                      <div class="text-sm text-gray-700">'+BookingCitizen.citizen.citizen_name+'</div>\
                      </td>\
                    <td class="text-center px-4 py-2 whitespace-nowrap">\
                      <input type="checkbox"  class="confirm">\
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
        }); --}}

   
    // End  By Ajax 
</script>
@stop