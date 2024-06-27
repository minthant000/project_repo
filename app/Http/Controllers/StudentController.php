<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('role','0')->get();
        return view ('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 0){
            return redirect()->route('student.index');
        }
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        if($request->profile){
            $file = $request->profile;
            $newName = 'student_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/student',$newName);
        }
        $student = new User();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        // $student->skills = [
        //     'php' => 'PHP',
        //     'java' => 'Java',
        //     'react' => 'React',
        //     'web_development' => 'Web Development',
        //     'server' => 'Server',
        //     'aws' => 'AWS',
        //     'web_design' => 'Web Design',
        // ];
        $student->role = '0';
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->profile = $newName;
        // return $request;
        $student->save();
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::findOrFail($id);
        if(Auth::user()->role == 0){
            return redirect()->route('student.index');
        }
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $student = User::findOrFail($id);
        if($request->profile){
            $file = $request->profile;
            $newName = 'student_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/student',$newName);
            $student->profile = $newName;
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->date_of_birth;
        $student->address = $request->address;
        $student->role = '0';
        $student->update();
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::findOrFail($id);
        if($student){
            $student->delete();
        }
        return redirect()->route('student.index');
    }
}
