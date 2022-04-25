     <div class="col-start-3 col-end-5 -mt-6 transform hover:scale-110 hover:transition-all duration-300 ease-out">
         <form action="" method="POST" id='rigForm'>
             @csrf
             <input type="text" name='id' style="display:none;" class="form-control" id="rigId">
             <div class="shadow overflow-hidden sm:rounded-md">
                 <div class="px-4 py-5 bg-white sm:p-6 flex flex-col items-center">
                     <div class="flex flex-col">
                         <div class="">
                             <div class="relative z-0 w-full mb-5">
                                 <select name="dirId" value="" id='select_directorates'
                                     onclick="this.setAttribute('value', this.value);"
                                     class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                                     <option value="" id='select_directorate' selected disabled hidden></option>
                                     @if ($directorates && $directorates->count() > 0)
                                         @foreach ($directorates as $dir)
                                             <option value="{{ $dir->id }}">
                                                 {{ $dir->dirName }}</option>
                                         @endforeach
                                     @endif
                                 </select>
                                 <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اختر
                                     المديريه</label>
                                 <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                                 <small id='dirId_error' style='color:red'></small>
                             </div>
                             <div class="relative z-0 w-full mb-5">
                                 <input type="text" name="rigName" id="rigName" placeholder=" " required
                                     class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 border-gray-200" />
                                 <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم
                                     المربع</label>
                                 <span class="text-sm text-red-600 hidden" id="error">Name is required</span>
                                 <small id='rigName_error' style='color:red'></small>
                             </div>
                             <button type="submit" id='saveRigon'
                                 class="inline-flex justify-center py-2 px-4 border-blue-600 border-2 shadow-sm 
                  text-sm font-medium rounded-md text-blue-400 bg-transparent hover:bg-blue-600 hover:text-blue-50
                  focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500  w-full">
                                 حفظ المربع
                             </button>
                             <button type="submit" id='updateRigon' style='display:none;'
                                 class="inline-flex justify-center py-2 px-4 border-blue-600 border-2 shadow-sm 
                  text-sm font-medium rounded-md text-blue-400 bg-transparent hover:bg-blue-600 hover:text-blue-50
                  focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500  w-full">
                                 تعديل المربع
                             </button>
                     </form>
                    </div>

                         <div class=" mt-6 w-full">
                             <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
                             <div class=" relative overflow-y-auto" style="height: 250px;">
                                 <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                                     <thead class="bg-gray-300 text-gray-500 tableFixed">
                                         <tr>
                                             <th class="p-3">الرقم</th>
                                             <th class="p-3 text-center">اسم المربع</th>
                                             <th class="p-3 text-center">العمليات</th>
                                         </tr>
                                     </thead>
                                     <tbody id='fetch_Allrigon'>
                                         @if ($rigons && $rigons->count() > 0)
                                             @foreach ($rigons as $rig)
                                                 <tr
                                                     class="offerRow{{ $rig->id }} bg-gray-50 hover:scale-95 transform transition-all ease-in">
                                                     <td class="p-3">
                                                         {{ $rig->id }}
                                                     </td>
                                                     <td class="p-3 text-center">
                                                         {{ $rig->rigName }}
                                                     </td>
                                                     <td class="p-3 flex justify-evenly ">

                                                         <a href="#" rigId="{{ $rig->id }}"
                                                             class="rigonDelete text-red-400  hover:text-red-600  ">
                                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                                 stroke="currentColor">
                                                                 <path stroke-linecap="round" stroke-linejoin="round"
                                                                     stroke-width="2"
                                                                     d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                             </svg>
                                                         </a>
                                                         <a href="#" rigId="{{ $rig->id }}"
                                                             class="rigonEdit text-yellow-400 hover:text-yellow-600  ">
                                                             <svg xmlns="http://www.w3.org/2000/svg"
                                                                 class="h-5 w-5" viewBox="0 0 20 20"
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
                 </div>
             </div>
        
     </div>
