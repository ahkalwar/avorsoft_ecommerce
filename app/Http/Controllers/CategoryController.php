<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        return view('add_category');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'category_image' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $fields = array('category_name'=>$request->category_name,'is_active'=>1);
        if($request->hasFile('category_image')){
            $attach = $request->category_image;
                $img = $attach->getClientOriginalName();
                $attach->move(public_path('uploads/categories/'),$img);
                $fields['category_image'] = $img;
        }
        else{
            $fields['category_image'] = 'no-img.png';
        }
        $create = Category::create($fields);
        if($create){
            return redirect()->back()->with('msg', 'Category Added Successfully!');
        }
        else{
            return redirect()->back()->with('msg', 'Could not add category, Try Again!');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
