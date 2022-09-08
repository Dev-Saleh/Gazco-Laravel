@section('script')
    <script>
        // ########################## ( Agents SECTION ) ##############################

        
        // Start Add Agent By Ajax 

        $(document).on('click', '#updateProfile', function(e) {
            e.preventDefault();
            var formData = new FormData($('#profileForm')[0]);
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{ route('profile.update') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                  console.log(data);

                    if (data.status == true) {
                      // انواع ال  type
                      // alertSuccess
                      // alertWarning
                      // alertError
                        newAlert(data.alertType, data.msg);
                       // $('#profilePhoto').css('display', 'none');
                        $('#numDaysBookingValid').val('');
                        $('#nameMessage').val('');
                        $('#contentMessage').val('');
                       
                    }

                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });

        // End Add Agent By Ajax 
 </script>
@stop
