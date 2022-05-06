@section('script')
<script>
     $(document).on('click', '#sendTestMessage', function(e) 
     {
       
        e.preventDefault();
        var checkboxesAll = document.querySelectorAll(".sms");
         const mobilesCitizen = [];
            checkboxesAll.forEach(function(checkbox)
             {
                  if( checkbox.checked == true )
                  {
                    let text = checkbox.getAttribute("mobilenum");    
                        mobilesCitizen.push(text)
                  }
              });
             console.log(mobilesCitizen);

         $.ajax(
           {
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('sendSms')}}",
                data: mobilesCitizen,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) 
                {
                    console.log(data);
                    if (data.status == true)
                   {
                    
                    
                    } 
                  
                }
                , error: function (reject) 
                {
                }
            });
        });            

    // Start   By Ajax 
        $(document).on('click', '.gazLogId', function (e) 
        {
              e.preventDefault();
              var gazLogId = $(this).attr('gazLogId');
            $.ajax(
                   {
                        type: 'get',
                        url: "{{route('checkBooking.show')}}",
                        data: 
                        {
                            'gazLogId' :gazLogId, 
                        },
                        success: function (data) 
                        {
                          console.log(data);
                            if (data.status == true)
                             {
                                $('#showLogBookingsCitizen').html("");
                                $.each(data.showLogBookingsCitizen,function (key , BookingCitizen)
                                {   if(BookingCitizen.statusBooking=='1')
                                    {
                                        $('#showLogBookingsCitizen').append('<tr class="offerRow'+BookingCitizen.id+'">\
                                              <td class="text-center px-4 py-2 whitespace-nowrap">\
                                              <div class="text-sm text-gray-700">'+BookingCitizen.citizen.citName+'</div>\
                                              </td>\
                                            <td class="text-center px-4 py-2 whitespace-nowrap">\
                                              <input id="confirmSB"  disabled checked type="checkbox" name="statusbooking" logBookingId='+BookingCitizen.id+'  >\
                                            </td>\
                                            <td class="text-center px-4 py-2 whitespace-nowrap">\
                                              <input class="sms" type="checkbox"  mobileNum='+BookingCitizen.citizen.mobileNum+'  >\
                                            </td>\
                                           </tr>');
                                    }
                                    else
                                    {
                                            $('#showLogBookingsCitizen').append('<tr class="offerRow'+BookingCitizen.id+'">\
                                              <td class="text-center px-4 py-2 whitespace-nowrap">\
                                              <div class="text-sm text-gray-700">'+BookingCitizen.citizen.citName+'</div>\
                                              </td>\
                                            <td class="text-center px-4 py-2 whitespace-nowrap">\
                                              <input id="confirm" type="checkbox" name="statusbooking" logBookingId='+BookingCitizen.id+'  >\
                                            </td>\
                                            <td class="text-center px-4 py-2 whitespace-nowrap">\
                                              <input class="sms" type="checkbox"  mobileNum='+BookingCitizen.citizen.mobileNum+'  >\
                                            </td>\
                                           </tr>');
                                     }
                                });
                            
                        }
                        }
                        , error: function (reject)
                        {

                        }
                   }
                );
        }
      );

    // End  By Ajax 
    $(document).on('click', '#saveReciving', function(e) 
     {
       
          e.preventDefault();
          var checkboxesAll = document.querySelectorAll("#confirm");
          const BookingsCitizens = [];
          checkboxesAll.forEach(function(checkbox)
              {
                    if( checkbox.checked == true )
                    {
                      let text = checkbox.getAttribute("logBookingId");    
                          BookingsCitizens.push(text)
                    }
               }); 
             if(BookingsCitizens.length)
               {
                      $.ajax(
                        {
                              type: 'POST',
                              url: "{{route('checkBooking.update')}}",
                              data:
                              {
                                      'logBookingId':BookingsCitizens 
                              },
                              success: function (data) 
                              {
                                  console.log(data); //for Test
                                  if (data.status == true && data.logBookingsId.length)
                                  {      
                                        $.each(data.logBookingsId,function (key , BookingCitizen)
                                          {
                                                $('.offerRow' + BookingCitizen.id).remove();
                                                $('#showLogBookingsCitizen').append('<tr  class="offerRow'+BookingCitizen.id+'">\
                                                  <td class="text-center px-4 py-2 whitespace-nowrap">\
                                                  <div class="text-sm text-gray-700">'+BookingCitizen.citizen.citName+'</div>\
                                                  </td>\
                                                <td class="text-center px-4 py-2 whitespace-nowrap">\
                                                  <input id="confirmSB" disabled checked type="checkbox" name="statusbooking" logBookingId='+BookingCitizen.id+'  >\
                                                </td>\
                                                <td class="text-center px-4 py-2 whitespace-nowrap">\
                                                  <input class="sms" type="checkbox"  mobileNum='+BookingCitizen.citizen.mobileNum+'  >\
                                                </td>\
                                              </tr>'); 
                                              
                                          });
                                  } 
                }
                , error: function (reject) 
                {
                }
            });
           }
        });            
     
   
    // End  By Ajax 
</script>
@stop