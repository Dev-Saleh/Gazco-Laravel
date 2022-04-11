<article id="Content" class="px-10 bg-gray-100 h-full">
        <div class="px-4 py-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900"> تأكيد استلام و إرسال رسائل نصيه  </h3>
        </div>
        <div class=" py-4 border-t border-gray-200">
        </div>
        <!-- END Line -->
        <div dir="rtl" id="container" class="flex gap-x-10">

          <!-- Table Section -->
          <div class="mx-auto w-full">
            <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
            <div class=" relative overflow-y-auto" style="height: 500px;">
              <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                <thead class="bg-gray-200 text-gray-500">
                  <tr>
                    <th class="p-3">تاريخ الكشف</th>
                    <th class="p-3 text-center">رقم الدفعه</th>
                    <th class="p-3 text-center">رقم الكشف</th>
                    <th class="p-3 text-center">العمليات</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in">
                    <td class="p-3 text-center">
                      22/07/2020
                    </td>
                    <td class="p-3 text-center">
                     7359
                    </td>
                    <td class="p-3 text-right">
                     1546
                    </td>
                    
                    <td class="p-3 grid items-center justify-center">
                      <a href="#" class="text-blue-600 hover:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                          <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd" />
                        </svg>
                      </a>
                    </td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
          <!-- End Table Section -->

          <div class="flex flex-col space-y-4 w-full">
            <div class=" bg-white border-b rounded-xl border-gray-200 overflow-y-auto w-full" style="height: 500px;">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
  
                    <th scope="col" class="px-4 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                      اسم المواطن
                    </th>
                    
                    <th scope="col" class="px-6 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                      <input type="checkbox" id="option-all" onchange="checkAllConfirm(this)">
                      <label for="option-all">الكل</label>
                    </th>
  
                    <th scope="col" class="px-6 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                      <input type="checkbox" id="option-all" onchange="checkAllSms(this)">
                      <label for="option-all">الكل</label>
                    </th>
  
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>
                    
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <div class="text-sm text-gray-700">صالح عبدالله صالح</div>  
                    </td>
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <input type="checkbox" class="confirm">
                    </td>
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <input type="checkbox" class="sms"> 
                    </td>
                    
                  </tr> 
                   <tr>
                    
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <div class="text-sm text-gray-700">  احمد عبدالفتاح تركي</div>  
                    </td>
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <input type="checkbox" class="confirm">
                    </td>
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <input type="checkbox" class="sms"> 
                    </td>
                    
                  </tr> 
                   <tr>
                    
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <div class="text-sm text-gray-700">مجد عيسى حمود</div>  
                    </td>
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <input type="checkbox" class="confirm">
                    </td>
                    <td class="text-center px-4 py-2 whitespace-nowrap">
                      <input type="checkbox" class="sms"> 
                    </td>
                    
                  </tr>     
  
                </tbody>
              </table>
            </div> 
            <!-- Buttons section -->
            <div class="flex justify-center gap-x-4">
              <button type="submit"
              class="w-40 inline-flex justify-center py-2 px-4 border bg-transparent shadow-sm text-sm font-medium rounded-3xl text-white bg-blue-500 hover:bg-blue-400 focus:outline-none
              transition-all ease-in-out ">
               تأكيد الاستلام
            </button>
            <button type="submit"
              class="w-40 inline-flex justify-center py-2 px-4 border bg-transparent shadow-sm text-sm font-medium rounded-3xl text-white bg-yellow-500 hover:bg-yellow-400
               focus:outline-none
              transition-all ease-in-out ">
               ارسال رساله نصيه
            </button>
            </div>
          </div>
         
        </div>
        
      </article>