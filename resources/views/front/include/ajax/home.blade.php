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
                                $('#status_msg_title').text('مصرح لك بالحجز');                                 
                                $('.numBatch').text(data.lastGazLogs.id); 
                                $('#numBatch').val(data.lastGazLogs.id);
                                $('.qtyRemaining').text(data.lastGazLogs.qtyRemaining);
                                $('#validDays').text(data.validDays);
                               
                        }
                        else if(data.msg == '2')
                        {       

                                const countDownTimer = setInterval(() => {
                                const today = new Date().getTime();
                                const unblockday = new Date(data.unblockDate).getTime();

                                const diff = unblockday - today;
                                const diffDay =  Math.floor(diff / (1000 * 60 *60 * 24));
                                const diffHour = Math.floor((diff % (1000 * 60 *60 * 24)) / (1000 * 60 *60 ));
                                const diffMin =  Math.floor((diff % (1000 * 60 *60 )) / (1000 * 60));
                                const diffSec =   Math.floor((diff % (1000 * 60)) / 1000 );

                                $('#day').text(diffDay);
                                $('#hour').text(diffHour);
                                $('#min').text(diffMin);
                                $('#sec').text(diffSec);
                                console.log(diffSec); 
                                }, 1000);
                              

                                window.saveBooking.setAttribute('disabled','disabled');
                                document.getElementById('status_msg').classList.add('bg-red-200');
                                document.getElementById('status_msg').classList.add('border-red-600');
                                document.getElementById('status_msg').classList.add('text-red-900');
                                $('#status_msg_title').text('تم إيقافك عن الحجز لمدة');
                                // $('#status_msg_unblockDate').text(data.unblockDate);
                                document.getElementById('status_msg_unblockDate').classList.replace('hidden','flex');
                                $('#validDays').text(data.validDays);
                                
                               

                        }
                        else if(data.msg == '3')
                        {
                                // في خطأ بالالوان
                                window.saveBooking.setAttribute('disabled','disabled');
                                document.getElementById('status_msg').classList.add('bg-gray-200');
                                document.getElementById('status_msg').classList.add('border-gray-600');
                                document.getElementById('status_msg').classList.add('text-gray-900');
                                $('#status_msg_title').text('لايوجد كمية مفتوحة الحجز');
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
           const spineer = '<div><img id="spinner" class="" src="{{ asset('assets/images/loading1.svg') }}"alt=""></div>';
                            $('#gazImg').toggleClass('hidden', 'flex');             
                            $('#spinner').toggleClass('hidden', 'flex');             
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
                            $('#spinner').toggleClass('hidden', 'flex');  
                            $('#gazImg').toggleClass('hidden', 'flex');             
                        console.log(data);
                        if (data.status == true)
                        {    window.saveBooking.setAttribute('disabled','disabled');
                            newAlert(data.alertType,data.msg);
                            asd();
                            
                        } 
                        else if (data.status == false)
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