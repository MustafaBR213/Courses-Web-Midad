@extends('layouts.app')
@section('content')






<div class="container pt-40 pl-40 "></div>

<div class="flex flex-row justify-between">
  <div class="bg-white rounded-lg shadow-md p-6 w-1/3">
    <h2 class="text-lg font-medium mb-4">User Information</h2>
    <div class="flex flex-col space-y-4">
      <div class="flex flex-row justify-between">
        <span class="text-gray-700 font-bold">Name:</span>
        <span class="text-gray-900">{{ $user->name }}</span>
      </div>
      <div class="flex flex-row justify-between">
        <span class="text-gray-700 font-bold">Email:</span>
        <span class="text-gray-900">{{ $user->email }}</span>
      </div>
      <div class="flex flex-row justify-between">
        <span class="text-gray-700 font-bold">Password:</span>
        <span class="text-gray-900">{{ $user->password }}</span>
        
      </div>
      <a class="inline-block rounded bg-gray-700 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] w-24" href="/users/{{ $user->id }}/edit">edit</a>
      <form action="/users/{{ $user->id }}" method="post" class="inline-block">
        @csrf
        @method('delete')
        <button  type="submit" class="inline-block rounded bg-danger px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#dc4c64] transition duration-150 ease-in-out hover:bg-danger-600 hover:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:bg-danger-600 focus:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700 active:shadow-[0_8px_9px_-4px_rgba(220,76,100,0.3),0_4px_18px_0_rgba(220,76,100,0.2)] w-24">Delete</button>
      </form>
    </div>
  </div>
  <div class="w-max ml-96">
    <img src="/images/form.png" alt="Illustration" class="object-contain" width="50%" height="50%">
  </div></div>
  
@endsection