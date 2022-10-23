@extends('dashboard.admin.reports.index')
@section('view')

<div id="batchReport" class="">
  <!-- select section -->
  <form action="" method="POST" id='batchReportForm'>
   @csrf
  <div class="p-6 bg-white shadow-sm rounded-xl">
    <div class="grid grid-cols-5 gap-x-10 gap-y-2 ">
      <select name="dirId" value="" id='selectDirectorates' class="form-select form-select-lg 
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
        <option selected>المديريه</option>
           @if ($directorates && $directorates->count() > 0)
              @foreach ($directorates as $dir)
                  <option value="{{ $dir->id }}">
                      {{ $dir->dirName }}</option>
              @endforeach
           @endif
      </select>
      <select name="rigId" value="" id='selectRigon' class="form-select form-select-lg 
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
            <option selected>المربع</option>
           
      </select> 
      <select name="agentId" value="" id='selectAgent' class="form-select form-select-lg 
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
              <option selected>الموزع</option>
             
      </select>
      <div class="relative z-0 w-full">
        <input type="date" name="dateForm" id='dateFrom' placeholder=" " required class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                   appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                   hover:border-blue-600 text-blue-900" />
        <label for="from" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">
          من</label>
        <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
      </div>
      <div class="relative z-0 w-full">
        <input type="date" name="dateTo" id='dateTo' placeholder=" " required class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                   appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                   hover:border-blue-600 text-blue-900" />
        <label for="to" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">
          إلى</label>
        <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
      </div>

      <div class="col-span-5 mx-auto">
      <button type="" id='btnShowBatchReports'>
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

          <div class="group rounded-tr-none rounded-full bg-teal-500 w-full h-40 flex flex-col justify-center items-center space-y-2 hover:animate-wiggle">
                  <p class="text-teal-900 text-lg">عدد الدفعات</p>
                  <span id='batchCount' class="text-teal-200 text-base bg-teal-700 rounded-full rounded-tr-none p-2 py-1 group-hover:animate-bounce"></span>
          </div>
          <div class="group rounded-tl-none rounded-full bg-purple-500 w-full h-40 flex flex-col justify-center items-center space-y-2 hover:animate-wiggle">
            <p class="text-purple-900 text-lg">اجمالي الدفعات</p>
            <span id='batchResult' class="text-purple-200 text-base bg-purple-700 rounded-full rounded-tl-none p-2 py-1 group-hover:animate-bounce"></span>
          </div>
          <div class="group rounded-tr-none rounded-full bg-yellow-500 w-full h-40 flex flex-col justify-center items-center space-y-2 hover:animate-wiggle">
            <p class="text-yellow-900 text-lg"> التي تم فتح الحجز</p>
            <span id='allowBookingCount' class="text-yellow-200 text-base bg-yellow-700 rounded-full rounded-tr-none p-2 py-1 group-hover:animate-bounce"></span>
          </div>
          <div  class="group rounded-tl-none rounded-full bg-sky-500 w-full h-40 flex flex-col justify-center items-center space-y-2 hover:animate-wiggle">
            <p class="text-sky-900 text-lg"> التي لم يتم فتح الحجز </p>
            <span id='anyThings' class="text-sky-200 text-base bg-sky-700 rounded-full rounded-tl-none p-2 py-1 group-hover:animate-bounce"></span>
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
            <form action="{{route('batchReports.exportExcelBatch')}}" method="get" >
             @csrf
            <input  type="" value='2022-09-05' name='valueDateForm' style="display:none;" class="form-control" id="valueDateForm">
            <input  type="" value='2023-05-03' name='valueDateTo'  style="display:none;" class="form-control" id="valueDateTo">    
            <button type="submit" id="btnBatchPdf"    class='h-8 w-8 bg-red-100 p-1 rounded-full'><img src="{{ asset('assets/images/pdf.png') }}" alt="PDF"></button>
            <button type="submit"  id="btnBatchExcel"  class='h-8 w-8 bg-green-100 p-1 rounded-full'><img src="{{ asset('assets/images/sheets.png') }}" alt="Excel"></button>
           </form>
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
            <tbody id='fetchLestGazLogs'>
           
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