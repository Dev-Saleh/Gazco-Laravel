@extends('layouts.observer_dashboard')
@section('content')
   <article id="Content" class="px-10 bg-gray-100">
        <details open class="cursor-pointer text-lg font-medium leading-6 text-gray-900 ">
          <summary class="text-lg font-medium leading-6 text-gray-900 space-y-6" >
            <a href="">أضافة مواطن </a> 
         
             <div class="border-t border-gray-200">
             </div>
           </summary>
           <br>
       <!-- Adding CitizenConfirm -->
        @include('dashboard.observer.citizens.create')   
       <!-- END Adding CitizenConfirm -->
      </article>
      @stop