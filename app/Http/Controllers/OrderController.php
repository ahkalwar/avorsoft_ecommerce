<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function orders(){
        $orders = Order::with('user')->get();
        return view('admin/orders', ["orders"=>$orders]);
    }
    public function orders_list(Request $request){
        $orders = Order::with('user')->get();
        return view('admin/orders_list', ["orders"=>$orders]);
    }
    public function order_items($id){
        $order = Order::find($id);
        $items = Orderitem::where("order_id", $id)->with("product")->get();
        foreach($items as $item){
            $image = ProductImage::where("product_id", $item->product_id)->where("is_main", 1)->first();
            $item->product->image = $image->image;
        }
        return view('admin/items_list', ["order"=>$order, "items"=>$items]);
    }
}
