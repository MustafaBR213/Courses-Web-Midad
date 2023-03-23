@extends('layouts.app')

@section('content')
@if (session()->has('message'))
<div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
    <p>{{ session()->get('message') }}</p>
  </div>

@endif

<div class="container m-auto mt-10 text-center pt-15 pb-5">
    <h1 class="text-6xl font-bold">All Videos</h1>
</div>
&nbsp;
@if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123']))

<div class="container sm:grid mx-auto p-5 border-b border-gray-300">
    <a href="/video/create" class="bg-green-700 text-gray-100 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">Add New Video</a>
    
</div>

@endif

@foreach ($video as $item)
    
<div class="container sm:grid grid-cols-2 gap-14 mx-auto py-15 px-5 border-b pb-24 border-gray-300">
    <div class="flex">
        <img class="object-cover" src="/poster/{{ $item->image_path }}" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold-text text-4xl py-5 mg:pt-0">
            {{ $item ->title }}
        </h2>
        <div>
            Course: <span class="text-gray-500 italic"> {{ $item->course->title }}</span><br>
            On: <span class="text-gray-500 italic"> {{ date('d-m-y',strtotime($item->updated_at)) }}</span>
            <p class="text-l text-gray-700 py-8 leading-6">
                {{ $item ->description }}
            </p>
            <a href="/video/{{ $item->slug }}" class="bg-gray-700 text-gray-100 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">Read More</a>

        </div>
    </div>
</div>
&nbsp;
@endforeach

@endsection