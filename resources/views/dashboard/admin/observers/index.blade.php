@extends('layouts.admin_dashboard')
@section('content')
   <article id="Content" class="px-10 bg-gray-100 h-full">
        <!-- Line -->
        <div class="px-4 py-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">أضافة مراقبين</h3>
        </div>
        <div class=" py-4 border-t border-gray-200">
        </div>

        <!-- End Line -->

        <!-- Adding observers -->
        @include('dashboard.admin.observers.create')   
        <!-- END Adding observers -->
         <!-- Start Code Ajax -->
          @include('dashboard.admin.includes.ajax.observers')
        <!-- End Code Ajax -->

   </article>
      @stop