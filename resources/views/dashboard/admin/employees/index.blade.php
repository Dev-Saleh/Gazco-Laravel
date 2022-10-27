@extends('layouts.admin_dashboard')
@section('title')
موظف | الموظفين
@stop
@section('content')
  <article id="Content" class="content-area px-20 bg-gray-100 h-full">
  
      <!-- Start Adding Employees -->
        @include('dashboard.admin.employees.create')   
      <!-- END Adding Employees -->

  </article>

          <!-- Start Code Ajax -->
              @include('dashboard.admin.includes.ajax.employees')
          <!-- End Code Ajax --> 
   

@stop

