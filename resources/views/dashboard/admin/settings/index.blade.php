@extends('layouts.admin_dashboard')
@section('content')
   <article id="Content" class="content-area p-10 bg-gray-100 h-full">
      

        <!-- Adding observers -->
        @include('dashboard.admin.settings.create')   
        <!-- END Adding observers -->
         <!-- Start Code Ajax -->
          {{-- @include('dashboard.admin.includes.ajax.observers') --}}
        <!-- End Code Ajax -->

   </article>
      @stop