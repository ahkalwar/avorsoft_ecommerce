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
        $products = Product::all();
        $product_images = ProductImage::all();
        return view('admin.products', ['products' => $products, 'product_images' => $product_images]);
    }

    public function create()
    {
        $categories = $this->get_categories();
        return view('admin.add_product', ['categories'=>$categories]);
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
            'Price'=>$request->price,
            'Stock'=>$request->stock,
            'is_featured'=>$request->featured,
            'is_active'=>$request->status
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
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product', ['categories' => $category, 'product' => $product]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
      
        $fields = array(
            'category_id'=>$request->category_id,
            'Product_Name'=>$request->Product_Name,
            'Description'=>$request->Description,
            'Price'=>$request->price,
            'Stock'=>$request->stock,
            'is_featured'=>$request->featured,
            'is_active'=>$request->status
        );
        $update = Product::where('id', $id)->update($fields);
        if($update){
            $attachments = array();
        if($request->hasFile('main_image')){
            $main_image = $request->main_image;
                $main_img = $main_image->getClientOriginalName();
                $main_image->move(public_path('uploads/products/'),$main_img);
                $attachments[] = array('product_id'=>$id, 'image'=>$main_img, 'is_main'=>1);
        }
        if($request->hasFile('images')){
            $images = $request->images;
            foreach($images as $image){
                $img = $image->getClientOriginalName();
                $image->move(public_path('uploads/products/'),$img);
                $attachments[] = array('product_id'=>$id, 'image'=>$img, 'is_main'=>0);
            }
        }
        foreach($attachments as $attachment){
            $img_create = ProductImage::where('id', $id)->update($attachment);
        }
        
            return redirect()->back()->with('msg', 'Product Updated Successfully!');
        }
        else{
            return redirect()->back()->with('msg', 'Could not updated product, Try Again!');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
       
       $data =  $product->delete();
       $productimg = ProductImage::where('product_id', $id)->delete();
       
        if($data){
            return redirect()->back()->with('msg', 'Product Deleted Successfully!');
        }
        else{
            return redirect()->back()->with('msg', 'Could not delete product, Try Again!');
        }

        
    }

    public function productimages($id){

        $product_image = ProductImage::where('product_id',$id)->get();
        
        //return $product_image;
        
        return view('admin.product_images',['product_images' => $product_image]);
    }





}
