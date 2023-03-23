@extends('layouts.app')

@section('content')
@if (session()->has('message'))
<div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
    <p>{{ session()->get('message') }}</p>
  </div>

@endif

<div class="container m-auto mt-10 text-center pt-15 pb-5">
    <h1 class="text-6xl font-bold">All Courses</h1>
</div>
&nbsp;
@if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123']))

<div class="container sm:grid mx-auto p-5 border-b border-gray-300">
    <a href="/courses/create" class="bg-green-700 text-gray-100 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">Add New Course</a>
    
</div>

@endif
{{-- dfgd --}}

<section class="bg-gray-100 py-8">
    <div class="container mx-auto px-2 md:px-0">
      <h2 class="text-2xl font-bold text-gray-800 mb-2">Featured Courses</h2>
        <div class="flex flex-wrap -mx-2">
        @foreach ($courses as $course)
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 px-2 mb-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg">
              <img class="w-full h-48 object-cover object-center" src="/images/{{ $course->image_path }}" alt="Course Image">
              <div class="p-4">
                  <h2 class="text-gray-900 font-bold text-lg mb-2">{{ $course ->title }}</h2>
                  <p class="text-gray-600 text-sm">{{ $course ->description }}</p>
                  <div class="flex justify-between mt-4">
                    <p class="text-gray-700 font-bold text-l">
                        By: <span class=""> {{ $course->user->name }}</span><br>
                        On: <span class=""> {{ date('d-m-y',strtotime($course->updated_at)) }}</span>
                    </p>
                    
                    
                    <a href="/courses/{{ $course->slug }}" class="px-3 py-2 bg-blue-500 text-white text-xs font-bold uppercase rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Read More</a>

                </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
          <!-- Repeat this card component for more courses -->  
</section>

{{-- tgrg --}}
{{-- @foreach ($courses as $course)
    
<div class="container sm:grid grid-cols-2 gap-14 mx-auto py-15 px-5 border-b border-gray-300">
    <div class="flex">
        <img class="object-cover" src="/images/{{ $course->image_path }}" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold-text text-4xl py-5 mg:pt-0">
            {{ $course ->title }}
        </h2>
        <div>
            By: <span class="text-gray-500 italic"> {{ $course->user->name }}</span>
            On: <span class="text-gray-500 italic"> {{ date('d-m-y',strtotime($course->updated_at)) }}</span>
            <p class="text-l text-gray-700 py-8 leading-6">
                {{ $course ->description }}
            </p>
            <a href="/courses/{{ $course->slug }}" class="bg-gray-700 text-gray-100 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">Read More</a>

        </div>
    </div>
</div>
&nbsp;
@endforeach --}}

@endsection