<!DOCTYPE html>
<html lang="ar">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet"> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Tajawal&display=swap" rel="stylesheet">
 
   
    <link rel="stylesheet"   href="{{asset('assets/admin/css/style.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/admin/css/output.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/admin/css/input.css')}}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title')</title>
</head>
<body dir="rtl" class="font-tajawal text-base">
<div id="wrapper" class="flex bg-green-300 h-full relative">
<!-- fixed-top-->
<!-- alert Success && error -->
@include('dashboard.admin.includes.alerts.success')
<!-- alert Success && error -->
<!-- begin sidebar -->
@include('dashboard.admin.includes.sidebare')
<!-- end sidebar -->
<main id="main" class="flex flex-col  bg-red-300 font-tajawal h-full mr-80 w-full ">
<!-- begin header -->
@include('dashboard.admin.includes.header')
<!-- end header -->
@yield('content')
</main>
</div>
<script src="{{asset('assets/admin/jquery-3.6.0.min.js')}}" ></script>
<script src="{{asset('assets/admin/main.js')}}" type="text/javascript"></script>
@yield('script')  
</body>
</html>
