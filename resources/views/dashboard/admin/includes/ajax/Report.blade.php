@section('script')
<script>

 // ########################## ( Agents SECTION ) ##############################
 // Start fetch All Agent  
     
    // Start select gazLogs Rigon by Ajax 
 
        $(document).on('click', '#selectDirectorates', function (e) {
            e.preventDefault();
            var dirId= window.selectDirectorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('reports.showRigons')}}",
              data: {
                     'dirId' :dirId, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#selectRigons').html("");
                        $.each(data.rigons, function (key , rigon) {
                        $('#selectRigons').append('<li value='+rigon.id+' class=" p-2  hover:bg-purple-200"><div class=""><p>'+rigon.rigName+'</p></div></li>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gazLogs Rigon by Ajax 
    // Start select gazLogs Agent by Ajax 
 
        $(document).on('click', '#select_Rigons', function (e) {
            e.preventDefault();
            var rigId= window.select_Rigons.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{route('gazLogs.showAgents')}}",
              data: {
                     'rigId' :rigId, 
                    },
                success: function (data) {
                  console.log(data);
                   if (data.status == true) {
                       $('#select_Agents').html("");
                        $.each(data.agents, function (key , agent) {
                        $('#select_Agents').append('<option value='+agent.id+'>'+agent.agentName+'</option>');
                        });
                    }
                  
                }, error: function (reject) {
                   
                }
            });
        });
  
    // End select gazLogs Agent by Ajax
    
    </script>
    @stop