<div class="px-4 py-4 sm:px-0">
    <h3 class="text-lg font-medium leading-6 text-gray-900">اضافة و عرض الموزعين</h3>
</div>
<div class=" py-4 border-t border-gray-200">
</div>
<!-- END Line -->
<div dir="rtl" id="container" class="flex">


    <div class="ml-10 p-6 bg-white border-0 shadow-lg rounded-xl w-full h-full">
        <form action="" method="POST" id='agentForm'>
            @csrf
            <input type="text" name='id' style="display:none;" class="form-control" id="agentId">
            <div class="flex-col items-center justify-center flex space-y-8">

                <label for="file-ip-1"
                    class="relative cursor-pointer bg-white rounded-xl font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 border-2 border-blue-700 px-2">
                    <span>رفع صوره</span>
                    <input id="file-ip-1" name='Photo' id='agentPhoto' accept="image/*"
                        onchange="showPreviewUser(event);" type="file" class="sr-only">
                </label>

                <div class="mt-2 flex h-48 w-48  border-2 bg-gray-100 border-gray-500 border-dashed rounded-full">
                    <img class="rounded-full w-48 h-48 object-cover" src="" class='image'
                        id="file-ip-1-preview" alt="" style="display: none;" class="w-52 h-28">
                    <small id='Photo_error' style='color:red'></small>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="agentName" id='agentName' placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم
                        الموزع</label>
                    <span class="text-sm text-red-600 hidden" id="error">اسم الموزع مطلوب !</span>
                    <small id='agentName_error' style='color:red'></small>
                </div>



                <div class="relative z-0 w-full mb-5">
                    <select name="dirId" value="s" id='select_directorates'
                        onclick="this.setAttribute('value', this.value);" onchange="f('select_rigons');"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        {{-- <option value="" id='select_directorate' selected disabled hidden></option> --}}
                        @if ($directorates && $directorates->count() > 0)
                            @foreach ($directorates as $dir)
                                <option value="{{ $dir->id }}">{{ $dir->dirName }}</option>
                            @endforeach
                        @endif
                    </select>
                    <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اختر
                        المديريه</label>
                    <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                    <small id='dirId_error' style='color:red'></small>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <select name="rigId" value="s" id='select_rigons'
                        onclick="this.setAttribute('value', this.value);"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        {{-- <option value="" id='select_rigon' selected disabled hidden></option> --}}
                    </select>
                    <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-slate-500">اختر
                        المربع</label>
                    <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                    <small id='rigId_error' style='color:red'></small>
                </div>


                <button id='saveAgent' type="submit">
                    <a class="  rounded-lg relative w-72 inline-block px-8 py-3 overflow-hidden border border-indigo-600 group focus:outline-none focus:ring"
                        href="/download">
                        <span
                            class="absolute inset-x-0 top-0 h-full transition-all bg-indigo-600 group-hover:h-[1px] group-active:bg-indigo-500"></span>

                        <span
                            class="relative text-sm font-medium text-indigo-50 transition-colors group-hover:text-indigo-500">
                            أضافة الوكيل
                        </span>
                    </a>
                </button>
                <button type="submit" id='updateAgent' style='display:none;' class="">
                    <a class="w-72 relative inline-block px-8 py-3 overflow-hidden border border-indigo-600 group focus:outline-none focus:ring"
                        href="/download">
                        <span
                            class="absolute inset-x-0 bottom-0 h-full transition-all bg-indigo-600 group-hover:h-[1px] group-active:bg-indigo-500"></span>

                        <span
                            class="relative text-sm font-medium text-indigo-50 transition-colors group-hover:text-indigo-500">
                            تعديل الوكيل
                        </span>
                    </a>
                </button>

            </div>
        </form>
    </div>



    <!-- Table Section -->
    <div class="mx-auto w-full ">
        {{-- START SEARCH FORM --}}
        <form action="" method="Post" id='agentSearch'>
            @csrf
            <div class="flex mx-auto w-full my-2">


                <select id="filterSearch" name="filterSearch"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5">
                    <option value="all" selected>بحث الكل</option>
                    <option value="agentName">الاسم</option>
                    <option value="id">رقم الوكيل</option>
                    <option value="dirId">المديريه</option>
                    <option value="rigId">المربع</option>
                </select>

                <div class="relative w-full">
                    <button type="submit" id='search'
                        class="h-12 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">بحث</span>
                    </button>
                    <input type="search" id="search-dropdown" name="inputSearch"
                        class="h-12 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500  dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="ابحث عن اسم او رقم او تاريخ ..." required="">
                </div>
        </form>

    </div>
    {{-- END SEARCH FORM --}}

    <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
    <div class=" relative overflow-y-auto overflow-x-hidden" style="height: 550px;">
        <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
            <thead class="bg-gray-200 text-gray-500 tableFixed">
                <tr>
                    <th class="p-3">الرقم</th>
                    <th class="p-3 text-center">الاسم</th>
                    <th class="p-3 text-center">الصوره</th>
                    <th class="p-3 text-center">المديريه</th>
                    <th class="p-3 text-center">العمليات</th>
                </tr>
            </thead>
            <tbody id='fetchLastAgent'>
                @if ($agents && $agents->count() > 0)
                    @foreach ($agents as $agent)
                        <tr
                            class="offerRow{{ $agent->id }} bg-white hover:scale-95 transform transition-all ease-in">
                            <td class="p-3 text-center">
                                {{ $agent->id }}
                            </td>
                            <td class="p-3 text-center flex-wrap">
                                {{ $agent->agentName }}
                            </td>
                            <td class="p-3 text-right">
                                <img class="rounded-full h-12 w-12  object-cover" src="{{ $agent->Photo['valsrc'] }}"
                                    alt="unsplash image">
                            </td>
                            <td class="p-3 text-center whitespace-nowrap">
                                <span
                                    class="bg-green-400 text-gray-50 rounded-md px-2">{{ $agent->directorate->dirName }}</span>
                            </td>

                            <td class="p-3 grid grid-cols-2 justify-center">
                              
                                <a  onclick="deleteAlert($(this).attr('agentId'));" href="#" agentId="{{ $agent->id }}"
                                    class="  text-red-400  hover:text-red-600  ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                                <a href="#" agentId="{{ $agent->id }}"
                                    class="agentEdit text-yellow-400 hover:text-yellow-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


</div>
