<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
trait GeneralTrait {
 
    public function get_categories() {
        return Category::where('is_active', 1)->get();
    }
    public function get_cart_count() {
        if(Auth::check()) {
            $user_id = Auth::id();
            return Cart::where('user_id', $user_id)->count();
        }
        else{
            return 0;
        }
    }
}
?>