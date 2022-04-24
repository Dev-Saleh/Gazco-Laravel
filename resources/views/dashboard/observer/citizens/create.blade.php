<article id="Content" class="content-area px-10 bg-gray-100">
    <details open class="cursor-pointer text-lg font-medium leading-6 text-gray-900 ">
        <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
            <a href="">أضافة مواطن </a>

            <div class="border-t border-gray-200">
            </div>
        </summary>
        <br>
        <div class="">
            <form action="#" method="POST" id="citize_Form">
              @csrf 
          <input type="text" name='id' style="display:none;" class="form-control"  id="citizen_Id"> 
            <input type="text" name='observer_id' value="{{$observers->id}}" style="display:none;" class="form-control"  id="observer_Id"> 
                <div class="">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6 rounded-xl ">
                        <!-- GRID ONE -->
                        <div class="grid grid-cols-6 gap-4">
                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full">
                                    <input type="text" name="citizen_name" id='citizen_name' placeholder=" " required
                                        class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                   appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200
                                   hover:border-black text-black" />
                                    <label for="name"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم
                                        المواطن</label>
                                    <span class="text-sm text-red-600 hidden" id="error">الاسم مطلوب !</span>
                                </div>
                            </div>

                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full">
                                    <input type="number" name="identity_num" id='identity_num' minlength="3" placeholder=" "
                                        
                                        onchange="convertNumToIdentity(document.getElementById('identity_num').value);"
                                        class="hover:border-black pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                    <label for="name"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">رقم
                                        الهويه</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                </div>
                            </div>
                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">

                                <div class="relative z-0 w-full ">
                                    <input type="number" name="citizen_password" id='citizen_password' placeholder=" " 
                                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none
                          hover:border-black focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                    <label for="password"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الرقم السري
                                    </label>
                                    <span class="text-sm text-red-600 hidden" id="error">Password is required</span>
                                </div>
                            </div>



                        </div>

                        <!-- GRID TWO -->
                        <div class="grid grid-cols-6 gap-4">

                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full">
                                    <input type="number" name="mobile_num" id='mobile_num' placeholder=" "
                                        onchange="Slugify(document.getElementById('proudct_slug').value);"
                                        id="proudct_slug"
                                        class="hover:border-black pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                    <label for="name"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">رقم
                                        الجوال</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                </div>
                            </div>

                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full mb-5">
                                    <select name="directorate_id"  value="{{$observers->directorate_id}}" id='select_directorates'  onclick="this.setAttribute('value', this.value);"
                                        class="hover:border-black  pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-black appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                       <option value="{{$observers->directorate_id}}" id='select_directorate'>{{$observers->directorate->directorate_name}}</option>
                                    </select>
                                    <label for="select"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">المديريه</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                        selected</span>
                                </div>
                            </div>



                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full mb-5">
                                    <select name="rigons_id" id='select_rigons' value="{{$observers->rigons_id}}" onclick="this.setAttribute('value', this.value);"
                                        class="hover:border-black pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-black appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                        <option value="{{$observers->rigons_id}}" >{{$observers->rigon->rigon_name}}</option>
                                    </select>
                                    <label for="select"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">المربع</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                        selected</span>
                                </div>
                            </div>



                        </div>


                        <!-- GRID THREE -->

                        <!-- GRID THREE -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="span-col-1 flex flex-col items-center">

                                <label for="file-ip-1"
                                    class="px-10 relative cursor-pointer bg-white rounded-xl font-medium text-black hover:text-black focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-black border-2 border-black">
                                    <span>رفع صورة الهويه</span>
                                    <input id="file-ip-1" name='attachment' accept="image/*" onchange="showPreviewUser(event);"
                                        type="file" class="sr-only">
                                </label>

                                <div
                                    class="mt-4 flex h-48 w-full  border-2 bg-gray-200 border-gray-500 border-dashed rounded">
                                    <img class="rounded w-full h-48 object-cover" src="" id="file-ip-1-preview" alt=""
                                        style="display: none;" class="w-52 h-28">
                                </div>

                            </div>

                            <div>
                                <div class="p-20 bg-transparent text-center sm:px-6  rounded-3xl">
                                    <button type="submit" id='save_Citizen'
                                        class="w-72 inline-flex justify-center py-2 px-4 border bg-transparent shadow-sm text-sm font-medium rounded-3xl text-white bg-black hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                                        تسجيل المواطن
                                    </button>
                                     <button type="submit" id='update_Citizen'  style='display:none;'
                                        class="w-72 inline-flex justify-center py-2 px-4 border bg-transparent shadow-sm text-sm font-medium rounded-3xl text-white bg-black hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                                        تعديل المواطن
                                     </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </details>


    <br>
    <details class="cursor-pointer ">
        <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
            <a href="#c_logs">سجل المواطنين </a>
            <div class="border-t border-gray-200">
            </div>
        </summary>
        <br>

        <div class="mx-auto w-full scroll-m-10">

            <div class=" relative overflow-y-auto" style="height: 590px;">
                <table id="c_logs" class=" table w-full text-gray-500 border-separate space-y-6 text-sm">
                    <thead class="bg-gray-200 text-gray-500 tableFixed">
                        <tr>
                            <th class="p-3">الرقم</th>
                            <th class="p-3 text-center">الاسم</th>
                            <th class="p-3 text-center">المديريه</th>
                            <th class="p-3 text-center">المربع</th>
                            <th class="p-3 text-center">الموزع </th>
                            <th class="p-3 text-center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody id='fetch_All_Citizens'>
                      @if($citizens && $citizens -> count() > 0)
                      @foreach($citizens as $citizen)
                        <tr  class="offerRow{{$citizen -> id}}" class="bg-gray-50 hover:scale-95 transform transition-all ease-in">
                            <td class="p-3 text-center">
                                {{$citizen -> id}}
                            </td>
                            <td class="p-3 text-center">
                                {{$citizen -> citizen_name}}
                            </td>
                            <td class="p-3 text-center">
                                 {{$citizen -> directorate->directorate_name}}
                            </td>

                            <td class="p-3 text-center">
                                {{$citizen -> rigon->rigon_name}}
                            </td>
                            <td class="p-3 text-center">
                                <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$citizen->observer->agent->Agent_name}}</span>
                            </td>
                            <td class="p-3 text-center ">
                                <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden hidden">
                                    <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                                    <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                                </div>
                                <div id="action-div" class="flex justify-center">
                                    <a onclick="deleteAlert();" href="#" citizen_Id="{{$citizen->id}}"  class="citizen_Delete" class="text-red-500  hover:text-red-400  ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                    <a href="#"  citizen_Id="{{$citizen->id}}"  class="citizen_Edit" class="text-yellow-500 hover:text-yellow-400 mx-2 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>

                                </div>
                            </td>
                        </tr>
                     @endforeach
                     @endif
                    </tbody>
                </table>
            </div>
        </div>
    </details>
