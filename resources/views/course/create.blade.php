@extends('layouts.app')

@section('content')


<div class="container m-auto text-center pt-15 pb-5">
    <h1 class="text-6xl font-bold">Add New Course</h1>
</div>

<div class="container mx-auto px-4 pt-12 pb-6">
    <form action="/courses" method="post" enctype="multipart/form-data">
      @csrf
      <h1 class="text-4xl font-bold mb-6">Create a New Course</h1>
      <div class="mb-8">
        <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Title</label>
        <input type="text" name="title" id="title" placeholder="Enter course title" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 transition duration-300">
      </div>
      <div class="mb-8">
        <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
        <textarea name="description" id="description" rows="6" placeholder="Enter course description" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50 transition duration-300"></textarea>
      </div>
      <div class="mb-8">
        <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Course Image
        <div class="flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-300">
          <div class="h-40 w-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
          </div>
          <p class="text-sm text-gray-500 mb-2">Drag and drop an image or <span class="text-green-500 font-medium">click to select a file</span>.</p>
          <input type="file" name="image" id="image" class="hidden">
        </div>
    </label>
      </div>
      <div class="text-center">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-3 px-6 rounded-lg font-medium uppercase tracking-wider transition duration-300">Submit Course</button>
      </div>
    </form>
  </div>
  





@endsection