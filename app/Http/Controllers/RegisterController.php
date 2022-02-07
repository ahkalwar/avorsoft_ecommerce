<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function customer_register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            // return redirect()->back()->withErrors($validator);
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]); 
        }
        $fields = $request->all();
        $fields['role_id'] = 2;
        $fields['is_active'] = 1;
        $fields['password'] = bcrypt($request->password);
        $create = User::create($fields);
        // if($create){
        //     return redirect()->back()->with('msg', 'User Registered Successfully!');
        // }
        // else{
        //     return redirect()->back()->with('msg', 'Could not add user, Try Again!');
        // }
        list($status,$data) = $create ? [ true , $create] : [ false , ''] ;
        return response()->json(['success' => $status, 'data' => $data]);
    }
}
