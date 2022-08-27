 <article id="Content" class="content-area px-10 bg-gray-100 h-full">
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
              <input type="text" name='obsId' value="{{$observers->id}}" style="display:none;" class="obsId form-control"> 
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold"> الكشف للموزع : 
                  <span class="agentName text-xs bg-gray-800 text-gray-200 p-2 rounded-full">كريم حسن العقر</span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold"> تاريخ الكشف :
                  <span class="created_at text-xs bg-gray-800 text-gray-200 p-2 rounded-full">  22/17/1394</span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">رقم الدفعه : 
                  <span  class="gazLogId text-xs bg-gray-800 text-gray-200 p-2 rounded-full"> 7514 </span>
                </li>
              </ul>
              <ul class="bg-gray-100 rounded w-full divide-y divide-gray-700 divide-opacity-25 text-gray-800">
                <li class="px-4 py-2 flex text-sm justify-between items-center font-bold">من محطة : 
                  <span class="staName text-xs bg-gray-800 text-gray-200 p-2 rounded-full">  بير احمد</span>
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
              {{-- START SEARCH FORM --}}
          <div class="flex mx-auto w-full my-2">
                      
               
            <select id="filterSearch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5">
                <option selected>بحث الكل</option>
                <option value="cn">الاسم</option>
                <option value="cn">الرقم الوطني</option>
                <option value="dr">المديريه</option>
                <option value="sq">المربع</option>
            </select>
       
            <div class="relative w-full">
                <button type="submit" class="h-12 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">بحث</span>
                </button>
                <input type="search" id="search-dropdown" class="h-12 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500  dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="ابحث عن اسم او رقم او تاريخ ..." required="">
            </div>
            
        </div>
           {{-- END SEARCH FORM --}}
            <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
            <div class=" relative overflow-y-auto" style="height: 500px;">
              <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                <thead class="bg-gray-200 text-gray-500 tableFixed">
                  <tr>
                    <th class="p-3 text-center">رقم الدفعه</th>
                    <th class="p-3">تاريخ الكشف</th>
                    <th class="p-3"> حالة البيع</th>
                    <th class="p-3 text-center">العمليات</th>
                  </tr>
                </thead>
                <tbody>
                   @if($gazLogs && $gazLogs -> count() > 0)
                  @foreach($gazLogs as $gazLog)
                  <tr class="offerRow{{$gazLog -> id}} bg-gray-50 hover:scale-95 transform transition-all ease-in">
                    <td class="p-3 text-center">
                     {{$gazLog->id}} 
                    </td>
                    <td class="p-3 text-center">
                  {{$gazLog->created_at}}
                    </td>
                     <td class="p-3 text-center">
                      <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$gazLog->getvalidOfSell()}}</span>
                    </td>
                    <td class="p-3 grid items-center justify-center">
                      <a href="#" checkBatchId='{{$gazLog->id}}' class="checkBatchShow text-blue-600 hover:text-blue-400">
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