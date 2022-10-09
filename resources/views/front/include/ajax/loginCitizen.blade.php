@section('script')
<script>
  $(document).on('click', '#loginCitizenBtn', function(e) 
    {
      e.preventDefault();
    var formData = new FormData($('#loginCitizenForm')[0]);
      $.ajax
      (
        {
              type: 'post',
              url: "{{ route('checkCitizen') }}",
              data: formData,                  
              processData: false,
              contentType: false,
              cache: false,
              success: function(data) 
              { 
                 if(data.status=='false')
                  newAlert(data.alertType,data.msg);
                  else if (data.status=='true')
                  

              },
              error: function(reject) 
              {

              }
        }
      );
    }
    );
</script>
 
@stop
