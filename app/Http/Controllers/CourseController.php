<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::get();

        if ($request->wantsJson()) {
            return response()->json(['courses' => $courses], 200);
        }

        return view('course.index', compact('courses'));
        //return view('course.index')->with('courses',Course::get());

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
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
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
        // ]);

        // $slug = Str::slug($request->title,'-');   

        // $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $newImageName);
        
        // Course::create([
        //     'title' =>$request->input('title') ,
        //     'description'=> $request->input('description'),
        //     'slug'=>$slug,
        //     'image_path'=>$newImageName,
        //     'user_id'=>auth()->user()->id, 
        // ]);
        // return redirect('/courses');

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
        ]);

        $slug = Str::slug($request->title,'-');

        $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $course = Course::create([
            'title' =>$request->input('title') ,
            'description'=> $request->input('description'),
            'slug'=>$slug,
            'image_path'=>$newImageName,
            'user_id'=>auth()->user()->id,
        ]);

        if ($request->wantsJson()) {
            response()->json(['course' => $course], 201);
        }

        return redirect('/courses')->with('success', 'Course created successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug)
    {
        $courses = Course::where('slug', $slug)->first();

        if ($request->wantsJson()) {
            return response()->json(['course' => $courses], 200);
        }

        return view('course.show', compact('courses'));
        // return view('course.show')->with('courses',Course::where('slug',$slug)->first());
    }

    public function showVideo(Video $id)
    {
        // return view('course.video.show')->with('course',Course::where('slug',$slug)->first());
        //return view('course.video.show')->with('videos',VideoCourses::where('slug',$slug)->first());
        return view('course.show')->with('courses',Course::where('id',$id)->get());
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$slug)
    {
        $courses = Course::where('slug', $slug)->first();

        if ($request->wantsJson()) {
             response()->json(['course' => $courses], 200);
        }

        //return view('course.edit', compact('courses'));
        return view('course.edit')->with('courses',Course::where('slug',$slug)->first());
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
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
        // ]);

        // $slug = Str::slug($request->title,'-');   

        // $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $newImageName);
        

        // Course::where('slug',$slug)
        // ->update([
        //     'title' =>$request->input('title') ,
        //     'description'=> $request->input('description'),
        //     'slug'=>$slug,
            
        //     'user_id'=>auth()->user()->id, 
        // ]);
        // return redirect('/courses/'.$slug)->with('message','Updated Succesfuly..!');

        $courses = Course::where('slug',$slug)->firstOrFail();
        
        $courses->title = $request->input('title');
        $courses->description = $request->input('description');
        $courses->save();
        response()->json([
            'message' => 'Course updated successfully',
            'course' => $courses
        ]);
        return redirect('/courses/'.$slug)->with('message','Updated Succesfuly..!');
        
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
            $course = Course::where('slug',$slug)->firstOrFail();
            $course->delete();
            
            response()->json([
                'message' => 'Course deleted successfully'
            ], 200);
            return redirect('/courses')->with('message','Deleted Succesfuly..!');
        } catch (\Exception $e) {
            response()->json([
                'message' => 'Failed to delete course'
            ], 500);
            return redirect('/courses')->with('message','Deleted Succesfuly..!');
        }
        //Course::where('slug',$slug)->delete();
       // return redirect('/courses')->with('message','Deleted Succesfuly..!');
    }
}
