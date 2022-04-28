@section('script')
<script>
     $(document).on('click', '#sendTestMessage', function(e) {
        e.preventDefault();

        var checkboxesAll = document.querySelectorAll(".sms");
         const mobilesCitizen = [];
            checkboxesAll.forEach(function(checkbox) {
              if( checkbox.checked == true ){
                 let text = checkbox.getAttribute("mobilenum");    
                    mobilesCitizen.push(text)}
                    });
                    console.log(mobilesCitizen);
         $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('sendSms')}}",
                data: mobilesCitizen,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                    
                    
                    } 
                  
                }, error: function (reject) {
                }
            });
        });            
              
  
    });

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
                          <input class="confirm" type="checkbox" name="status_booking" logBookingId='+BookingCitizen.id+'  >\
                        </td>\
                        <td class="text-center px-4 py-2 whitespace-nowrap">\
                          <input class="sms" type="checkbox"  mobileNum='+BookingCitizen.citizen.mobile_num+'  >\
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