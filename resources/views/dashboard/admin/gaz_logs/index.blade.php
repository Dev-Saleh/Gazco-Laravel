@extends('layouts.admin_dashboard')
@section('content')
  <article id="Content" class=" content-area p-10 bg-gray-100 h-full">
        

        <!-- End Line -->
     <!-- Adding logs -->
        @include('dashboard.admin.gaz_Logs.create')   
     <!-- END Adding logs -->
      <!-- Start Code Ajax -->
        @include('dashboard.admin.includes.ajax.gaz_Logs')
      <!-- End Code Ajax -->
   
      </article>
      @stop