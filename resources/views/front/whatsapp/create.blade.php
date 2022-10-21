
   
   <img
   src={{ asset('assets/images/loginLogo/waveCitizen.png') }}
   class="fixed w-full object-fill h-full transform rotate-0 -z-50"
   
   />
    <div class="flex h-screen  justify-center  px-4 sm:px-6 lg:px-8 bg-transparent rounded-md ">
       
      
        <div class="w-full max-w-md space-y-10 p-6 my-auto">
            <div class="space-y-4">
                <img class="mx-auto h-48 w-auto" src="{{ asset('assets/images/icons8-whatsapp-500.png') }}" alt="Your Company">
                <h2 class="mt-0 text-center text-3xl font-bold tracking-tight text-gray-900">يمكنك تقديم شكوى عبر واتساب المراقب الخاص بمنطقتك</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                   رقم واتساب مراقبك هو
                    <p href="#" class="font-medium text-center text-lg text-teal-600 hover:text-teal-500">{{ session()->get('obsWhatsNum') }}</p>
                </p>
            </div>
            

              
                <div>
                    <button id="" type="submit"
                        class="group relative flex w-full justify-center rounded-xl border border-transparent bg-teal-600 py-2 px-4 text-sm font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                        <a href="https://wa.me/{{ session()->get('obsWhatsNum') }}?text=%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%D8%A7%D8%B1%D9%8A%D8%AF%20%D8%AA%D9%82%D8%AF%D9%8A%D9%85%20%D8%B4%D9%83%D9%88%D9%89">
                        </a>
                       تقديم شكوى
                    </button>
                </div>
            </form>
        </div>
    </div>


