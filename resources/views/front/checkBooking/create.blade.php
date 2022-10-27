  

   <!-- Combobox Section -->
   <div class="w-11/12 mx-auto flex flex-col space-y-2">
    <label for="logsId" class="text-gray-700">  ادخل رقم الدفعه :</label>
      <select class="appearance-none p-2 rounded-lg focus:outline-none text-center" name="numBatch" id="numBatch">
        @if($gazLogs && $gazLogs -> count() > 0)
            @foreach($gazLogs as $gazLog)
                <option value="{{$gazLog -> id }}">{{$gazLog -> id}}</option>
            @endforeach
        @endif
      </select>
   </div>

   <!-- End Combobox Section -->

   <!-- Table Query Booking -->
   <div class="flex flex-col space-y-4 w-full px-4 h-full">
    <!-- Serach Section -->
    <form action="" method="Post" id='citizenSearch'>
       @csrf
    <div class="relative">
      <label class="sr-only" for="search"> Search </label>
   
      <input
        class="w-full h-10 pl-4 pr-10 text-sm bg-white border-none rounded-full shadow-sm sm:w-56"
        type="text"
        id="numberBatch"
        name="numBatch"
        style='display:none;'
        placeholder="بحث عن مواطن ..."
      />
      <input
        class="w-full h-10 pl-4 pr-10 text-sm bg-white border-none rounded-full shadow-sm sm:w-56"
        type="search"
        id="search-dropdown"
        name="inputSearch"
        placeholder="بحث عن مواطن ..."
      />

      <button
        class="absolute p-2 text-gray-600 rounded-full transition -translate-y-1/2 hover:text-gray-700 bg-gray-50 top-1/2 right-1"
        type="submit"
        id='search'
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
      </form>
    </div>
   <!-- End Serach Section -->
   
    <div class=" bg-white border-b rounded-xl border-gray-200 overflow-y-auto w-full h-[550px] ">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-200">
          <tr>
        
            <th scope="col" class="px-4 py-3 text-center  font-medium text-gray-900 ">
              الرقم
            </th>

            <th scope="col" class="px-4 py-3 text-center  font-medium text-gray-900  ">
              اسم المواطن
            </th>
            
            <th scope="col" class="px-6 py-3 text-center  font-medium text-gray-900  ">
              تاريخ و وقت الحجز
            </th>
          
          </tr>
        </thead >
        <tbody id='fetchAllCitizenBooking' class="bg-white divide-y divide-gray-200">
        
         
        </tbody>
      </table>
    </div> 
   
  </div>
  <p class="px-4 ">
    الاجمالي  :
     <span id="count">
       
     </span>
   </p>
   <!-- End Table Query Booking -->