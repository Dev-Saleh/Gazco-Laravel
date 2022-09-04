@extends('layouts.site')

@section('content')
    <main class="flex flex-col h-screen space-y-4 md:mr-[300px]">
    
            
            <!-- begin header -->
            @include('front.include.header')
            <!-- end header -->
            
            @include('front.myProfile.create')
            
           

    </main>
                        

@stop
