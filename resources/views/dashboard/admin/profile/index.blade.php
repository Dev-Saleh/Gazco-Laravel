@extends('layouts.admin_dashboard')
@section('title')
موظف | الاعدادات
@stop
@section('content')
   <article id="Content" class="content-area p-10 bg-gray-100 h-full">
      

        <!-- Adding observers -->
        @include('dashboard.admin.profile.create')   
        <!-- END Adding observers -->
          <!-- Start Code Ajax -->
        @include('dashboard.admin.includes.ajax.profile')
         <!-- End Code Ajax -->

   </article>
      @stop