@extends('layouts.observer_dashboard')
@section('content')
      <article id="content" class="relative content-area px-10 pt-10 bg-gray-100 h-full flex flex-col">
        
        <div id="containerStatus" class="mb-4 grid grid-cols-8 gap-x-7 w-full">
          <div class="relative col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
              <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-purple-500 p-3">
                <p class="text-emerald-100 -rotate-45 text-center ">
                  عدد المواطن
                </p>
              </div>
              <span class="absolute p-2.5 rounded-md rotate-45 bg-purple-200 px-3 group-hover:right-40 right-20  transition-all duration-1000">
                <p class="text-emerald-800 -rotate-45 text-center ">
               {{App\Models\Citizen::count()}}
                </p>
              </span>
          </div>
          <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
              <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-rose-500 p-3">
                <p class="text-emerald-100 -rotate-45 text-center ">
                  عدد الدفعات
                </p>
              </div>
              <span class="p-2.5 rounded-md rotate-45 bg-rose-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                <p class="text-emerald-800 -rotate-45 text-center ">
                   {{App\Models\gazLogs::count()}}
                </p>
              </span>
          </div>
          <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
              <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-yellow-500 p-3">
                <p class="text-emerald-100 -rotate-45 text-center ">
                   مفتوحه الحجز
                </p>
              </div>
              <span class="p-2.5 rounded-md rotate-45 bg-yellow-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                <p class="text-emerald-800 -rotate-45 text-center ">
                   {{App\Models\gazLogs::where('statusBatch','2')->count()}}
                </p>
              </span>
          </div>
          <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
              <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-emerald-500 p-3">
                <p class="text-emerald-100 -rotate-45 text-center ">
                 مكتمله الحجز 
                </p>
              </div>
              <span class="p-2.5 rounded-md rotate-45 bg-emerald-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                <p class="text-emerald-800 -rotate-45 text-center ">
                   {{App\Models\gazLogs::where('statusBatch','3')->count()}}
                </p>
              </span>
          </div>
        </div>  
        
        {{-- Start Chart Section --}}
        <div class="flex justify-around">
          
          {{-- Start Chart Bar --}}
            <div class=" shadow-md rounded-lg overflow-hidden">
              <div class="py-3 px-5 bg-gray-50">الاحصائيات بالاشهر</div>
              <canvas class="p-2  w-[700px]" id="chartBar"></canvas>
            </div>
          {{-- End Chart Bar --}}
          
          
          <div class="shadow-md rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50">الاحصائيات بالدائره</div>
            <canvas class="p-2 h-96 w-96" id="chartPie"></canvas>
          </div>
          
          
        </div>
        {{-- End Chart Section --}}

        <footer class="absolute bottom-0 right-0 left-0 bg-emerald-400 w-full h-20 rounded">

        </footer>
      </article>
     
      @stop