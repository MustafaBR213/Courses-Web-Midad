@extends('layouts.app')


@section('content')
<div class="bg-cover bg-center" style="background-image: url('images/main.jpg') ">
<div class="flex flex-col justify-center items-center h-screen">
    <h1 class=" text-4xl font-bold text-gray-900 mb-8">Brooky E-Learning</h1>
    <a href="
    @if(Auth::check())
    /courses
    @else
    /register
    @endif
    " class="bg-gray-100 hover:bg-gray-900 text-gray-900 font-bold py-3 px-8 rounded-full">Get Started</a>
  </div>
</div>
<section class="bg-gray-100 py-8">
    <div class="container mx-auto px-2 md:px-0">
      <h2 class="text-2xl font-bold text-gray-800 mb-2">Featured Courses</h2>
      <div class="flex flex-wrap -mx-2">
        
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 px-2 mb-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg">
              <img class="w-full h-48 object-cover object-center" src="/images/work1.png" alt="Course Image">
              <div class="p-4">
                  <h2 class="text-gray-900 font-bold text-lg mb-2">Course Title</h2>
                  <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <div class="flex justify-between mt-4">
                    <p class="text-gray-700 font-bold text-xl">$99</p>
                    <button class="px-3 py-2 bg-blue-500 text-white text-xs font-bold uppercase rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Enroll</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 px-2 mb-4">
                <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                  <img class="w-full h-48 object-cover object-center" src="/images/work2.png" alt="Course Image">
                  <div class="p-4">
                      <h2 class="text-gray-900 font-bold text-lg mb-2">Course Title</h2>
                      <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      <div class="flex justify-between mt-4">
                        <p class="text-gray-700 font-bold text-xl">$99</p>
                        <button class="px-3 py-2 bg-blue-500 text-white text-xs font-bold uppercase rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Enroll</button>
                      </div>
                    </div>
                  </div>
                </div>
                
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 px-2 mb-4">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg">
              <img class="w-full h-48 object-cover object-center" src="/images/work3.png" alt="Course Image">
              <div class="p-4">
                  <h2 class="text-gray-900 font-bold text-lg mb-2">Course Title</h2>
                  <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <div class="flex justify-between mt-4">
                    <p class="text-gray-700 font-bold text-xl">$99</p>
                    <button class="px-3 py-2 bg-blue-500 text-white text-xs font-bold uppercase rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Enroll</button>
                  </div>
                </div>
              </div>
            </div>
        <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 px-2 mb-4">
          <div class="bg-white rounded-lg overflow-hidden shadow-lg">
            <img class="w-full h-48 object-cover object-center" src="/images/work4.png" alt="Course Image">
            <div class="p-4">
                <h2 class="text-gray-900 font-bold text-lg mb-2">Course Title</h2>
                <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="flex justify-between mt-4">
                  <p class="text-gray-700 font-bold text-xl">$99</p>
                  <button class="px-3 py-2 bg-blue-500 text-white text-xs font-bold uppercase rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Enroll</button>
                </div>
              </div>
            </div>
          </div>
          </div>
    </div>
          <!-- Repeat this card component for more courses -->  
{{-- 
<div class="items-center justify-center hero-bg-image flex flex-col ">
    <h1 class="text-gray-100 text-5xl uppercase font-bold pb-10">Welocme To Brooky Website</h1>
    <a href="/" class="bg-gray-100 text-gray-700 py-4 px-5 rounded-lg font-bold uppercase text-xl">Start Learning</a>
</div>
&nbsp;

<!-- How To Be Expert -->
<div class="container sm:grid grid-cols-2 gap-5 mx-auto py-15">
    <div class="mx-2 md:mx-0">
        <img class="sm:rounded-lg" src="https://picsum.photos/seed/picsum/500/300" alt="">
    </div>   
    <div class="flex flex-col items-left justify-center m-10 sm:m-0">
        <h2 class="font-bold text-gray-700 text-4xl uppercase">How to be expert in 2024</h2>
        <p class="font-bold text-gray-600 text-xl pt-2">You canYou canYou canYou canYou canYou can  </p>
        <p class="py-4 text-gray-500 text-sm leading-6">asdasdasdasda</p>
        <a href="/" class="bg-gray-700 text-gray-100 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">Read More</a>
    </div>
</div>
&nbsp;
<!-- Course -->
<div class="text-center p-15 bg-gray-700 text-gray-100">
    <h2 class="text-2xl">Course Categories</h2>
    <div class="container mx-auto pt-10 sm:grid grid-cols-4">
        <div class="font-bold text-3xl py-2">Ux Design</div>
        <div class="font-bold text-3xl py-2">Programming</div>
        <div class="font-bold text-3xl py-2">Graphic Design</div>
        <div class="font-bold text-3xl py-2">Front-End</div>
    </div>
</div>
&nbsp;
<!-- Recent Course -->
<div class="container mx-auto text-center py-14">
    <h2 class="font-bold text-5xl py-10">Recent Course</h2>
    <p class="text-gray-400 leading-5 px-10">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam facilis aut qui ex dolor Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam facilis aut qui ex dolor </p>
</div>
&nbsp;
<div class="sm:grid grid-cols-2 w-4/5 mx-auto">
    <div class="flex bg-yellow-700 text-gray-100 pt-10">
        <div class="block m-auto pt-4 pb-15 w-4/5">
            <ul class="md:flex text-xs gap-2">
                <li class="bg-yellow-100 text-yellow-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300"><a href="/">PHP</a></li>
                <li class="bg-yellow-100 text-yellow-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300"><a href="/">Programming</a></li>
                <li class="bg-yellow-100 text-yellow-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300"><a href="/">Langage</a></li>
                <li class="bg-yellow-100 text-yellow-700 p-2 rounded inline-block my-1 md:my-0 hover:bg-yellow-500 hover:text-yellow-100 transition duration-300"><a href="/">Backend</a></li>
            </ul>
            <h3 class="text-l py-10 leading-6">Yes, there are different ways to handle the redirect after updating the course. Here are some alternatives:

                Return a view
                Instead of redirecting to the courses index page, you could return a view with a success message. This wou
            </h3>
            <a href="/" class="bg-transparent border-2 text-gray-100 py-4 px-5 rounded-lg font-bold uppercase text-l inline-block">Exploere More</a>
        </div>
    </div>
    <div class="flex">
        <img class="object" src="https://picsum.photos/seed/picsum/500/300" alt="">
    </div>
</div> --}}
<hr>
<div class="flex justify-center items-center">
  <div class="w-1/2 p-6">
    <img src="images/form.png" alt="3D Illustration" class="w-full h-full">
  </div>
  <div class="w-1/2 p-6">
    <form action="#" method="post">
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
        <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <div class="mb-4">
        <label for="message" class="block text-gray-700 font-bold mb-2">Message:</label>
        <textarea name="message" id="message" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Send Message</button>
      </div>
    </form>
  </div>
</div>

@endsection