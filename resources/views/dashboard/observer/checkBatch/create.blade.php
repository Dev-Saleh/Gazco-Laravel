 <article id="Content" class="px-10 bg-gray-100 h-full">
        <div class="px-4 py-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">معاينة الكشوفات و فتح الحجز</h3>
        </div>
        <div class=" py-4 border-t border-gray-200">
        </div>
        <!-- END Line -->
        <div dir="rtl" id="container" class="flex gap-x-10">
        
          <!-- List Details For Logs -->
          <div class=" flex flex-col items-center justify-center space-y-4 px-6 py-6 bg-white border-0 shadow-lg rounded-xl w-full">
            <div class="flex-col space-y-4 w-full">
              <input type="text" name='observer_id' value="{{$observers->id}}" style="display:none;" class="observer_Id form-control"> 
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold"> الكشف للموزع : 
                  <span class="agentName text-xs bg-gray-800 text-gray-200 p-2 rounded-full">كريم حسن العقر</span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold"> تاريخ الكشف :
                  <span class="createdAt text-xs bg-gray-800 text-gray-200 p-2 rounded-full">  22/17/1394</span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">رقم الدفعه : 
                  <span  class="gazLogId text-xs bg-gray-800 text-gray-200 p-2 rounded-full"> 7514 </span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold"> رقم الكشف :
                  <span class=" text-xs bg-gray-800 text-gray-200 p-2 rounded-full">  7548 </span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">من محطة : 
                  <span class="stationName text-xs bg-gray-800 text-gray-200 p-2 rounded-full">  بير احمد</span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold"> الكميه :
                  <span class="qty text-xs bg-gray-800 text-gray-200 p-2 rounded-full"> 100 </span>
                </li>
              </ul>
            </div>
            <button type="submit" 
              class="allowBooking w-72 inline-flex justify-center py-2 px-4 border bg-transparent shadow-sm text-sm font-medium rounded-3xl text-white bg-green-500 hover:bg-green-400 focus:outline-none
              focus:transform focus:scale-95 ">
              فتح حجز لهذا الكشف
            </button>
          </div>
        <!-- END  Details For Logs -->


          <!-- Table Section -->
          <div class="mx-auto w-full">
            <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
            <div class=" relative overflow-y-auto" style="height: 500px;">
              <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                <thead class="bg-gray-200 text-gray-500">
                  <tr>
                    <th class="p-3 text-center">رقم الدفعه</th>
                    <th class="p-3">تاريخ الكشف</th>
                    <th class="p-3"> حالة البيع</th>
                    <th class="p-3 text-center">العمليات</th>
                  </tr>
                </thead>
                <tbody>
                   @if($gaz_Logs && $gaz_Logs -> count() > 0)
                  @foreach($gaz_Logs as $gaz_Log)
                  <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in">
                    <td class="p-3 text-center">
                     {{$gaz_Log->id}} 
                    </td>
                    <td class="p-3 text-center">
                  {{$gaz_Log->created_at}}
                    </td>
                     <td class="p-3 text-center">
                      <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$gaz_Log->getvalidOfSell()}}</span>
                    </td>
                    <td class="p-3 grid items-center justify-center">
                      <a href="#" checkBatchId='{{$gaz_Log->id}}' class="checkBatchShow text-blue-600 hover:text-blue-400">
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
          <!-- End Table Section -->
        </div>
        
      </article>