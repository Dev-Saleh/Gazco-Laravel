@extends('layouts.admin_dashboard')
@section('content')

  <article id="Content" class="p-10 bg-gray-100 h-full flex flex-col">
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

    <div id="content">

      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>ما ادري وش احط</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
          </div>
          <table>
            <thead>
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
                  <img src="/assest/sl.JPG">
                  <p>John Doe</p>
                </td>
                <td>01-10-2021</td>
                <td><span class="status completed">تم الاستلام</span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="todo">
          <div class="head">
            <h3>الشكاوي</h3>
            <i class='bx bx-plus'></i>
            <i class='bx bx-filter'></i>
          </div>
          <ul class="todo-list">
            <li class="completed">
              <p> دفلوبر نيكسمو </p>
              <i class='bx bx-dots-vertical-rounded'></i>
            </li>
            <li class="completed">
              <p>كريم سرق الدبب</p>
              <i class='bx bx-dots-vertical-rounded'></i>
            </li>
            <li class="not-completed">
              <p>مصعب يشتي يتمشي مع صلوحي</p>
              <i class='bx bx-dots-vertical-rounded'></i>
            </li>
            <li class="completed">
              <p>سوريا قالت ما بتجيب حق مواصلات</p>
              <i class='bx bx-dots-vertical-rounded'></i>
            </li>
            <li class="not-completed">
              <p>نسخ لصق</p>
              <i class='bx bx-dots-vertical-rounded'></i>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </article>
        </main>
    </div>
 @stop

