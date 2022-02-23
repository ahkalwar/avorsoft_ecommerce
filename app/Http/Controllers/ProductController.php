<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Cart;
use App\Http\Traits\GeneralTrait;
class ProductController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $categories = $this->get_categories();
        return view('add_product', ['categories'=>$categories]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'Product_Name' => 'required',
            'Description' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $fields = array(
            'category_id'=>$request->category_id,
            'Product_Name'=>$request->Product_Name,
            'Description'=>$request->Description,
            'Price'=>100,
            'Stock'=>500,
            'is_featured'=>1,
            'is_active'=>1
        );
        $create = Product::create($fields);
        if($create){
            $attachments = array();
        if($request->hasFile('main_image')){
            $main_image = $request->main_image;
                $main_img = $main_image->getClientOriginalName();
                $main_image->move(public_path('uploads/products/'),$main_img);
                $attachments[] = array('product_id'=>$create->id, 'image'=>$main_img, 'is_main'=>1);
        }
        if($request->hasFile('images')){
            $images = $request->images;
            foreach($images as $image){
                $img = $image->getClientOriginalName();
                $image->move(public_path('uploads/products/'),$img);
                $attachments[] = array('product_id'=>$create->id, 'image'=>$img, 'is_main'=>0);
            }
        }
        foreach($attachments as $attachment){
            $img_create = ProductImage::create($attachment);
        }
        
            return redirect()->back()->with('msg', 'Product Added Successfully!');
        }
        else{
            return redirect()->back()->with('msg', 'Could not add product, Try Again!');
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
