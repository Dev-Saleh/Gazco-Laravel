<details class="cursor-auto text-lg font-medium leading-6 text-gray-900 ">
    <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
        <a href="">أضافة مواطن </a>

        <div class="border-t border-gray-200">
        </div>
    </summary>
    <br>
    <div class="">
        <form action="#" method="POST" id="citForm">
            @csrf
            <input type="text" name='id' style="display:none;" class="form-control" id="citId">
            <input type="text" name='obsId' value="{{ $observers->id }}" style="display:none;" class="form-control"
                id="observer_Id">
            <div class="">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6 rounded-xl ">
                    <!-- GRID ONE -->
                    <div class="grid grid-cols-6 gap-4">
                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="text" name="citName" id='citName' placeholder=" " required
                                    class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                   appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200
                                   hover:border-black text-black" />
                                <label for="name"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم
                                    المواطن  <small id='citName_error' style='color:green'>(رب الاسره 👨‍👧‍👦)</small></label>
                                <span class="text-sm text-red-600 hidden" id="error">الاسم مطلوب !</span>
                                <small id='citName_error' style='color:red'></small>
                            </div>
                        </div>

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="number" name="identityNum" id='identityNum' minlength="3" placeholder=" "
                                    onchange="convertNumToIdentity(document.getElementById('identityNum').value);"
                                    class="hover:border-black pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <label for="name"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">رقم
                                    الهويه</label>
                                <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                <small id='identityNum_error' style='color:red'></small>
                            </div>
                        </div>
                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">

                            <div class="relative z-0 w-full ">
                                <input type="text" name="citPassword" id='citPassword' placeholder=" "
                                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none
                          hover:border-black focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <label for="password"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الرقم السري
                                </label>
                                <span class="text-sm text-red-600 hidden" id="error">Password is required</span>
                                <small id='citPassword_error' style='color:red'></small>
                            </div>
                        </div>



                    </div>

                    <!-- GRID TWO -->
                    <div class="grid grid-cols-6 gap-4">

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="number" name="mobileNum" id='mobileNum' placeholder=" "
                                  
                                    class="hover:border-black pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <label for="name"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">رقم
                                    الجوال</label>
                                <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                <small id='mobileNum_error' style='color:red'></small>
                            </div>
                        </div>

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full mb-5">
                                <select name="dirId" value="{{ $observers->dirId }}" id='select_directorates'
                                    onchange="f('select_rigons');" onclick="this.setAttribute('value', this.value);"
                                    class="hover:border-black  pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-black appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option value="{{ $observers->dirId }}" id='select_directorate'>
                                        {{ $observers->directorate->dirName }}</option>
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
                                <select name="rigId" id='select_rigons' value="{{ $observers->rigId }}"
                                    onclick="this.setAttribute('value', this.value);"
                                    class="hover:border-black pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-black appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option value="{{ $observers->rigId }}">{{ $observers->rigon->rigName }}</option>
                                </select>
                                <label for="select"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">المربع</label>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                    selected</span>
                                <small id='rigId_error' style='color:red'></small>
                            </div>
                        </div>



                    </div>


                    <!-- GRID THREE -->

                    <!-- GRID THREE -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="span-col-1 flex flex-col items-center">

                            <label for="file-ip-1"
                                class="px-10 relative cursor-pointer bg-white rounded-xl font-medium text-black hover:text-black focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-black border-2 border-black">
                                <span>رفع صورة الهويه</span>
                                <input id="file-ip-1" name='attachment' accept="image/*"
                                    onchange="showPreviewUser(event);" type="file" class="sr-only">
                            </label>

                            <div
                                class="mt-4 flex h-48 w-full  border-2 bg-gray-200 border-gray-500 border-dashed rounded">
                                <img class="rounded w-full h-48 object-cover" src="" id="file-ip-1-preview"
                                    alt="" style="display: none;" class="w-52 h-28">
                            </div>
                            <small id='attachment_error' style='color:red'></small>

                        </div>

                        <div>
                            <div class="p-20 bg-transparent text-center sm:px-6  rounded-3xl">
                                <!-- Base -->




                                <button type="submit" id='saveCitizen'>
                                    <a class="relative inline-block group focus:outline-none focus:ring"
                                        href="/download">
                                        <span
                                            class="absolute inset-0 transition-transform translate-x-1.5 translate-y-1.5 bg-emerald-400 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                                        <span
                                            class="relative inline-block px-8 py-3 text-sm font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75">
                                            تسجيل المواطن
                                        </span>
                                    </a>
                                </button>
                                <button type="submit" id='updateCitizen' style='display:none;'>
                                    <a class="relative inline-block group focus:outline-none focus:ring"
                                        href="/download">
                                        <span
                                            class="absolute inset-0 transition-transform translate-x-1.5 translate-y-1.5 bg-emerald-400 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                                        <span
                                            class="relative inline-block px-8 py-3 text-sm font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75">
                                            تعديل المواطن
                                        </span>
                                    </a>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</details>


