
 <div class="px-4 py-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">اضافة و عرض الموزعين</h3>
      </div>
      <div class=" py-4 border-t border-gray-200">
  </div>
<!-- END Line -->
      <div dir="rtl" id="container" class="flex">
          <div class="ml-10 p-6 bg-white border-0 shadow-lg rounded-xl w-full h-full">
          <form action="" method="POST" id='empForm'>
           @csrf 
          <input type="text" name='id' style="display:none;" class="form-control"  id="empId">    
            <div class="flex-col items-center justify-center flex space-y-4">

              <label for="file-ip-1"
                class="relative cursor-pointer bg-white rounded-xl font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 border-2 border-blue-700 px-2">
                <span>رفع صوره</span>
                <input id="file-ip-1" name='empPhoto' id='empPhoto' accept="image/*" onchange="showPreviewUser(event);" type="file" class="sr-only">
              </label>
            
            <div class="mt-2 flex h-48 w-48  border-2 bg-gray-200 border-gray-500 border-dashed rounded-full">
                <img class="rounded-full w-48 h-48 object-cover" src="" class='image' id="file-ip-1-preview" alt=""
                    style="display: none;" class="w-52 h-28">
             <small id='empPhoto_error' style='color:red'></small>
            </div>

              <div class="relative z-0 w-full mb-5">
                <input type="text" name="empFullName" id='empFullName' placeholder=" " required
                  class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم الموظف الكامل</label>
                <span class="text-sm text-red-600 hidden" id="error">اسم الموظف كامل مطلوب !</span>
               <small id='empFullName_error' style='color:red'></small>
            </div>

              <div class="relative z-0 w-full mb-5">
                <input type="text" name="empUserName" id='empUserName' placeholder=" " required
                  class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم الموظف </label>
                <span class="text-sm text-red-600 hidden" id="error">اسم الموظف مطلوب !</span>
                  <small id='empUserName_error' style='color:red'></small>
            </div>

              <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="text" name="empPassword" id="empPassword" placeholder=" "
                                    required
                                    class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                  appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                                  hover:border-blue-600 text-blue-900" />
                                <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الرقم
                                    السري</label>
                                <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                 <small id='empPassword_error' style='color:red'></small>
                            </div>
                        </div>

                    <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                      <div class="relative z-0 w-full mb-5">
                          <select name="empRole" value="" id='empRole'
                              onclick="this.setAttribute('value', this.value);"
                              class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                              <option value="0" >User</option>
                              <option value="1" >Admin</option>
                          </select>
                          <label for="select"
                              class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الصلاحيه</label>
                          <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                            <small id='empRole_error' style='color:red'></small>
                      </div>
                  </div>


              <button id='saveEmployee' type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-black hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-72">
                أضافه
              </button>

              <button type="submit"   id='updateEmployee'  style='display:none;' class="inline-flex justify-center py-2 px-4 border-blue-600 border-2 shadow-sm 
                  text-sm font-medium rounded-md text-blue-400 bg-transparent hover:bg-blue-600 hover:text-blue-50
                  focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500  w-full">
                   تعديل
                </button>

            </div>
            </form>
          </div>
    
          <!--ENd Details& View Section -->

    <!-- Table Section -->
    <div class="mx-auto w-full">
        <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
        <div class=" relative overflow-y-auto" style="height: 550px;">
            <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                <thead class="bg-gray-200 text-gray-500 tableFixed">
                    <tr>
                        <th class="p-3">الرقم</th>
                        <th class="p-3 text-center"> اسم الموظف</th>
                        <th class="p-3 text-center">الصوره</th>
                        <th class="p-3 text-center">الصلاحية</th>
                        <th class="p-3 text-left">العمليات</th>
                    </tr>
                </thead>
                <tbody id='fetchEmployees'>
                 @if($employees && $employees -> count() > 0)
                  @foreach($employees as $emp)
                  <tr  class="offerRow{{$emp -> id}} bg-white hover:scale-95 transform transition-all ease-in">
                    <td class="p-3 text-center">
                      {{$emp->id}}
                    </td>
                    <td class="p-3 text-center">
                      {{$emp->empUserName}}
                    </td>
                    <td class="p-3 text-right">
                      <img class="rounded-full h-12 w-12  object-cover" src="{{$emp->empPhoto['valsrc']}}" alt="unsplash image">
                    </td>
                    <td class="p-3 text-center whitespace-nowrap">
                      <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$emp->empRole}}</span>
                    </td>
                    <td class="p-5 flex space-x-2">
                      <a href="#"  empId="{{$emp->id}}"  class="employeeDelete  text-red-400  hover:text-red-600 float-left ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </a>
                      <a href="#" empId="{{$emp->id}}"   class="employeeEdit text-yellow-400 hover:text-yellow-600  mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                      </a>

                    </td>
                  </tr>
                 @endforeach
                 @endif
                 </tbody>
              </table>
            </div>
          </div>
    </div>

