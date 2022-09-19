@extends('layouts.observer_dashboard')
@section('content')
       <article id="Content" class="content-area p-10 bg-gray-100">
       <!-- Adding CitizenConfirm -->
        @include('dashboard.observer.citizens.create')   
       <!-- END Adding CitizenConfirm -->
       
       <!-- Start Code Ajax -->
        @include('dashboard.observer.includes.ajax.citizen')
       <!-- End Code Ajax -->
    
      </article>
      @stop