<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('role','2')->get();
        if(Auth::user()->role == 2){
            return view('admin.index',compact('admins'));
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 2){
            return view('admin.create');
        }
        return back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        if($request->profile){
            $file = $request->profile;
            $profile = 'admin_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/admin',$profile);
        }
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->gender = $request->gender;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->address = $request->address;
        $admin->profile = $profile;
        // return $admin;
        $admin->save();
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        if(Auth::user()->role == 2){
            return view('admin.edit',compact('admin'));
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = User::findOrFail($id);
        if($request->profile){
            $file = $request->profile;
            $profile = 'admin_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/admin',$profile);
            $admin->profile = $profile;
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->gender = $admin->gender;
        $admin->date_of_birth = $admin->date_of_birth;
        $admin->address = $request->address;
        $admin->update();
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        if($admin){
            $admin->delete();
        }
        return redirect()->route('admin.index');
    }
}
