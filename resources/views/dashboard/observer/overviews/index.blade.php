@extends('layouts.observer_dashboard')
@section('content')
      <article id="content" class="p-10 bg-gray-100 h-full flex flex-col">
        
        <div id="containerStatus" class="mb-4 grid grid-cols-8 gap-x-7 w-full">
          <div class="relative col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
              <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-purple-500 p-3">
                <p class="text-emerald-100 -rotate-45 text-center ">
                  عدد المواطن
                </p>
              </div>
              <span class="absolute p-2.5 rounded-md rotate-45 bg-purple-200 px-3 group-hover:right-40 right-20  transition-all duration-1000">
                <p class="text-emerald-800 -rotate-45 text-center ">
                  99
                </p>
              </span>
          </div>
          <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
              <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-rose-500 p-3">
                <p class="text-emerald-100 -rotate-45 text-center ">
                  عدد المواطن
                </p>
              </div>
              <span class="p-2.5 rounded-md rotate-45 bg-rose-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                <p class="text-emerald-800 -rotate-45 text-center ">
                  99
                </p>
              </span>
          </div>
          <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
              <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-yellow-500 p-3">
                <p class="text-emerald-100 -rotate-45 text-center ">
                  عدد المواطن
                </p>
              </div>
              <span class="p-2.5 rounded-md rotate-45 bg-yellow-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                <p class="text-emerald-800 -rotate-45 text-center ">
                  99
                </p>
              </span>
          </div>
          <div class="col-span-2 group h-28 w-full bg-white rounded-md shadow-sm flex items-center p-4">
              <div class="z-30 rotate-45 rounded-md h-20 w-20 bg-emerald-500 p-3">
                <p class="text-emerald-100 -rotate-45 text-center ">
                  عدد المواطن
                </p>
              </div>
              <span class="p-2.5 rounded-md rotate-45 bg-emerald-200 px-3 group-hover:-translate-x-10 translate-x-5  transition-all duration-1000">
                <p class="text-emerald-800 -rotate-45 text-center ">
                  99
                </p>
              </span>
          </div>
        </div>  
        <div class="table-data">
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
        
      </article>
      @stop