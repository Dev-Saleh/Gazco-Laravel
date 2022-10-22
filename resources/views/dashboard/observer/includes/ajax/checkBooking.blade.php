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
                   
         if(mobilesCitizen.length)
           {
              $.ajax
              ({
                      type: 'POST',
                      url: "{{route('sendSms')}}",
                      data:
                            {
                                 'mobilesCitizen':mobilesCitizen,
                                  // 'mobilesCitizen':['967730147461','967738776516']

                            },
                success: function (data) 
                      {
                          console.log(data);
                          if (data.status == true)
                          {
                            newAlert(data.alertType,data.msg);  
                          
                          } 
                         else if (data.status == false)
                          {
                            newAlert(data.alertType,data.msg);  
                          
                          } 
                        
                      }
                      , error: function (reject) 
                      {
                      }
              });
           }
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
                                $('#valueNumBatch').val(data.batchId);
                                $('#showLogBookingsCitizen').html("");
                                $.each(data.showLogBookingsCitizen,function (key , BookingCitizen)
                                {  
                                   
                                   if(BookingCitizen.statusBooking=='1')
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
    // Start Search Agent By Ajax 

        $(document).on('keyup', '#inputSearch', function(e) {
            e.preventDefault();
            var formData = new FormData($('#BatchSearchForm')[0]);
            $.ajax({
                type: 'Post',
                enctype: 'multipart/form-data',
                url: "{{ route('checkBooking.search') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                   console.log(data.resultSearch);
                    if (data.status == true)
                    {
                        $('#displayBatch').html("");
                        $.each(data.resultSearch, function (key , resultSearch) 
                        {
                              $('#displayBatch').prepend('<tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in">\
                                          <td class="p-3 text-center">'+resultSearch.id+'</td>\
                                          <td class="p-3 text-center">'+resultSearch.created_at+'</td>\
                                          <td class="p-3 grid items-center justify-center">\
                                              <a href="#" gazLogId='+resultSearch.id+' class="gazLogId text-blue-600 hover:text-blue-400">\
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />\
                                                      <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />\
                                                  </svg>\
                                              </a>\
                                          </td>\
                                      </tr>');
                         });
                    
                    }

                },
                error: function(reject) {
                    console.log(data);
                   
                }
            });
        });
   </script>
@stop