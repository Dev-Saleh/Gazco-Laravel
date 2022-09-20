 <aside id="sidebar"
      class="sm:bg-red-500 md:bg-red-500  w-72 h-full z-20 right-0 top-0 
      fixed lg:bg-slate-900 xl:bg-slate-800 text-white text-4xl font-bold 
      rounded-l-3xl">
      <div class="p-6 flex items-center flex-col space-y-2">
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
    
       

        <a href="{{route('admin.dashboard')}}" class="{{ 'admin' == request()->path() ? 'bg-yellow-500' : '' }} 
                flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          نظره عامه
          <i class="fas fa-table "></i>
        </a>

       
         @if(session()->get('empRole')=='مستخدم')

        <a href="" disabled class="{{ 'admin/agent/index' == request()->path() ? 'bg-red-500' : '' }}
                flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          الوكلاء
          <i class="fas fa-table "></i>
        </a>
        @endif
        
        @if(session()->get('empRole')=='مسئول')
         <a href="{{route('agent.index')}}" class="{{ 'admin/agent/index' == request()->path() ? 'bg-yellow-500' : '' }}
              flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          الوكلاء
          <i class="fas fa-table "></i>
        </a>
        @endif
        
        @if(session()->get('empRole')=='مسئول')
        <a href="{{route('observer.index')}}" class=" {{ 'admin/observer/index' == request()->path() ? 'bg-yellow-500' : '' }}
                flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          المراقبين
    <i class="fa-light fa-people-group"></i>
        </a>
        @endif
       @if(session()->get('empRole')=='مستخدم')
         <a href="" disabled class=" {{ 'admin/observer/index' == request()->path() ? 'bg-red-500' : '' }}
                flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          المراقبين
        <i class="fa-light fa-people-group"></i>
        </a>
         @endif
        <a href="{{route('gazLogs.index')}}" class=" {{ 'admin/gazLogs/index' == request()->path() ? 'bg-yellow-500' : '' }}
                flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          الدفعـات
          <i class="fas fa-calendar mr-3"></i>
        </a>
        <a href="{{route('citizenConfirm.index')}}" class=" {{ 'admin/citizenConfirm/index' == request()->path() ? 'bg-yellow-500' : '' }}
       flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          تحقق من المواطن
          <i class="fas fa-cogs mr-3"></i>
        </a>
        @if(session()->get('empRole')=='مستخدم')
        <a href="" disabled class=" {{ 'admin/directorate/index' == request()->path() ? 'bg-red-500' : '' }}
       flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          المديريه والمربعات
          <i class="fas fa-cogs mr-3"></i>
        </a>
        @endif
        @if(session()->get('empRole')=='مسئول')
          <a href="{{route('directorate.index')}}"  class=" {{ 'admin/directorate/index' == request()->path() ? 'bg-yellow-500' : '' }}
         flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          المديريه والمربعات
          <i class="fas fa-cogs mr-3"></i>
        </a>
        @endif
        @if(session()->get('empRole')=='مستخدم')
        <a href="" disabled class=" {{ 'admin/employee/index' == request()->path() ? 'bg-red-500' : '' }}
        flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          المستخدمين
          <i class="fas fa-tablet-alt mr-3"></i>
        </a>
        @endif
        @if(session()->get('empRole')=='مسئول')
        <a href="{{route('employee.index')}}" class=" {{ 'admin/employee/index' == request()->path() ? 'bg-yellow-500' : '' }}
        flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          المستخدمين
          <i class="fas fa-tablet-alt mr-3"></i>
        </a>
        @endif
        <a href="{{route('batchReports.index')}}" class=" {{  'admin/reports/citizenReport'  == request()->path() ? 'bg-yellow-500' : '' }} {{ 'admin/reports/Batch/index'  == request()->path() ? 'bg-yellow-500' : '' }} 
        flex justify-between
                w-full p-4 
                text-white  
                rounded-tl-3xl
                rounded-br-3xl
                hover:text-yellow-100
                hover:bg-yellow-500">
          التقارير
          <i class="fas fa-cogs mr-3"></i>
        </a>
        <!-- Base -->
      </nav>
</aside>