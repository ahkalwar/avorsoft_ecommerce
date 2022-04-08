<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "Product Images Controller is Working.";
        return view('admin.add_product_images');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    return $request;
    //    die;
       if($request->hasFile('main_image')){
            $main_image = $request->main_image;
            $main_img = $main_image->getClientOriginalName();
            $main_image->move(public_path('uploads/products/'),$main_img);
        $fields = array(
        'product_id'=>$request->product_id,        
        'image'=>$main_img,
        'is_main'=>0,
            );
        $create = ProductImage::create($fields);
        if($create){
                return redirect()->back()->with('msg', 'Product Image Added Successfully!');
                    }
        else{
                return redirect()->back()->with('msg', 'Could not add product image, Try Again!');
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addimage($id){
        
        return view('admin.add_product_images', ['product_id'=>$id]);
    }
}
