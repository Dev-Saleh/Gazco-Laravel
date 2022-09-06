<!DOCTYPE html>
<html lang="ar">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Tajawal&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/output.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body dir="rtl" class="font-tajawal text-base bg-gray-100">
    {{-- start section Alert --}}
    <div id="alert"
        class="animate-fadeFromUp p-3 rounded-md text-lg text-green-900 flex items-center mx-auto w-96  top-10 right-0 left-0 fixed z-10 bg-green-200 border-r-4 border-green-600">
        <span class="p-3 bg-green-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-wiggle" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </span>
        <p class="mr-4">
            تمت العمليه بنجاح
        </p>
    </div>

    <div id="alert"
        class=" p-3 rounded-md text-lg text-yellow-900 flex items-center mx-auto w-96  top-36 right-0 left-0 fixed z-10 bg-yellow-200 border-r-4 border-yellow-600">
        <span class="p-3 bg-yellow-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-pulse" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </span>
        <p class="mr-4">
            تأكد من البيانات
        </p>
    </div>

    <div id="alert"
        class=" p-3 rounded-md text-lg  text-red-900 flex items-center mx-auto w-96  top-60 right-0 left-0 fixed z-10 bg-red-200 border-r-4 border-red-600">
        <span class="p-3 bg-red-300 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-spin" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <p class="mr-4">
            فشلت العمليه
        </p>
    </div>
    {{-- end section Alert --}}
    <div id="wrapper" class="flex h-full relative">
        <!-- begin sidebar -->
        @include('dashboard.admin.includes.sidebare')
        <!-- end sidebar -->
        <main id="main" class="flex flex-col font-tajawal overflow-y-auto mr-72 w-full ">
            <!-- begin header -->
            @include('dashboard.admin.includes.header')
            <!-- end header -->
            @yield('content')
        </main>
    </div>

    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('assets/admin/ChartComponentsAdmin.js') }}"></script>
    <script src="{{ asset('assets/admin/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/main.js') }}" type="text/javascript"></script>
    @yield('script')
</body>

</html>
