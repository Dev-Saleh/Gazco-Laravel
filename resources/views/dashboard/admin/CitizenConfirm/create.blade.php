   <div class="flex  gap-x-10">
          <div class=" px-6 py-6 bg-white border-0 shadow-lg rounded-xl w-full">
            <div class="flex-col space-y-4">
        
              <!-- Preview Proudct Section -->
        
              <div class="grid grid-cols-4">
                <div class="col-start-2 col-end-4 bg-gray-200 w-100 h-40 justify-center items-center flex rounded-md">
                  <span class="text-white text-2xl text-center">40 * 100</span>

                </div>
                
              </div>
              <!-- END Preview Proudct Section -->
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">اسم المواطن
                  <span  class="citizen_name text-xs bg-gray-800 text-gray-200 p-2 rounded-full">صالح عبدلاله صالح</span>
                </li>
            </ul>
              <!-- List Details For Prooudct -->
              <div class="flex justify-between space-x-2">
        
                <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                  <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">بواسطة من ؟
                    <span  class="observer_name text-xs bg-gray-800 text-gray-200 px-1 rounded-full">Dev SL</span>
                  </li>
                  <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">تاريخ الاضافه
                    <span  class="observer_name text-xs bg-gray-800 text-gray-200 px-1 rounded-full">12/2021</span>
                  </li>
        
                  <li class="px-4 py-2 flex justify-between items-center font-bold">عدد الحجوزات
                    <span class="text-xs bg-gray-800 text-gray-200 px-1 rounded-full">99</span>
                  </li>
                  <li class="px-4 py-2 flex justify-between items-center font-bold">عدد الاستلام
                    <span class="text-xs bg-gray-800 text-gray-200 px-1 rounded-full">19</span>
                  </li>
        
                </ul>
        
                <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                  <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">المديريه
                    <span class="directorate_name text-xs bg-gray-800 text-gray-200 px-1 rounded-full">خور مكسر</span>
                  </li>
                  <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">المربع
                    <span  class="rigon_name text-xs bg-gray-800 text-gray-200 px-1 rounded-full">اكتوبر</span>
                  </li>
        
                  <li class="px-4 py-2 flex justify-between items-center font-bold">الموزع
                    <span  class="Agent_name text-xs bg-gray-800 text-gray-200 px-1 rounded-full">كريم</span>
                  </li>
                  <div class="px-4 py-2 font-bold flex justify-between">
                    <span class=" relative z-20">الصوره مطابقه</span>
                    <label for="checkbox" class="relative  flex-inline items-center isolate  rounded-2xl">
                      <input id="checkbox" type="checkbox" class="relative peer z-20 text-purple-600 rounded-md focus:ring-0" />
                                           
                  </label>
                  </div>
        
                </ul>
              </div>
              <!-- END List Details For Prooudct -->
        
           
              
            </div>
          </div>
          <!--ENd Details& View Section -->
        
          <!-- Table Section -->
          <div class="w-full">
            <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
            <div class=" relative overflow-y-auto" style="height: 590px;">
              <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                <thead class="bg-gray-200 text-gray-500">
                  <tr>
                    <th class="p-3">الرقم</th>
                    <th class="p-3 text-center">اسم المواطن</th>
                    <th class="p-3 text-center">رقم الوطني</th>
                    <th class="p-3 text-center">المطابقه</th>
                    <th class="p-3 text-center">العمليات</th>
                  </tr>
                </thead>
                <tbody id='fetchAllCitizenConfirm'>
                  @if($citizens && $citizens -> count() > 0)
                  @foreach($citizens as $citizen)
                   <tr  class="offerRow{{$citizen -> id}}" class="bg-gray-50 hover:scale-95 transform transition-all ease-in">
                    <td class="p-3 text-center">
                      {{$citizen -> id}}
                    </td>
                    <td class="p-1 text-base text-center">
                    {{$citizen->citizen_name}}
                     </td>
                    <td class="p-3 text-center">
                     {{$citizen->identity_num}}
                    </td>
                    <td class="p-3 text-center">
                      <span class="bg-green-400 text-gray-50 rounded-md px-2">نعم</span>
                    </td>
                    <td class="p-5 flex space-x-2">
                      <a href="#" citizenId="{{$citizen->id}}"  class="citizenConfirmDelete" class="text-gray-400  hover:text-red-400 float-left ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </a>
                      <a href="#" citizenId="{{$citizen->id}}"  class="citizenConfirmEdit" class="text-gray-400 hover:text-yellow-400  mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                      </a>
                      <a href="#" citizenId="{{$citizen->id}}"  class="citizenConfirmShow" class="text-gray-400 hover:text-blue-400  ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                          <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd" />
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