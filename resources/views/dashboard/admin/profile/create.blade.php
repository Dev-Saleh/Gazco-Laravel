<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900"> المعلومات الشخصيه 🤵🏻</h3>
                <p class="mt-1 text-sm text-gray-600">يمكنك مشاهدة و تغيير البيانات الخاصه بك🤷‍♂️</p>
            </div>
        </div>
        <div class="mt-5 md:col-span-2 md:mt-0">
            <form action="" method="POST" id='profileForm'>
                @csrf
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="" class="block text-sm font-medium text-gray-700">مدة حظر المواطن بالايام</label>
                                <input type="number" name="numDaysBookingValid" id="numDaysBookingValid" autocomplete="given-name"  placeholder="14 | Days"
                                    class="mt-1 block w-full rounded-md border p-2 border-gray-300 shadow-sm active:border-indigo-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                
                                <div class="col-span-6 sm:col-span-3">
                                <label for="" class="block text-sm font-medium text-gray-700">اسم مرسل الرساله</label>
                                <input type="text" name="nameMessage" id="nameMessage" autocomplete="given-name" placeholder="Gazco | Aden"
                                    class="mt-1 block w-full rounded-md border p-2 border-gray-300 shadow-sm active:border-indigo-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                              
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <div>
                                    <label for="contentMessage" class="block text-sm font-medium text-gray-700"> محتوى الرساله النصيه 📩</label>
                                    <div class="mt-1">
                                      <textarea id="contentMessage" name="contentMessage" rows="3" class="mt-1 block w-full border p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="اكتب نص الرساله النصيه"></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">تستطيع تغيير النص اللذي بالرساله النصيه من هنا 👆🏻</p>
                                  </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">أضافة الصور  اللتي تعرض في "Slider"</label>
                                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                  <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                      <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="profilePhoto" name="profilePhoto" type="file" class="sr-only">
                                      </label>
                                      <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="submit" id="updateProfile"
                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-6 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">تغيير الاعدادات</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
