<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video=Video::get();
        response()->json(['video'=>$video],200);
        // $video = Video::all(); For Testing
        // dd($video);

        return view('video.index')->with('video',Video::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('video.create')->with('course',Course::where('slug',$slug)->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     //'video'=>'required|mimes:mp4,wmv,png,jpg',
        //     'course_id'=>'required',
        // ]);
        $slug = Str::slug($request->title,'-');
        $newVideo = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('videos'),$newVideo);

        $newPoster = uniqid() . '-' . $slug . '.' . $request->poster->extension();
        $request->poster->move(public_path('poster'),$newPoster);

        $video=Video::create([
            'title' =>$request->input('title') ,
            'description'=> $request->input('description'),
            'slug'=>$slug,
            'video_path'=>$newVideo,
            'image_path'=>$newPoster,
            'course_id'=>$request->input('course_id'),
        ]);
        if ($request->wantsJson()) {
            response()->json(['course' => $video], 201);
        }
        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug)
    {
        $video = Video::where('slug', $slug)->first();
        if ($request->wantsJson()) {
            return response()->json(['video' => $video], 200);
        }
        return view('video.show', compact('video'));
        //return view('video.show')->with('video',Video::where('slug',$slug)->first());
        // return view('video.show')->with('video',Video::where('course_id',1)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$slug)
    {
        $video=Video::where('slug',$slug)->get();
        if ($request->wantsJson()) {
            response()->json(['video' => $video], 200);
       }
        return view('video.edit')->with('video',Video::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     //'video'=>'required|mimes:mp4,wmv,png,jpg',
        //     'course_id'=>'required',
        // ]);

        $slug = Str::slug($request->title,'-');
        $newVideo = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('videos'),$newVideo);

        $newPoster = uniqid() . '-' . $slug . '.' . $request->poster->extension();
        $request->poster->move(public_path('poster'),$newPoster);

        $video = Video::where('slug',$slug)
        ->update([
            'title' =>$request->input('title') ,
            'description'=> $request->input('description'),
            'slug'=>$slug,
            'video_path'=>$newVideo,
            'image_path'=>$newPoster,
            'course_id'=>$request->input('course_id'),
        ]);
        response()->json([
            'message' => 'Video updated successfully',
            'video' => $video
        ]);
        return redirect('/courses')->with('message','Updated This Video Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        try {
            $video = Video::where('slug',$slug)->firstOrFail();
            $video->delete();
            
            response()->json([
                'message' => 'Video deleted successfully'
            ], 200);
            return redirect('/courses')->with('message','Deleted Succesfuly..!');
        } catch (\Exception $e) {
            response()->json([
                'message' => 'Failed to delete Video'
            ], 500);
            return redirect('/courses')->with('message','Deleted Succesfuly..!');
        }
        //Video::where('slug',$slug)->delete();
        //return redirect('/video')->with('message','Deleted This Video Succesfully');
    }
}
