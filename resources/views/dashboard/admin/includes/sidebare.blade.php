 <aside id="sidebar"
      class="sm:bg-red-500 md:bg-red-500  w-72 h-full z-20 right-0 top-0 fixed lg:bg-slate-900 xl:bg-slate-800 font-cairo text-white text-4xl font-bold ">
      <div class="p-6 flex items-center flex-col">
        <div class="avatar ">
          <div class="rounded-3xl w-24 h-24">
            <img class="rounded-full"  id='adminPhoto' src="{{asset('assets/images/Dev-SL.jpeg')}}">
          </div>
        </div>
        <a href="" class="text-white text-xl font-semibold hover:text-gray-300">
          باعباد | مسوؤل
        </a>
      </div>
      <nav class=" text-base font-semibold pt-3">
        <a href="{{route('admin.dashboard')}}" class="flex items-center active-nav-link  py-4 pl-6 text-white nav-item 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                hover:bg-indigo-600">
          <i class="fas fa-tachometer-alt mr-3"></i>
          نظره عامه
        </a>
        <a href="{{route('agent.index')}}" class=" text-base font-semibold flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                hover:bg-indigo-600
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-table mr-3"></i>
          الوكلاء
        </a>
        <a href="{{route('observer.index')}}" class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                bg-indigo-600
                 hover:opacity-100
                py-4 pl-6 nav-item">
          <i class="fas fa-align-left mr-3"></i>
          المراقبين
        </a>

        <a href="{{route('gaz_Logs.index')}}" class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                hover:bg-indigo-600
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-calendar mr-3"></i>
          الكشوفات
        </a>
        <a href="{{route('citizenConfirm.index')}}" class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                hover:bg-indigo-600
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          تحقق من المواطن
        </a>
        <a href="{{route('directorate.index')}}" class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                hover:bg-indigo-600
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          المديريه والمربعات
        </a>
        <a href="/html/New_User.html" class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                hover:bg-indigo-600
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-tablet-alt mr-3"></i>
          المستخدمين
        </a>
        <a href="" class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                hover:bg-indigo-600
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          التقارير
        </a>
        <a href="" class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-indigo-200
                hover:bg-indigo-600
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          الشكاوي
        </a>
      </nav>
    </aside>