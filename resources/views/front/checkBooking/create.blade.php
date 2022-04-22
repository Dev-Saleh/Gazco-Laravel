  <!-- Serach Section -->
   <div class="p-2.5 mt-3 flex items-center rounded-md 
   px-4 duration-300 cursor-pointer  bg-gray-50">
     <i class="bi bi-search text-sm"></i>
     <input class="text-[15px] mr-4 w-11/12 bg-transparent focus:outline-none" placeholder=" بحث عن مواطن" />
   </div>
   <!-- End Serach Section -->

   <!-- Combobox Section -->
   <div class="w-11/12 mx-auto flex flex-col space-y-2">
    <label for="logsId" class="text-gray-700">  ادخل رقم الدفعه :</label>
      <select class="appearance-none p-2 rounded-lg focus:outline-none text-center" name="NumBatch" id="NumBatch">
        @if($gazLogs && $gazLogs -> count() > 0)
            @foreach($gazLogs as $gazLog)
                <option value="{{$gazLog -> id }}">{{$gazLog -> id}}</option>
            @endforeach
        @endif
      </select>
   </div>

   <!-- End Combobox Section -->

   <!-- Table Query Booking -->
   <div class="flex flex-col space-y-4 w-full">
    <div class=" bg-white border-b rounded-xl border-gray-200 overflow-y-auto w-full" style="height:450px;">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
        
            <th scope="col" class="px-4 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
              الرقم
            </th>

            <th scope="col" class="px-4 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
              اسم المواطن
            </th>
            
            <th scope="col" class="px-6 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
              تاريخ و وقت الحجز
            </th>
            
          </tr>
        </thead >
        <tbody id='fetchAllCitizenBooking' class="bg-white divide-y divide-gray-200">
        
         
        </tbody>
      </table>
    </div> 
    
  </div>
   <!-- End Table Query Booking -->