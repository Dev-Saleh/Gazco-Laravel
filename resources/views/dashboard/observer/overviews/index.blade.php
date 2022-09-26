@extends('layouts.observer_dashboard')
@section('content')
    <article id="content" class="relative content-area px-10 pt-10 bg-gray-100 h-full flex flex-col space-y-4 ">

        <div id="containerStatus" class="mb-16 grid grid-cols-8 gap-x-7 w-full">
            <div class="relative col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
                <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-purple-500 p-3">
                    <p class="text-emerald-100 -rotate-45 text-center ">
                        عدد المواطن
                    </p>
                </div>
                <span
                    class="absolute p-2.5 rounded-md rotate-45 bg-purple-200 px-3 group-hover:right-40 right-20  transition-all duration-1000">
                    <p class="text-emerald-800 -rotate-45 text-center ">
                        {{ App\Models\Citizen::count() }}
                    </p>
                </span>
            </div>
            <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
                <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-rose-500 p-3">
                    <p class="text-emerald-100 -rotate-45 text-center ">
                        عدد الدفعات
                    </p>
                </div>
                <span
                    class="p-2.5 rounded-md rotate-45 bg-rose-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                    <p class="text-emerald-800 -rotate-45 text-center ">
                        {{ App\Models\gazLogs::count() }}
                    </p>
                </span>
            </div>
            <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
                <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-yellow-500 p-3">
                    <p class="text-emerald-100 -rotate-45 text-center ">
                        مفتوحه الحجز
                    </p>
                </div>
                <span
                    class="p-2.5 rounded-md rotate-45 bg-yellow-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                    <p class="text-emerald-800 -rotate-45 text-center ">
                        {{ App\Models\gazLogs::where('statusBatch', '2')->count() }}
                    </p>
                </span>
            </div>
            <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
                <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-emerald-500 p-3">
                    <p class="text-emerald-100 -rotate-45 text-center ">
                        مكتمله الحجز
                    </p>
                </div>
                <span
                    class="p-2.5 rounded-md rotate-45 bg-emerald-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                    <p class="text-emerald-800 -rotate-45 text-center ">
                        {{ App\Models\gazLogs::where('statusBatch', '3')->count() }}
                    </p>
                </span>
            </div>
        </div>

        {{-- text for wafe --}}

        <div class="flex flex-col w-full h-[150px] bg-emerald-400 relative rounded-md">
            <img src="{{ asset('assets/images/obshello.svg') }}" class="z-20 absolute left-2 -top-16 h-full w-[300px]" />
            <div class="flex">
                <h1 class="pt-8 pr-6 text-2xl text-emerald-100"> مرحباً بك يا </h1>
                <span id="adminName" class="pt-8 pr-2 text-2xl text-emerald-100"> مازن ...</span>
            </div>
            <div class="flex">
                <h1 class="pb-6 pt-2 pr-6 text-xl text-emerald-100"> أنت </h1>
                <span id="adminRole" class="pb-6 pt-2 pr-2 text-xl text-emerald-100"> مراقب</span>
                <h1 class="pb-6 pt-2 pr-2 text-xl text-emerald-100"> ولديك الصلاحيه في النظام كاملاٌ </h1>
            </div>

        </div>

      {{-- Start Chart Section --}}
        <div class="flex justify-around">
          
          {{-- Start Chart Bar --}}
            <div class=" shadow-md rounded-lg overflow-hidden ml-4">
              <div class="py-3 px-5 bg-gray-50">الاحصائيات بالاشهر لعدد الدفعات</div>
              <canvas class="p-2  w-[700px]" id="chartBar"></canvas>
            </div>
          {{-- End Chart Bar --}}
          
          
          <div class="shadow-md rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50">الاحصائيات بالدائره</div>
            <canvas class="p-2 h-96 w-96" id="chartPie"></canvas>
          </div>
          
          
        </div>
        {{-- End Chart Section --}}
        <br/>
        <br/>

    </article>

@stop
