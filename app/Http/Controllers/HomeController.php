<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\GeneralTrait;
class HomeController extends Controller
{
    use GeneralTrait;
    public function index(){
        $data = array();
        $data['categories'] = $this->get_categories();
        $data['cart_count'] = $this->get_cart_count();
        $data['featured'] = Product::where('is_featured', 1)->with('images')->get();
        return view('home', $data);
    } 

    public function products_by_category($category_name){
        $data = array();
        $data['categories'] = $this->get_categories();
        $data['cart_count'] = $this->get_cart_count();
        $cat = null; $cat = Category::where('category_name', str_replace('-',' ', $category_name))->first();
        if($cat){
        $data['products'] = Product::where('category_id', $cat->id)->with('images')->get();
        return view('categories', $data);
        }
        else{
            return redirect('/');
        }
    }

    public function single_product($product_name){
        $data = array();
        $data['categories'] = $this->get_categories();
        $data['cart_count'] = $this->get_cart_count();
        $product = Product::where('Product_Name', str_replace('-',' ', $product_name))->with('images')->first();
        $data['product'] = $product;
        $data['related'] = Product::where('category_id', $product->category_id)->whereNotIn('id', [$product->id])->with('images')->get();
        return view('single_product', $data);
    }
}
