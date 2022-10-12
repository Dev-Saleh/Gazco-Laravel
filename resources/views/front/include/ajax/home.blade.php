@section('script')
<script>
 // Start load home By Ajax 
         
 
        $(document).ready(asd());
            
        function  asd () {

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
                        if (data.msg == '1' ) 
                        {  
                                // في خطأ بالالوان
                                $('.saveBooking').removeAttr("disabled");
                                document.getElementById('status_msg').classList.add('bg-green-200');
                                document.getElementById('status_msg').classList.add('border-green-600');
                                document.getElementById('status_msg').classList.add('text-green-900');
                                document.getElementById('gazImg').classList.add('animate-wiggle');
                                $('#status_msg').text('مصرح لك بالحجز');                                 
                                $('.numBatch').text(data.lastGazLogs.id); 
                                $('#numBatch').val(data.lastGazLogs.id);
                                $('.qtyRemaining').text(data.lastGazLogs.qtyRemaining);
                                $('#validDays').text(data.validDays);
                               
                        }
                        else if(data.msg == '2')
                        {
                                window.saveBooking.setAttribute('disabled','disabled');
                                document.getElementById('status_msg').classList.add('bg-red-200');
                                document.getElementById('status_msg').classList.add('border-red-600');
                                document.getElementById('status_msg').classList.add('text-red-900');
                                $('#status_msg').text('لقد تم ايقافك مؤقتاً');
                                $('#validDays').text(data.validDays);
                               

                        }
                        else if(data.msg == '3')
                        {
                                // في خطأ بالالوان
                                window.saveBooking.setAttribute('disabled','disabled');
                                document.getElementById('status_msg').classList.add('bg-gray-200');
                                document.getElementById('status_msg').classList.add('border-gray-600');
                                document.getElementById('status_msg').classList.add('text-gray-900');
                                $('#status_msg').text('لايوجد كمية مفتوحة الحجز');
                                $('#validDays').text(data.validDays);
                        }
                    
                    }, error: function (reject) {

                    }
               }
            );
        }
      
 

    // End load home By Ajax 
      // Start Add citizen By Ajax 
    
        $(document).on('click', '#saveBooking', function (e)
         {
            e.preventDefault();
            window.saveBooking.setAttribute('disabled','disabled');
            var formData = new FormData($('#logBookings')[0]);
            console.log('data');
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
                            newAlert(data.alertType,data.msg);
                            asd();
                            
                        } 
                        if (data.status == false)
                        {
                            newAlert(data.alertType,data.msg);
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