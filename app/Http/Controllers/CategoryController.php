<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{

    // public function add_category()
    // {
    //     return view('admin.add_category');
    // }

    public function index()
    {
       $category = Category::all();
       
        return view('admin.categories',['categories' => $category]);
    }

    public function create()
    {
        return view('admin.add_category');
    }

    public function store(Request $request)
    {
//return $request;

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
        $category = Category::find($id);
        return view ('admin.edit_category',['category' => $category]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
       //return $request;
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'category_image' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $update = Category::where('id', $id)->update(['category_name'=>$request->category_name, 'category_image'=>$request->category_image, 'is_active'=>$request->status]);
        if($update){
            return redirect()->back()->with('msg', 'Category Updated Successfully!');
        }
        else{
            return redirect()->back()->with('msg', 'Could not update category, Try Again!');
        }
    }

    public function destroy($id)
    {
        $find = Category::find($id);
        return $find->delete() ? redirect()->back()->with('msg', 'Category Deleted Successfully!') : redirect()->back()->with('msg', 'Could not delete category, Try Again!');
    }
}
