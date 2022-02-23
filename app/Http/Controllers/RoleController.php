<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('admin.roles',['roles' => $role]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        // $request;
        $data = array(
        'role' => $request->role );

    $data = Role::create($data);
    if($data){
    return redirect()->back()->with('msg','Role Added Successfully');
    }else{
    return redirect()->back()->with('msg', 'Could not Add Role,Try Again!');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return view('admin.edit_role',['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $update = Role::where('id', $id)->update(['role'=>$request->role ]);
        if($update){
            return redirect()->back()->with('msg', 'Role Updated Successfully!');
        }
        else{
            return redirect()->back()->with('msg', 'Could not update Role, Try Again!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Role::find($id);
        return $find->delete() ? redirect()->back()->with('msg', 'Role Deleted Successfully!') : redirect()->back()->with('msg', 'Could not delete role, Try Again!');
    }
}
