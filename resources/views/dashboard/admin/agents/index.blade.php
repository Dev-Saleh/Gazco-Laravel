
@extends('layouts.admin_dashboard')
@section('content')
  <article id="Content" class="content-area px-20 bg-gray-100 h-full">
  
      <!-- Adding Agent -->
        @include('dashboard.admin.agents.create')   
      <!-- END Adding Agent -->
      </article>
     <!-- Start Code Ajax -->
        @include('dashboard.admin.includes.ajax.agents')
     <!-- End Code Ajax -->
@stop

