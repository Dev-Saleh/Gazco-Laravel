@section('script')
<script>

    // Start fetch all citizen when Select Number Batch By Ajax 
         $(document).on('click','#NumBatch', function (e) {
            e.preventDefault();
              var NumBatch = window.NumBatch.value;
            $.ajax({
                type: 'get',
                url: "{{route('citizencheckBooking.show')}}",
                 data: {
                     'NumBatch' :NumBatch, 
                },
                success: function (data) {
                      console.log(data);
                     if (data.status == true) {
                      $('#fetchAllCitizenBooking').html("");
                      $.each(data.logBookings,function (key , citizen){
                        $('#fetchAllCitizenBooking').append('<tr>\
                        <td class="text-center p-4 whitespace-nowrap">\
                         <div class="text-sm text-gray-700">'+citizen.NumBatch+'</div>\
                        </td>\
                        <td class="text-center p-4 whitespace-nowrap">\
                          <div class="text-sm text-gray-700">'+citizen.citizen.citizen_name+'</div>\
                        </td>\
                         <td class="text-center p-4 whitespace-nowrap">\
                          <div class="text-sm text-gray-700">'+citizen.created_at+'</div>\
                        </td>\
                      </tr>');
                    });
                    }
                }, error: function (reject) {

                }
            });
        }); 
    // End fetch all citizen when Select Number Batch By Ajax 
</script>
@stop