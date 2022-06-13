@extends('dashboard.admin.reports.index')
@section('view')

  <div id="batchReport" class="slide bg-slate-800 ">
                    <div class="p-6 grid grid-cols-5 gap-x-10 ">
      
                      <div class="select_wrap w-full relative select-none">
                        <ul class="default_option rounded relative  bg-purple-100">
                          <li class="p-3">
                            <div class="option">
                              <p id="valueSelect">الكل</p>
                            </div>
                          </li>
                        </ul>
                        <ul
                          class="select_ul opacity-0 absolute transition-opacity duration-300  left-0 w-full rounded  top-14 bg-white">
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
                      <div class="select_wrap w-full relative select-none">
                        <ul class="default_option rounded relative  bg-purple-100">
                          <li class="p-3">
                            <div class="option">
                              <p id="valueSelect">الكل</p>
                            </div>
                          </li>
                        </ul>
                        <ul
                          class="select_ul opacity-0 absolute transition-opacity duration-300  left-0 w-full rounded  top-14 bg-white">
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
                      <div class="select_wrap w-full relative select-none">
                        <ul class="default_option rounded relative  bg-purple-100">
                          <li class="p-3">
                            <div class="option">
                              <p id="valueSelect">الكل</p>
                            </div>
                          </li>
                        </ul>
                        <ul
                          class="select_ul opacity-0 absolute transition-opacity duration-300  left-0 w-full rounded  top-14 bg-white">
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
                    </div>
                  </div>
      @stop