@extends('dashboard.admin.reports.index')
@section('title')
موظف | تقرير مواطنين
@stop
@section('view')

<div id="batchReport" class="">
  <!-- select section -->
  <form action="" method="" id='citizenReportForm'>
     @csrf
      <div class="p-6 bg-white shadow-sm rounded-xl">
        <div class="grid grid-cols-5 gap-x-10 gap-y-2 ">
      <select name="dirId" value="" id='citSelectDirectorates' class="form-select form-select-lg 
                appearance-none
                block
                w-full
                px-4
                py-2
                text-xl
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-lg example">
            <option selected disabled>المديريه</option>
              @if ($directorates && $directorates->count() > 0)
                  @foreach ($directorates as $dir)
                      <option value="{{ $dir->id }}">
                          {{ $dir->dirName }}</option>
                  @endforeach
              @endif
          </select>
          <select name="rigId" value="" id='citSelectRigon'  class="form-select form-select-lg 
                appearance-none
                block
                w-full
                px-4
                py-2
                text-xl
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-lg example">
              
                <option selected disabled >المربع</option>
              
          </select> 
          <select name="agentId" value="" id='citSelectAgent' class="form-select form-select-lg 
                  appearance-none
                  block
                  w-full
                  px-4
                  py-2
                  text-xl
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding bg-no-repeat
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-lg example">
                  <option selected disabled>الموزع</option>
                
          </select>
          <div class="col-span-5 mx-auto">
          <button type="submit" id='btnShowCitizenReports'>
            <a  class="relative inline-flex items-center px-8 py-3 overflow-hidden text-white bg-indigo-600 rounded group active:bg-indigo-500 focus:outline-none focus:ring" href="">
              <span class="absolute left-0 transition-transform -translate-x-full group-hover:translate-x-4">
                <svg class="w-5 h-5" xmlns="" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </span>
              <span  class="text-sm font-medium transition-all group-hover:ml-4">
                  أظهر
              </span>
            </a>
            </button> 
          </div>
        </div>
      </div>
  </form>
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

          <div class="group   bg-pink-500 w-full h-36 rounded-md shadow-sm flex flex-col justify-center items-center space-y-2 hover:animate-wiggle ">
                  <p class="text-pink-900 text-lg">عدد المواطنين</p>
                  <span id='citizenCount' class="text-pink-200 text-base bg-pink-700  p-2 py-1 group-hover:animate-bounce">00</span>
          </div>
          <div class="group -none  bg-indigo-500 w-full h-36 rounded-md shadow-sm  flex flex-col justify-center items-center space-y-2 hover:animate-wiggle ">
            <p class="text-indigo-900 text-lg">المواطنين الموثقين</p>
            <span id='citCheckedTrue' class="text-indigo-200 text-base bg-indigo-700  p-2 py-1 group-hover:animate-bounce">00</span>
          </div>
          <div class="group -none  bg-rose-500 w-full h-36 rounded-md shadow-sm  flex flex-col justify-center items-center space-y-2 hover:animate-wiggle ">
            <p class="text-rose-900 text-lg">غير الموثقين</p>
            <span id='citCheckedFalse' class="text-rose-200 text-base bg-rose-700  p-2 py-1 group-hover:animate-bounce">00</span>
          </div>
          <div  class="group -none  bg-sky-500 w-full h-36 rounded-md shadow-sm  flex flex-col justify-center items-center space-y-2 hover:animate-wiggle ">
            <p class="text-sky-900 text-lg">عدد الحجوزات</p>
            <span id='bookingCount' class="text-sky-200 text-base bg-sky-700  p-2 py-1 group-hover:animate-bounce">00</span>
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
              {{-- START SEARCH FORM --}}
          <div class="flex mx-auto w-full">
                      
               
            <select id="filterSearch" class="bg-gray-50 border h-8 border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-1">
                <option selected>بحث الكل</option>
                <option value="cn">الاسم</option>
                <option value="cn">الرقم الوطني</option>
                <option value="dr">المديريه</option>
                <option value="sq">المربع</option>
            </select>
       
            <div class="relative w-full">
                <button type="submit" class="h-8 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                
                </button>
                <input type="search" id="search-dropdown" class="h-8 block p-1 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500 " placeholder="ابحث عن اسم او رقم او تاريخ ..." required="">
            </div>
            
        </div>
           {{-- END SEARCH FORM --}}
            <form action="{{route('citizenReports.exportExcelCitizen')}}" method="get" >
             @csrf
             <input  type="" value='2023-05-03' name='agentId'  style="display:none;" class="form-control" id="agentId">    
            <button type="submit" id="btnCitizenPdf"    class='h-8 w-8 bg-red-100 p-1 rounded-full'><img src="{{ asset('assets/images/pdf.png') }}" alt="PDF"></button>
            <button type="submit"  id="btnCitizenExcel"  class='h-8 w-8 bg-green-100 p-1 rounded-full'><img src="{{ asset('assets/images/sheets.png') }}" alt="Excel"></button>
           </form>
           </div>
      
        <div class=" relative overflow-y-auto h-[300px]">
          <table class="table">
            <thead class="bg-white tableFixed">
              <tr>
                  <th class="p-3">الرقم</th>
                  <th class="p-3 text-center">اسم المواطن</th>
                  <th class="p-3 text-center">رقم الوطني</th>
                  <th class="p-3 text-center">رقم الجوال</th>
                  <th class="p-3 text-center">المطابقه</th>
                  <th class="p-3 text-center">أسم المراقب</th>
              </tr>
            </thead>
            <tbody id='fetchLestCitizen'>
           
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
  <!-- Start Code Ajax -->
      @include('dashboard.admin.includes.ajax.citizenReport');
  <!-- End Code Ajax -->