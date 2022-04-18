@section('script')
<script>


  // ########################## ( Station SECTION ) ##############################


  // Start fetch All Stations  
      function fetch_All_Stations()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('station.show_All')}}",
                    dataType:"json",

                    success: function (data) {     
                      console.log(data) ;
                    $('#fetch_All_Stations').html("");
                      $.each(data.stations, function (key , station) {
                        $('#fetch_All_Stations').append('<tr class="offerRow'+station.id+' bg-gray-100 hover:scale-95 transform transition-all ease-in">\
                                  <td class="p-3">'+station.id+'</td>\
                                  <td class="p-3 text-center">'+station.Station_name+'</td>\
                                  <td class="p-3 flex justify-evenly ">\
                                    <a href="#" station="'+station.id+'"  class="station_delete btn btn-danger" class="text-gray-400  hover:text-red-400  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                    <a href="#" station="'+station.id+'"  id="station_edit" class="text-gray-400 hover:text-yellow-100  ">\
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                      </svg>\
                                    </a>\
                                  </td>\
                                </tr>'); 
                       });
                    }
                });
        }

 // End fetch All Stations

    // Start Add Station By Ajax 
  
        $(document).on('click', '#save_station', function (e) {
            e.preventDefault();
            var formData = new FormData($('#stationForm')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('station.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                      alert(data.msg,'success')
                        $('#station_id').val('');
                        $('#station_name').val('');
                        fetch_All_Stations();
                    }
                  
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
            });
        });

    // End Add Station By Ajax 

    // Start Deleteing Station By Ajax 
  
        $(document).on('click', '.station_delete', function (e) {
            e.preventDefault();
              var station = $(this).attr('station');
            $.ajax({
                type: 'delete',
                url: "{{route('station.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :station, 
                },
                success: function (data) {
                     if (data.status == true) {
                      alert(data.msg,'success');
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });

    // End Deleting Station By Ajax 

    //  Start edit Station By Ajax 
       
 
        $(document).on('click', '#station_edit', function (e) {
            e.preventDefault();
              var station = $(this).attr('station');
            $.ajax({
                type: 'get',
                url:"{{route('station.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'id' :station, 
                },
                success: function (data) {
              
                     if (data.status == true) {
                        $('#station_id').val(data.station.id);
                        $('#station_name').val(data.station.Station_name);
                        window.save_station.style.display="none";
                        window.update_station.style.display="inline-flex";
                    }
                 
                }, error: function (reject) {

                }
            });
        });
  

    //  End edit Station By Ajax 

    //  Start Update Station By Ajax 
 

        $(document).on('click', '#update_station', function (e) {
            e.preventDefault();
              var formData = new FormData($('#stationForm')[0]); 
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('station.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    if(data.status == true){
                       alert(data.msg,'success');
                        $('#station_id').val('');
                        $('#station_name').val('');
                        window.save_station.style.display="inline-flex";
                        window.update_station.style.display="none";
                        fetch_All_Stations();
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });
      



    // End Update Station By Ajax 

</script>
@stop