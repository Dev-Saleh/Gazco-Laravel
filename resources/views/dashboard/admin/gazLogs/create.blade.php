        <details open class="cursor-auto text-lg font-medium leading-6 text-gray-900 ">
            <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
                <a href=""> إرسال دفعه جديده </a>
                <div class="border-t border-gray-200">
                </div>
            </summary>
            <br>
            <div class="">

                <form action="" method="POST" id='gazLogsForm'>
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6 rounded-xl ">
                        @csrf
                        <input type="text" name='id' style="display:none;" class="form-control" id="gazLogId">
                        <!-- GRID ONE -->
                        <div class="grid grid-cols-6 gap-4">
                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full">
                                    <select name="staId" value="" id='select_Stations'
                                        onclick="this.setAttribute('value', this.value);"
                                        class="hover:border-blue-600  pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-blue-900 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200">
                                        <option value="" id='select_Station' selected disabled hidden></option>
                                        @if ($stations && $stations->count() > 0)
                                            @foreach ($stations as $sta)
                                                <option value="{{ $sta->id }}">{{ $sta->staName }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <label for="select"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم
                                        المحطه</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                        selected</span>
                                   <small id='staId_error' style='color:red'></small>

                                </div>
                            </div>

                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full">
                                    <input type="number" name="qty" id='qty' placeholder=" "
                                        class="hover:border-blue-600 pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200" />
                                    <label for="name"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الكميه</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                    <small id='qty_error' style='color:red'></small>
                                </div>
                            </div>

                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full">
                                    <input type="datetime-local" name="created_at" id='created_at' placeholder=" "
                                        required
                                        class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                    appearance-none focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200
                                    hover:border-blue-600 text-blue-900" />
                                    <label for="name"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">تاريخ
                                        الدفعه</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                    <small id='created_at_error' style='color:red'></small>
                                </div>
                            </div>



                        </div>

                        <!-- GRID TWO -->
                        <div class="grid grid-cols-6 gap-4">

                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full mb-5">
                                    <select name="dirId" value="" id='select_Directorates' onchange="f('select_Rigons');" 
                                        onclick="this.setAttribute('value', this.value);" 
                                        class="hover:border-blue-600  pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-blue-900 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-blue-700 border-gray-200">
                                        <option value="" id='select_Directorate' selected disabled hidden></option>
                                        @if ($directorates && $directorates->count() > 0)
                                            @foreach ($directorates as $dir)
                                                <option value="{{ $dir->id }}">
                                                    {{ $dir->dirName }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <label for="select"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">المديريه</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                        selected</span>
                                   <small id='dirId_error' style='color:red'></small>
                                </div>
                            </div>



                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full mb-5">
                                    <select name="rigId" value="" id='select_Rigons' onchange="f('select_Agents');"
                                        onclick="this.setAttribute('value', this.value);" 
                                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-indigo-500 border-gray-200">
                                        <option value="" id='select_Rigon' selected disabled hidden></option>
                                    </select>
                                    <label for="select"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">المربع</label>
                                    <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                        selected</span>
                                   <small id='rigId_error' style='color:red'></small>
                                </div>
                            </div>

                            <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                                <div class="relative z-0 w-full mb-5">
                                    <select name="agentId" value="" id='select_Agents' 
                                         onclick="this.setAttribute('value', this.value);"
                                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-indigo-500 border-gray-200">
                                        <option value="A" id='select_Agent' selected disabled hidden></option>
                                    </select>
                                    <label for="select"
                                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الموزع
                                    </label>
                                    <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                        selected</span>
                                       <small id='agentId_error' style='color:red'></small>
                                </div>
                            </div>

                        </div>




                        <!-- GRID THREE -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="span-col-1">
                                <label for="about" class="block text-sm font-medium text-gray-700">
                                    ملاحظات
                                </label>
                                <div class="mt-1">
                                    <textarea name="notice" id='notice' rows="8"
                                        class="p-2 shadow-sm focus:ring-indigo-500 
                            focus:border-indigo-500 mt-2 block w-full
                            sm:text-sm border border-gray-300 rounded-md h-full"
                                        placeholder="انت موقف راجع الاداره"></textarea>
                                </div>
                                <small id='notice_error' style='color:red'></small>
                            </div>
                            <div>
                                <div class="p-20 bg-transparent text-center sm:px-6  rounded-3xl">
                                    <button type="submit" id='saveGazLogs'>
                                        <a class="  rounded-lg relative w-72 inline-block px-8 py-3 overflow-hidden border border-indigo-600 group focus:outline-none focus:ring" href="/download">
                                            <span class="absolute inset-x-0 top-0 h-full transition-all bg-indigo-600 group-hover:h-[1px] group-active:bg-indigo-500"></span>
                                          
                                            <span class="relative text-sm font-medium text-indigo-50 transition-colors group-hover:text-indigo-500">
                                               ارسال الدفعه
                                            </span>
                                          </a>                                      
                                    </button>
                                    <button type="submit" id='updateGazLogs' style='display:none;'
                                        class="w-72 inline-flex justify-center py-2 px-4 border bg-transparent shadow-sm text-sm font-medium rounded-3xl text-white bg-indigo-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        تعديل الدفعه
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </details>
        <br>
        <br>


        <details class="cursor-auto text-lg font-medium leading-6 text-gray-900">
            <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
                <a href="#c_logs">سجل الدفعات </a>
                <div class="border-t border-gray-200">
                </div>
            </summary>
            <br>
            <div class="mx-auto w-full">
               {{-- START SEARCH FORM --}}
           <form action="" method="POST" id='formGazLogsSearch'>
              @csrf
            <div class="flex mx-auto w-[700px] my-2 bg-white rounded-full shadow-md py-4 px-8">
                      
               
                <select id="filterGazLogsSearch"  name="filterGazLogsSearch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5">
                    <option value='all' selected>بحث الكل</option>
                    <option value="numberId">رقم الدفعه</option>
                    <option value="staName">المحطه</option>
                    <option value="dirName">المديريه</option>
                    <option value="rigName">المربع</option>
                    <option value="agentName">الموزع</option>
                </select>
           
                <div class="relative w-full">
                    <button type="submit" class="h-12 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">بحث</span>
                    </button>
                    <input type="search" id="textGazLogssearch" name="textGazLogsSearch" class="h-12 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500  dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="ابحث عن اسم او رقم او تاريخ ..." required="">
                </div>
                
            </div>
            </form>
               {{-- END SEARCH FORM --}}
                <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
                <div class=" relative overflow-y-auto" style="height: 590px;">
                    <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                        <thead class="bg-gray-200 text-gray-500 tableFixed">
                            <tr>
                                <th class="p-3">الرقم</th>
                                <th class="p-3 text-center">المحطه</th>
                                <th class="p-3 text-center">المديريه</th>
                                <th class="p-3 text-center">المربع</th>
                                <th class="p-3 text-center">العمليات</th>
                            </tr>
                        </thead>
                        <tbody id="fetchLestGazLog">
                            @if ($gazLogs && $gazLogs->count() > 0)
                                @foreach ($gazLogs as $gazLog)
                                    <tr
                                        class="offerRow{{ $gazLog->id }} bg-white hover:scale-95 transform transition-all ease-in ">
                                        <td class="p-3 text-center">
                                            {{ $gazLog->id }}
                                        </td>
                                        <td class="p-3 text-center">
                                            {{ $gazLog->station->staName }}
                                        </td>
                                        <td class="p-3 text-center">
                                            {{ $gazLog->directorate->dirName }}
                                        </td>

                                        <td class="p-3 text-center">
                                            {{ $gazLog->rigon->rigName }}
                                        </td>
                                        <td class="p-3 text-center">
                                            <span
                                                class="bg-green-400 text-gray-50 rounded-md px-2">{{ $gazLog->agent->agentName }}</span>
                                        </td>
                                        <td class="p-1 transition-all ease-in duration-150 flex  justify-center">
                                            <div id="action-div"
                                                class="flex space-x-2  transition-all ease-in duration-150">
                                                <a onclick="deleteAlert($(this).attr('gazLogId'));" href="#" gazLogId="{{ $gazLog->id }}"
                                                    class="text-red-400  hover:text-red-600 float-left ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                                <a href="#" gazLogId="{{ $gazLog->id }}"
                                                    class="gazLogEdit text-yellow-400 hover:text-yellow-600  mx-4">
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
