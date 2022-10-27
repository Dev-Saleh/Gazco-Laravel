@extends('layouts.site')
@section('title')
غازكو | الدفعات
@stop
@section('content')
    <main class="flex flex-col h-full space-y-4">
    
            <!-- begin performing Code Ajax -->
            @include('front.include.ajax.checkBooking')
           <!-- end begin performing Code Ajax  -->

            <!-- begin header -->
             @include('front.include.header')
            <!-- end header -->

            @include('front.checkBooking.create')
            
           

    </main>
                        

@stop
