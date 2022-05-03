@section('script')
<script>
 // Start load home By Ajax 
         
 
        $(document).ready(function () {

            $.ajax(
                {
                    type: 'get',
                    url:"{{route('Main.show')}}",
                    data: 
                        {
                            'citId' :{{ session()->get('idCitizen') }}, 
                        },
                    success: function (data) 
                    {
                    console.log(data);
                        if (data.status == true ) 
                        {  
                                // في خطأ بالالوان
                                $('.saveBooking').removeAttr("disabled");
                                document.getElementById('status_msg').classList.replace('bg-transparent','bg-green-200');
                                document.getElementById('status_msg').classList.replace('border-transparent','border-green-600');
                                document.getElementById('status_msg').classList.replace('text-gray-900','text-green-900');
                                $('#status_msg').text('مصرح لك بالحجز');          
                                $('.numBatch').text(data.lastGazLogs.id); //???????
                                $('#numBatch').val(data.lastGazLogs.id);
                                $('.qtyRemaining').text(data.lastGazLogs.qtyRemaining);
                        }
                        else
                        {
                                window.saveBooking.setAttribute('disabled','disabled');
                                document.getElementById('status_msg').classList.replace('bg-transparent','bg-red-200');
                                document.getElementById('status_msg').classList.replace('border-transparent','border-red-600');
                                document.getElementById('status_msg').classList.replace('text-gray-900','text-red-900');
                                    $('#status_msg').text('انت محظور يا حلو');
                                    //$('numBatch').text(data.lastGazLogs.id);
                                    //$('.qtyRemaining').text(data.lastGazLogs.qtyRemaining);
                        } 
                    
                    }, error: function (reject) {

                    }
               }
            );
        });
      
 

    // End load home By Ajax 
      // Start Add citizen By Ajax 
    
        $(document).on('click', '#saveBooking', function (e)
         {
            e.preventDefault();
            window.saveBooking.setAttribute('disabled','disabled');
            var formData = new FormData($('#logBookings')[0]);

            $.ajax(
                {
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    url: "{{route('logBookings.store')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) 
                    {
                        console.log(data);
                        if (data.status == true)
                        {
                           // alert(data.msg,'success');
                            $('.qtyRemaining').text(data.lastGazLogs.qtyRemaining);
                        } 
                    
                    }
                    , error: function (reject)
                     {
                        var response = $.parseJSON(reject.responseText);
                        $.each(response.errors, function (key, val) {
                            $("#" + key + "_error").text(val[0]);
                        }); 
                     }
                }
            );
        });

    // End Add citizen By Ajax 
</script>
@stop