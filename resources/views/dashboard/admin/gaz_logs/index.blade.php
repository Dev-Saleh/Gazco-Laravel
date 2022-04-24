@extends('layouts.admin_dashboard')
@section('content')
  <article id="Content" class=" content-area px-10 bg-gray-100 h-full">
        <!-- Line -->
        <div class="px-4 py-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">ارسال كشوفات</h3>
        </div>
        <div class=" py-4 border-t border-gray-200">
        </div>

        <!-- End Line -->
     <!-- Adding logs -->
        @include('dashboard.admin.gaz_Logs.create')   
     <!-- END Adding logs -->
      <!-- Start Code Ajax -->
        @include('dashboard.admin.includes.ajax.gaz_Logs')
      <!-- End Code Ajax -->
   
      </article>
      @stop