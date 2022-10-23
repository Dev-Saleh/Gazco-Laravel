    <img
        src={{ asset('assets/images/loginLogo/waveObs.png') }}
        class="fixed hidden lg:block inset-0 h-full transform rotate-180"
        style="z-index: -1;"
        />
        <div
        class="w-screen h-screen flex flex-col justify-center items-center lg:grid lg:grid-cols-2"
        >
        <img
            src={{ asset('assets/images/loginLogo/illustrasionObs.svg') }}
            class="hidden   lg:block w-1/2 hover:scale-150 transition-all duration-500 transform mx-auto"
        />
        <form action="{{ route('checkObserver') }}" method="POST" id='logObserverForm'>
             @csrf   
            <img src={{ asset('assets/images/loginLogo/avatarObs.svg') }} class="w-32" />
            <h2
            class="my-8 font-display font-bold text-3xl text-gray-700 text-right"
            >
            مرحبا بك في غازكو
            </h2>
            <div class="relative">
            <i class="fa fa-user absolute text-emerald-500 text-xl"></i>
            <input
                type="text"
                placeholder="username" name='obsUserName' id='obsUserName'
                class="pr-8 border-b-2 font-display text-teal-900 bg-transparent focus:outline-none focus:border-emerald-500 transition-all duration-500 capitalize text-lg"
            />
            </div>
            <div class="relative mt-8">
            <i class="fa fa-lock absolute text-emerald-500 text-xl"></i>
            <input
                type="password"
                placeholder="password" name='obsPassword' id='obsPassword'
                class="pr-8 border-b-2 font-display bg-transparent text-teal-500 focus:outline-none focus:border-emerald-500 transition-all duration-500 capitalize text-lg"
            />
            </div>
           
            <button id='loginObserver' class="py-3 px-20 bg-emerald-500 rounded-full text-white font-bold uppercase text-lg mt-4 transform hover:translate-y-1 transition-all duration-500 focus:bg-emerald-700-700">
             تسجيل  
            </button>
        </form>
        </div>
    </body>