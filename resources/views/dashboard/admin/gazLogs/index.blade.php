@extends('layouts.admin_dashboard')
@section('title')
موظف | الدفعات
@stop
@section('content')
  <article id="Content" class=" content-area p-10 bg-gray-100 h-full">
        

        <!-- End Line -->
     <!-- Adding logs -->
        @include('dashboard.admin.gazLogs.create')   
     <!-- END Adding logs -->
      <!-- Start Code Ajax -->
        @include('dashboard.admin.includes.ajax.gazLogs')
      <!-- End Code Ajax -->
   
      </article>
      @stop