<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function add_item_to_cart(Request $request){
        if(Auth::check()) {
            $user_id = Auth::id();
            $check_cart = Cart::where('user_id', $user_id)->where('product_id', $request->id)->first();
            if($check_cart){
                $fields = ['qty'=>($check_cart->qty+$request->qty)];
                $update = Cart::where('id', $check_cart->id)->update($fields);
            }
            else{
                $fields = [
                    'user_id' => $user_id,
                    'product_id' => $request->id,
                    'qty' => $request->qty
                ];
                $insert = Cart::create($fields);
            }
            $cart = Cart::where('user_id', $user_id)->get();
            return count($cart);
        }
        else{
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
    }
    public function cart_list(){
        $data = array();
        $data['categories'] = Category::where('is_active', 1)->get();
        if(Auth::check()) {
            $user_id = Auth::id();
            $data['cartItems'] = Cart::where('user_id', $user_id)->get();
        }
        else{
            $data['cartItems'] = \Cart::getContent();
        }
        return view('cart', $data);
    }
    public function remove_cart_item(Request $request){
        if(Auth::check()) {
            $delete = Cart::where('id', $request->id)->delete();
        }
        else{
            \Cart::remove($request->id);
        }
        return redirect()->back();
    }
}
