@extends('layouts.site')
@section('title')
غازكو | الملف الشخصي
@stop
@section('content')
    <main class="flex flex-col h-screen space-y-4 md:mr-[300px]">
          <!-- begin header -->
          @include('front.include.header')
          <!-- end header -->
          
            <!-- begin performing Code Ajax -->
            @include('front.include.ajax.myProfile')
           <!-- end begin performing Code Ajax  -->
          
            
            @include('front.myProfile.create')
          

            
           

    </main>
                        

@stop
