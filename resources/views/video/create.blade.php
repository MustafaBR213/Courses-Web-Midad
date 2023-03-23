@extends('layouts.app')

@section('content')


<div class="container m-auto text-center pt-15 pb-5">
    <h1 class="text-6xl font-bold">Add New Video</h1>
</div>

<div class="container mx-auto px-4 pt-12 pb-6">
    <form action="/video" method="post" enctype="multipart/form-data">
      @csrf
      <h1 class="text-4xl font-bold mb-6">Add New Video To <span class="text-gray-700">{{ $course->title }}</span> Course</h1>
      <div class="mb-8">
        <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Title</label>
        <input type="text" name="title" id="title" placeholder="Enter course title" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 transition duration-300">
      </div>
      <div class="mb-8">
        <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
        <textarea name="description" id="description" rows="6" placeholder="Enter course description" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 transition duration-300"></textarea>
      </div>
      <div class="mb-8">
        <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Video
        <div class="flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-300">
          <div class="h-40 w-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
          </div>
          <input type="file" name="image" id="image" class="hidden">
          <p class="text-sm text-gray-500 mb-2">Drag and drop an video or <span class="text-green-500 font-medium">click to select a file</span>.</p>
          
        </div>
    </label>
      </div>

      <div class="mb-8">
        <label for="poster" class="block text-lg font-medium text-gray-700 mb-2">Video Poster
        <div class="flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-300">
          <div class="h-40 w-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
          </div>
          <input type="file" name="poster" id="poster" class="hidden">
          <p class="text-sm text-gray-500 mb-2">Drag and drop an poster or <span class="text-green-500 font-medium">click to select a file</span>.</p>
          
        </div>
    </label>
      </div>

      <div class="text-center">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-lg font-medium uppercase tracking-wider transition duration-300">Add Video</button>
      </div>
      <input type="text" name="course_id" value="{{ $course->id }}" placeholder="course_id" class="w-full h-20 text-6xl rounded-lg shadow-lg border-b p-15 mb-5 hidden">

    </form>
  </div>
{{--   
<div class="container m-auto text-center pt-15 pb-5">
<form action="/video" method="post" enctype="multipart/form-data">
    @csrf
<input type="text" name="title" placeholder="Title" class="w-full h-20 text-6xl rounded-lg shadow-lg border-b p-15 mb-5">
<textarea  id="" name="description" placeholder="Description" class="w-full h-60 text-6xl rounded-lg shadow-lg border-b p-15 mb-5"></textarea>
<div class="py-15">
    
<div class="flex items-center justify-center w-full">
    <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input id="image" type="file" class="hidden" name="image"/>
    </label>
</div>

<input type="text" name="course_id" value="{{ $course->id }}" placeholder="course_id" class="w-full h-20 text-6xl rounded-lg shadow-lg border-b p-15 mb-5 hidden"> --}}
{{-- <select name="slugCourse">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="nonbinary">Non-binary</option>
</select> --}}
{{-- <button type="submit " class="btn btn-red "></button>    
</div>
<button type="submit" class=" mt-10 bg-green-700 hover:bg-green-200  text-gray-200 hover:text-gray-700 transition duration-300 cursor-pointer p-5 rounded-lg font-bold uppercase">Submit The Course</button>
</form>
</div> --}}


@endsection 