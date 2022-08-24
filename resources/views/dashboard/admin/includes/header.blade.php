<nav id="Navbar" class="h-16 w-full bg-gray-100 ">
    <div class="px-6 py-2 mx-4 mt-4 bg-white  rounded-full ">
        <div class="grid grid-cols-12 ">
            <div class="col-span-3 flex items-center justify-between">
                <div class="text-xl font-semibold text-gray-700 mr-2">
                    <a class="text-2xl font-bold font-cairo text-gray-700  hover:text-blue-600 text-right "
                        href="#">غـازكو</a>
                </div>


            </div>
            <div class="col-span-6 h-8">
                <form>
                    <div dir="rtl" class="flex">
                      
                        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center h-8 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-r-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">بحث بواسطة<svg aria-hidden="true" class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                        <div id="dropdown" class="z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 hidden absolute right-2 top-12"  data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">الاسم</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"> الرقم الوطني</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">رقم الدفعه</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">اسم المراقب</button>
                            </li>
                            </ul>
                        </div>
                      <div class="relative w-full">
                        <button type="submit" class="h-8 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                          <span class="sr-only">بحث</span>
                      </button>
                        <input type="search" id="search-dropdown" class="h-8 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500  dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="ابحث عن اسم او رقم او تاريخ ..." required="">
                       
                     </div>
                        
                     
                    </div>
                </form>
            </div>
            <div class="col-span-3 flex flex-row-reverse ">
                <button type="button" class="left-0 h-8 w-8 rounded-full">
                    <img class="h-8 w-8 rounded-full" src="{{ asset('assets/images/Dev-SL.jpeg') }}" alt="Admin">
                </button>
            </div>
        </div>
    </div>
</nav>
