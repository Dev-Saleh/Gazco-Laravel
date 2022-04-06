@extends('layouts.admin_dashboard')
@section('content')
    <article id="Content" class="px-10 bg-gray-100 h-full">
        <!-- Line -->
        <div class="px-4 py-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">مطابقة بيانات المواطنين</h3>
        </div>
        <div class=" py-4 border-t border-gray-200">
        </div>

        <!-- End Line -->
       <!-- Adding CitizenConfirm -->
        @include('dashboard.admin.CitizenConfirm.create')   
       <!-- END Adding CitizenConfirm -->
      </article>
      @stop