    <details open class=" cursor-auto text-lg font-medium leading-6 text-gray-900 ">
        <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
            <a href="">أضافة مراقب </a>

            <div class="border-t border-gray-200">
            </div>
        </summary>
        <br>
        <div class="">
            <form action="#" method="POST" id='observerForm'>
                @csrf
                <input type="text" name='id' style="display:none;" class="form-control" id="obsId">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6 rounded-xl ">
                    <!-- GRID ONE -->
                    <div class="grid grid-cols-6 gap-4">

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input onchange="convertStrToUser(document.getElementById('obsName').value);"
                                    id="obsName" type="text" name="obsName" placeholder=" " required
                                    class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                 appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                                 hover:border-blue-600 text-blue-900" />
                                <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم
                                    المراقب</label>
                                <span class="text-sm text-red-600 hidden" id="error">الاسم مطلوب !</span>
                               <small id='obsName_error' style='color:red'></small>
                            </div>
                        </div>


                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="text" name="obsUserName" id="obsUserName" placeholder=" "
                                    required
                                    class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                 appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                                 hover:border-blue-600 text-blue-900" />
                                <label for="name"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Username</label>
                                <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                <small id='obsUserName_error' style='color:red'></small>
                            </div>
                        </div>

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="text" name="obsPassword" id="obsPassword" placeholder=" "
                                    required
                                    class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                  appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                                  hover:border-blue-600 text-blue-900" />
                                <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الرقم
                                    السري</label>
                                <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                <small id='obsPassword_error' style='color:red'></small>
                            </div>
                        </div>



                    </div>
                    <!-- GRID TWO -->
                    <div class="grid grid-cols-6 gap-4">

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full mb-5">
                                <select name="dirId" value="" id='select_directorates' onchange="f('select_rigons');" 
                                    onclick="this.setAttribute('value', this.value);"
                                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-indigo-500 border-gray-200">
                                    <option value="" id='select_directorate' selected disabled hidden></option>
                                    @if ($directorates && $directorates->count() > 0)
                                        @foreach ($directorates as $dir)
                                            <option value="{{ $dir->id }}">{{ $dir->dirName }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <label for="select"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">المديريه</label>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                               <small id='dirId_error' style='color:red'></small>
                            </div>
                        </div>


                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full mb-5">
                                <select name="rigId" value="" id='select_rigons' onchange="f('select_agents');"
                                    onclick="this.setAttribute('value', this.value);"
                                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-indigo-500 border-gray-200">
                                    <option value="" id='select_rigon'></option>
                                </select>
                                <label for="select"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">المربع</label>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                                  <small id='rigId_error' style='color:red'></small>
                            </div>
                        </div>

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full mb-5">
                                <select name="agentId" value="" id='select_agents'
                                    onclick="this.setAttribute('value', this.value);"
                                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-indigo-500 border-gray-200">
                                    <option value="" id='select_agent' selected disabled hidden></option>
                                </select>
                                <label for="select"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الوكيل المراقب عليه</label>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                                  <small id='agentId_error' style='color:red'></small>
                            </div>
                        </div>
                    </div>
                    <!-- GRID THREE -->
                    <div class="grid grid-cols-6 gap-4">

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="text"  name="obsWhatsNum" id="obsWhatsNum" placeholder=" "
                                    required
                                    class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                  appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                                  hover:border-blue-600 text-blue-900" />
                                <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">
                                    رقم الواتس للشكاوي
                                    </label>
                                <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                <small id='obsWhatsappNum_error' style='color:red'></small>
                            </div>
                        </div>

                        <div class="md:col-span-4  mt-1 px-4 py-3 bg-transparent text-center sm:px-6  rounded-3xl">
                            <button type="submit" id='saveObserver'>
                            <a class="rounded-lg relative w-72 inline-block p-2 overflow-hidden border border-indigo-600 group focus:outline-none focus:ring" href="/download">
                                <span class="absolute inset-x-0 top-0 h-full transition-all bg-indigo-600 group-hover:h-[1px] group-active:bg-indigo-500"></span>
                              
                                <span class="relative text-sm font-medium text-indigo-50 transition-colors group-hover:text-indigo-500">
                                  أضافة المراقب
                                </span>
                              </a>
                            </button>
                            <button type="submit" id='updateObserver' style='display:none;'>
                                 <a class="  rounded-lg relative w-72 inline-block px-8 py-3 overflow-hidden border border-indigo-600 group focus:outline-none focus:ring" href="/download">
                                <span class="absolute inset-x-0 top-0 h-full transition-all bg-indigo-600 group-hover:h-[1px] group-active:bg-indigo-500"></span>
                              
                                <span class="relative text-sm font-medium text-indigo-50 transition-colors group-hover:text-indigo-500">
                                   تعديل المراقب
                                </span>
                              </a>
                            </button>
                        </div>

                        
                    </div>
                    

            </form>
        </div>
    </details>
    


    <br>
    <br>
    <details class="cursor-auto text-lg font-medium leading-6 text-gray-900 ">
        <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
            <a href="#c_logs">سجل المراقبين </a>
            <div class="border-t border-gray-200">
            </div>
        </summary>
        <br>
            {{-- START SEARCH FORM --}}
           <form action="" method="Post" id='formObsSearch'>
             @csrf 
            <div class="flex mx-auto w-[700px] my-2 bg-white rounded-full shadow-md py-4 px-8">
                      
                <select id="filterObsSearch" name="filterObsSearch"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5">
                    <option value="all" selected>بحث الكل</option>
                    <option value="obsName">اسم المراقب</option>
                    <option value="agentId">الوكيل المراقب عليه</option>
                    <option value="id">رقم المراقب</option>
                    <option value="dirId">المديريه</option>
                    <option value="rigId">المربع</option>
                </select>
           
                <div class="relative w-full">
                    <button type="submit" class="h-12 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">بحث</span>
                    </button>
                    <input type="search" name="textObsSearch" id="textObsSearch" class="h-12 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500  dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="ابحث عن اسم او رقم او تاريخ ..." required="">
                </div>
                
            </div>
            </form>
               {{-- END SEARCH FORM --}}
        <div class="mx-auto w-full">
            <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
            <div class=" relative overflow-y-auto" style="height: 590px;">
                <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                    <thead class="bg-gray-200 text-gray-500 tableFixed">
                        <tr>
                            <th class="p-3">الرقم</th>
                            <th class="p-3 text-center">اسم المراقب</th>
                            <th class="p-3 text-center">المديريه</th>
                            <th class="p-3 text-center">المربع</th>
                            <th class="p-3 text-center">الوكيل المراقب عليه</th>
                            <th class="p-3 text-right">العمليات</th>
                        </tr>
                    </thead>
                    <tbody id='fetchLastObserver'>
                        @if ($observers && $observers->count() > 0)
                            @foreach ($observers as $obs)
                                <tr
                                    class="offerRow{{ $obs->id }} bg-white hover:scale-95 transform transition-all ease-in">
                                    <td class="p-3 text-center">
                                        {{ $obs->id }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ $obs->obsName }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ $obs->directorate->dirName }}
                                    </td>

                                    <td class="p-3 text-center">
                                        {{ $obs->rigon->rigName }}
                                    </td>
                                    <td class="p-3 text-center whitespace-nowrap">
                                        <span
                                            class="bg-green-400 text-gray-50 rounded-md px-2">{{ $obs->agent->agentName }}</span>
                                    </td>
                                    <td class="p-1 transition-all ease-in duration-150">
                                        <div id="delete-alert"
                                            class=" h-10 w-28 rounded-full overflow-hidden transition-all ease-in duration-150 hidden">
                                            <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                                            <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                                        </div>
                                        <div id="action-div"
                                            class="flex transition-all ease-in duration-150">
                                            <a onclick="deleteAlert();" href="#" obsId="{{ $obs->id }}"
                                                class="observerDelete text-red-400  hover:text-red-600 float-left ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                            <a href="#" obsId="{{ $obs->id }}" 
                                                class="observerEdit text-yellow-400 hover:text-yellow-600  mx-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                           
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </details>


