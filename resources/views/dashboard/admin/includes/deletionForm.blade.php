 <!-- This example requires Tailwind CSS v2.0+ -->
 <div value="" id="deletionPoping" class="hidden relative z-50" aria-labelledby="modal-title" role="" aria-modal="true">

     <div class="fixed inset-0 bg-gray-100 bg-opacity-70 transition-opacity"></div>

     <div class="fixed inset-0 z-10 overflow-y-auto">
         <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
     
             <div
                 class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                 <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                     <div class="sm:flex sm:items-start">
                         <div
                             class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                             <!-- Heroicon name: outline/exclamation-triangle -->
                             <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                     d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                             </svg>
                         </div>
                         <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                             <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">رساله تحذيريه</h3>
                             <div class="mt-2">
                                 <p class="text-sm text-gray-500">هل انت متأكد من أنك تريد الحذف , تذكر انه لا يمكنك
                                     استعادة البيانات المحذوفه.</p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                      
                        <button id="deletionPopingId" value=""
                        class="citizenDelete agentDelete observerDelete gazLogDelete inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                        <a href="">حذف</a>
                       </button>

                      
                     <button type="button" onclick="getElementById('deletionPoping').classList.replace('flex','hidden');"
                         class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">إلغاء</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
