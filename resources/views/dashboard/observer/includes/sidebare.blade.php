  <aside id="sidebar" class="w-72 h-full z-20 right-0 top-0 fixed bg-stone-900 font-cairo text-white">
      <div class="p-6 flex items-center flex-col">
          <div class="avatar ">
              <div class="rounded-3xl w-24 h-24">
                  <img class="rounded-full" src="{{ asset('assets/images/Dev-SL.jpeg') }}">
              </div>
          </div>
          <a href="" class="text-white text-xl font-semibold hover:text-gray-300">
              ماهر | مراقب
          </a>
      </div>
      <nav class=" text-base font-semibold pt-3">
          <a href="{{ route('observer.dashboard') }}"
              class="flex items-center active-nav-link  py-4 pl-6 text-white nav-item 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-200
                hover:bg-yellow-600
                h-20">
              <i class="fas fa-tachometer-alt mr-3"></i>
              نظره عامه
          </a>
          <a href="{{ route('citizen.index',2) }}"  
              class=" text-base font-semibold flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-200
                hover:bg-yellow-600
                 hover:opacity-100
                  py-4 pl-6 nav-item h-20">
              <i class="fas fa-table mr-3"></i>
              المواطنين
          </a>
          <a href="{{route('checkBooking.index')}}"
              class=" text-base font-semibold flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-200
                hover:bg-yellow-600
                 hover:opacity-100
                  py-4 pl-6 nav-item h-20">
              <i class="fas fa-table mr-3"></i>
              الحجوزات
          </a>


          <a href="/html/new_category.html"
              class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-200
                hover:bg-yellow-600
                 hover:opacity-100
                  py-4 pl-6 nav-item h-20">
              <i class="fas fa-calendar mr-3"></i>
              استعلام كشوفات
          </a>
          <a href=""
              class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-200
                hover:bg-yellow-600
                 hover:opacity-100
                  py-4 pl-6 nav-item h-20">
              <i class="fas fa-cogs mr-3"></i>
              الشكاوى
          </a>

      </nav>
  </aside>
