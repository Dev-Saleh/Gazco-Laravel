@extends('layouts.observer_dashboard')

@section('title')
مراقب | الدفعات
@stop
@section('content')
   
       <!-- Adding CitizenConfirm -->
        @include('dashboard.observer.checkBatch.create')   
       <!-- END Adding CitizenConfirm -->
         <!-- Start Code Ajax -->
        @include('dashboard.observer.includes.ajax.checkBatch')
       <!-- End Code Ajax -->
     
      @stop