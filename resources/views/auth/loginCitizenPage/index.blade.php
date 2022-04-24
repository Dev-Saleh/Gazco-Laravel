<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/output.css') }}">

    <!-- Fontawesome -->
    {{-- <script src="https://kit.fontawesome.com/a23e6feb03.js"></script> --}}


    <title>4 shoop</title>
</head>

<body dir="rtl">

    <div class="bg-no-repeat bg-cover bg-center relative"
        style="background-image: url()">
        <div class="absolute bg-gradient-to-b from-green-700 to-green-300 opacity-75 inset-0 z-0"></div>
        <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
            <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
                <div class="self-start hidden lg:flex flex-col  text-white">
                    <img src="" class="mb-3">
                    <h1 class="mb-3 font-bold text-4xl">Hi 👋 Sign in To Dashboard</h1>
                    <p class="pr-3">Lorem ipsum is placeholder text commonly used in the graphic, print,
                        and publishing industries for previewing layouts and visual mockups</p>
                </div>
            </div>
            <div class="flex justify-center self-center  z-10">
                <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
                    <div class="mb-4">
                        <h3 class="font-semibold text-2xl text-gray-800">غازكو </h3>
                        <p class="text-gray-500">سجل دخولك عبر بيانات البطاقه الشخصيه</p>
                    </div>
                    <div class="space-y-5">
                    
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 tracking-wide"> الرقم الوطني</label>
                            <input name="identity_num"
                                class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                type="text" placeholder="ادخل الرقم الوطني">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                                كلمة السر
                            </label>
                            <input name="citizen_password"
                                class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                type="password" placeholder="غالبا تكون كلمة السر مثل الرقم الوطني">
                               
                        </div>
                     
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox"
                                    class="h-4 w-4 bg-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-800">
                                    Remember me
                                </label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="text-green-400 hover:text-green-500">
                                    Forgot your password?
                                </a>
                            </div>
                        </div>
                        <div>
                            <button id="loginCitizenBtn" type="submit"
                                class="w-full flex justify-center bg-green-400  hover:bg-green-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-300">
                                Sign in
                            </button>
                        </div>
                        
                    </div>
                    <div class="pt-5 text-center text-gray-400 text-xs">
                        <span>
                            Copyright © 2021-2022
                            <a href="#" rel="" target="_blank" class="text-green hover:text-green-500 ">Gazco
                                </a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/jquery-3.6.0.min.js') }}"></script>
    <script>
        // Start
       
        // End
    </script>
</body>

</html>
