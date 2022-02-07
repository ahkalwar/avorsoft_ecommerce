<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function add_item_to_cart(Request $request){
        
        \Cart::add([
            'id' => $request->id,
            'name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->qty,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        $cartItems = \Cart::getContent();
        return count($cartItems);
    }
    public function cart_list(){
        $data = array();
        $data['categories'] = Category::where('is_active', 1)->get();
        $data['cartItems'] = \Cart::getContent();
        return view('cart', $data);
    }
    public function remove_cart_item(Request $request){
        \Cart::remove($request->id);
        return redirect()->back();
    }
}
