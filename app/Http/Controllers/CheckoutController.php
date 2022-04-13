<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\GeneralTrait;
class CheckoutController extends Controller
{
    use GeneralTrait;
    public function checkout(){
        if(Auth::check()) {
            $user_id = Auth::id();
            $cartItems = Cart::where('user_id', $user_id)->get();
            if(count($cartItems) == 0){
                return redirect('/')->with(["msg"=>"Cart Empty"]);
            }

            $data = array();
            $data['categories'] = Category::where('is_active', 1)->get();
            $data['cartItems'] = $cartItems;
            $data['cart_count'] = $this->get_cart_count();
            return view('checkout', $data);
        }
        else{
            return redirect('/')->with(["msg"=>"Login first to Checkout"]);
        }
    }
    public function place_order(Request $request){
        $user_id = Auth::id();
        $fields = array(
            'user_id' => $user_id,
            'billing_address' => $request->billing_address,
            'shipping_address' => $request->shipping_address,
            'order_price' => $request->order_price,
            'order_date' => date('Y-m-d h:i:s'),
            'order_status' => 'pending'
        );
        $create_order = Order::create($fields);
        if($create_order){
            $cartItems = Cart::where('user_id', $user_id)->get();
            foreach($cartItems as $cartitem){
                $cartfields = array(
                    'order_id' => $create_order->id,
                    'product_id' => $cartitem->product_id,
                    'qty' => $cartitem->qty
                );
                $create_item = Orderitem::create($cartfields);
            }
            Cart::where('user_id', $user_id)->delete();
            return response()->json(['success' => true]);
        }
        else{
            return response()->json(['success' => false]);
        }
    } 
}
