     <form action="" method="POST" id='agentForm'>
           @csrf 
          <input type="text" name='id' style="display:none;" class="form-control"  id="agent_id">    
      <div dir="rtl" id="container" class="flex">
          <div class="ml-10 p-6 bg-white border-0 shadow-lg rounded-xl w-full h-full">
            <div class="flex-col items-center justify-center flex space-y-4">
              <label for="file-ip-1"
                class="relative cursor-pointer bg-white rounded-xl font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 border-2 border-blue-700 px-2">
                <span>رفع صوره</span>
                <input id="file-ip-1" name='photo' id='photo' accept="image/*" onchange="showPreviewUser(event);" type="file" class="sr-only">
              </label>

              <div class="mt-2 flex h-48 w-48  border-2 bg-gray-200 border-gray-500 border-dashed rounded-full">


                <img class="rounded-full w-48 h-48 object-cover" src="" id="file-ip-1-preview" alt=""
                  style="display: none;" class="w-52 h-28">

              </div>

              <div class="relative z-0 w-full mb-5">
                <input type="text" name="Agent_name" id='agent_name' placeholder=" " required
                  class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم الموزع</label>
                <span class="text-sm text-red-600 hidden" id="error">اسم الموزع مطلوب !</span>
              </div>

              

              <div class="relative z-0 w-full mb-5">
                <select name="directorate_id" value="" id='select_directorates' onclick="this.setAttribute('value', this.value);"
                  class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                   <option value="" id='select_directorate' selected disabled hidden></option>
                  @if($directorates && $directorates -> count() > 0)
                  @foreach($directorates as $directorate)
                        <option value="{{$directorate -> id }}">{{$directorate -> directorate_name}}</option>
                    @endforeach
                 @endif
                </select>
                <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اختر المديريه</label>
                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
              </div>

              <div class="relative z-0 w-full mb-5">
                <select name="rigons_id" value="" id='select_rigons' onclick="this.setAttribute('value', this.value);"
                  class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                  <option value="" id='select_rigon' selected disabled hidden></option>
                </select>
                <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-slate-500">اختر المربع</label>
                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
              </div>


              <button id='save_agent' onclick="alert.show(`Dev SAleh`,`success`)" type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-black hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-72">
                أضافه
              </button>
              <button type="submit"   id='update_agent'  style='display:none;'class="inline-flex justify-center py-2 px-4 border-blue-600 border-2 shadow-sm 
                  text-sm font-medium rounded-md text-blue-400 bg-transparent hover:bg-blue-600 hover:text-blue-50
                  focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500  w-full">
                   تعديل
                </button>

            </div>
          </div>
          </form>
          <!--ENd Details& View Section -->

          <!-- Table Section -->
          <div class="mx-auto w-full">
            <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
            <div class=" relative overflow-y-scroll" style="height: 580px;">
              <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                <thead class="bg-gray-200 text-gray-500">
                  <tr>
                    <th class="p-3">الرقم</th>
                    <th class="p-3 text-center">الاسم</th>
                    <th class="p-3 text-center">الصوره</th>
                    <th class="p-3 text-center">المديريه</th>
                    <th class="p-3 text-left">العمليات</th>
                  </tr>
                </thead>
                <tbody id='fetch_Allagent'>
                  @if($agents && $agents -> count() > 0)
                  @foreach($agents as $agent)
                  <tr class="offerRow{{$agent -> id}}" class="bg-gray-50 hover:scale-95 transform transition-all ease-in">
                    <td class="p-3 text-center">
                      {{$agent->id}}
                    </td>
                    <td class="p-3 text-center">
                      {{$agent->Agent_name}}
                    </td>
                    <td class="p-3 text-right">
                      <img class="rounded-full h-12 w-12  object-cover" src="{{asset('assets/images/agents/'.$agent->photo)}}" alt="unsplash image">
                    </td>
                    <td class="p-3 text-center">
                      <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$agent->directorate->directorate_name}}</span>
                    </td>
                    <td class="p-5 flex space-x-2">
                      <a href="#"  agent="{{$agent->id}}"  class="agent_delete btn btn-danger" class="text-gray-400  hover:text-red-400 float-left ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </a>
                      <a href="#" agent="{{$agent->id}}"  id="agent_edit" class="text-gray-400 hover:text-yellow-400  mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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