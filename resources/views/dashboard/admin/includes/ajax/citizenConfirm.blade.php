@section('script')
<script>

 // ########################## ( citizenConfirm SECTION ) ##############################
 
    // Start Deleteing citizenConfirm By Ajax 
        $(document).on('click', '.citizenConfirmDelete', function (e) 
        {
              e.preventDefault();
              var citId = $(this).attr('citId');

            $.ajax({
                type: 'delete',
                url: "{{route('citizenConfirm.destroy')}}",
                data: 
                {
                     'citId' :citId, 
                },
                success: function (data) 
                {
                   console.log(data); //for Test

                  if (data.status == true)
                    {
                     // alert.show(data.msg,'success');
                    }

                   $('.offerRow'+data.citId).remove();
                }, error: function (reject) 
                {

                }
            });
        });

   
    // End Deleting citizenConfirm By Ajax 
   // Start show citizenConfirm By Ajax 
       
 
        $(document).on('click', '.citizenConfirmShow', function (e) 
        {
             e.preventDefault();
             var citId = $(this).attr('citId');

            $.ajax({
                type: 'get',
                url:"{{route('citizenConfirm.show')}}",
                data:
                 {
                     'citId' :citId, 
                 },
                success: function (data) 
                {
                     console.log(data); //for Test
               
                     if (data.status == true) 
                     {
                         
                       $('#attachment').attr('src', data.citizen.attachment['valsrc']);
                       $('.citName').text(data.citizen.citName);
                       $('.identityNum').text(data.citizen.identityNum);
                       $('#citId').text(data.citizen.id);
                       $('.obsName').text(data.citizen.observer.obsName);
                       $('.dateAdd').text(data.citizen.created_at);
                       $('.dirName').text(data.citizen.directorate.dirName);
                       $('.rigName').text(data.citizen.rigon.rigName);
                       $('.agentName').text(data.citizen.observer.agent.agentName);

                     
                    }
                }, error: function (reject) 
                {

                }
            });
        });
 

  // End show citizenConfirm By Ajax 
   // Start update citizenConfirm By Ajax 
       
 
        $(document).on('change', '#checkbox', function (e)
         {
            
             e.preventDefault();
             var citId =  $('#citId').text();
             var checkbox= window.checkbox.checked;

            $.ajax({
                type: 'post',
                url:"{{route('citizenConfirm.update')}}",
                data: 
                {
                     'citId' :citId, 
                     'checkbox'  :checkbox,
                },
                success: function (data) 
                {
                     console.log(data);
               
                     if (data.status == true) 
                     {
                         alert(data.msg,'success');
                         $('.offerRow'+data.citId).remove();
                     
                     }
                }, error: function (reject) 
                {

                }
            });
        });
 

  // End update citizenConfirm By Ajax 
   
   
</script>
@stop