   <!-- Swiper Section -->
    <section class="">
      <!-- Slider main container -->
      <div class="swiper h-56 md:h-72">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
          
          <img class=" h-full w-full object-cover" src="{{asset('assets/images/swiper/company_gaz.jpg')}}" alt="" ></div>
         
          <div class="swiper-slide">
          
          <img class=" h-full w-full object-cover" src="{{asset('assets/images/swiper/pepole_gaz.jpg')}}" alt="" ></div>
          <div class="swiper-slide">
          
          <img class="h-full w-full object-cover" src="{{asset('assets/images/swiper/track_gaz.jpg')}}" alt="" ></div>
          <div class="swiper-slide">
          
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

      </div>
    </section>
      <!-- End Swiper Section -->
    <div id="Content" class="space-y-4">
      <!-- Aler Section -->
      <div id="status_msg" class="border-b-4 border-transparent bg-transparent 
      px-6 py-4 rounded-md justify-center
      text-lg flex items-center text-gray-900 mx-auto w-11/12">
           
      </div>
      <!-- End Aler Section -->   

      <!-- button Section -->
   
      <div class=" p-10 mx-auto w-11/12 border-dashed border border-gray-400">
       <form action="" method="POST" id='logBookings'>
            @csrf 
        <div class="flex justify-center relative">
        
             <input type="datetime-local"style="display:none;"  value='' name="currentDate" id='currentDate' placeholder=" " required class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
              appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
              hover:border-blue-600 text-blue-900" />
             <input type="text" name='citizen_id' value='1'  style="display:none;" class="citizen_id form-control">
             <input type="text" name='NumBatch' id="NumBatch"  style="display:none;" class="form-control">
         
            <span class="group absolute -top-6 z-10 h-8 w-12 bg-gray-500 rounded-md flex justify-center items-center ">
              <span class="bg-white h-4 w-6" >
              </span>
            </span>
            <button type="submit"  id='saveBooking' 
                class="saveBooking flex flex-col disabled:opacity-50 disabled:cursor-not-allowed relative h-40 w-32  justify-center py-2 px-4 border shadow-sm text-left text-xl font-medium rounded-xl text-white bg-gray-500 hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out 
                  ">
                <span class="animate-ping flex h-3 w-3 absolute top-0 right-0 ">
                  <span class=" absolute inline-flex h-full w-full rounded-xl bg-gray-700 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-gray-700"></span>
                </span>
                   {{ Session::get('citizenId') }}
            </button>
    
         
        </div>  
      </form> 
      </div>

      <!-- End button Section -->
      
      <!-- Notes Section -->
      <div class="border-r-4 border-yellow-600 bg-yellow-200 
       p-4  rounded-md justify-center
      text-xs  mx-auto w-11/12">
      <ul class="space-y-4 list-disc mr-4">
        <li class="text-lg text-yellow-900">الكميه المتبقيه للحجز :
          <span class="qtyRemaining text-yellow-700 text-sm font-bold">
            لا يوجد بيانات
          </span>
        </li>
        <li class="text-lg text-yellow-900">  رقم الدفعه الحاليه :
          <span class="numBatch text-yellow-700 text-sm font-bold">
            لا يوجد بيانات
          </span>
        </li>
        <li class="text-lg text-yellow-900"> ملاحظات:
          <span class="text-yellow-700 text-sm font-bold">
            اذا حجزت الان سوف يتم حظرك عن الحجز لمدة اسبوعين 
          </span>
        </li>
      </ul>
      </div>
      <!-- End Notes Section -->
    </div>
