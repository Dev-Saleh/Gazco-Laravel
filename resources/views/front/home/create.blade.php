<div class="pb-2">
    <!-- Swiper Section -->
    <section class="mb-2">
        <!-- Slider main container -->
        <div class="swiper h-56 md:h-72">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">

                    <img class=" h-full w-full object-cover" src="{{ asset('assets/images/swiper/company_gaz.jpg') }}"
                        alt="">
                </div>

                <div class="swiper-slide">

                    <img class=" h-full w-full object-cover" src="{{ asset('assets/images/swiper/pepole_gaz.jpg') }}"
                        alt="">
                </div>
                <div class="swiper-slide">

                    <img class="h-full w-full object-cover" src="{{ asset('assets/images/swiper/track_gaz.jpg') }}"
                        alt="">
                </div>
                <div class="swiper-slide">

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                {{-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> --}}

            </div>
    </section>
    <!-- End Swiper Section -->

    <div id="Content" class="space-y-4">
        <!-- Aler Section -->
        <div id="status_msg" class="animate-fadeInLeft border-b-4 px-6 py-4 rounded-md justify-center text-lg flex flex-col items-center mx-auto w-11/12">
            <p id="status_msg_title"></p>
           
           
        </div>
        <ul id="status_msg_unblockDate" class="animate-fadeInRight hidden border-b-4 border-gray-500 space-x-6 py-3 px-4 shadow justify-center items-center bg-white rounded-md mx-auto w-11/12">
                <li class="ml-6 flex flex-col"><span class="text-xl text-rose-800 text-center" id="day"></span> يوم</li>
                <li class=" flex flex-col"><span class="text-xl text-rose-800 text-center" id="hour"></span> ساعه</li>
                <li class=" flex flex-col"><span class="text-xl text-rose-800 text-center" id="min"></span> دقيقه</li>
                <li class=" flex flex-col"><span class="text-xl text-rose-800 text-center transition-all duration-500 ease-out" id="sec"></span> ثانيه</li>
        </ul>
        <!-- End Aler Section -->

        <!-- button Section -->

        <div class=" p-4 mx-auto w-11/12  bg-white rounded-lg shadow-md  border-b-4 border-gray-500">
            <form action="" method="POST" id='logBookings'>
                @csrf
                <div class="flex flex-col justify-center relative">

                    <input type="datetime-local"style="display:none;" value='' name="currentDate" id='currentDate'
                        placeholder=" " required
                        class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
           appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
           hover:border-blue-600 text-blue-900" />
                    <input type="text" name='citId' value='{{ session()->get('idCitizen') }}' style="display:none;"
                        class="citId form-control">
                    <input type="text" name='numBatch' id="numBatch" style="display:none;" class="form-control">

                    <p class="text-center text-xl text-gray-700">
                        احجز بالنقر على الاسطوانه
                    </p>
                    <button type="submit" id='saveBooking' idCitizen="{{ session()->get('idCitizen') }}"
                        class="saveBooking flex flex-col justify-center items-center disabled:opacity-50 disabled:cursor-not-allowed p-0">
                        <img id="gazImg" class="h-36 w-52 flex" src="{{ asset('assets/images/gaz-cart.png') }}"
                            alt="">
                            <div><img id="spinner" class="hidden" src="{{ asset('assets/images/loading1.svg') }}"alt=""></div>
                    </button>


                </div>
            </form>
        </div>

        <!-- End button Section -->

        <!-- Notes Section -->
      <div class="mx-4">
        <div class="grid grid-cols-3 gap-4 mx-auto ">

            <div class="bg-teal-50 border-b-4 border-teal-500 w-full flex flex-col rounded-lg shadow-md  p-1 space-y-2">
                <h6 class="text-center text-teal-900">
                رقم الدفعه    
                </h6>
                <p class="numBatch text-center text-teal-700">
                    لا يوجد بيانات
                </p>
            </div>
            <div class="bg-teal-50 border-b-4 border-teal-500 w-full flex flex-col rounded-lg shadow-md  p-1 space-y-2">
                <h6 class="text-center text-teal-900">
                اجمالي الدفعه    
                </h6>
                <p class="totalQty text-center text-teal-700">
                    لا يوجد بيانات
                </p>
            </div>

            <div class="bg-teal-50 border-b-4 border-teal-500 w-full flex flex-col rounded-lg shadow-md pt-1 space-y-2">
                <h6 class="text-center text-teal-900">
               الكميه المتبقيه
                </h6>
                <p class="qtyRemaining text-center text-teal-700">
                   لا يوجد بيانات
                </p>
            </div>
            

            <div class="col-span-3 bg-yellow-50 border-b-4 border-yellow-500 w-full flex flex-col rounded-lg shadow-md  p-1 space-y-2">
                <h6 class="text-center text-yellow-900">
                ملاحظه    
                </h6>
                <p class="text-center text-yellow-900">
                     اذا حجزت الان سيتم ايقافك لمدة  <small id="validDays"
                    class="text-yellow-700 text-sm font-bold"></small> 
                    يوم
                </p>
            </div>
        </div>
      </div>
        {{-- <div class="border-r-4 border-yellow-600 bg-yellow-200 p-4  rounded-md justify-center text-xs  mx-auto w-11/12">
            <ul class="space-y-4 list-disc mr-4">
                <li class="text-lg text-yellow-900">الكميه المتبقيه للحجز :
                    <span class="qtyRemaining text-yellow-700 text-sm font-bold">
                        لا يوجد بيانات
                    </span>
                </li>
                <li class="text-lg text-yellow-900"> رقم الدفعه الحاليه :
                    <span class="numBatch text-yellow-700 text-sm font-bold">
                        لا يوجد بيانات
                    </span>
                </li>
                <li class="text-lg text-yellow-900"> ملاحظات:
                    <span class="text-yellow-700 text-sm font-bold">
                        اذا حجزت الان سوف يتم ايقافك عن الحجز لمدة <small id="validDays"
                            class="text-yellow-700 text-sm font-bold"></small> يوم
                    </span>
                </li>
            </ul>
        </div> --}}
        <!-- End Notes Section -->
    </div>
</div>
<br>
<br>
<br>
