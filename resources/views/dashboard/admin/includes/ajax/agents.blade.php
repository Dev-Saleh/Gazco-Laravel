@section('script')
    <script>
        // ########################## ( Agents SECTION ) ##############################

        // Start select rigon by Ajax 

        $(document).on('change', '#select_directorates', function(e) {
            e.preventDefault();
            var dirId = window.select_directorates.value;
            $.ajax({
                type: 'get',
                enctype: 'multipart/form-data',
                url: "{{ route('agent.Show_rigons') }}",
                data: {
                    'dirId': dirId,
                },
                success: function(data) {

                    if (data.status == true) {
                        $('#select_rigons').html("");
                        $.each(data.rigons, function(key, rigon) {
                            $('#select_rigons').append('<option value=' + rigon.id + '>' + rigon
                                .rigName + '</option>');
                        });
                    }

                },
                error: function(reject) {

                }
            });
        });

        // End select rigon by Ajax 
        // Start fetch last Agent  
        function fetchLastAgent($lastAgent, $Photo) {
            $('#fetchLastAgent').prepend('<tr class="offerRow' + $lastAgent.id + ' animate-fadeInRight bg-white hover:scale-95 transform transition-all ease-in">\
                                    <td class="p-3 text-center">' + $lastAgent.id + '</td>\
                                    <td class="p-3 text-center">' + $lastAgent.agentName + '</td>\
                                    <td class="p-3 text-right">\
                                      <img class="rounded-full h-12 w-12  object-cover" src=' + $Photo['valsrc'] + ' alt="unsplash image">\
                                    </td>\
                                    <td class="p-3 text-center">\
                                      <span class="bg-green-400 text-gray-50 rounded-md px-2">' + $lastAgent.directorate
                .dirName + '</span>\
                                    </td>\
                                    <td class="p-3 grid grid-cols-2 justify-center">\
                                      <a href="#"  agentId="' + $lastAgent.id + '"  class="agentDelete text-red-400 hover:text-red-600 float-left ">\
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                        </svg>\
                                      </a>\
                                      <a href="#" agentId="' + $lastAgent.id + '"  class="agentEdit text-yellow-400 hover:text-yellow-600 mx-2">\
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                        </svg>\
                                      </a>\
                                    </td>\
                                  </tr>');

        }

        // End fetch last Agent 
        // Start Add Agent By Ajax 

        $(document).on('click', '#saveAgent', function(e) {
            e.preventDefault();
            var formData = new FormData($('#agentForm')[0]);
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{ route('agent.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {


                    if (data.status == true) {
                      // انواع ال  type
                      // alertSuccess
                      // alertWarning
                      // alertError
                        newAlert(data.alertType, data.msg);

                        fetchLastAgent(data.lastAgent, data.Photo);

                        $('#file-ip-1-preview').css('display', 'none');
                        $('#select_directorates').val('');
                        $('#select_rigons').val('');
                        $('#agentName').val('');
                        //alertt(data.msg, 'success');

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
        // Start Deleteing Agent By Ajax 
        $(document).on('click', '.agentDelete', function(e) {
            e.preventDefault();
            var agentId = $(this).attr('agentId');
            if (confirm('هل تريد الحذف')) // هذا رساله العامه حق جافا سكربت 
                $.ajax({
                    type: 'delete',
                    url: "{{ route('agent.destroy') }}",
                    data: {
                        'agentId': agentId,
                    },
                    success: function(data) {
                        console.log(data);

                        $('.offerRow' + data.agentId).addClass("animate-fadeInLeft");

                        if (data.status == true) {

                            alertt(data.msg, 'success');
                        }

                        sleep(400).then(() => {
                            $('.offerRow' + data.agentId).remove();
                        });
                    },
                    error: function(reject) {

                    }
                });
        });


        // End Deleting Agent By Ajax 
        // Start edit Agent By Ajax 


        $(document).on('click', '.agentEdit', function(e) {
            e.preventDefault();
            var agentId = $(this).attr('agentId');
            $.ajax({
                type: 'get',
                url: "{{ route('agent.edit') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'agentId': agentId,
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        var preview = document.getElementById("file-ip-1-preview");
                        preview.style.display = "block";
                        $('#file-ip-1-preview').attr('src', data.photo.valsrc);
                        $('#select_directorates').focus();
                        $('#select_rigons').focus();
                        $('#agentId').val(data.agent.id);
                        $('#select_directorate').text(data.agent.directorate.dirName);
                        $('#select_rigon').text(data.agent.rigon.rigName);
                        $('#agentName').val(data.agent.agentName);
                        $('#Photo').val(data.Photo);
                        window.saveAgent.style.display = "none";
                        window.updateAgent.style.display = "inline-flex";
                    }

                },
                error: function(reject) {

                }
            });
        });


        // End edit Agent By Ajax 
        // Start Update Agent By Ajax 


        $(document).on('click', '#updateAgent', function(e) {
            e.preventDefault();
            var formData = new FormData($('#agentForm')[0]);

            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{ route('agent.update') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        alert(data.msg, 'success');
                        window.saveAgent.style.display = "inline-flex";
                        window.updateAgent.style.display = "none";
                        $('.offerRow' + data.agentId).remove(); // حدف الحقل السابق الدي قبل التعديل 
                        fetchLastAgent(data.lastAgent, data.Photo); // اضافة اخر حقل
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




        // End Update Agent By Ajax
        // Start Search Agent By Ajax 

        $(document).on('keyup', '#search-dropdown', function(e) {
            e.preventDefault();
            var formData = new FormData($('#agentSearch')[0]);
            $.ajax({
                type: 'Post',
                enctype: 'multipart/form-data',
                url: "{{ route('agent.search') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    console.log(data.resultSearch);
                    if (data.status == true) {
                        $('#fetchLastAgent').html("");
                        $.each(data.resultSearch, function(key, resultSearch) {
                            $('#fetchLastAgent').prepend('<tr class="offerRow' + resultSearch
                                .id + ' animate-fadeInRight bg-white hover:scale-95 transform transition-all ease-in">\
                                    <td class="p-3 text-center">' + resultSearch.id + '</td>\
                                    <td class="p-3 text-center">' + resultSearch.agentName + '</td>\
                                    <td class="p-3 text-right">\
                                      <img class="rounded-full h-12 w-12  object-cover" src=' + "تت" + ' alt="unsplash image">\
                                    </td>\
                                    <td class="p-3 text-center">\
                                      <span class="bg-green-400 text-gray-50 rounded-md px-2">' + resultSearch.directorate
                                .dirName + '</span>\
                                    </td>\
                                    <td class="p-3 grid grid-cols-2 justify-center">\
                                      <a href="#"  agentId="' + resultSearch.id + '"  class="agentDelete text-red-400 hover:text-red-600 float-left ">\
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">\
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\
                                        </svg>\
                                      </a>\
                                      <a href="#" agentId="' + resultSearch.id + '"  class="agentEdit text-yellow-400 hover:text-yellow-600 mx-2">\
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">\
                                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />\
                                        </svg>\
                                      </a>\
                                    </td>\
                                  </tr>');
                        });

                    }

                },
                error: function(reject) {
                    console.log(data);

                }
            });
        });

        // End Search Agent By Ajax 
    </script>
@stop
