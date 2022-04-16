@section('script')
<script>

 // ########################## ( citizenConfirm SECTION ) ##############################
 
    // Start Deleteing citizenConfirm By Ajax 
        $(document).on('click', '.citizenConfirmDelete', function (e) {
            e.preventDefault();
              var citizenId = $(this).attr('citizenId');
            $.ajax({
                type: 'delete',
                url: "{{route('citizenConfirm.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'citizenId' :citizenId, 
                },
                success: function (data) {
                  console.log(data);
                     if (data.status == true) {
                     // alert.show(data.msg,'success');
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });

   
    // End Deleting citizenConfirm By Ajax 
    // Start edit citizenConfirm By Ajax 
       
 
        $(document).on('click', '.citizenConfirmEdit', function (e) {
            e.preventDefault();
             var citizenId = $(this).attr('citizenId');
            $.ajax({
                type: 'get',
                url:"{{route('citizenConfirm.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'citizenId' :citizenId, 
                },
                success: function (data) {
                 console.log(data);
               
                     if (data.status == true) {
                     
                       $('.citizen_name').text(data.citizen.citizen_name);
                       $('.observer_name').text(data.citizen.observer.observer_name);
                       $('.created_at').text(data.citizen.created_at);
                       $('.directorate_name').text(data.citizen.directorate.directorate_name);
                       $('.rigon_name').text(data.citizen.rigon.rigon_name);
                       $('.Agent_name').text(data.citizen.observer.agent.Agent_name);
                     
                  }
                }, error: function (reject) {

                }
            });
        });
 

  // End edit citizenConfirm By Ajax 
   // Start show citizenConfirm By Ajax 
       
 
        $(document).on('click', '.citizenConfirmShow', function (e) {
            e.preventDefault();
             var citizenId = $(this).attr('citizenId');
            $.ajax({
                type: 'get',
                url:"{{route('citizenConfirm.show')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'citizenId' :citizenId, 
                },
                success: function (data) {
                 console.log(data);
               
                     if (data.status == true) {
                     
                       $('.citizen_name').text(data.citizen.citizen_name);
                       $('.observer_name').text(data.citizen.observer.observer_name);
                       $('.created_at').text(data.citizen.created_at);
                       $('.directorate_name').text(data.citizen.directorate.directorate_name);
                       $('.rigon_name').text(data.citizen.rigon.rigon_name);
                       $('.Agent_name').text(data.citizen.observer.agent.Agent_name);
                     
                  }
                }, error: function (reject) {

                }
            });
        });
 

  // End show citizenConfirm By Ajax 
   
   
</script>
@stop