<br>
<details class="cursor-auto text-lg font-medium leading-6 text-gray-900 ">
    <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
        <a href="">أضافة فرد تابع </a>

        <div class="border-t border-gray-200">
        </div>
    </summary>
    <br>
    <div class="">
        <form action="" method="POST" id="fmForm">
            @csrf
            <input type="text" name='id' style="display:none;" class="form-control" id="familyMemberId">
             
            <div class="">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6 rounded-xl ">
                    <!-- GRID ONE -->

                    <div class="grid grid-cols-6 gap-4">
                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full mb-5">
                             
                                <select name="citId" value="رب الاسره" id='selectCitizen'
                                    onchange="f('selectCitizen');" onclick="this.setAttribute('value', this.value);"
                                    class="hover:border-black  pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-black appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                              
                                    @if ($allCitizens && $allCitizens->count() > 0)
                                        @foreach ($allCitizens as $cit)
                                            <option value="{{ $cit->id }}">{{ $cit->citName }}</option>
                                        @endforeach
                                    @endif

                                </select>
                                <label for="select"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">رب الاسره</label>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                    selected</span>
                                <small id='citId_fmerror' style='color:red'></small>
                            </div>
                        </div>
                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="text" name="fmName" id='fmName' placeholder=" " required
                                    class="pt-3 pb-2 block w-full px-1 mt-0 bg-transparent border-0 border-b-2
                                   appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200
                                   hover:border-black text-black" />
                                <label for="name"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم
                                    الفرد</label>
                                <span class="text-sm text-red-600 hidden" id="error">الاسم مطلوب !</span>
                                <small id='fmName_fmerror' style='color:red'></small>
                            </div>
                        </div>

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="number" name="identityNum" id='identityNum' minlength="3"
                                    placeholder=" "
                                    onchange="convertNumToIdentity(document.getElementById('identity_num').value);"
                                    class="hover:border-black pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <label for="name"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">رقم
                                    الهويه</label>
                                <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                <small id='identityNum_fmerror' style='color:red'></small>
                            </div>
                        </div>

                    </div>

                    <!-- GRID TWO -->
                    <div class="grid grid-cols-6 gap-4">

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full">
                                <input type="number" name="age" id='age' placeholder=" "
                                    onchange="Slugify(document.getElementById('proudct_slug').value);"
                                    id="proudct_slug"
                                    class="hover:border-black pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                <label for="name"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">العمر</label>
                                <span class="text-sm text-red-600 hidden" id="error">Count is required !</span>
                                <small id='age_fmerror' style='color:red'></small>
                            </div>
                        </div>

                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full mb-5">
                                <select name="sex" value="ذكر" id='selectSex'
                                    onchange="f('selectSex');" onclick="this.setAttribute('value', this.value);"
                                    class="hover:border-black  pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-black appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option value="0" id=''>ذكر</option>
                                    <option value="1" id=''>انثى</option>
                                </select>
                                <label for="select"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">الجنس</label>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                    selected</span>
                                <small id='sex_fmerror' style='color:red'></small>
                            </div>
                        </div>



                        <div class="md:col-span-2 sm:col-span-6 lg:col-span-2">
                            <div class="relative z-0 w-full mb-5">
                                <select name="relationship" id='selectRelationship' value="أب"
                                    onclick="this.setAttribute('value', this.value);"
                                    class="hover:border-black pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 text-black appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                    <option value="0">أب</option>
                                    <option value="1">أم</option>
                                    <option value="2">أخ</option>
                                    <option value="3">أخت</option>
                                    <option value="4">إبن</option>
                                    <option value="5">إبنه</option>
                                </select>
                                <label for="select"
                                    class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">صلة القرابه</label>
                                <span class="text-sm text-red-600 hidden" id="error">Option has to be
                                    selected</span>
                                <small id='relationship_fmerror' style='color:red'></small>
                            </div>
                        </div>



                    </div>


                    <!-- GRID THREE -->

                    <!-- GRID THREE -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="span-col-1 flex flex-col items-center">

                            <label for="file-ip-2"
                                class="px-10 relative cursor-pointer bg-white rounded-xl font-medium text-black hover:text-black focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-black border-2 border-black">
                                <span>رفع صورة الهويه</span>
                                <input id="file-ip-2" name='attachmentFm' accept="image/*"
                                    onchange="showPreviewFm(event);" type="file" class="sr-only">
                            </label>

                            <div
                                class="mt-4 flex h-48 w-full  border-2 bg-gray-200 border-gray-500 border-dashed rounded">
                                <img class="rounded w-full  object-cover" src="" id="Fm-preview"
                                    alt="" style="display: none;" class="w-52 h-28">
                            </div>
                            <small id='attachment_error' style='color:red'></small>

                        </div>

                        <div class="p-20 bg-transparent text-center sm:px-6  rounded-3xl">
                            <!-- Base -->

                            <button type="submit" id='fmSave'>
                                <a class="relative inline-block group focus:outline-none focus:ring" href="">
                                    <span
                                        class="absolute inset-0 transition-transform translate-x-1.5 translate-y-1.5 bg-emerald-400 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                                    <span
                                        class="relative inline-block px-8 py-3 text-sm font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75">
                                        تسجيل الفرد
                                    </span>
                                </a>
                            </button>
                            <button type="" id='fmUpdate' style='display:none;'>
                                <a class="relative inline-block group focus:outline-none focus:ring" href="">
                                    <span
                                        class="absolute inset-0 transition-transform translate-x-1.5 translate-y-1.5 bg-emerald-400 group-hover:translate-y-0 group-hover:translate-x-0"></span>

                                    <span
                                        class="relative inline-block px-8 py-3 text-sm font-bold tracking-widest text-black uppercase border-2 border-current group-active:text-opacity-75">
                                        تعديل الفرد
                                    </span>
                                </a>
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</details>


