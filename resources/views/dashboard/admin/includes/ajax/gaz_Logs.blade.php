@section('script')
<script>

 // ########################## ( Agents SECTION ) ##############################

    // Start select gaz_Logs Rigon by Ajax 
 
        $(document).on('click', '#select_Directorates', function (e) {
            e.preventDefault();
            var directorate_Id= window.select_Directorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('gaz_Logs.show_Rigons')}}",
              data: {
                     'directorate_Id' :directorate_Id, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#select_Rigons').html("");
                        $.each(data.rigons, function (key , rigon) {
                        $('#select_Rigons').append('<option value='+rigon.id+'>'+rigon.rigon_name+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gaz_Logs Rigon by Ajax 
    // Start select gaz_Logs Agent by Ajax 
 
        $(document).on('click', '#select_Rigons', function (e) {
            e.preventDefault();
            var rigons_Id= window.select_Rigons.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('gaz_Logs.show_Agents')}}",
              data: {
                     'rigons_Id' :rigons_Id, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#select_Agents').html("");
                        $.each(data.agents, function (key , agent) {
                        $('#select_Agents').append('<option value='+agent.id+'>'+agent.Agent_name+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gaz_Logs Agent by Ajax
      // Start Add gaz_Logs By Ajax 

        $(document).on('click', '#save_Gaz_Logs', function (e) {
            e.preventDefault();
            var formData = new FormData($('#gaz_Logs_Form')[0]);        
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('gaz_Logs.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       alert.show(data.msg,'success');
                        $('#select_Stations').text('');
                        $('#qty').val('');
                        $('#created_at').val('');
                        $('#select_Directorates').text('');
                        $('#select_Rigons').text('');
                        $('#select_Agents').text(''); 
                        $('#notice').val('');
                       // fetchobserver(); 
                    }
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add gaz_Logs By Ajax 
     // Start Deleteing gaz_Logs By Ajax 

        $(document).on('click', '.gaz_Log_Delete', function (e) {
            e.preventDefault();
              var gaz_Log_Id = $(this).attr('gaz_Log_Id');
            $.ajax({
                type: 'delete',
                url: "{{route('gaz_Logs.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'gaz_Log_Id' :gaz_Log_Id, 
                },
                success: function (data) {
                     if (data.status == true) {
                     // alert.show(data.msg,'success');
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });

   
  // End Deleting gaz_Log sBy Ajax
  // Start edit gaz_Log By Ajax 
       
 
        $(document).on('click', '.gaz_Log_Edit', function (e) {
            e.preventDefault();
             var gaz_Log_Id = $(this).attr('gaz_Log_Id');
            $.ajax({
                type: 'get',
                url:"{{route('gaz_Logs.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'gaz_Log_Id' :gaz_Log_Id, 
                },
                success: function (data) {
                  console.log(data);
                     if (data.status == true) {
                       $('#gaz_Logs_Id').val(data.gaz_Log.id);
                       $('#select_Station').text(data.gaz_Log.station.Station_name);
                       $('#select_Stations').val(data.gaz_Log.stations_id);
                       $('#qty').val(data.gaz_Log.qty);
                       $('#created_at').text(data.gaz_Log.created_at);
                       $('#select_Directorate').text(data.gaz_Log.directorate.directorate_name);
                       $('#select_Directorate').val(data.gaz_Log.directorate_id);
                       $('#select_Rigon').text(data.gaz_Log.rigon.rigon_name);
                       $('#select_Agent').text(data.gaz_Log.agent.Agent_name);
                       $('#notice').val(data.gaz_Log.notice);
                        window.save_Gaz_Logs.style.display="none";
                        window.update_Gaz_Logs.style.display="inline-flex";  
                    }
                 
                }, error: function (reject) {

                }
            });
        });
 

// End edit gaz_Log By Ajax 
// Start Update Agent By Ajax 
 

        $(document).on('click', '#update_Gaz_Logs', function (e) {
            e.preventDefault();
               var formData = new FormData($('#gaz_Logs_Form')[0]);    
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('gaz_Logs.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                console.log(data);
                    if(data.status == true){
                       alert.show(data.msg,'success');
                       $('#gaz_Logs_Id').val('');
                       $('#select_Stations').text('');
                       $('#select_Stations').val('');
                       $('#qty').val('');
                       $('#created_at').text('');
                       $('#select_Directorates').text('');
                       $('#select_Directorate').val('');
                       $('#select_Rigons').text('');
                       $('#select_Agent').text('');
                       $('#notice').val('');
                        window.save_Gaz_Logs.style.display="inline-flex";
                        window.update_Gaz_Logs.style.display="none";
               
                        
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });
      



    // End Update Agent By Ajax

    </script>
    @stop