@extends('layouts.admin_dashboard')
@section('content')
       <article id="Content" class="px-10 bg-gray-100 h-full">
              <!-- Line -->
              <div class="px-4 py-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">أضافة المديريات و المربعات و المحطات</h3>
              </div>
              <div class=" py-4 border-t border-gray-200">
              </div>
              <!-- End Line -->
              <div class="mt-4 md:grid md:grid-cols-6 gap-x-6">
      
      <!-- Adding Directorates -->
        @include('dashboard.admin.directoratesandrigon.dcreate')   
      <!-- END Adding Directorates -->
      <!-- Adding Squares -->
        @include('dashboard.admin.directoratesandrigon.rcreate')     
      <!-- END Adding Squares -->
          
      <!-- Adding Station -->
        @include('dashboard.admin.directoratesandrigon.screate')  
      <!-- END Adding Station -->
     
         
            </div>
      </article>
  @stop
