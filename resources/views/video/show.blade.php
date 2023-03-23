@extends('layouts.app')

@section('content')
@if (session()->has('message'))
<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
    <p>{{ session()->get('message') }}</p>
  </div>

@endif


{{-- asd --}}

<div class="flex flex-row">
    <!-- Comments Section -->
<div class="w-1/3 h-screen bg-gray-900 p-3  ">
    <div class="flex flex-col h-full">
      <div class="flex-grow overflow-y-auto">
        <ul class="text-gray-400">
          <li class="pb-4">
            <div class="flex flex-row items-center">
              <div class="w-10 h-10 bg-gray-700 mr-4"></div>
              <div class="flex-grow">
                <p class="text-sm font-medium">Username</p>
                <p class="text-xs">Comment text goes here.</p>
              </div>
            </div>
          </li>
          <li class="pb-3">
            <div class="flex flex-row items-center">
              <div class="w-8 h-8 bg-gray-700 mr-3"></div>
              <div class="flex-grow">
                <p class="text-sm font-medium">Username</p>
                <p class="text-xs">Comment text goes here.</p>
              </div>
            </div>
          </li>
          <!-- More comment list items... -->
        </ul>
      </div>
      <form class="flex items-center py-1">
        <input type="text"  class="w-full px-4 py-2 text-gray-900 bg-gray-700 rounded-full focus:outline-none" placeholder="Write a comment...">
        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none">Post</button>
      </form>
    </div>
  </div>
  
  
    <!-- Video Player -->
    <div class="w-2/3 h-screen">
      <div class="relative" style="padding-bottom: 56.25%;">
        {{-- <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe> --}}
        <video class="absolute top-0 left-0 w-full h-full"  controls >
            <source
              src="/videos/{{ $video->video_path }}"
              type="video/mp4" />
          </video>  
    </div>
      <h1 class="text-lg font-medium my-4 ml-10">{{ $video->title }}</h1>
      <p class="text-sm text-gray-400 mb-2 ml-10">
        By: <span class="text-gray-500 italic"> {{ $video->course->title }}</span>
        On: <span class="text-gray-500 italic"> {{ date('d-m-y',strtotime($video->updated_at)) }}</span>
      </p>
      <div class="text-l text-gray-700 py-8 leading-6 ml-10">
        {{ $video->description }}
    </div>
    <hr>  
</div>

</div>    
{{-- @if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123'])) --}}
<div class="inline-block ml-6">
@if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123']))

<a href="/video/{{ $video->slug }}/edit" class="bg-green-700 text-gray-100 py-4 px-5 mt-6 inline-block rounded-lg font-bold uppercase text-l place-self-start">Edit Course</a>

<form action="/video/{{ $video->slug }}" method="post" class="inline-block">
    @csrf
    @method('delete')
    <button  type="submit" class="bg-red-700 text-red-100 py-4 px-5 mt-6 inline-block rounded-lg font-bold uppercase text-l place-self-start">Delete Course</button>

</form>
@endif
</div>

{{-- @endif --}}
{{-- asd --}}
{{-- 
<div class="container m-auto text-center pt-15 pb-5">
    <h1 class="text-6xl font-bold">{{ $video->title }}</h1>
    <div class="mt-2">
        By: <span class="text-gray-500 italic"> {{ $video->course->title }}</span>
        On: <span class="text-gray-500 italic"> {{ date('d-m-y',strtotime($video->updated_at)) }}</span>
    </div>
</div> --}}

{{-- 
<div class="container m-auto text-center pt-15 pb-5">
    <div class="flex h-96">
        <video class="w-full shadow-lg"  controls >
            <source
              src="/videos/{{ $video->video_path }}"
              type="video/mp4" />
          </video>  
        
    </div>
<div class="text-l text-gray-700 py-8 leading-6">
    {{ $video->description }}
</div>
@if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123']))
    
<a href="/video/{{ $video->slug }}/edit" class="bg-green-700 text-gray-100 py-4 px-5 mt-6 inline-block rounded-lg font-bold uppercase text-l place-self-start">Edit Course</a>

<form action="/video/{{ $video->slug }}" method="post" class="inline-block">
    @csrf
    @method('delete')
    <button  type="submit" class="bg-red-700 text-red-100 py-4 px-5 mt-6 inline-block rounded-lg font-bold uppercase text-l place-self-start">Delete Course</button>

</form>


@endif
</div>
 --}}




@endsection