    {{-- <img
        src={{ asset('assets/images/loginLogo/waveAdmin.png') }}
        class="fixed  lg:block h-full transform rotate-0 left-0 -z-10"
        
        /> --}}
    <img
        src={{ asset('assets/images/loginLogo/waveAdmin.png') }}
        class="fixed  lg:block h-full transform rotate-180 -z-10"
        
        />
        <div
        class="w-screen h-screen flex flex-col justify-center items-center lg:grid lg:grid-cols-2 overflow-hidden"
        >
        <img
            src={{ asset('assets/images/loginLogo/illustrasionAdmin.svg') }}
            class="  lg:block w-1/2 hover:scale-150 transition-all duration-500 transform mx-auto"
        />
        <form action="{{ route('adminCheckAdmin') }}" method="POST" id='logAdminForm'>
             @csrf   
            <img src={{ asset('assets/images/loginLogo/avatar.svg') }} class="w-32" />
            <h2
            class="my-8 font-display font-bold text-3xl text-white text-right"
            >
            مرحبا بك في غازكو
            </h2>
            <div class="relative">
            <i class="fa fa-user absolute text-indigo-500 text-xl"></i>
            <input
                type="text"
                placeholder="username" name='empUserName' id='empUserName'
                class="pr-8 border-b-2 font-display text-white focus:outline-none focus:border-indigo-500 transition-all duration-500 capitalize text-lg bg-transparent"
            />
            </div>
            <div class="relative mt-8">
            <i class="fa fa-lock absolute text-indigo-500 text-xl"></i>
            <input
                type="password"
                placeholder="password" name='empPassword' id='empPassword'
                class="pr-8 border-b-2 font-display text-indigo-400 focus:outline-none focus:border-indigo-500 transition-all duration-500 capitalize text-lg bg-transparent"
            />
            </div>
           
            <button id='loginEmployees' class="py-3 px-20 bg-indigo-500 rounded-full text-white font-bold uppercase text-lg mt-4 transform hover:translate-y-1 transition-all hover:bg-indigo-400 duration-500 focus:bg-indigo-700">
             تسجيل  
            </button>
        </form>
        </div>
    </body>