@extends('layouts.admin_dashboard')
@section('content')
  <article id="Content" class="px-20 bg-gray-100">
        <div class="px-4 py-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">اضافة و عرض الموزعين</h3>
        </div>
        <div class=" py-4 border-t border-gray-200">
        </div>
        <!-- END Line -->
  
      <!-- Adding Directorates -->
        @include('dashboard.admin.agents.create')   
      <!-- END Adding Directorates -->
      </article>
@stop
