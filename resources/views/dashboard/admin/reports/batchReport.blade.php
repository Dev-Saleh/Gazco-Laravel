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
      <div class="w-[400px]  bg-white shadow-sm rounded-xl">

        <div class="grid grid-cols-2 grid-rows-2 gap-10 p-4 h-full ">

          <div class="group rounded-tr-none rounded-full bg-teal-500 w-full h-40 flex flex-col justify-center items-center space-y-2 hover:animate-wiggle">
                  <p class="text-teal-900 text-lg">عدد الدفعات</p>
                  <span class="text-teal-200 text-base bg-teal-700 rounded-full rounded-tr-none p-2 py-1 group-hover:animate-bounce">19</span>
          </div>
          <div class="group rounded-tl-none rounded-full bg-purple-500 w-full h-40 flex flex-col justify-center items-center space-y-2 hover:animate-wiggle">
            <p class="text-purple-900 text-lg">اجمالي الدفعات</p>
            <span class="text-purple-200 text-base bg-purple-700 rounded-full rounded-tl-none p-2 py-1 group-hover:animate-bounce">11</span>
          </div>
          <div class="group rounded-tr-none rounded-full bg-yellow-500 w-full h-40 flex flex-col justify-center items-center space-y-2 hover:animate-wiggle">
            <p class="text-yellow-900 text-lg"> التي تم فتح الحجز</p>
            <span class="text-yellow-200 text-base bg-yellow-700 rounded-full rounded-tr-none p-2 py-1 group-hover:animate-bounce">10</span>
          </div>
          <div  class="group rounded-tl-none rounded-full bg-sky-500 w-full h-40 flex flex-col justify-center items-center space-y-2 hover:animate-wiggle">
            <p class="text-sky-900 text-lg"> اي شي</p>
            <span class="text-sky-200 text-base bg-sky-700 rounded-full rounded-tl-none p-2 py-1 group-hover:animate-bounce">00</span>
          </div>
        </div>
      </div>
    </div>
    <div id="content" class="flex flex-col space-y-4 w-full ">
      <h4 class="text-lg font-medium leading-6 text-gray-900">
        السجل العام
      </h4>
      <div class="border-t border-gray-200">
      </div>
      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>تصدير بصيغة</h3>
            <i class='bx bx-search bg-red-100 p-1 rounded-full'><img src="" alt=""></i>
            <i class='bx bx-filter bg-green-100 p-1 rounded-full'><link type="image/png" sizes="32x32" rel="icon" href=".../icons8-pdf-32.png"></i>
          </div>
        <div class=" relative overflow-y-auto h-[300px]">
          <table class="table">
            <thead class="bg-white tableFixed">
              <tr>
                <th>الاسم</th>
                <th>التاريخ</th>
                <th>الحاله</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img src="/assest/Dev-SL.jpeg">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status completed">تم الاستلام</span></td>
              </tr>
              <tr>
                <td>
                  <img src="/assest/sl.JPG">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">معلق</span></td>
              </tr>
              <tr>
                <td>
                  <img src="/assest/mz.JPG">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status process">قيد المراجعه</span></td>
              </tr>
              <tr>
                <td>
                  <img src="/assest/Dev-SL.jpeg">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">معلق</span></td>
              </tr>
              <tr>
                <td>
                  <img src="/assest/Dev-SL.jpeg">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">معلق</span></td>
              </tr>
              <tr>
                <td>
                  <img src="/assest/Dev-SL.jpeg">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">معلق</span></td>
              </tr>
              <tr>
                <td>
                  <img src="/assest/Dev-SL.jpeg">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">معلق</span></td>
              </tr>
              <tr>
                <td>
                  <img src="/assest/Dev-SL.jpeg">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">معلق</span></td>
              </tr>
              <tr>
                <td>
                  <img src="/assest/Dev-SL.jpeg">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status pending">معلق</span></td>
              </tr>
             
            </tbody>
          </table>
        </div>
        </div>
      </div>

  </div>
  <!-- End Table section -->
</div>
</div>
                
@stop