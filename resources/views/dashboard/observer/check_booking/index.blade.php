@extends('layouts.observer_dashboard')
@section('content')
   
       <!-- Adding CitizenConfirm -->
        @include('dashboard.observer.check_booking.create')   
       <!-- END Adding CitizenConfirm -->
       <!-- Start Code Ajax -->
        @include('dashboard.observer.includes.ajax.checkBooking')
       <!-- End Code Ajax -->
     
      @stop