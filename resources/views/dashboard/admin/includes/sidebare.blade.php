 <aside id="sidebar"
      class="sm:bg-red-500 md:bg-red-500  w-72 h-full z-20 right-0 top-0 
      fixed lg:bg-slate-900 xl:bg-slate-800 font-cairo text-white text-4xl font-bold 
      rounded-l-3xl">
      <div class="p-6 flex items-center flex-col">
        <div class="avatar ">
          <div class="rounded-3xl w-24 h-24">
            <img class="rounded-full"  id='adminPhoto' src="{{session()->get('empPhoto')}}">
          </div>
        </div>
        <a href="" class="text-white text-xl font-semibold hover:text-gray-300">
          {{session()->get('empUserName')}} | {{session()->get('empRole')}}
        </a>
      </div>
      <nav class="text-base font-semibold pt-3">
        <a href="{{route('admin.dashboard')}}" class="{{ 'admin' == request()->path() ? 'bg-yellow-500' : '' }} flex items-center active-nav-link  py-4 pl-6 text-white nav-item 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          <i class="fas fa-tachometer-alt mr-3"></i>
          نظره عامه
        </a>
        <a href="{{route('agent.index')}}" class="{{ 'admin/agent/index' == request()->path() ? 'bg-yellow-500' : '' }} text-base font-semibold flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-table mr-3"></i>
          الوكلاء
        </a>
        <a href="{{route('observer.index')}}" class=" {{ 'admin/observer/index' == request()->path() ? 'bg-yellow-500' : '' }}
        flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500
                 hover:opacity-100
                py-4 pl-6 nav-item">
          <i class="fas fa-align-left mr-3"></i>
          المراقبين
        </a>

        <a href="{{route('gazLogs.index')}}" class=" {{ 'admin/gazLogs/index' == request()->path() ? 'bg-yellow-500' : '' }}
        flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-calendar mr-3"></i>
          الدفعـات
        </a>
        <a href="{{route('citizenConfirm.index')}}" class=" {{ 'admin/citizenConfirm/index' == request()->path() ? 'bg-yellow-500' : '' }}
        flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          تحقق من المواطن
        </a>
        <a href="{{route('directorate.index')}}" class=" {{ 'admin/directorate/index' == request()->path() ? 'bg-yellow-500' : '' }}
        flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          المديريه والمربعات
        </a>
        <a href="{{route('employee.index')}}" class=" {{ 'admin/employee/index' == request()->path() ? 'bg-yellow-500' : '' }}
        flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-tablet-alt mr-3"></i>
          المستخدمين
        </a>
        <a href="{{route('reports.batchReport')}}" class=" {{  'admin/reports/citizenReport'  == request()->path() ? 'bg-yellow-500' : '' }} {{ 'admin/reports/batchReport'  == request()->path() ? 'bg-yellow-500' : '' }} 
        flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          التقارير
        </a>
        <!-- Base -->

        <a href="" class="flex items-center text-white 
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500
                 hover:opacity-100
                  py-4 pl-6 nav-item">
          <i class="fas fa-cogs mr-3"></i>
          الشكاوي
        </a>
      </nav>
</aside>