<br>
<details class="cursor-auto ">
    <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6">
        <a href="#c_logs">سجل رب الاسره و الافراد</a>
        <div class="border-t border-gray-200">
        </div>
    </summary>
    <br>

    <div class="grid grid-cols-2 gap-x-10">
        <div class=" col-span-1 mx-auto w-full scroll-m-10">
            {{-- START SEARCH FORM --}}
            <form action="" method="Post" id='citizenSearch'>
             @csrf
            <div class="flex mx-auto w-full my-0 bg-white rounded-full shadow-md py-2 px-4">


                <select id="filterSearch" name="filterSearch"
                    class="bg-gray-50 border h-10 border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5">
                    <option value="all" selected>بحث الكل</option>
                    <option value="citName">الاسم</option>
                    <option value="id">الرقم الوطني</option>
                    <option value="identityNum">رقم الهويه</option>
                </select>

                <div class="relative w-full">
                    <button type="submit" id='search'
                        class="h-10 absolute top-0 left-0 px-2 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">بحث</span>
                    </button>
                    <input type="search" id="search-dropdown" name="inputSearch"
                        class="h-10 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500  dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="ابحث عن اسم مواطن ..." required="">
                </div>
             </form>
            </div>
            {{-- END SEARCH FORM --}}
            <div class=" relative overflow-y-auto" style="height: 550px;">
                <table id="c_logs" class=" table w-full text-gray-500 border-separate space-y-6 text-sm">
                    <thead class="bg-gray-200 text-gray-500 tableFixed">
                        <tr>
                            <th class="p-3">الرقم</th>
                            <th class="p-3 text-center">الاسم</th>
                            <th class="p-3 text-center">رقم الهويه</th>
                            <th class="p-3 text-center">المطابقه</th>
                            {{-- <th class="p-3 text-center">المديريه</th>
                          <th class="p-3 text-center">المربع</th> --}}
                            <th class="p-3 text-center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody id='fetchLastCitizen'>
                        @if ($citizens && $citizens->count() > 0)
                            @foreach ($citizens as $cit)
                                <tr
                                    class="offerRow{{ $cit->id }} bg-white hover:scale-95 transform transition-all ease-in">
                                    <td class="p-3 text-center">
                                        {{ $cit->id }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ $cit->citName }}
                                    </td>
                                    <td class="p-3 text-center">
                                        {{ $cit->identityNum }}
                                    </td>
                                    <td class="p-3 text-center">
                                        @if ($cit->checked == 'لا')
                                            <span
                                                class="bg-red-400 text-red-50 rounded-md px-2">{{ $cit->checked }}</span>
                                        @elseif($cit->checked == 'نعم')
                                            <span
                                                class="bg-green-400 text-green-50 rounded-md px-2">{{ $cit->checked }}</span>
                                        @endif
                                    </td>
                                    {{-- <td class="p-3 text-center">
                               {{$cit -> directorate->dirName}}
                          </td>

                          <td class="p-3 text-center">
                              {{$cit -> rigon->rigName}}
                          </td> --}}

                                    <td class="p-3 text-center ">
                                        <div id="delete-alert" class=" h-10 w-28 rounded-full overflow-hidden hidden">
                                            <button class="bg-green-200 w-14 hover:bg-green-400">Y</button>
                                            <button class="bg-red-200 w-14 hover:bg-red-400">N</button>
                                        </div>
                                        <div id="action-div" class="flex justify-center">
                                            <a onclick="deleteAlert();" href="#" citId="{{ $cit->id }}"
                                                class="citizenDelete text-red-400  hover:text-red-600  ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                            <a href="#" citId="{{ $cit->id }}"
                                                class="citizenEdit text-yellow-400 hover:text-yellow-600 mx-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>

                                            <a href="#" citId="{{ $cit->id }}"
                                                class="citizenShowMembers text-blue-600 hover:text-blue-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
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
        <div class=" col-span-1 mx-auto w-full scroll-m-10">
            <div class="flex flex-col space-y-4 w-full pb-4">
                {{-- START SEARCH FORM --}}
        
                <div class="flex mx-auto w-full rounded-full bg-white p-4 shadow-sm">
        
                    <select id="filtercitSearch" name="filtercitSearch"
                        class="bg-gray-50 border h-8 border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-1">
                        <option value='all' selected>بحث الكل</option>
                        <option value="citName">الاسم</option>
        
                    </select>
        
                    <div class="relative w-full">
                        <input type="search" id="inputcitSearch" name="inputcitSearch"
                            class="h-8 block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-50 focus:border-blue-500"
                            placeholder="ابحث عن اسم او رقم المواطن ..." required="">
                    </div>
        
                </div>
                {{-- END SEARCH FORM --}}
                <div class=" bg-white border-b rounded-xl border-gray-200 overflow-y-auto w-full" style="height: 550px;">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
        
                                <th scope="col"
                                    class="px-4 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                                    اسم الفرد
                                </th>
        
                                <th scope="col"
                                    class="px-6 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                                 الجنس
                                </th>
        
                                <th scope="col"
                                    class="px-6 py-3 text-center  font-medium text-gray-900 uppercase tracking-wider">
                                  صلة القرابه
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center  font-medium text-red-900 uppercase tracking-wider">
                                 العمليات
                                </th>
        
                            </tr>
                        </thead>
                        <tbody id='showfamilyMember' class="bg-white divide-y divide-gray-200">
                            {{-- <tr>
                            
                            <td class="text-center px-4 py-2 whitespace-nowrap">
                              <div class="text-sm text-gray-700">صالح عبدالله صالح</div>  
                            </td>
                            <td class="text-center px-4 py-2 whitespace-nowrap">
                              <input type="checkbox"  name='status_booking'  class="confirm">
                            </td>
                            <td class="text-center px-4 py-2 whitespace-nowrap">
                              <input type="checkbox" class="sms"> 
                            </td>
                            
                          </tr> --}}
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</details>
