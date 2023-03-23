@extends('layouts.app')
@section('content')

<div class="container">
    <div class="container mt-12 text-center pt-15 pb-5">
        <h1 class="text-6xl font-bold">Add Student</h1>
    </div>
<form action="/users" method="post" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
    @csrf
  <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:border-indigo-500" id="name" type="text" name="name" required>
  </div>

  <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:border-indigo-500" id="email" type="email" name="email" required>
  </div>

  <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:border-indigo-500" id="password" type="password" name="password" required>
  </div>

  <button class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600" type="submit">Add</button>

</form>
</div>
@endsection