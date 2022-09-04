  

   

  

   <!-- Table Query Booking -->
   <div class="flex flex-col space-y-4 w-full px-4">

    <p class="p-4 text-center text-2xl text-gray-500">
     تحقق من حجوزاتك السابقه 🎉
    </p>
    <!-- Serach Section -->
    <div class="relative">
      <label class="sr-only" for="search"> Search </label>

      <input
        class="w-full h-10 pl-4 pr-10 text-sm bg-white border-none rounded-full shadow-sm sm:w-56"
        id="search"
        type="search"
        placeholder="بحث برقم الدفعه ..."
      />

      <button
        class="absolute p-2 text-gray-600 rounded-full transition -translate-y-1/2 hover:text-gray-700 bg-gray-50 top-1/2 right-1"
        type="button"
        aria-label="Submit Search"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-4 h-4"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
          />
        </svg>
      </button>
    </div>
   
   <!-- End Serach Section -->
   
    <div class=" bg-white border-b rounded-xl border-gray-200 overflow-y-auto w-full h-[500px] ">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
        
            <th scope="col" class="px-4 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
              رقم الدفعه
            </th>

            <th scope="col" class="px-4 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
              تاريخ الحجز
            </th>
            
            <th scope="col" class="px-6 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
              حالة الحجز
            </th>
            
          </tr>
        </thead >
        <tbody id='' class="bg-white divide-y divide-gray-200">
        
          <tr>
            <td class="text-center p-4 whitespace-nowrap">
            <div class="text-sm text-gray-700">10</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="text-sm text-gray-700">09-09-2022</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-medium">تم الاستلام</div>
            </td>
          </tr>
          <tr>
            <td class="text-center p-4 whitespace-nowrap">
            <div class="text-sm text-gray-700">05</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="text-sm text-gray-700">09-09-2022</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-medium">تم الاستلام</div>
            </td>
          </tr>
          <tr>
            <td class="text-center p-4 whitespace-nowrap">
            <div class="text-sm text-gray-700">13</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="text-sm text-gray-700">09-09-2022</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="bg-red-100 text-red-700 px-3 py-1.5 rounded text-xs font-medium">لم يتم الاستلام</div>
            </td>
          </tr>
          <tr>
            <td class="text-center p-4 whitespace-nowrap">
            <div class="text-sm text-gray-700">14</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="text-sm text-gray-700">09-09-2022</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-medium">تم الاستلام</div>
            </td>
          </tr>
          <tr>
            <td class="text-center p-4 whitespace-nowrap">
            <div class="text-sm text-gray-700">22</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="text-sm text-gray-700">09-09-2022</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-medium">تم الاستلام</div>
            </td>
          </tr>
          <tr>
            <td class="text-center p-4 whitespace-nowrap">
            <div class="text-sm text-gray-700">07</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="text-sm text-gray-700">09-09-2022</div>
            </td>
            <td class="text-center p-4 whitespace-nowrap">
              <div class="bg-red-100 text-red-700 px-3 py-1.5 rounded text-xs font-medium">لم يتم الاستلام</div>
            </td>
          </tr>
        </tbody>
      </table>
    </div> 
    
    <button
          class="block px-5 py-3 text-sm font-medium text-white bg-rose-600 rounded-lg transition hover:bg-rose-700 focus:outline-none focus:ring"
          type="button"
        >
         أبلاغ عن خطأ ؟
        </button>
  </div>
   <!-- End Table Query Booking -->