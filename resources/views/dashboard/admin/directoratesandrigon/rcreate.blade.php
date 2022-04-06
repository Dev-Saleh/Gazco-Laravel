     <div class="">
            <form action="#" method="POST">
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6 flex flex-col items-center">
                  <div class="flex flex-col">
                    <div class="">
                      <div class="relative z-0 w-full mb-5">
                        <input type="text" name="name" placeholder=" " required
                          class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 border-gray-200" />
                        <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">اسم المربع</label>
                        <span class="text-sm text-red-600 hidden" id="error">Name is required</span>
                      </div>
                      <button type="submit" class="inline-flex justify-center py-2 px-4 border-blue-600 border-2 shadow-sm 
                        text-sm font-medium rounded-md text-blue-400 bg-transparent hover:bg-blue-600 hover:text-blue-50
                        focus:outline-none focus:ring-1 focus:ring-offset-2 focus:ring-blue-500 w-full">
                        Add
                      </button>
                    </div>
                    <div class=" mt-6 w-full">
                      <!-- <p class="text-center font-sans mb-2 text-2xl"> Brands Table</p> -->
                      <div class=" relative overflow-y-scroll" style="height: 250px;">
                        <table class="table w-full text-gray-500 border-separate space-y-6 text-sm">
                          <thead class="bg-gray-300 text-gray-500">
                            <tr>
                              <th class="p-3">الرقم</th>
                              <th class="p-3 text-center">اسم المربع</th>
                              <th class="p-3 text-center">العمليات</th>
                            </tr>
                          </thead>
                          <tbody>
                           @if($rigons && $rigons -> count() > 0)
                           @foreach($rigons as $rigon)
                            <tr class="bg-gray-100 hover:scale-95 transform transition-all ease-in">
                              <td class="p-3">
                                {{$rigon->id}}
                              </td>
                              <td class="p-3 text-center">
                                  {{$rigon->rigon_name}}
                              </td>
                              <td class="p-3 flex justify-evenly ">

                                <a href="#" class="text-gray-400  hover:text-red-400  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-yellow-100  ">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
            </form>
          </div>
