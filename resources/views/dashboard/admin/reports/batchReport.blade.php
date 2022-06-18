@extends('dashboard.admin.reports.index')
@section('view')

<div id="batchReport" class="">
  <!-- select section -->
  <div class="p-6 bg-white shadow-sm rounded-xl">
    <div class="grid grid-cols-5 gap-x-10 ">
      <div class="select_wrap w-full relative select-none border-2 rounded-md">
        <ul class="default_option_dir icon-arrow rounded relative  bg-white" onclick="dropSelect('_dir')">
          <li class="p-3">
            <div class="option">
              <p id="valueSelect">المديريه</p>
            </div>
          </li>
        </ul>
        <ul
          class="select_ul_dir hidden absolute  left-0 w-full rounded  top-14 bg-purple-50 "
          onclick="clickVal('_dir')">
          <li class=" p-2  hover:bg-purple-200">
            <div class="">
              <p>المعلا</p>
            </div>
          </li>
          <li class=" p-2 hover:bg-purple-200">
            <div class="">
              <p>عدن</p>
            </div>
          </li>
          <li class=" p-2 hover:bg-purple-200">
            <div class="">
              <p>خور مكسر</p>
            </div>
          </li>
          <li class=" p-2 hover:bg-purple-200">
            <div class="">
              <p>التواهي</p>
            </div>
          </li>

        </ul>
      </div>
      <div class="select_wrap w-full relative select-none border-2 rounded-md">
        <ul class="default_option_rig icon-arrow rounded relative  bg-white" onclick="dropSelect('_rig')">
          <li class="p-3">
            <div class="option">
              <p id="valueSelect">المربع</p>
            </div>
          </li>
        </ul>
        <ul
          class="select_ul_rig hidden absolute   left-0 w-full rounded  top-14 bg-purple-50"
          onclick="clickVal('_rig')">
          <li class=" p-2  hover:bg-purple-200">
            <div class="">
              <p>جبل قوارير</p>
            </div>
          </li>
          <li class=" p-2 hover:bg-purple-200">
            <div class="">
              <p>كاسترو</p>
            </div>
          </li>
        </ul>
      </div>
      <div class="select_wrap w-full relative select-none border-2 rounded-md">
        <ul class="default_option_agent icon-arrow rounded relative  bg-white" onclick="dropSelect('_agent')">
          <li class="p-3">
            <div class="option">
              <p id="valueSelect">الموزع</p>
            </div>
          </li>
        </ul>
        <ul
          class="select_ul_agent hidden absolute  left-0 w-full rounded  top-14 bg-gray-50"
          onclick="clickVal('_agent')">
          <li class=" p-2  hover:bg-purple-200">
            <div class="">
              <p> كريم العقر</p>
            </div>
          </li>
          <li class=" p-2 hover:bg-purple-200">
            <div class="">
              <p>مصعب خالد</p>
            </div>
          </li>
          <li class=" p-2 hover:bg-purple-200">
            <div class="">
              <p> معتز حسن</p>
            </div>
          </li>

        </ul>
      </div>
      <div class="relative z-0 w-full">
        <input type="date" name="name" placeholder=" " required class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                   appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                   hover:border-blue-600 text-blue-900" />
        <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">
          من</label>
        <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
      </div>
      <div class="relative z-0 w-full">
        <input type="date" name="name" placeholder=" " required class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                   appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                   hover:border-blue-600 text-blue-900" />
        <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">
          إلى</label>
        <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
      </div>

    </div>
  </div>

  <!-- end select section -->

  <!-- Table section -->
  <div class="flex mt-4 gap-x-7 ">
    <div class="flex flex-col space-y-4 h-full ">
      <h4 class="text-lg font-medium leading-6 text-gray-900">
        نظره عامه
      </h4>
      <div class="border-t border-gray-200">
      </div>
      <div class="w-[400px] h-full bg-white shadow-sm rounded-xl">

        <div class="grid grid-cols-2 grid-rows-2 gap-10 p-4 ">

          <div class="rounded-tr-none rounded-full bg-teal-500 w-full h-40">

          </div>
          <div class="rounded-tl-none rounded-full bg-sky-500 w-full h-40">

          </div>
          <div class="rounded-tr-none rounded-full bg-teal-500 w-full h-40">

          </div>
          <div class="rounded-tl-none rounded-full bg-sky-500 w-full h-40">

          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col space-y-4 w-full ">
      <h4 class="text-lg font-medium leading-6 text-gray-900">
        السجل العام
      </h4>
      <div class="border-t border-gray-200">
      </div>
    <div class="mx-auto w-full">
      <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
      <div class="  overflow-y-scroll" style="height: 490px;">
        <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
          <thead class="bg-gray-200 text-gray-500">
            <tr>
              <th class="p-3">الرقم</th>
              <th class="p-3 text-center">المحطه</th>
              <th class="p-3 text-center">المديريه</th>
              <th class="p-3 text-center">المربع</th>
              <th class="p-3 text-center">الموزع</th>
              <th class="p-3 text-center">العمليات</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in ">
              <td class="p-3 text-center">
                1
              </td>
              <td class="p-3 text-center">
                ماهر
              </td>
              <td class="p-3 text-center">
                المعلا
              </td>

              <td class="p-3 text-center">
                جبل قوارير
              </td>
              <td class="p-3 text-center">
                <span class="bg-green-400 text-gray-50 rounded-md px-2">كريم</span>
              </td>
              <td class="p-1 transition-all ease-in duration-150 flex  justify-center">
                <div id="delete-alert"
                  class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">
                  <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                  <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                </div>
                <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">
                  <a onclick="deleteAlert();" href="#" class="text-gray-400  hover:text-red-400 float-left ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-yellow-400  mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-blue-400  ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                      <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </td>
            </tr>
            <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in ">
              <td class="p-3 text-center">
                1
              </td>
              <td class="p-3 text-center">
                ماهر
              </td>
              <td class="p-3 text-center">
                المعلا
              </td>

              <td class="p-3 text-center">
                جبل قوارير
              </td>
              <td class="p-3 text-center">
                <span class="bg-green-400 text-gray-50 rounded-md px-2">كريم</span>
              </td>
              <td class="p-1 transition-all ease-in duration-150">
                <div id="delete-alert"
                  class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">
                  <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                  <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                </div>
                <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">
                  <a onclick="deleteAlert();" href="#" class="text-gray-400  hover:text-red-400 float-left ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-yellow-400  mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-blue-400  ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                      <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </td>
            </tr>
            <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in ">
              <td class="p-3 text-center">
                1
              </td>
              <td class="p-3 text-center">
                ماهر
              </td>
              <td class="p-3 text-center">
                المعلا
              </td>

              <td class="p-3 text-center">
                جبل قوارير
              </td>
              <td class="p-3 text-center">
                <span class="bg-green-400 text-gray-50 rounded-md px-2">كريم</span>
              </td>
              <td class="p-1 transition-all ease-in duration-150">
                <div id="delete-alert"
                  class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">
                  <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                  <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                </div>
                <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">
                  <a onclick="deleteAlert();" href="#" class="text-gray-400  hover:text-red-400 float-left ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-yellow-400  mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-blue-400  ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                      <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </td>
            </tr>
            <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in ">
              <td class="p-3 text-center">
                1
              </td>
              <td class="p-3 text-center">
                ماهر
              </td>
              <td class="p-3 text-center">
                المعلا
              </td>

              <td class="p-3 text-center">
                جبل قوارير
              </td>
              <td class="p-3 text-center">
                <span class="bg-green-400 text-gray-50 rounded-md px-2">كريم</span>
              </td>
              <td class="p-1 transition-all ease-in duration-150">
                <div id="delete-alert"
                  class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">
                  <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                  <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                </div>
                <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">
                  <a onclick="deleteAlert();" href="#" class="text-gray-400  hover:text-red-400 float-left ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-yellow-400  mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-blue-400  ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                      <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </td>
            </tr>
            <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in ">
              <td class="p-3 text-center">
                1
              </td>
              <td class="p-3 text-center">
                ماهر
              </td>
              <td class="p-3 text-center">
                المعلا
              </td>

              <td class="p-3 text-center">
                جبل قوارير
              </td>
              <td class="p-3 text-center">
                <span class="bg-green-400 text-gray-50 rounded-md px-2">كريم</span>
              </td>
              <td class="p-1 transition-all ease-in duration-150">
                <div id="delete-alert"
                  class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">
                  <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                  <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                </div>
                <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">
                  <a onclick="deleteAlert();" href="#" class="text-gray-400  hover:text-red-400 float-left ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-yellow-400  mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-blue-400  ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                      <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </td>
            </tr>
            <tr class="bg-gray-50 hover:scale-95 transform transition-all ease-in ">
              <td class="p-3 text-center">
                1
              </td>
              <td class="p-3 text-center">
                ماهر
              </td>
              <td class="p-3 text-center">
                المعلا
              </td>

              <td class="p-3 text-center">
                جبل قوارير
              </td>
              <td class="p-3 text-center">
                <span class="bg-green-400 text-gray-50 rounded-md px-2">كريم</span>
              </td>
              <td class="p-1 transition-all ease-in duration-150">
                <div id="delete-alert"
                  class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">
                  <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                  <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                </div>
                <div id="action-div" class="flex space-x-2  transition-all ease-in duration-150">
                  <a onclick="deleteAlert();" href="#" class="text-gray-400  hover:text-red-400 float-left ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-yellow-400  mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-blue-400  ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                      fill="currentColor">
                      <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                      <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- End Table section -->
</div>
</div>
                
@stop