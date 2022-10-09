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
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
    </section>
    <!-- End Swiper Section -->

    <div id="Content" class="space-y-4">
        <!-- Aler Section -->
        <div id="status_msg"
            class="border-b-4 border-transparent bg-transparent 
                            px-6 py-4 rounded-md justify-center
                            text-lg flex items-center text-gray-900 mx-auto w-11/12">

        </div>
        <!-- End Aler Section -->

        <!-- button Section -->

        <div class=" p-10 mx-auto w-11/12  bg-white rounded-lg shadow-md">
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

                    <p class="text-center text-2xl text-gray-700">
                        احجز بالنقر على الاسطوانه
                    </p>
                    <button type="submit" id='saveBooking' idCitizen="{{ session()->get('idCitizen') }}"
                        class="saveBooking flex flex-col disabled:opacity-50 disabled:cursor-not-allowed p-0">
                        <img id="gazImg" class="" src="{{ asset('assets/images/gaz-cart.png') }}" alt="">
                    </button>


                </div>
            </form>
        </div>

        <!-- End button Section -->

        <!-- Notes Section -->
        <div
            class="border-r-4 border-yellow-600 bg-yellow-200 
    p-4  rounded-md justify-center
   text-xs  mx-auto w-11/12">
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
        </div>
        <!-- End Notes Section -->
    </div>
</div>
<br>
<br>
<br>
