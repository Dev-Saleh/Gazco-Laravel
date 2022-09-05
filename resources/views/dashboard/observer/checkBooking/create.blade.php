<article id="Content" class=" content-area px-10 bg-gray-100 h-full">
    <div class="px-4 py-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900"> تأكيد استلام و إرسال رسائل نصيه </h3>
    </div>
    <div class=" py-4 border-t border-gray-200">
    </div>
    <!-- END Line -->
    <div dir="rtl" id="container" class="flex gap-x-10">

        <!-- Table Section -->
        <div class="mx-auto w-full">
              {{-- START SEARCH FORM --}}
      <form action="" method="Post" id='BatchSearchForm'>
            @csrf 
          <div class="flex mx-auto w-full  my-4">
                      
 
            <select id="filterSearch" name="filterSearch" class="bg-gray-50 border h-8 border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-1">
                <option value='all' selected>بحث الكل</option>
                <option value="numBatch">رقم الدفعه</option>
                <option value="dateBatch">تاريخ الدفعه</option>
            </select>
       
            <div class="relative w-full">
                <button  type="submit" id='search' class="h-8 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">بحث</span>
                </button>
                <input type="search" id="inputSearch" name="inputSearch" class="h-8 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500  dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="ابحث عن اسم او رقم او تاريخ ..." required="">
            </div>
            </form>
        </div>
           {{-- END SEARCH FORM --}}
            <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
            <div class=" relative overflow-y-auto" style="height: 500px;">
                <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                    <thead class="bg-gray-200 text-gray-500 tableFixed">
                        <tr>
                            <th class="p-3 text-center">رقم الدفعه</th>
                            <th class="p-3">تاريخ الدفعه</th>
                            <th class="p-3 text-center">رقم الكشف</th>
                            <th class="p-3 text-center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody id='displayBatch'>
                        @if ($gazLogs && $gazLogs->count() > 0)
                            @foreach ($gazLogs as $gazLog)
                                <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in">
                                    <td class="p-3 text-center">
                                        {{ $gazLog->id }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ $gazLog->created_at }}
                                    </td>
                                    <td class="p-3 text-right">
                                        {{ $gazLog->id }}
                                    </td>

                                    <td class="p-3 grid items-center justify-center">
                                        <a href="#" gazLogId={{ $gazLog->id }}
                                            class="gazLogId text-blue-600 hover:text-blue-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewBox="0 0 20 20" fill="currentColor">
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

        <div class="flex flex-col space-y-4 w-full pb-4">
                  {{-- START SEARCH FORM --}}
      
          <div class="flex mx-auto w-full rounded-full bg-white p-4 shadow-sm">      
          
            <select id="filtercitSearch" name="filtercitSearch" class="bg-gray-50 border h-8 border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-1">
                <option value='all' selected>بحث الكل</option>
                <option value="citName">الاسم</option>

            </select>
       
            <div class="relative w-full">
                <input type="search" id="inputcitSearch" name="inputcitSearch" class="h-8 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500" placeholder="ابحث عن اسم او رقم المواطن ..." required="">
            </div>
        
        </div>
           {{-- END SEARCH FORM --}}
            <div class=" bg-white border-b rounded-xl border-gray-200 overflow-y-auto w-full" style="height: 450px;">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>

                            <th scope="col"
                                class="px-4 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                                اسم المواطن
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                                <input type="checkbox" id="option-all" onchange="checkAllConfirm(this)">
                                <label for="option-all">الكل</label>
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                                <input type="checkbox" id="option-all" onchange="checkAllSms(this)">
                                <label for="option-all">الكل</label>
                            </th>

                        </tr>
                    </thead>
                    <tbody id='showLogBookingsCitizen' class="bg-white divide-y divide-gray-200">
                        {{-- <tr>
                    
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <div class="text-sm text-gray-700">صالح عبدالله صالح</div>  
                    </td>
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <input type="checkbox"  name='status_booking'  class="confirm">
                    </td>
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <input type="checkbox" class="sms"> 
                    </td>
                    
                  </tr> --}}
                    </tbody>
                </table>
            </div>
            <!-- Buttons section -->
            <div class="flex justify-center gap-x-4  mx-auto w-full rounded-full bg-white p-4 shadow-sm">
                <button type="submit" id='saveReciving'>
                    <a class="relative inline-block group focus:outline-none focus:ring" href="/download">
                        <span class="absolute inset-0 transition-transform translate-x-1.5 translate-y-1.5 bg-emerald-400 group-hover:translate-y-0 group-hover:translate-x-0"></span>
                    
                        <span class="relative inline-block px-8 py-3 text-sm font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75">
                              تأكيد استلام الدبه
                        </span>
                    </a>
                </button>
                <button type="submit" id='sendTestMessage'>
                    <a class="relative inline-block group focus:outline-none focus:ring" href="/download">
                        <span class="absolute inset-0 transition-transform translate-x-1.5 translate-y-1.5 bg-yellow-400 group-hover:translate-y-0 group-hover:translate-x-0"></span>
                    
                        <span class="relative inline-block px-8 py-3 text-sm font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75">
                             ارسال رساله نصيه
                        </span>
                    </a>                 
                </button>
            </div>
        </div>

    </div>

</article>

<script>
   

</script>