@extends('layouts.site')

@section('content')
    <main class="flex flex-col h-full space-y-4 md:mr-[300px]">
    
          

            <!-- begin header -->
             @include('front.include.header')
            <!-- end header -->

            @include('front.home.create')

             <!-- begin performing Code Ajax -->
             @include('front.include.ajax.home')
             <!-- end begin performing Code Ajax  -->

    </main>
                        

@stop
