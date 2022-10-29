<details id="detailsFm" class="cursor-auto text-lg font-medium leading-6 text-gray-900 ">
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
                                <input type="number" name="identityNum" id='identityNumber' minlength="3"
                                    placeholder=" "
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
                                <input id="file-ip-2" name='attachmentFm'  accept="image/*"
                                    onchange="showPreviewFm(event);" type="file" class="sr-only">
                            </label>

                            <div
                                class="mt-4 flex h-48 w-full  border-2 bg-gray-200 border-gray-500 border-dashed rounded">
                                <img class="rounded w-full  object-cover" src=""  id="Fm-preview"
                                    alt="" style="display: none;" class="w-52 h-28">
                            </div>
                            <small id='attachment_fmerror' style='color:red'></small>

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