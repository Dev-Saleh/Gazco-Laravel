@section('script')
<script>
 // Start Update myProfile By Ajax 


        $(document).on('click', '#btnUpdateMyProfile', function(e) {
            e.preventDefault();
            var formData = new FormData($('#FormUpdateMyProfile')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{ route('myProfile.update') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data)
                {
                    console.log(data);
                    if (data.status == true) 
                    {
                        alert(data.msg, 'success');
                    }
                },
                error: function(reject) 
                {
                   
                   
                });

        });
   // End Update myProfile By Ajax
</script>
@stop