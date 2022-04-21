<!DOCTYPE html>
<html lang="en">

<head>

  {{-- <link rel="stylesheet" href="style.css"> --}}

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Tajawal&display=swap" rel="stylesheet">


    <link rel="stylesheet"   href="{{asset('assets/admin/css/style.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/admin/css/output.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/admin/swiper-bundle.min.css')}}">
    {{-- <link rel="stylesheet" href="/js/swiper-bundle.min.css"> --}}

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gazco | Home</title>

</head>

<body dir="rtl" class="bg-gray-100 font-cairo font-bold ">


    <!-- begin sidebar -->
    @include('front.include.sidebare')
    <!-- end sidebar -->


  

    @yield('content')


    <script src="{{asset('assets/admin/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/swiper.js')}}"></script>
    <script src="{{ asset('assets/admin/jquery-3.6.0.min.js') }}"></script>
    <script src="{{asset('assets/admin/main.js')}}"></script>
    <script>
    function dropDown() {
      document.querySelector('#submenu').classList.toggle('hidden')
      document.querySelector('#arrow').classList.toggle('rotate-0')
    }
    dropDown()

    function Openbar() {
      document.querySelector('.sidebar').classList.toggle('right-[-300px]')
    }
     
  </script>
  @yield('script')
</body>
</html>
  