<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login project</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
     <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/output.css') }}">

  </head>
  <body dir="rtl">
   

          @include('auth.loginAdminPage.create')


  <script src="{{ asset('assets/admin/jquery-3.6.0.min.js') }}"></script>
</html>
