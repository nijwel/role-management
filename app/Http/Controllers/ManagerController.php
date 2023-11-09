<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $managers = User::whereType(2)->get();
        return view('admin.manager.index',compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manager.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'email' => 'required|unique:users|',
            'name' => 'required',
            'password' => 'required',
        ]);

        $data = new User;
        $data->name       = $request->name;
        $data->email      = $request->email;
        $data->password   = Hash::make($request->password);
        $data->type       = 2;
        $data->manager    = $request->manager;
        $data->c_manager  = $request->c_manager;
        $data->d_manager  = $request->d_manager;
        $data->e_manager  = $request->e_manager;
        $data->employee   = $request->employee;
        $data->c_employee = $request->c_employee;
        $data->d_employee = $request->d_employee;
        $data->e_employee = $request->e_employee;
        $data->save();

        return redirect()->back()->with('success','Successfully Created !');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        return view ('admin.manager.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);

        $data = User::find($id);
        $data->name       = $request->name;
        $data->email      = $request->email;
        $data->type       = 2;
        $data->manager    = $request->manager;
        $data->c_manager  = $request->c_manager;
        $data->d_manager  = $request->d_manager;
        $data->e_manager  = $request->e_manager;
        $data->employee   = $request->employee;
        $data->c_employee = $request->c_employee;
        $data->d_employee = $request->d_employee;
        $data->e_employee = $request->e_employee;
        $data->save();

        return redirect()->route('index.manager')->with('success','Successfully Updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success','Successfully Delete !');
    }
}
