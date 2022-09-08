<div class="p-4">
    <form action="" method="Post" id='FormUpdateMyProfile' class="  max-w-2xl shadow-md md:w-3/4">
        @csrf
        @if ($myProfileCitz && $myProfileCitz->count() > 0)
            @foreach ($myProfileCitz as $data)
                <div class="p-4 bg-gray-50 border-y-2 border-indigo-400 rounded-lg bg-opacity-5">
                    <div class="max-w-sm mx-auto md:w-full md:mx-0">
                        <div class="flex flex-col items-center space-y-4">
                            <div>

                                <img class="max-w-xl object-cover rounded-lg shadow-xl dark:shadow-gray-800 h-[200px] w-auto  "
                                    src="{{ $data->attachment['valsrc'] }}" alt="image description">

                            </div>
                            <h1 class="text-gray-600 mr-4">
                                {{ $data->citName }}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="space-y-4 bg-white">
                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            الرقم الوطني
                        </h2>
                        <div class="max-w-sm mx-auto md:w-2/3">
                            <div class=" relative ">
                                <input readonly name='identityNum' type="text" value=' {{ $data->identityNum }}'
                                    id="user-info-email"
                                    class=" rounded-lg  flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:"
                                    placeholder="رقم الهويه" />
                            </div>
                        </div>
                    </div>

                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-1/3">
                            المعلومات الشخصيه
                        </h2>
                        <div class="max-w-sm mx-auto space-y-5 md:w-2/3">
                            <div class="flex flex-col space-y-1">
                                <div>
                                    <p>
                                        اسمك
                                    </p>
                                </div>
                                <div class=" relative ">
                                    <input readonly name='citName' value='{{ $data->citName }}' type="text"
                                        id="user-info-name"
                                        class=" rounded-lg  flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:"
                                        placeholder="اسمك" />
                                </div>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <div>
                                    <p>
                                        رقم جوالك
                                    </p>
                                </div>
                                <div class=" relative ">
                                    <input type="text" name='mobileNum' value='{{ $data->mobileNum }}'
                                        id="user-info-phone"
                                        class=" rounded-lg  flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:"
                                        placeholder="رقم الجوال" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="items-center w-full p-4 space-y-4 text-gray-500 md:inline-flex md:space-y-0">
                        <h2 class="max-w-sm mx-auto md:w-4/12">
                            تغيير كلمة السر
                        </h2>
                        <div class="w-full max-w-sm pl-2 mx-auto space-y-5 md:w-5/12 md:pl-9 md:inline-flex">
                            <div class=" relative ">
                                <input type="text" name='citPassword' value='{{ $data->citPassword }}'
                                    id="user-info-password"
                                    class=" rounded-lg  flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:"
                                    placeholder="ادخل كلمة السر الجديده" />
                            </div>
                        </div>

                    </div>
                    <hr />
                    <div class="w-full px-4 pb-4 ml-auto text-gray-500 md:w-1/3">
                        <button type="submit" id='btnUpdateMyProfile'
                            class="py-2 px-4  bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            تغيير
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </form>
</div>
