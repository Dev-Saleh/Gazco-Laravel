@section('script')
<script>

 // ########################## ( Employees SECTION ) ##############################

   
    // Start fetch All Employees  
      function fetchEmployees()
        {
            $.ajax({
                    type: 'get',
                    url: "{{route('employee.show')}}",
                    dataType:"json",

                  success: function (data) 
                  {    
                      console.log(data.lastemp) ; 
                    
                            $('#fetchEmployees').prepend('<tr  class="offerRow'+data.lastemp.id+' bg-white hover:scale-95 transform transition-all ease-in">\
                              <td class="p-3 text-center">'+data.lastemp.id+'</td>\
                              <td class="p-3 text-center">'+data.lastemp.empUserName+'</td>\
                              <td class="p-3 text-right">\
                                <img class="rounded-full h-12 w-12  object-cover" src='+data.lastemp.empPhoto['valsrc']+' alt="unsplash image">\
                              </td>\
                              <td class="p-3 text-center whitespace-nowrap">\
                                <span class="bg-green-400 text-gray-50 rounded-md px-2">'+data.lastemp.empRole+'</span>\
                              </td>\
                              <td class="p-5 flex space-x-2">\
                                <a href="#"  empId="'+data.lastemp.id+'"  class="employeeDelete  text-red-400  hover:text-red-600 float-left ">\
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                  </svg>\
                                </a>\
                                <a href="#" empId="'+data.lastemp.id+'"   class="employeeEdit text-yellow-400 hover:text-yellow-600  mx-2">\
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                  </svg>\
                                </a>\
                              </td>\
                            </tr>'); 
                      
                  } 
                });
        }

    // End fetch All Employees 
    // Start Add Employees By Ajax 
    
        $(document).on('click', '#saveEmployee', function (e) {
            e.preventDefault();
            var formData = new FormData($('#empForm')[0]);       
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('employee.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                  console.log(data);
                     if (data.status == true) {
                       alert(data.msg,'success')
                       $('#file-ip-1').val('');
                        $('#empUserName').val('');
                        $('#empFullName').val('');
                        $('#empPassword').val('');
                         fetchEmployees();
                    } 
               
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                  
                }
            });
        });

    // End Add Employees By Ajax 
    // Start Deleteing Employees By Ajax 
        $(document).on('click', '.employeeDelete', function (e) {
            e.preventDefault();
              var empId = $(this).attr('empId');
            $.ajax({
                type: 'delete',
                url: "{{route('employee.destroy')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'empId' :empId, 
                },
                success: function (data) {
                  console.log(data);
                     if (data.status == true) {
                      alert(data.msg,'success');
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });

   
    // End Deleting Employees By Ajax 
    // Start edit Employees By Ajax 
       
 
        $(document).on('click', '.employeeEdit', function (e) {
            e.preventDefault();
              var empId = $(this).attr('empId');
            $.ajax({
                type: 'get',
                url:"{{route('employee.edit')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                     'empId' :empId, 
                },
                success: function (data) {
                 console.log(data);
                     if (data.status == true) {
                       
                        var preview = document.getElementById("file-ip-1-preview");
                        preview.style.display = "block";
                        $('#file-ip-1-preview').attr('src',data.empPhoto);  
                        $('#empId').val(data.emp.id); 
                        $('#empFullName').val(data.emp.empFullName);
                        $('#empUserName').val(data.emp.empUserName);
                        $('#empPassword').val(data.emp.empPassword);
                        $('#empRole').val(data.emp.empRole);
                        window.saveEmployee.style.display="none";
                        window.updateEmployee.style.display="inline-flex"; 
                    }
                 
                }, error: function (reject) {

                }
            });
        });
 

    // End edit Employees By Ajax 
    // Start Update Employees By Ajax 
 

        $(document).on('click', '#updateEmployee', function (e) {
            e.preventDefault();
              var formData = new FormData($('#empForm')[0]); 
              
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('employee.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                console.log(data);
                    if(data.status == true){
                      alert(data.msg,'success');
                        window.saveEmployee.style.display="inline-flex";
                        window.updateEmployee.style.display="none";
                         $('.offerRow' + data.empId).remove(); // حدفل السجل الدي قبل التعديل
                         fetchEmployees();
                    }
                }, error: function (reject) {
                     var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    }); 
                }
                });
            
        });
      



    // End Update Employees By Ajax
  
</script>
@stop