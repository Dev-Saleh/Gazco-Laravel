@extends('layouts.admin_dashboard')
@section('content')

  <article id="Content" class="relative content-area px-10 pt-10 bg-gray-100 h-full flex flex-col">
    <div id="containerStatus" class="mb-4 grid grid-cols-8 gap-x-7 w-full">
      <div class="  col-span-2 group box1 relative h-28 w-full bg-white rounded-md shadow-sm flex items-center" on>
        <span
          class="z-10 absolute h-28 w-24 bg-emerald-500 rounded-md flex justify-center items-center 
                   left-0 transform   group-hover:-left-6  group-hover:-rotate-180 transition-all duration-700 overflow-hidden ">
          <span class="p-3 bg-green-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </span>
        </span>
        <h5 class="P-2 mr-2 text-emerald-700"> عدد الموزعين</h5>
        <span
          class="bg-emerald-200 px-3 py-2 rounded-full rounded-tr-none absolute left-0 group-hover:left-20 transition-all duration-1000 ">99</span>
      </div>
      <div class="col-span-2 group box1 relative h-28 w-full bg-white rounded-md shadow-sm flex items-center" on>
        <span
          class="z-10 absolute h-28 w-24 bg-yellow-500 rounded-md flex justify-center items-center 
                   left-0 transform   group-hover:-left-6  group-hover:-rotate-180 transition-all duration-700 overflow-hidden ">
          <span class="p-3 bg-yellow-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </span>
        </span>
        <h5 class="P-2 mr-2 text-yellow-700"> عدد المواطنين</h5>
        <span
          class="bg-yellow-200 px-3 py-2 rounded-full rounded-tr-none absolute left-0 group-hover:left-20  transition-all duration-1000 ">99</span>
      </div>
      <div class="col-span-2 group box1 relative h-28 w-full bg-white rounded-md shadow-sm flex items-center" on>
        <span
          class="z-10 absolute h-28 w-24 bg-indigo-500 rounded-md flex justify-center items-center 
                   left-0 transform   group-hover:-left-6  group-hover:-rotate-180 transition-all duration-700 overflow-hidden ">
          <span class="p-3 bg-indigo-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </span>
        </span>
        <h5 class="P-2 mr-2 text-indigo-700"> عدد المراقبين</h5>
        <span
          class="bg-indigo-200 px-3 py-2 rounded-full rounded-tr-none absolute left-0 group-hover:left-20  transition-all duration-1000 ">99</span>
      </div>
      <div class="col-span-2 group box1 relative h-28 w-full bg-white rounded-md shadow-sm flex items-center" on>
        <span
          class="z-10 absolute h-28 w-24 bg-purple-500 rounded-md flex justify-center items-center 
                   left-0 transform   group-hover:-left-6  group-hover:-rotate-180 transition-all duration-700 overflow-hidden ">
          <span class="p-3 bg-purple-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-700" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </span>
        </span>
        <h5 class="P-2 mr-2 text-purple-700"> عدد الموزعين</h5>
        <span
          class="bg-purple-200 px-3 py-2 rounded-full rounded-tr-none absolute left-0 group-hover:left-20  transition-all duration-1000 ">99</span>
      </div>
    </div>
   {{-- Start Chart Section --}}
      <div class="flex justify-around">
                
          {{-- Start Line Chart --}}

          <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50">Line chart</div>
            <canvas class="p-2 w-[700px]" id="chartLine"></canvas>
          </div>

          {{-- End Line Chart --}}
          
          {{-- Start Doughnut Chart --}}

          <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50">Doughnut chart</div>
            <canvas class="p-2 w-96 h-96" id="chartDoughnut"></canvas>
          </div>
          
          {{-- End Doughnut Chart --}}
        
        
      </div>
  {{-- End Chart Section --}}

  <footer class="absolute bottom-0 right-0 left-0 bg-yellow-400 w-full h-20 rounded">

  </footer>

  </article>
 @stop

