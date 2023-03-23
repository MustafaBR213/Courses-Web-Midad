@extends('layouts.app')

@section('content')
@if (session()->has('message'))
<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
    <p>{{ session()->get('message') }}</p>
  </div>

@endif



<div class="container m-auto text-center pt-15 pb-5">
    <h1 class="text-6xl font-bold">{{ $courses->title }}</h1>
    <div class="mt-2">
        By: <span class="text-gray-500 italic"> {{ $courses->user->name }}</span>
        On: <span class="text-gray-500 italic"> {{ date('d-m-y',strtotime($courses->updated_at)) }}</span>
    </div>
</div>


<div class="container m-auto text-center pt-15 pb-5">
    <div class="flex h-96">
        <img class="object-cover w-full" src="/images/{{ $courses->image_path }}" alt="">
    </div>
<div class="text-l text-gray-700 py-8 leading-6">
    {{ $courses->description }}
</div>
@if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123']))
    
<a href="/courses/{{ $courses->slug }}/edit" class="bg-green-700 text-gray-100 py-4 px-5 mt-6 inline-block rounded-lg font-bold uppercase text-l place-self-start">Edit Course</a>

<form action="/courses/{{ $courses->slug }}" method="post" class="inline-block">
    @csrf
    @method('delete')
    <button  type="submit" class="bg-red-700 text-red-100 py-4 px-5 mt-6 inline-block rounded-lg font-bold uppercase text-l place-self-start">Delete Course</button>

</form>


@endif

</div>
@if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123']))

<div class="container sm:grid mx-auto p-5 border-b border-gray-300">
    <a href="/video/create/{{ $courses->slug }}" class="bg-green-700 text-gray-100 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">Add New Video</a>
    
</div>

@endif

<div class="container">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Poster</th>
                <th scope="col">Title</th>
                <th scope="col">Video URL</th>
                @if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123']))
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                @endif
                <th scope="col">Watch</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses->video as  $video)
                <tr>
                    <td><img src="/poster/{{ $video->image_path }}" alt="{{ $video->title }}" width="120" height="90"></td>
                    <td>{{ $video->title }}</td>
                    <td>{{ $video->video_path }}</td>
                    @if(Auth::check() && Auth::user()->name === 'admin' && Auth::attempt(['name' => 'admin', 'password' => 'admin123']))
                        <td>
                            <a href="/video/{{ $video->slug }}/edit" class="btn btn-primary">Edit Video</a>
                        </td>
                        <td>
                            <form action="/video/{{ $video->slug }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger text-black">Delete Video</button>
                            </form>
                        </td>
                    @endif
                    <td>
                        <a href="/video/{{ $video->slug }}" class="btn btn-primary">Watch</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection