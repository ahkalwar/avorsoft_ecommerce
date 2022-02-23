<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $users = User::all();
        //return $users;
        return view('admin.users', [ 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.add_user', ['role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $data = array(
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>$request->password, 
            'is_active' =>$request->status,           
                        );
        $data = User::create($data);
        if($data){
        return redirect()->back()->with('msg','User Added Successfully');
        }else{
         return redirect()->back()->with('msg', 'Could not Add User,Try Again!');
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
        $user = User::find($id);
        $role = Role::all();
        return view('admin.edit_user' ,['user' => $user, 'role' => $role] );
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
        $data = array(
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>$request->password, 
            'is_active' =>$request->status,           
                        );
        $data = User::where('id', $id)->update($data);
        if($data){
        return redirect()->back()->with('msg','User Updated Successfully');
        }else{
         return redirect()->back()->with('msg', 'Could not updated User,Try Again!');
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
        //return $id;
        $find = User::find($id);
        return $find->delete() ? redirect()->back()->with('msg', 'User Deleted Successfully!') : redirect()->back()->with('msg', 'Could not delete user, Try Again!');
    }
}
