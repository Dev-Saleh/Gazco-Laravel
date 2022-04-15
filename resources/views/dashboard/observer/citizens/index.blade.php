@extends('layouts.observer_dashboard')
@section('content')
   
       <!-- Adding CitizenConfirm -->
        @include('dashboard.observer.citizens.create')   
       <!-- END Adding CitizenConfirm -->
       <!-- Start Code Ajax -->
        @include('dashboard.observer.includes.ajax.citizen')
       <!-- End Code Ajax -->
      </article>
      @stop