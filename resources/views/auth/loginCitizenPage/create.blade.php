
   
   <img
   src={{ asset('assets/images/loginLogo/waveCitizen.png') }}
   class="fixed w-full object-fill h-full transform rotate-0 -z-50"
   
   />
       @if(Session::has('error'))
        <p  class="group relative flex w-full justify-center rounded-md border border-transparent bg-rose-600 py-2 px-4 text-sm font-medium text-white hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">{{Session::get('error')}}</p>
        @endif
    <div class="flex h-screen  justify-center  px-4 sm:px-6 lg:px-8 bg-transparent rounded-md ">
       
      
        <div class="w-full max-w-md space-y-10 p-6 my-auto">
            <div class="space-y-4">
                <img class="mx-auto h-48 w-auto" src="{{ asset('assets/images/gaz_logo.png') }}" alt="Your Company">
                <h2 class="mt-0 text-center text-3xl font-bold tracking-tight text-gray-900">سجل دخولك عبر بيانات البطاقه
                    الشخصيه</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    او
                    <a href="#" class="font-medium text-teal-600 hover:text-teal-500">تواصل مع مراقب منطقتك
                        لتسجيلك</a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="{{route('checkCitizen')}}" method='Post' id='loginCitizenForm'>
                <input type="hidden" name="remember" value="true">
                <div class=" rounded-md shadow-sm">
                    <div>
                        <label for="email-address" class="sr-only">أدخل رقم الهويه</label>
                        <input name="identityNum" id="identityNum" type="text" autocomplete="email" required
                            class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-teal-500 focus:outline-none focus:ring-teal-500 sm:text-sm"
                            placeholder="أدخل رقم الهويه">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input name="citPassword" id="citPassword" type="password" autocomplete="current-password" required
                            class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-teal-500 focus:outline-none focus:ring-teal-500 sm:text-sm"
                            placeholder="غالبا تكون الهويه هي كلمة السر">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex">
                        <input id="remember-me" name="remember-me" type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                        <p for="remember-me" class="mr-2 text-sm text-gray-900">تذكر بياناتي</p>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-teal-600 hover:text-teal-500">نسيت كلمة السر ؟</a>
                    </div>
                </div>

                <div>
                    <button id="loginCitizenBtn" type="submit"
                        class="group relative flex w-full justify-center rounded-md border border-transparent bg-rose-600 py-2 px-4 text-sm font-medium text-white hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <!-- Heroicon name: mini/lock-closed -->
                            {{-- <svg class="h-5 w-5 text-white group-hover:text-white-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                    clip-rule="evenodd" />
                            </svg> --}}
                        </span>
                        سَجل الدخول
                    </button>
                </div>
            </form>
       
        </div>
    </div>


