@extends('layouts.admin_dashboard')
@section('headerContent')
<nav id="Navbar" class="h-16 w-full bg-gray-100 ">
    <div class="px-6 py-2 mx-4 mt-4 bg-white  rounded-full ">
        <div class="grid grid-cols-12 ">
            <div class="col-span-3 flex items-center justify-between">
                <div class="text-xl font-semibold text-gray-700 mr-2">
                    <a class="text-2xl font-bold font-cairo text-gray-700  hover:text-blue-600 text-right "
                        href="#">غـازكو</a>
                </div>


            </div>
            <div class="col-span-6 h-8">
           
            </div>
            <div class="col-span-3 flex flex-row-reverse ">
                <button type="button" class="left-0 h-8 w-8 rounded-full">
                    <img class="h-8 w-8 rounded-full" src="{{ asset('assets/images/Dev-SL.jpeg') }}" alt="Admin">
                </button>
            </div>
        </div>
    </div>
</nav>
@stop