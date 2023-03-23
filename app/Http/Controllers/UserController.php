<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::get();
        if ($request->wantsJson()) {
            return response()->json(['users'=>$user],200);
        }
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required', 'string', 'max:255',
            'email'=>'required', 'string', 'email', 'max:255', 'unique:users',
            'password'=>'required', 'string', 'min:8', 'confirmed',
        ]);
        $user=User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=> Hash::make($request->input('password')),
        ]);
        if ($request->wantsJson()) {
            response()->json(['users'=>$user],200);
        }
        return redirect('/users')->with('success','User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $user=User::where('id',$id)->first();
        if ($request->wantsJson()) {
            return response()->json(['user'=>$user],200);
        }
        return view('users.show')->with('user',User::where('id',$id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $user=User::where('id',$id)->first();
        if ($request->wantsJson()) {
            return response()->json(['users'=>$user],200);
        }
        return view('users.edit')->with('users',User::where('id',$id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=User::where('id',$id)->firstOrFail();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->save();
        response()->json([
            'message' =>'User Updated Successfully',
            'user'=>$user
        ]);
        return redirect('/users')->with('message','Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $course = User::where('id',$id)->firstOrFail();
            $course->delete();
            
            response()->json([
                'message' => 'User deleted successfully'
            ], 200);
            return redirect('/users')->with('message','Deleted Succesfuly..!');
        } catch (\Exception $e) {
            response()->json([
                'message' => 'Failed to delete course'
            ], 500);
            return redirect('/users')->with('message','Deleted Succesfuly..!');
        }
    }
}
