<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function customer_login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $user_id = Auth::id();
            $carts = \Cart::getContent();
            if(count($carts) > 0){
                foreach($carts as $cart){
                    $check_cart = Cart::where('user_id', $user_id)->where('product_id', $cart->id)->first();
                    if($check_cart){
                        $fields = ['qty'=>($check_cart->qty+$cart->quantity)];
                        $update = Cart::where('id', $check_cart->id)->update($fields);
                    }
                    else{
                        $fields = [
                            'user_id' => $user_id,
                            'product_id' => $cart->id,
                            'qty' => $cart->quantity
                        ];
                        $insert = Cart::create($fields);
                    }
                }
                \Cart::clear();
            }
            $request->session()->regenerate();
            return response()->json(['success' => true]); 
        }
        else{
            return response()->json(['success' => false]);
        }
    }

    public function customer_logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }
}
