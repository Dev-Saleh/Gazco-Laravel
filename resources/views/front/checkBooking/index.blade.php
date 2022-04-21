@extends('layouts.site')

@section('content')
    <main class="flex flex-col h-screen space-y-4 md:mr-[300px]">
    
            <!-- begin performing Code Ajax -->
            @include('front.include.ajax.home')
           <!-- end begin performing Code Ajax  -->

            <!-- begin header -->
             @include('front.include.header')
            <!-- end header -->

            @include('front.checkBooking.create')

           

    </main>
                        

@stop
