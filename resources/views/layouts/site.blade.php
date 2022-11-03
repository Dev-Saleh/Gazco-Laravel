<!DOCTYPE html>
<html lang="en">

<head>

    {{-- <link rel="stylesheet" href="style.css"> --}}
{{-- 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Tajawal&display=swap" rel="stylesheet"> --}}
    <link href="{{ asset('assets/admin/css/fonts.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styleTabNavMobile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/output.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/swiper-bundle.min.css') }}">
    {{-- <link rel="stylesheet" href="/js/swiper-bundle.min.css"> --}}

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/gaz_logo.png') }}" type="image/png">
    <title>@yield('title')</title>

</head>

<body dir="rtl" class="bg-gray-100 font-cairo font-bold relative overflow-y-auto">

    {{-- start section Alert --}}
    <div
        class="alertSuccess animate-fadeFromUp p-3 rounded-md text-lg text-teal-900 hidden items-center mx-auto w-96  top-10 right-0 left-0 fixed z-50 bg-indigo-200 border-r-4 border-indigo-600">
        <span class="p-3 bg-teal-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-wiggle" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </span>
        <p class="alertSuccessText mr-4">

        </p>
    </div>

    <div
        class="alertWarning p-3 rounded-md text-lg text-yellow-900 hidden items-center mx-auto w-96  top-10 right-0 left-0 fixed z-50 bg-yellow-200 border-r-4 border-yellow-600">
        <span class="p-3 bg-yellow-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-pulse" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </span>
        <p class="alertWarningText mr-4">
            تأكد من البيانات
        </p>
    </div>

    <div id="alert"
        class="alertError p-3 rounded-md text-lg  text-red-900 hidden items-center mx-auto w-96  top-10 right-0 left-0 fixed z-50 bg-red-200 border-r-4 border-red-600">
        <span class="p-3 bg-red-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-spin" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <p class="alertErrorText mr-4">
            فشلت العمليه
        </p>
    </div>
    {{-- end section Alert --}}


    @yield('content')
    <br>
    <br>
    
    <!-- begin sidebar -->
    @include('front.include.sidebare')
    <!-- end sidebar -->
    <script src="{{ asset('assets/admin/tabNavMobile.js') }}"></script>
    <script src="{{ asset('assets/admin/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/swiper.js') }}"></script>
    <script src="{{ asset('assets/admin/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/main.js') }}"></script>
    {{-- <script>
        function dropDown() {
            document.querySelector('#submenu').classList.toggle('hidden')
            document.querySelector('#arrow').classList.toggle('rotate-0')
        }
        dropDown()

        function Openbar() {
            document.querySelector('.sidebar').classList.toggle('right-[-300px]')
        }
    </script> --}}
    
    @yield('script')
</body>

</html>
