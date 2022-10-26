@section('script')
<script>

    // Start fetch all citizen when Select Number Batch By Ajax 
         $(document).on('click','#numBatch', function (e)
          {
                e.preventDefault();
                 $('#search-dropdown').val('');
                var numBatch = window.numBatch.value;
              $.ajax(
                      {
                        type: 'get',
                        url: "{{route('citizencheckBooking.show')}}",
                        data: 
                        {
                            'numBatch' :numBatch, 
                        },
                        success: function (data)
                        {
                            console.log(data);

                            if (data.status == true)
                            {
                                $('#numberBatch').val(data.numBatch);
                                $('#fetchAllCitizenBooking').html("");
                                  $.each(data.logBookings,function (key , logBooking){
                                    $('#fetchAllCitizenBooking').append('<tr>\
                                    <td class="text-center p-4 whitespace-wrap">\
                                    <div class="text-sm text-gray-700">'+logBooking.id+'</div>\
                                    </td>\
                                    <td class="text-center p-4 whitespace-wrap">\
                                      <div class="text-sm text-gray-700">'+logBooking.citizen.citName+'</div>\
                                    </td>\
                                    <td class="text-center p-4 whitespace-wrap">\
                                      <div class="text-sm text-gray-700">'+logBooking.created_at+'</div>\
                                    </td>\
                                  </tr>');
                                });
                               
                            }
                        }
                        , error: function (reject)
                        {

                        }
                  }
            );
        }); 
    // End fetch all citizen when Select Number Batch By Ajax 
    // Start Search Citizen Agent By Ajax 

        $(document).on('keyup', '#search-dropdown', function(e) 
        {
            e.preventDefault();
            var formData = new FormData($('#citizenSearch')[0]);
            $.ajax({
                        type: 'Post',
                        enctype: 'multipart/form-data',
                        url: "{{ route('citizen.search') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) 
                        {
                            console.log(data); // for Test
                            if (data.status == true) 
                            {
                              $('#fetchAllCitizenBooking').html("");
                                  $.each(data.resultSearch,function (key , logBooking){
                                    $('#fetchAllCitizenBooking').append('<tr>\
                                    <td class="text-center p-4 whitespace-wrap">\
                                    <div class="text-sm text-gray-700">'+logBooking.id+'</div>\
                                    </td>\
                                    <td class="text-center p-4 whitespace-wrap">\
                                      <div class="text-sm text-gray-700">'+logBooking.citizen.citName+'</div>\
                                    </td>\
                                    <td class="text-center p-4 whitespace-wrap">\
                                      <div class="text-sm text-gray-700">'+logBooking.created_at+'</div>\
                                    </td>\
                                  </tr>');
                                });
                            }     
                        },
                error: function(reject) 
                {
                    console.log(data);
                }
            });
        });

  // End Search Citizen By Ajax
</script>
@stop