@section('script')
<script>
 // Start load home By Ajax 
         
 
        $(document).ready(function () {

            $.ajax({
                type: 'get',
                url:"{{route('Main.show')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'citizenId' :'1', 
                },
                success: function (data) {
                  console.log(data);
                      if (data.status == true && data.allowBooking=='1' && data.qtyRemaining > '0' && data.numdays==='allowBooking') { 
                              
                               document.getElementById('status_msg').classList.replace('bg-gray-200','bg-green-200');
                               document.getElementById('status_msg').classList.replace('border-gray-600','border-green-600');
                               document.getElementById('status_msg').classList.replace('text-gray-900','text-green-900');
                               $('#status_msg').text('مصرح لك بالحجز');
                               
                               $('.NumBatch').text(data.gaz_log.id);
                               $('.NumBatch').val(data.gaz_log.id);
                    }
                    else
                     {
                         document.getElementById('status_msg').classList.replace('bg-gray-200','bg-red-200');
                               document.getElementById('status_msg').classList.replace('border-gray-600','border-red-600');
                               document.getElementById('status_msg').classList.replace('text-gray-900','text-red-900');
                               $('#status_msg').text('انت محظور يا حلو');
                     } 
                 
                }, error: function (reject) {

                }
            });
        });
      
 

    // End load home By Ajax 
      // Start Add citizen By Ajax 
    
        $(document).on('click', '#saveBooking', function (e) {
            e.preventDefault();
            var formData = new FormData($('#logBookings')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('logBookings.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                    alert(data.msg,'success');
                    $('#saveBooking').attr('disabled');
                   

                    } 
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add citizen By Ajax 
</script>
@stop