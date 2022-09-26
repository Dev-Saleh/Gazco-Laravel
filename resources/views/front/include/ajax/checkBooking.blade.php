@section('script')
<script>

    // Start fetch all citizen when Select Number Batch By Ajax 
         $(document).on('click','#numBatch', function (e)
          {
                e.preventDefault();
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
                                $('#fetchAllCitizenBooking').html("");
                                  $.each(data.logBookings,function (key , logBooking){
                                    $('#fetchAllCitizenBooking').append('<tr>\
                                    <td class="text-center p-4 whitespace-nowrap">\
                                    <div class="text-sm text-gray-700">'+logBooking.id+'</div>\
                                    </td>\
                                    <td class="text-center p-4 whitespace-nowrap">\
                                      <div class="text-sm text-gray-700">'+logBooking.citizen.citName+'</div>\
                                    </td>\
                                    <td class="text-center p-4 whitespace-nowrap">\
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
</script>
@stop