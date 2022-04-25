    <img
        src="Assets/wave.png"
        class="fixed hidden lg:block inset-0 h-full transform rotate-180"
        style="z-index: -1;"
        />
        <div
        class="w-screen h-screen flex flex-col justify-center items-center lg:grid lg:grid-cols-2"
        >
        <img
            src="Assets/unlock.svg"
            class="hidden   lg:block w-1/2 hover:scale-150 transition-all duration-500 transform mx-auto"
        />
        <form class="flex flex-col justify-center items-center w-1/2">
            <img src="Assets/avatar.svg" class="w-32" />
            <h2
            class="my-8 font-display font-bold text-3xl text-gray-700 text-center"
            >
            مرحبا بك في غازكو
            </h2>
            <div class="relative">
            <i class="fa fa-user absolute text-yellow-500 text-xl"></i>
            <input
                type="text"
                placeholder="username"
                class="pr-8 border-b-2 font-display focus:outline-none focus:border-yellow-500 transition-all duration-500 capitalize text-lg"
            />
            </div>
            <div class="relative mt-8">
            <i class="fa fa-lock absolute text-yellow-500 text-xl"></i>
            <input
                type="password"
                placeholder="password"
                class="pr-8 border-b-2 font-display focus:outline-none focus:border-yellow-500 transition-all duration-500 capitalize text-lg"
            />
            </div>
            <a href="#" class="self-end mt-4 text-gray-600 font-bold"
            >Forgot password?</a
            >
            <button class="py-3 px-20 bg-primarycolor rounded-full text-white font-bold uppercase text-lg mt-4 transform hover:translate-y-1 transition-all duration-500 focus:bg-yellow-700">
             تسجيل  
            </button>
        </form>
        </div>
    </body>