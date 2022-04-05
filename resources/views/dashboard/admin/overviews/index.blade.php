@extends('layouts.admin_dashboard')
@section('content')
  <article id="Content" class="h-screen bg-slate-600 flex space-x-10">
                <div class="relative z-0 w-full mb-5">
                    <input
                      type="text"
                      name="name"
                      placeholder=" "
                      required
                      class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                    />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Full Name</label>
                    <span class="text-sm text-red-600 hidden" id="error">Full Name is required</span>
                  </div>
            </article>
        </main>
    </div>
 @stop

