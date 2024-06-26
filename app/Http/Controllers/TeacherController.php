<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('role','1')->get();
        if(Auth::user()->role == 0){
            return redirect()->route('student.index');
        }
        return view ('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 2){
            return view('teacher.create');
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        if($request->profile){
            $file = $request->profile;
            $newName = 'teacher_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/teacher',$newName);
        }
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->gender = $request->gender;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->address = $request->address;
        $teacher->role = '1';
        $teacher->profile = $newName;
        $teacher->save();
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::findOrFail($id);
        //return $teacher;
        if(Auth::user()->role == 2){
            return view('teacher.edit',compact('teacher'));
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, $id)
    {
        $teacher = User::findOrFail($id);
        if($request->profile){
            $file = $request->profile;
            $newName = 'teacher_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/teacher',$newName);
            $teacher->profile = $newName;
        }
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->gender = $request->gender;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->address = $request->address;
        $teacher->role = '1';
        $teacher->update();
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = User::findOrFail($id);
        if($teacher){
            $teacher->delete();
        }
        return redirect()->route('teacher.index');
    }
}
