<nav id="Navbar" class="h-16 w-full bg-gray-100 ">
    <div class="px-6 py-2 m-4 bg-white  rounded-full ">
        <div class="flex  justify-between">
            <div class="flex items-center justify-between">
                <div class="text-xl font-semibold text-gray-700 mr-2">
                    <a class="text-2xl font-bold font-cairo text-gray-700  hover:text-emerald-600 text-right "
                        href="#">غـازكو</a>
                </div>


            </div>
            <div class="relative  flex items-center">
                <button type="button" class="left-0 h-8 w-8 rounded-full" onclick="dropClick()">
                    <img class="h-8 w-8 rounded-full" src="{{ asset('assets/images/mz.jpg') }}" alt="Admin">
                </button>
         
                      <div
                        id="dropDown"
                        class="hidden absolute top-6 left-0 z-50 w-56 mt-4 bg-white border border-gray-100 shadow-lg origin-top-right rounded-md"
                        role="menu">
                      
                        <div class="py-2 flow-root">
                          <div class="-my-2 divide-y divide-gray-100">
                            <div class="p-2">
                            
                              <a
                                href="#"
                                class="block px-4 py-2 text-sm text-gray-500 rounded-lg hover:bg-gray-200 hover:text-gray-700"
                                role="menuitem"
                              >
                                الملف الشخصي
                              </a>
                  
                              <a
                                href="#"
                                class="block px-4 py-2 text-sm text-gray-500 rounded-lg hover:bg-gray-200 hover:text-gray-700"
                                role="menuitem"
                              >
                               الاعدادات
                              </a>
                            </div>
                  
                            <div class="p-2">
                              <form method="POST" action="#">
                                <button
                                  type="submit"
                                  class="flex items-center w-full px-4 py-2 text-sm text-red-700 rounded-lg gap-2 hover:bg-red-50"
                                  role="menuitem"
                                >
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                  </svg>
                  
                                 <a href="{{route('observerLogout')}}"> تسجيل الخروج </a>
                             
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    
            </div>
        </div>
    </div>
</nav>
