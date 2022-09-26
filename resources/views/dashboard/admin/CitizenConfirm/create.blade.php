   <div class="flex  gap-x-10">
          <div class=" px-6 py-6 bg-white border-0 shadow-lg rounded-xl w-full">
            <div class="flex-col space-y-4">
              <input type="text" name='id' style="display:none;" class="form-control"  id="citId">  
              <!-- Preview Proudct Section -->
        
              <div class="grid grid-cols-4">
                <div class="col-start-2 col-end-4 bg-gray-200 w-100 h-40 justify-center items-center flex rounded-md">
                  <span class="text-white text-2xl text-center"> <img id='attachment'>40 * 100 </img> </span>

                </div>
                
              </div>
              <!-- END Preview Proudct Section -->
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">اسم المواطن
                  <span  class="citName text-xs bg-gray-800 text-gray-200 p-2 rounded-full"></span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold"> رقم الهويه 
                  <span  class="identityNum text-xs bg-gray-800 text-gray-200 p-2 rounded-full"></span>
                </li>
              </ul>
              <!-- List Details For Prooudct -->
              <div class="flex justify-between space-x-2">
        
                <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                  <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">بواسطة المراقب 
                    <span  class="obsName text-xs bg-gray-800 text-gray-200 px-1 rounded-full"></span>
                  </li>
                  <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">تاريخ الاضافه
                    <span  class="dateAdd text-xs bg-gray-800 text-gray-200 px-1 rounded-full"></span>
                  </li>
        
                  <li class="px-4 py-2 flex justify-between items-center font-bold">عدد الحجوزات
                    <span class="bookingNumber text-xs bg-gray-800 text-gray-200 px-1 rounded-full">99</span>
                  </li>
                  <li class="px-4 py-2 flex justify-between items-center font-bold">عدد الاستلام
                    <span class="receiptNumber text-xs bg-gray-800 text-gray-200 px-1 rounded-full">19</span>
                  </li>
        
                </ul>
        
                <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                  <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">المديريه
                    <span class="dirName text-xs bg-gray-800 text-gray-200 px-1 rounded-full"></span>
                  </li>
                  <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">المربع
                    <span  class="rigName text-xs bg-gray-800 text-gray-200 px-1 rounded-full"></span>
                  </li>
        
                  <li class="px-4 py-2 flex justify-between items-center font-bold">الموزع
                    <span  class="agentName text-xs bg-gray-800 text-gray-200 px-1 rounded-full"></span>
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
              {{-- START SEARCH FORM --}}
          <form action="" method="POST" id='formCitConfirmSearch'>
          @csrf
          <div class="flex mx-auto w-full my-2">
                    
               
            <select id="filterCitConfirmSearch" name="filterCitConfirmSearch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5">
                <option value="all" selected>بحث الكل</option>
                <option value="citName">الاسم</option>
                <option value="identityNum">رقم الوطني</option>
            </select>
       
            <div class="relative w-full">
                <button type="submit" class="h-12 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">بحث</span>
                </button>
                <input type="search" id="textCitConfirmSearch" name="textCitConfirmSearch" class="h-12 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500  dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="ابحث عن اسم او رقم او تاريخ ..." required="">
            </div>
            
        </div>
        </form>
           {{-- END SEARCH FORM --}}
            <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
            <div class=" relative overflow-y-auto" style="height: 590px;">
              <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                <thead class="bg-gray-200 text-gray-500 tableFixed">
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
                  @foreach($citizens as $cit)
                   <tr class="offerRow{{$cit -> id}} bg-white hover:scale-95 transform transition-all ease-in">
                    <td class="p-3 text-center">
                      {{$cit -> id}}
                    </td>
                    <td class="p-1 text-base text-center">
                    {{$cit->citName}}
                     </td>
                    <td class="p-3 text-center">
                     {{$cit->identityNum}}
                    </td>
                    <td class="p-3 text-center whitespace-nowrap">
                      <span class="bg-red-400 text-gray-50 rounded-md px-2">{{ $cit->checked }}</span>
                    </td>
                    <td class="p-5 flex space-x-2">
                      <a href="#" citId="{{$cit -> id}}" class="citizenConfirmDelete text-red-400  hover:text-red-600 float-left ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </a>
                      <a href="#" citId="{{$cit -> id}}" class="citizenConfirmShow text-blue-400 hover:text-blue-600  ml-2">
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