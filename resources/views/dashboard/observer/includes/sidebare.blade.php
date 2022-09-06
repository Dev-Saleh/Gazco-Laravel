  <aside id="sidebar" class="w-72 h-full z-20 right-0 top-0 fixed bg-gray-700 font-cairo text-white rounded-l-2xl">
      <div class="p-6 flex items-center flex-col">
          <div class="avatar ">
              <div class="rounded-3xl w-24 h-24">
                  <img class="rounded-full" src="{{ asset('assets/images/mz.jpg') }}">
              </div>
          </div>
          <a href="" class="text-white text-xl font-semibold hover:text-gray-300">
              {{session()->get('obsUserName')}} | مراقب
          </a>
      </div>
      <nav class=" text-base font-semibold pt-3">
          <a href="{{ route('observer.dashboard') }}"
              class="{{ 'observer' == request()->path() ? 'bg-emerald-500' : '' }} flex items-center active-nav-link  py-4 pl-6 text-white nav-item 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-emerald-200
                hover:bg-emerald-600
                h-20">
              <i class="fas fa-tachometer-alt mr-3"></i>
              نظره عامه
          </a>
          
          <a href="{{ route('citizen.index')}}"  
              class="{{ 'observer/citizen/index' == request()->path() ? 'bg-emerald-500' : '' }} text-base font-semibold flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-emerald-200
                hover:bg-emerald-600
                 hover:opacity-100
                  py-4 pl-6 nav-item h-20">
              <i class="fas fa-table mr-3"></i>
              المواطنين
          </a>
          <a href="{{route('checkBooking.index')}}"
              class="{{ 'observer/checkBooking/index' == request()->path() ? 'bg-emerald-500' : '' }} text-base font-semibold flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-emerald-200
                hover:bg-emerald-600
                 hover:opacity-100
                  py-4 pl-6 nav-item h-20">
              <i class="fas fa-table mr-3"></i>
              الحجوزات
          </a>


          <a href="{{route('checkBatch.index')}}"
              class="{{ 'observer/checkBatch/index' == request()->path() ? 'bg-emerald-500' : '' }} flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-emerald-200
                hover:bg-emerald-600
                 hover:opacity-100
                  py-4 pl-6 nav-item h-20">
              <i class="fas fa-calendar mr-3"></i>
              استعلام الدفعات          </a>
         
            <div class="w-full relative inline-block py-4 px-6 text-white bg-transparent h-18 rounded-tl-3xl
            rounded-br-3xl group">
          
              <span class="  transition-opacity group-hover:opacity-0">
                تقديم شكوى
              </span>
      
              <ul class="absolute inset-0 flex items-center justify-center opacity-0 space-x-3 transition-opacity group-hover:opacity-100 group-hover:bg-emerald-600  rounded-tl-3xl
              rounded-br-3xl">
                <li>
                  <a class="block  rounded-tl-3xl
                  rounded-br-3xl transition-opacity hover:opacity-90 focus:outline-none focus:opacity-75" href="https://wa.me/773928227?text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%D8%A7%D8%B1%D9%8A%D8%AF%20%D8%AA%D9%82%D8%AF%D9%8A%D9%85%20%D8%B4%D9%83%D9%88%D9%89">
                    <span class="sr-only"> WhatsApp </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16" id="IconChangeColor"> <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" id="mainIconPathAttribute" stroke-width="0" stroke="#ff0000"></path> </svg>
                    </a>
                </li>
      
              </ul>
            </div>
          
         

      </nav>
  </aside>
