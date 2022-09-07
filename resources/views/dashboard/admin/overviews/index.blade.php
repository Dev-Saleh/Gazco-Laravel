@extends('layouts.admin_dashboard')
@section('content')

  <article id="Content" class="relative content-area px-10 pt-10 bg-gray-100 h-full flex flex-col space-y-4">
    <div id="containerStatus" class="mb-4 grid grid-cols-8 gap-4 w-full">
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
          class="bg-emerald-200 px-3 py-2 rounded-full rounded-tr-none absolute left-0 group-hover:left-20 transition-all duration-1000 ">{{App\Models\Agent::count()}}</span>
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
          class="bg-yellow-200 px-3 py-2 rounded-full rounded-tr-none absolute left-0 group-hover:left-20  transition-all duration-1000 ">{{App\Models\Citizen::count()}}</span>
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
          class="bg-indigo-200 px-3 py-2 rounded-full rounded-tr-none absolute left-0 group-hover:left-20  transition-all duration-1000 ">{{App\Models\observer::count()}}</span>
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
        <h5 class="P-2 mr-2 text-purple-700"> عدد المستخدمين</h5>
        <span
          class="bg-purple-200 px-3 py-2 rounded-full rounded-tr-none absolute left-0 group-hover:left-20  transition-all duration-1000 "> {{App\Models\employee::count()}}</span>
      </div>
    </div>
   {{-- Start Chart Section --}}
      <div class="flex justify-around h-full">
                
          {{-- Start Line Chart --}}

          <div class="shadow-lg rounded-lg overflow-hidden ">
            <div class="py-3 px-5 bg-gray-50">بيان خطي</div>
            <canvas class="p-2 w-[700px]" id="chartLine"></canvas>
          </div>

          {{-- End Line Chart --}}
          
          {{-- Start Doughnut Chart --}}

          <div class="shadow-lg rounded-lg overflow-hidden ">
            <div class="py-3 px-5 bg-gray-50">دونات بياني</div>
            <canvas class="p-2 w-96 h-full" id="chartDoughnut"></canvas>
          </div>
          
          {{-- End Doughnut Chart --}}
        
        
      </div>
  {{-- End Chart Section --}}

  
  <footer class="p-2 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900 ">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="#" class="flex items-center mb-4 sm:mb-0">
            <img src="{{ asset('assets/images/gaz_logo.png') }}" class="mx-3 h-8" alt="Gazco Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">غـازكو</span>
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">من نحن</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">سياسة الخصوصية</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">الترخيص</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline">تواصل معنا</a>
            </li>
        </ul>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Gazco™</a>. All Rights Reserved.
    </span>
</footer>
  </article>
  
 @stop

