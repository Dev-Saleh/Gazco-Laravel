@extends('layouts.admin_dashboard')
@section('content')
  <article id="Content" class="px-20 bg-gray-100 h-full">
  
      <!-- Adding Directorates -->
        @include('dashboard.admin.agents.create')   
      <!-- END Adding Directorates -->
      </article>
@stop
