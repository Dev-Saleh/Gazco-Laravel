<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="{{ asset('assets/admin/css/fonts.css') }}" rel="stylesheet">

    <meta charset="UTF-8" />
    <link rel="icon" href="{{ asset('assets/images/gaz_logo.png') }}" type="image/png">
    <title>المراقبين | تسجيل الدخول</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
     <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/output.css') }}">
  </head>
  <body dir="rtl" class="font-cairo">
   

          @include('auth.loginObserverPage.create')


  </body>
  <script src="{{ asset('assets/admin/jquery-3.6.0.min.js') }}"></script>
</html>
